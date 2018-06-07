$(document).off('click', '.editStore').on('click', '.editStore', function () {
  $('.get-sid').val($(this).attr('id'));
  var data = new FormData();
  data.append('sid', $(this).attr('id'));
  $.ajax({
    type: "POST",
    contentType: false,
    processData: false,
    cache: false,
    url: 'php/layout-editstore.php',
    data: data,
    success: function(data) {
      $('.editStoreBody').html(data);
    }
  });
});

$(document).off('click', '#but-editStore').on('click', '#but-editStore', function () {
  var isFormValid = 1;
  var changeLogged = 0;
  document.getElementById("but-loading").style.display = "block";
  document.getElementById("but-editStore").style.display = "none";

  $(".editstore").each(function() {
    if ($.trim($(this).val()).length == 0) {
      $(this).addClass("is-invalid");
      isFormValid = 0;
      swal("Uh Oh!", "Looks like some things are missing...", "error");
    } else {
      $(this).removeClass("is-invalid");
    }
  });

  if(isFormValid == 1) {
    swal({
      title: "Are you sure?",
      text: "Please make sure all information is correct before proceeding.",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        //Logging change in Change Log
        var data = new FormData();
        data.append('changeID', "18");
        data.append('pagename', "edit-store.php");
        $.ajax({
          type: "POST",
          contentType: false,
          processData: false,
          cache: false,
          url: 'php/log-change.php',
          data: data,
          success: function(data) {
            if(data == "servfailure") {
              window.location.href = "https://admin.prodasher.com/error-500.php";
            }
            if(data == "complete") {
              changeLogged = 1;
            }
          }
        }).done(continueEdit);

        function continueEdit() {
        if(changeLogged == 1) {
          var data = new FormData();
          data.append('sid', $('.get-sid').val());
          data.append('sname', $('.editstore#sname').val());
          data.append('address', $('.editstore#address').val());
          data.append('zipcode', $('.editstore#zipcode').val());
          data.append('approval', $('.approval.disabled').attr('id'));
          $.ajax({
            type: "POST",
            contentType: false,
            processData: false,
            cache: false,
            url: 'php/edit-store.php',
            data: data,
            success: function(data) {
              console.log(data);
              if(data == "servfailure") {
                window.location.href = "https://admin.prodasher.com/error-500.php";
              }

              if(data == "complete") {
                document.getElementById("but-loading").style.display = "none";
                document.getElementById("but-editStore").style.display = "block";
                $('#editStore').modal('hide');
                $('.stores').DataTable().ajax.reload();
                swal("Success! The store's information has been updated!", {
                  icon: "success",
                });
              }
            }
          });
        }
      }
      } else {
        swal("The store information did not change!");
      }
    });
  }
});
//END
