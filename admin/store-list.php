<?php
require 'php/db.php';
require 'php/definitions.php';
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="DRM Web Design">
  <title>Store List - Project Z</title>
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
<body class="vertical-layout vertical-overlay-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-overlay-menu" data-col="2-columns">
  <?php require 'php/navigation.php';
  require 'php/left-menu.php'; ?>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title mb-0">Store List</h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">Store List
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right text-md-right col-md-6 col-12">
          <div class="btn-group">
            <button class="btn btn-round btn-info" type="button" data-toggle="modal" data-target="#addStore"><i class="icon-cog3"></i> Add Store</button>
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
                    <p class="card-text">Every store is listed here.</p>
                      <table class='table table-striped table-bordered multi-ordering'>
                        <thead>
                          <tr>
                          <th>Store Approved?</th>
                          <th>Store Name</th>
                          <th>Address</th>
                          <th>City Info</th>
                          <th> </th>
                          </tr>
                        </thead>
                      </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <div class="modal fade text-left" id="addStore" tabindex="-1" role="dialog" aria-labelledby="addStore" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="addStore"> Add Store</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form>
                <div class="modal-body">
                  <fieldset class="form-group floating-label-form-group">
                    <label for="sname">Store Name</label>
                    <input type="text" class="form-control required" id="sname" placeholder="Store Name">
                  </fieldset>
                  <br>
                  <fieldset class="form-group floating-label-form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control required" id="address" placeholder="Address">
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
                  <button type="button" class="btn btn-success btn-lg" id="but-addStore">Add</button>
                  <button type="button" id="but-loading" style="display:none;" class="btn btn-info btn-lg" disabled="disabled"><i class="fa fa-spinner fa-spin"></i></button>
                  <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal fade text-left" id="editStore" tabindex="-1" role="dialog" aria-labelledby="editStore" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="editStore"> Edit Store</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form>
                <div class="modal-body">
                  <div class="row skin skin-line">
                    <div class="col-md-6 col-sm-12">
                      <fieldset>
                        <input type="radio" name="approval" class="approval">
                        <label for="approval">Approved</label>
                      </fieldset>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <fieldset>
                        <input type="radio" name="approval" class="approval" checked>
                        <label for="approval">Not Approved</label>
                      </fieldset>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                  value="close">
                  <input type="submit" class="btn btn-outline-primary btn-lg" value="Login">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal fade text-left" id="storeDetails" tabindex="-1" role="dialog" aria-labelledby="storeDetails" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="storeDetails"> Store Details</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                  <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
                  <input type="submit" class="btn btn-outline-primary btn-lg" value="Login">
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
    "ajax": "php/slist.php"
  } );

  $(document).off('click', '.deleteStore').on('click', '.deleteStore', function () {
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this info!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        var data = new FormData();
        data.append('sid', $(this).attr('id'));
        console.log(data);
        $.ajax({
          type: "POST",
          contentType: false,
          processData: false,
          cache: false,
          url: 'php/delete-store.php',
          data: data,
          success: function(data) {
            if(data == "servfailure") {
              window.location.href = "https://www.bodtracker.com/page-500.php";
            }

            if(data == "complete") {
              swal("Poof! Your the store has been deleted!", {
                icon: "success",
              });
            }
          }
        });
      } else {
        swal("The store information is safe!");
      }
    });
  });
  </script>
  <script src="app-assets/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/modal/components-modal.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/checkbox-radio.js" type="text/javascript"></script>
  <script src="js/add-store.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/extensions/sweet-alerts.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>
