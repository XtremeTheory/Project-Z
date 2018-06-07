$(function() {
  $(window).keydown(function(event) {
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });

document.getElementById("but-loading").style.display = "none";
document.getElementById("but-addProduct").style.display = "block";

$('input[type="text"], #department, #netwtmsmt, #notes').on('focus', function() {
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
    var brandID = $('#brandID').val();
    var cate = $('#category').val();
    var netwtqty = $('#netwtqty').val();
    var netwtmsmt = $('#netwtmsmt').val();
    $.ajax({
      type: "POST",
      cache: false,
      url: 'php/add-product.php',
      data: {pname: pname, upc: upc, brandID: brandID, cate: cate, netwtqty: netwtqty, netwtmsmt: netwtmsmt},
      success: function(data) {
        console.log(data);
        if(data == "servfailure") {
          window.location.href = "https://admin.prodasher.com/error-500.php";
        }
        if(data == "correct") {
          $('#upc').removeAttr("disabled");
          $('#upc').val("");
          $('#pname').val("");
          $('#category').val("");
          $('#netwtmsmt').val("");
          $("#netwtmsmt").removeAttr("selected");
          $('#netwtqty').val("");
          $('#barcode').removeAttr("disabled");
          $('#but-loading').hide();
          $('#but-checkUPC').show();
          $('.master-plist').DataTable().ajax.reload();
          $('.product-approval').DataTable().ajax.reload();
          swal("Success!", "Another product has been added to the database, sweet!", "success");
          $('#addProduct').modal('hide');
          $('body').css('overflow-y','auto');
        }
      }
    });
  } else {
    document.getElementById("but-addProduct").style.display = "block";
    document.getElementById("but-loading").style.display = "none";
  }
});

$(document).off('click', '#but-addInventory').on('click', '#but-addInventory', function () {
  console.log("clicked");
  document.getElementById("but-addInventory").style.display = "none";
  document.getElementById("but-loading").style.display = "block";
  var isFormValid = true;

  $(".required2, #notes").each(function() {
    if ($.trim($(this).val()).length == 0) {
      $(this).addClass("is-invalid");
      isFormValid = false;
      swal("Uh Oh!", "Looks like some things are missing...", "error");
    } else {
      $(this).removeClass("is-invalid");
    }
  });

  if(isFormValid) {
    var pid = $('#productID').val();
    var sid = $('#storeID').val();
    var price = $('#storeID').val();
    var aisle = $('#aisle').val();
    var notes = $('#notes').val();
    $.ajax({
      type: "POST",
      cache: false,
      url: 'php/add-inventory.php',
      data: {pid: pid, sid: sid, price: price, aisle: aisle, notes:notes},
      success: function(data) {
        console.log(data);
        if(data == "servfailure") {
          window.location.href = "https://admin.prodasher.com/error-500.php";
        }
        if(data == "correct") {
          $('#upc').removeAttr("disabled");
          $('#upc').val("");
          $('#barcode').removeAttr("disabled");
          $('#but-loading').hide();
          $('#but-checkUPC').show();
          $('.master-ilist').DataTable().ajax.reload();
          $('.inventory-approval').DataTable().ajax.reload();
          swal("Success!", "More inventory has been added to the database, sweet!", "success");
          $('#addProduct').modal('hide');
          $('body').css('overflow-y','auto');
        }
      }
    });
  } else {
    document.getElementById("but-addInventory").style.display = "block";
    document.getElementById("but-loading").style.display = "none";
  }
});
});
