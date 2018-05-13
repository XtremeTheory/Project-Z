$(function() {
  $(window).keydown(function(event) {
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });

document.getElementById("but-loading").style.display = "none";
document.getElementById("but-addStore").style.display = "block";

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

$(document).off('click', '#but-addStore').on('click', '#but-addStore', function () {
  document.getElementById("but-addStore").style.display = "none";
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
    console.log("Form is valid.");
    var sname = $('#sname').val();
    var address = $('#address').val();
    var zipcode = $('#zipcode').val();
    $.ajax({
      type: "POST",
      cache: false,
      url: 'php/store-submit.php',
      data: {sname: sname, address: address, zipcode: zipcode},
      success: function(data) {
        console.log("Submitted data.");
        console.log("Data returned: " + data);
        if(data == "correct") {
          swal("Success!", "Another store has been added to the database, sweet!", "success");
          $('#addStore').modal('hide');
        }
      }
    });
  } else {
    document.getElementById("but-addStore").style.display = "block";
    document.getElementById("but-loading").style.display = "none";
  }
});
});
