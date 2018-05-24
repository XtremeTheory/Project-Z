$(function() {
  $(window).keydown(function(event) {
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });

document.getElementById("but-loading").style.display = "none";
document.getElementById("but-addError").style.display = "block";

$('input textarea').on('focus', function() {
  $(this).removeClass('is-invalid');
});

$(document).off('click', '#but-addError').on('click', '#but-addError', function () {
  document.getElementById("but-addError").style.display = "none";
  document.getElementById("but-loading").style.display = "block";
  var isFormValid = true;

  $(".required").each(function() {
    if ($.trim($(this).val()).length == 0) {
      $(this).addClass("is-invalid");
      isFormValid = false;
      swal("Uh Oh!", "Looks like some things are missing...", "error");
    } else {
      $(this).removeClass("is-invalid");
    }
  });

  if(isFormValid) {
    var data = new FormData();
    data.append('errFilename', $('#errFilename').val());
    data.append('errMessage', $('#errMessage').val());
    data.append('errLevel', $('#errLevel').val());
    $.ajax({
      type: "POST",
      contentType: false,
      processData: false,
      cache: false,
      url: 'php/add-error.php',
      data: data,
      success: function(data) {
        console.log(data);
        if(data == "servfailure") {
          window.location.href = "https://admin.prodasher.com/error-500.php";
        }
        if(data == "correct") {
          $('.multi-ordering').DataTable().ajax.reload();
          swal("Success!", "The error has been added to the log!", "success");
          $('#addError').modal('hide');
        }
      }
    });
  } else {
    document.getElementById("but-addError").style.display = "block";
    document.getElementById("but-loading").style.display = "none";
  }
});
});
