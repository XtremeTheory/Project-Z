$('#editProduct').on('shown.bs.modal', function (e) {
  if($('#brandID1').val() == "") {
    $('#brand1').val("");
  }

  if($('#categoryID1').val() == "") {
    $('#category1').val("");
  }

  $('#upc1').mask('000000000000');
  $('input[type="text"], #category1, #netwtmsmt1').on('focus', function() {
    $(this).removeClass('is-invalid');
  });
  var x = 0;
  var boptions = {
    url: function(phrase) {
      return "php/search-brand.php?phrase=" + phrase;
    },
    getValue: "name",
    requestDelay: 400,
    placeholder: "Start typing...",
    template: {
      type: "custom",
      method: function(value, item) {
        return "<div data-item-id='" + item.id + "' ><h6>" + value + "</h6></div>";
      }
    },
    list: {
      onClickEvent: function() {
        var data = $("#brand1").getSelectedItemData().id;
        x = data;
        $('#brandID1').val(x);
      },
      onHideListEvent: function() {
        if(x == "0") {
          $('#brand1').val("");
        }
      }
    }
  };
  jQuery("#brand1").easyAutocomplete(boptions);

  var y = "0";
  var coptions = {
    url: function(phrase) {
      return "php/search-category.php?phrase=" + phrase;
    },
    getValue: "name",
    requestDelay: 400,
    placeholder: "Start typing...",
    template: {
      type: "custom",
      method: function(value, item) {
        return "<div data-item-id='" + item.id + "' ><h6>" + value + "</h6></div>";
      }
    },
    list: {
      onClickEvent: function() {
        var data = $("#category1").getSelectedItemData().id;
        y = data;
        $('#categoryID1').val(y);
      },
      onHideListEvent: function() {
        if(y == "0") {
          $('#category1').val("");
        }
      }
    }
  };
  jQuery("#category1").easyAutocomplete(coptions);
});

$(document).off('click', '.editProduct').on('click', '.editProduct', function () {
  $('.get-pid').val($(this).attr('id'));
  var data = new FormData();
  data.append('pid', $(this).attr('id'));
  $.ajax({
    type: "POST",
    contentType: false,
    processData: false,
    cache: false,
    url: 'php/layout-editproduct.php',
    data: data,
    success: function(data) {
      $('.editProductBody').html(data);
    }
  });
});

$(document).off('click', '#but-editProduct').on('click', '#but-editProduct', function () {
  var isFormValid = 1;
  var changeLogged = 0;
  //Checks each field is not empty.
  $(".editproduct").each(function() {
    if ($.trim($(this).val()).length == 0) {
      $(this).addClass("is-invalid");
      isFormValid = 0;
      swal("Uh Oh!", "Looks like some things are missing...", "error");
    } else {
      $(this).removeClass("is-invalid");
    }
  });

  //Form is valid, continue progress.
  if(isFormValid == 1) {
    //Confirms with Product that they want to make the changes.
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
        data.append('changeID', "2");
        data.append('pagename', "edit-product.php");
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
          data.append('pid', $('.get-pid').val());
          data.append('pname', $('#pname1').val());
          if($('#brandID1').val() == "") {
            data.append('brand', $('#brand1').val());
          } else {
            data.append('brand', $('#brandID1').val());
          }
          data.append('upc', $('#upc1').val());
          data.append('imageURL', $('#image1').val());
          if($('#categoryID1').val() == "") {
            data.append('cate', $('#category1').val());
          } else {
            data.append('cate', $('#categoryID1').val());
          }
          data.append('msize', $('#netwtqty1').val());
          data.append('mtype', $('#netwtmsmt1').val());
          data.append('approval', $('.approval.disabled').attr('id'));
          $.ajax({
            type: "POST",
            contentType: false,
            processData: false,
            cache: false,
            url: 'php/edit-product.php',
            data: data,
            success: function(data) {
              console.log(data);
              if(data == "servfailure") {
                window.location.href = "https://admin.prodasher.com/error-500.php";
              }
              //Edit successful, hide the window, refresh the table on main page, show success message.
              if(data == "complete") {
                $('#upc').removeAttr("disabled");
                $('#upc').val("");
                $('#barcode').removeAttr("disabled");
                $('#but-loading').hide();
                $('#but-checkUPC').show();
                $('#editProduct').modal('hide');
                $('body').css('overflow-y','auto');
                $('.master-plist').DataTable().ajax.reload();
                $('.product-approval').DataTable().ajax.reload();
                swal("Success! The product's information has been updated!", {
                  icon: "success",
                });
              }
            }
          });
        }
      }
      } else {
        swal("The product's information did not change!");
      }
    });
  }
});
//END
