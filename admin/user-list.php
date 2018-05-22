<?php
captureIP('user-list.php');
verifyAdmin("2","user-list.php");
$cuid = $_SESSION['cuid'];?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="DRM Web Design">
  <title>User List - Project Z</title>
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
<body class="vertical-layout vertical-overlay-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-overlay-menu" data-col="2-columns">
  <?php require 'php/navigation.php';
  require 'php/left-menu.php'; ?>
  <input type="hidden" value="<?php echo $cuid; ?>" class="get-cuid">
  <input type="hidden" value="0" class="get-uid">
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title mb-0">User List</h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">User List
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
                    <p class="card-text">Every user is listed here.</p>
                      <table class='table table-striped table-bordered multi-ordering'>
                        <thead>
                          <tr>
                          <th>Registered Date</th>
                          <th>User Role</th>
                          <th>First Name</th>
                          <th>Last Name</th>
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
        <div class="modal fade text-left" id="editUser" tabindex="-1" role="dialog" aria-labelledby="editUser" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="editUser"> Edit User</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form>
                <div class="modal-body">
                  <div class="editUserBody"></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-float btn-success btn-lg" id="but-editUser">Edit</button>
                  <button type="button" id="but-loading" style="display:none;" class="btn btn-float btn-info btn-lg" disabled="disabled"><i class="fa fa-spinner fa-spin"></i></button>
                  <input type="reset" class="btn btn-float btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal fade text-left" id="userDetails" tabindex="-1" role="dialog" aria-labelledby="userDetails" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="userDetails"> User Details</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form>
                <div class="modal-body">
                  <div class="userDetailsBody"></div>
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
  //Populates table on main user-list page from database
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
    "ajax": "php/ulist.php"
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

//EDIT USER SUB PAGE - Edit confirmation button clicked, error checks are processed and data entered into database if successful.  Changes are logged in Change Log.
$(document).off('click', '#but-editUser').on('click', '#but-editUser', function () {
  var isFormValid = 1;
  var changeLogged = 0;
  //Checks each field is not empty.
  $(".edituser").each(function() {
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
    //Confirms with user that they want to make the changes.
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
        data.append('cuid', $('.get-cuid').val());
        data.append('changeID', "2");
        data.append('uid', $('.get-uid').val());
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
          data.append('fname', $('.edituser#fname').val());
          data.append('lname', $('.edituser#lname').val());
          data.append('address', $('.edituser#address').val());
          data.append('address2', $('.edituser#address2').val());
          data.append('zipcode', $('.edituser#zipcode').val());
          data.append('phonenum', $('.edituser#phonenum').val());
          data.append('email', $('.edituser#email').val());
          data.append('username', $('.edituser#username').val());
          data.append('usertype', $('.edituser#usertype').val());
          data.append('approval', $('.approval.disabled').attr('id'));
          $.ajax({
            type: "POST",
            contentType: false,
            processData: false,
            cache: false,
            url: 'php/edit-user.php',
            data: data,
            success: function(data) {
              if(data == "servfailure") {
                window.location.href = "https://www.bodtracker.com/error-500.php";
              }
              //Edit successful, hide the window, refresh the table on main page, show success message.
              if(data == "complete") {
                $('#editUser').modal('hide');
                $('.multi-ordering').DataTable().ajax.reload();
                swal("Success! The user's information has been updated!", {
                  icon: "success",
                });
              }
            }
          });
        }
      }
      } else {
        swal("The user's information did not change!");
      }
    });
  }
});
//END

//MAIN USER LIST PAGE - Edit button clicked beside user requested.  Pulls up modal and populates fields from database.
  $(document).off('click', '.editUser').on('click', '.editUser', function () {
    $('.get-uid').val($(this).attr('id'));
    var data = new FormData();
    data.append('uid', $(this).attr('id'));
    $.ajax({
      type: "POST",
      contentType: false,
      processData: false,
      cache: false,
      url: 'php/layout-edituser.php',
      data: data,
      success: function(data) {
        $('.editUserBody').html(data);
      }
    });
  });
  //END

  //MAIN USER LIST PAGE - Details button clicked beside user requested.  Pulls up modal and populates information from database.
    $(document).off('click', '.userDetails').on('click', '.userDetails', function () {
      $('.get-uid').val($(this).attr('id'));
      var data = new FormData();
      data.append('uid', $(this).attr('id'));
      $.ajax({
        type: "POST",
        contentType: false,
        processData: false,
        cache: false,
        url: 'php/layout-userdetails.php',
        data: data,
        success: function(data) {
          $('.userDetailsBody').html(data);
        }
      });
    });
    //END

//MAIN USER LIST PAGE - Delete button clicked beside user requested.  Pulls up confirmation that they want to delete the user. Logs into change log.
$(document).off('click', '.deleteUser').on('click', '.deleteUser', function () {
  $('.get-uid').val($(this).attr('id'));
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this user!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      var data = new FormData();
      data.append('cuid', $('.get-cuid').val());
      data.append('changeID', "1");
      data.append('uid', $('.get-uid').val());
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
        data.append('uid', $('.get-uid').val());
        $.ajax({
          type: "POST",
          contentType: false,
          processData: false,
          cache: false,
          url: 'php/delete-user.php',
          data: data,
          success: function(data) {
            if(data == "servfailure") {
              window.location.href = "https://www.bodtracker.com/error-500.php";
            }
            if(data == "complete") {
              $('.multi-ordering').DataTable().ajax.reload();
              swal("Poof! the user has been deleted! No turning back now!", {
                icon: "success",
              });
            }
          }
        });
      }
    }
    } else {
      swal("The user's information is safe! Phew...");
    }
  });
});
//END
  </script>
  <script src="app-assets/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/modal/components-modal.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/checkbox-radio.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/extensions/sweet-alerts.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>
