$(document).off('click', '.editBrand').on('click', '.editBrand', function () {
$('.get-bid').val($(this).attr('id'));
  var data = new FormData();
  data.append('bid', $(this).attr('id'));
  $.ajax({
    type: "POST",
    contentType: false,
    processData: false,
    cache: false,
    url: 'php/layout-editbrand.php',
    data: data,
    success: function(data) {
      $('.editBrandBody').html(data);
    }
  });
});

$(document).off('click', '#but-editBrand').on('click', '#but-editBrand', function () {
  document.getElementById("but-loading").style.display = "block";
  document.getElementById("but-addBrand").style.display = "none";
  var isFormValid = 1;
  var changeLogged = 0;
  
  $(".editbrand").each(function() {
    if ($.trim($(this).val()).length == 0) {
      $(this).addClass("is-invalid");
      isFormValid = 0;
      document.getElementById("but-loading").style.display = "none";
      document.getElementById("but-editBrand").style.display = "block";
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
        var data = new FormData();
        data.append('changeID', "17");
        data.append('pagename', "edit-brand.php");
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
          data.append('bid', $('.get-bid').val());
          data.append('bname', $('.editbrand#bname').val());
          $.ajax({
            type: "POST",
            contentType: false,
            processData: false,
            cache: false,
            url: 'php/edit-brand.php',
            data: data,
            success: function(data) {
              if(data == "servfailure") {
                window.location.href = "https://admin.prodasher.com/error-500.php";
              }

              if(data == "complete") {
                $('#editBrand').modal('hide');
                document.getElementById("but-loading").style.display = "none";
                document.getElementById("but-editBrand").style.display = "block";
                swal("Success! The brand's information has been updated!", {
                  icon: "success",
                });
              }
            }
          });
        }
      }
      } else {
        swal("The brand information did not change!");
      }
    });
  }
});
