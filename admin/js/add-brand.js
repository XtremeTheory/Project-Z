$(function() {
  $(window).keydown(function(event) {
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });

document.getElementById("but-loading").style.display = "none";
document.getElementById("but-addBrand").style.display = "block";

$('input[type="text"]').on('focus', function() {
  $(this).removeClass('is-invalid');
});

function cap_Words(input) {
  var words = input.split(/(\s|-)+/), output = [];

  for (var i = 0, len = words.length; i < len; i += 1) {
    output.push(words[i][0].toUpperCase() + words[i].toLowerCase().substr(1));
  }
  return output.join('');
}

$(document).off('click', '#but-addBrand').on('click', '#but-addBrand', function () {
  document.getElementById("but-addBrand").style.display = "none";
  document.getElementById("but-loading").style.display = "block";
  var isFormValid = true;

  $(".required").each(function() {
    if ($.trim($(this).val()).length == 0) {
      document.getElementById("but-loading").style.display = "none";
      document.getElementById("but-addBrand").style.display = "block";
      $(this).addClass("is-invalid");
      isFormValid = false;
      swal("Uh Oh!", "Looks like some things are missing...", "error");
    } else {
      $(this).removeClass("is-invalid");
    }
  });

  if(isFormValid) {
    var bname = $('#bname').val();
    $.ajax({
      type: "POST",
      cache: false,
      url: 'php/add-brand.php',
      data: {bname: bname},
      success: function(data) {
        if(data == "servfailure") {
          window.location.href = "https://admin.prodasher.com/error-500.php";
        }
        if(data == "correct") {
          document.getElementById("but-loading").style.display = "none";
          document.getElementById("but-addBrand").style.display = "block";
          $('.brands').DataTable().ajax.reload();
          swal("Success!", "Another brand has been added to the database, sweet!", "success");
          $('#addBrand').modal('hide');
        }
      }
    });
  } else {
    document.getElementById("but-addBrand").style.display = "block";
    document.getElementById("but-loading").style.display = "none";
  }
});
});
