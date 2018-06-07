$(document).off('click', '.editCategory').on('click', '.editCategory', function () {
$('.get-cid').val($(this).attr('id'));
  var data = new FormData();
  data.append('cid', $(this).attr('id'));
  $.ajax({
    type: "POST",
    contentType: false,
    processData: false,
    cache: false,
    url: 'php/layout-editcategory.php',
    data: data,
    success: function(data) {
      $('.editCategoryBody').html(data);
    }
  });
});

$(document).off('click', '#but-editCategory').on('click', '#but-editCategory', function () {
  document.getElementById("but-loading").style.display = "block";
  document.getElementById("but-addCategory").style.display = "none";
  var isFormValid = 1;
  var changeLogged = 0;

  $(".editcategory").each(function() {
    if ($.trim($(this).val()).length == 0) {
      $(this).addClass("is-invalid");
      isFormValid = 0;
      document.getElementById("but-loading").style.display = "none";
      document.getElementById("but-editCategory").style.display = "block";
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
        data.append('pagename', "edit-category.php");
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
          data.append('cid', $('.get-cid').val());
          data.append('cname', $('.editcategory#cname').val());
          $.ajax({
            type: "POST",
            contentType: false,
            processData: false,
            cache: false,
            url: 'php/edit-category.php',
            data: data,
            success: function(data) {
              if(data == "servfailure") {
                window.location.href = "https://admin.prodasher.com/error-500.php";
              }

              if(data == "complete") {
                $('#editCategory').modal('hide');
                document.getElementById("but-loading").style.display = "none";
                document.getElementById("but-editCategory").style.display = "block";
                swal("Success! The category has been updated!", {
                  icon: "success",
                });
              }
            }
          });
        }
      }
      } else {
        swal("The category did not change!");
      }
    });
  }
});
