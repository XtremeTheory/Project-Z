<?php
captureIP('error-log.php');
verifyAdmin("5","error-log.php");
$uid = $_SESSION['uid'];?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Error Log">
  <title>Error Log - Pro Dasher</title>
  <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <script src="js/FontAwesome.js"></script>
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="vendors/css/tables/datatable/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="vendors/css/forms/selects/select2.min.css">
  <link rel="stylesheet" type="text/css" href="vendors/css/forms/icheck/icheck.css">
  <link rel="stylesheet" type="text/css" href="vendors/css/forms/icheck/custom.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/animate/animate.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/checkboxes-radios.css">
  <link rel="stylesheet" type="text/css" href="css/global.css">
</head>
<body class="vertical-layout vertical-overlay-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-overlay-menu" data-col="2-columns">
  <?php require 'php/navigation.php';
  require 'php/left-menu.php'; ?>
  <input type="hidden" value="<?php echo $uid; ?>" class="get-uid">
  <input type="hidden" value="0" class="get-eid">
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a>
                </li>
                <li class="breadcrumb-item active">Error Log
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right text-md-right col-md-6 col-12">
          <div class="btn-group">
            <button class="btn btn-round btn-info" type="button" data-toggle="modal" data-target="#addError"><i class="icon-cog3"></i> Add Error</button>
          </div>
        </div>
      </div>
      <div class="content-body">
        <section id="multi-column">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="content-header-title mb-0">Active Error Log</h3>
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
                    <p class="card-text">All errors throughout the website are logged here. Fatal and custom errors are all logged here and waiting to be
                    corrected.  Please read the details and mark each error that is fixed.  Errors are kept in the system with your ID attached marking fixed.</p>
                      <table class='table table-striped table-bordered active-errors'>
                        <thead>
                          <tr>
                          <th>Error Level</th>
                          <th>Date and Time</th>
                          <th>File Name</th>
                          <th>Error Information</th>
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
        <section id="multi-column">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="content-header-title mb-0">Fixed Errors</h3>
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
                    <p class="card-text">Fixed errors are listed here.
                      <table class='table table-striped table-bordered fixed-errors'>
                        <thead>
                          <tr>
                          <th>Error Level</th>
                          <th>Date and Time</th>
                          <th>File Name</th>
                          <th>Error Information</th>
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
        <div class="modal fade text-left" id="addError" tabindex="-1" role="dialog" aria-labelledby="addError" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="addStore"> Log Error</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form>
                <div class="modal-body">
                  <div class="row">
                    <div class="form-group col-sm-12">
                      <label for="fname">File Name</label><br>
                      <small>Located in the URL of browser.<br>
                        Example: http://www.abc.com/123.html  The filename would be "123.html".</small>
                      <input type="text" class="form-control required" id="errFilename" placeholder="File Name">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-12">
                      <label for="errMessage">Error Message</label>
                      <textarea name="errMessage" id="errMessage" class="form-control required" placeholder="Explain the error you encountered"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-12">
                      <label for="errLevel">Error Level</label>
                      <select id="errLevel" name="errLevel" class="form-control required">
                        <option value="0">General</option>
                        <option value="1">Needs Attention</option>
                        <option value="2">Critical</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success btn-lg" id="but-addError">Add</button>
                  <button type="button" id="but-loading" style="display:none;" class="btn btn-info btn-lg" disabled="disabled"><i class="fa fa-spinner fa-spin"></i></button>
                  <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal fade text-left" id="errorDetails" tabindex="-1" role="dialog" aria-labelledby="errorDetails" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="errorDetails"> Error Details</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form>
                <div class="modal-body">
                  <div class="errorDetailsBody"></div>
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
  <script src="vendors/js/vendors.min.js" type="text/javascript"></script>
  <script src="vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
  <script src="vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
  <script src="vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <script src="vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <script>
  //Populates table on main store-list page from database
  $('.active-errors').dataTable( {
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
    "ajax": "php/elog.php"
  } );

  $('.fixed-errors').dataTable( {
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
    "ajax": "php/fixedelog.php"
  } );
  //END

  //ALL SUB PAGES - Any input field that has red error box will be cleared once clicked on and autocomplete turned off.
  $(document).off('focus', 'input').on('focus', 'input', function () {
    $(this).removeClass('is-invalid');
    $(this).attr('autocomplete', 'off');
  });
  //END

  //MAIN STORE LIST PAGE - Details button clicked beside store requested.  Pulls up modal and populates information from database.
    $(document).off('click', '.errorDetails').on('click', '.errorDetails', function () {
      $('.get-eid').val($(this).attr('id'));
      var data = new FormData();
      data.append('eid', $(this).attr('id'));
      $.ajax({
        type: "POST",
        contentType: false,
        processData: false,
        cache: false,
        url: 'php/layout-errordetails.php',
        data: data,
        success: function(data) {
          $('.errorDetailsBody').html(data);
        }
      });
    });
    //END

//MAIN STORE LIST PAGE - Fix button clicked beside store requested.  Pulls up confirmation that you fixed the error. Logs into activity log.
$(document).off('click', '.fixedError').on('click', '.fixedError', function () {
  $('.get-eid').val($(this).attr('id'));
  var changeLogged = 0;
  swal({
    title: "Are you sure?",
    text: "You're confirming that the error has been fixed.",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      var data = new FormData();
      data.append('changeID', "11");
      data.append('pagename', "error-log.php");
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
      }).done(continueFix);

      function continueFix() {
      if(changeLogged == 1) {
        var data = new FormData();
        data.append('eid', $('.get-eid').val());
        $.ajax({
          type: "POST",
          contentType: false,
          processData: false,
          cache: false,
          url: 'php/fixed-error.php',
          data: data,
          success: function(data) {
            if(data == "servfailure") {
              window.location.href = "https://admin.prodasher.com/error-500.php";
            }
            if(data == "complete") {
              $('.active-errors').DataTable().ajax.reload();
              $('.fixed-errors').DataTable().ajax.reload();
              swal("Alright! The error has been marked fixed!", {
                icon: "success",
              });
            }
          }
        });
      }
    }
    } else {
      swal("The error information is safe!");
    }
  });
});
//END
  </script>
  <script src="app-assets/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/modal/components-modal.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/checkbox-radio.js" type="text/javascript"></script>
  <script src="js/add-error.js" type="text/javascript"></script>
</body>
</html>
