<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require 'php/functions.php';
captureIP('product-list.php');
verifyAdmin("2"); ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="DRM Web Design">
  <title>Product List - Project Z</title>
  <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <script src="https://use.fontawesome.com/b7912a2e63.js"></script>
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/selects/select2.min.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/icheck.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/custom.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/animate/animate.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/checkboxes-radios.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
<style>
  table.dataTable {
    border-collapse: collapse !important;
    width: 100% !important;
  }

  .is-invalid {
    border-color: #19b9e7 !important;
    background-color: #BD362F !important;
    color: #FFFFFF !important;
  }

  .is-invalid::-webkit-input-placeholder { /* Chrome/Opera/Safari */
    color: white !important;
  }
  .is-invalid::-moz-placeholder { /* Firefox 19+ */
    color: white !important;
  }
  .is-invalid:-ms-input-placeholder { /* IE 10+ */
    color: white !important;
  }
  .is-invalid:-moz-placeholder { /* Firefox 18- */
    color: white !important;
  }
</style>
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-overlay-menu 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-overlay-menu" data-col="2-columns">
  <?php require 'php/navigation.php';
  require 'php/left-menu.php'; ?>
  <input type="hidden" value="<?php echo $uid; ?>" class="get-uid">
  <input type="hidden" value="0" class="get-pid">
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title mb-0">Product List</h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">Product List
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <section id="multi-column">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <p class="card-text">Every product is listed here.</p>
                      <table class='table table-striped table-bordered multi-ordering'>
                        <thead>
                          <tr>
                          <th>Brand</th>
                          <th>Product Name</th>
                          <th>UPC</th>
                          <th>Department</th>
                          <th>Actions</th>
                          </tr>
                        </thead>
                      </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <div class="modal fade text-left" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="addProduct" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="addProduct"> Add Product</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form>
                <div class="modal-body">
                  <fieldset class="form-group floating-label-form-group">
                    <label for="sname">Brand</label>
                    <input type="text" class="form-control required" id="sname" placeholder="Brand">
                  </fieldset>
                  <br>
                  <fieldset class="form-group floating-label-form-group">
                    <label for="address">Product Name</label>
                    <input type="text" class="form-control required" id="address" placeholder="Product Name">
                  </fieldset>
                  <br>
                  <div class="row">
                    <div class="form-group col-sm-5">
                      <label for="city">City</label>
                      <input type="text" class="form-control required" id="city" placeholder="City">
                    </div>
                    <div class="form-group col-sm-3">
                      <label for="state">State</label>
                      <input type="text" class="form-control required" id="state" placeholder="State">
                    </div>
                    <div class="form-group col-sm-4">
                      <label for="state">Zip Code</label>
                      <input type="text" class="form-control required" id="zipcode" placeholder="Zip Code">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success btn-lg" id="but-addProduct">Add</button>
                  <button type="button" id="but-loading" style="display:none;" class="btn btn-info btn-lg" disabled="disabled"><i class="fa fa-spinner fa-spin"></i></button>
                  <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal fade text-left" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="editProduct" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="editProduct"> Edit Product</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form>
                <div class="modal-body">
                  <div class="editProductBody"></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-float btn-success btn-lg" id="but-editProduct">Edit</button>
                  <button type="button" id="but-loading" style="display:none;" class="btn btn-float btn-info btn-lg" disabled="disabled"><i class="fa fa-spinner fa-spin"></i></button>
                  <input type="reset" class="btn btn-float btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal fade text-left" id="productDetails" tabindex="-1" role="dialog" aria-labelledby="productDetails" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="productDetails"> Product Details</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form>
                <div class="modal-body">
                  <div class="productDetailsBody"></div>
                </div>
                <div class="modal-footer">
                  <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require 'php/footer.php'; ?>
  <!-- BEGIN VENDOR JS-->
  <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="app-assets/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script>
  //Populates table on main Product-list page from database
  $('.multi-ordering').dataTable( {
    columnDefs: [ {
        targets: [ 0 ],
        orderData: [ 0, 1 ]
    }, {
        targets: [ 1 ],
        orderData: [ 1, 0 ]
    }, {
        targets: [ 4 ],
        orderData: [ 4, 0 ]
    } ],
    "processing": true,
    "serverSide": true,
    "ajax": "php/plist.php"
  } );
  //END

  //ALL SUB PAGES - Any input field that has red error box will be cleared once clicked on and autocomplete turned off.
  $(document).off('focus', 'input').on('focus', 'input', function () {
    $(this).removeClass('is-invalid');
    $(this).attr('autocomplete', 'off');
  });
  //END

  //ALL SUB PAGES - Removes theming from other buttons and applies to button clicked on
  $(document).off('click', '#pending').on('click', '#pending', function () {
    $(".approval").removeClass("disabled").removeClass("btn-float-lg");
    $("#pending").addClass("disabled").addClass("btn-glow").addClass("btn-float").addClass("btn-float-lg");
  });

  $(document).off('click', '#approve').on('click', '#approve', function () {
    $(".approval").removeClass("disabled").removeClass("btn-float-lg");
    $("#approve").addClass("disabled").addClass("btn-glow").addClass("btn-float").addClass("btn-float-lg");
  });

  $(document).off('click', '#deny').on('click', '#deny', function () {
    $(".approval").removeClass("disabled").removeClass("btn-float-lg");
    $("#deny").addClass("disabled").addClass("btn-glow").addClass("btn-float").addClass("btn-float-lg");
  });
  //END

//EDIT Product SUB PAGE - Edit confirmation button clicked, error checks are processed and data entered into database if successful.  Changes are logged in Change Log.
$(document).off('click', '#but-editProduct').on('click', '#but-editProduct', function () {
  var isFormValid = 1;
  var changeLogged = 0;
  //Checks each field is not empty.
  $(".editProduct").each(function() {
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
        data.append('uid', $('.get-uid').val());
        data.append('changeID', "2");
        data.append('pid', $('.get-pid').val());
        $.ajax({
          type: "POST",
          contentType: false,
          processData: false,
          cache: false,
          url: 'php/log-change.php',
          data: data,
          success: function(data) {
            if(data == "servfailure") {
              window.location.href = "https://www.bodtracker.com/error-500.php";
            }
            if(data == "complete") {
              changeLogged = 1;
            }
          }
        }).done(continueEdit);

        function continueEdit() {
        if(changeLogged == 1) {
          var data = new FormData();
          data.append('uid', $('.get-uid').val());
          data.append('pid', $('.get-pid').val());
          data.append('pname', $('.editProduct#pname').val());
          data.append('approval', $('.approval.disabled').attr('id'));
          $.ajax({
            type: "POST",
            contentType: false,
            processData: false,
            cache: false,
            url: 'php/edit-product.php',
            data: data,
            success: function(data) {
              if(data == "servfailure") {
                window.location.href = "https://www.bodtracker.com/error-500.php";
              }
              //Edit successful, hide the window, refresh the table on main page, show success message.
              if(data == "complete") {
                $('#editProduct').modal('hide');
                $('.multi-ordering').DataTable().ajax.reload();
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

//MAIN Product LIST PAGE - Edit button clicked beside Product requested.  Pulls up modal and populates fields from database.
  $(document).off('click', '.editProduct').on('click', '.editProduct', function () {
    $('.get-pid').val($(this).attr('id'));
    var data = new FormData();
    data.append('pid', $(this).attr('id'));
    $.ajax({
      type: "POST",
      contentType: false,
      processData: false,
      cache: false,
      url: 'php/layout-editProduct.php',
      data: data,
      success: function(data) {
        $('.editProductBody').html(data);
      }
    });
  });
  //END

  //MAIN Product LIST PAGE - Details button clicked beside Product requested.  Pulls up modal and populates information from database.
    $(document).off('click', '.productDetails').on('click', '.productDetails', function () {
      $('.get-pid').val($(this).attr('id'));
      var data = new FormData();
      data.append('pid', $(this).attr('id'));
      $.ajax({
        type: "POST",
        contentType: false,
        processData: false,
        cache: false,
        url: 'php/layout-productdetails.php',
        data: data,
        success: function(data) {
          $('.productDetailsBody').html(data);
        }
      });
    });
    //END

//MAIN product LIST PAGE - Delete button clicked beside product requested.  Pulls up confirmation that they want to delete the product. Logs into change log.
$(document).off('click', '.deleteProduct').on('click', '.deleteProduct', function () {
  $('.get-pid').val($(this).attr('id'));
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this product!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      var data = new FormData();
      data.append('uid', $('.get-uid').val());
      data.append('changeID', "1");
      data.append('pid', $('.get-pid').val());
      $.ajax({
        type: "POST",
        contentType: false,
        processData: false,
        cache: false,
        url: 'php/log-change.php',
        data: data,
        success: function(data) {
          if(data == "servfailure") {
            window.location.href = "https://www.bodtracker.com/error-500.php";
          }
          if(data == "complete") {
            changeLogged = 1;
          }
        }
      }).done(continueDelete);

      function continueDelete() {
      if(changeLogged == 1) {
        var data = new FormData();
        data.append('pid', $('.get-pid').val());
        $.ajax({
          type: "POST",
          contentType: false,
          processData: false,
          cache: false,
          url: 'php/delete-product.php',
          data: data,
          success: function(data) {
            if(data == "servfailure") {
              window.location.href = "https://www.bodtracker.com/error-500.php";
            }
            if(data == "complete") {
              $('.multi-ordering').DataTable().ajax.reload();
              swal("Poof! the product has been deleted! No turning back now!", {
                icon: "success",
              });
            }
          }
        });
      }
    }
    } else {
      swal("The product's information is safe! Phew...");
    }
  });
});
//END
  </script>
  <script src="app-assets/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/modal/components-modal.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/checkbox-radio.js" type="text/javascript"></script>
  <script src="js/add-product.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/extensions/sweet-alerts.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>
