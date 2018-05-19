$(function() {
  $(window).keydown(function(event) {
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });

document.getElementById("but-loading").style.display = "none";
document.getElementById("but-addProduct").style.display = "block";

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

$(document).off('click', '#but-addProduct').on('click', '#but-addProduct', function () {
  document.getElementById("but-addProduct").style.display = "none";
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
    var pname = $('#pname').val();
    var upc = $('#upc').val();
    $.ajax({
      type: "POST",
      cache: false,
      url: 'php/add-product.php',
      data: {sname: sname, address: address},
      success: function(data) {
        if(data == "servfailure") {
          window.location.href = "https://www.bodtracker.com/page-500.php";
        }
        if(data == "correct") {
          $('.multi-ordering').DataTable().ajax.reload();
          swal("Success!", "Another product has been added to the database, sweet!", "success");
          $('#addProduct').modal('hide');
        }
      }
    });
  } else {
    document.getElementById("but-addProduct").style.display = "block";
    document.getElementById("but-loading").style.display = "none";
  }
});
});
