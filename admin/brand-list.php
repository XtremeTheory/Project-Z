<?php
captureIP('brand-list.php');
verifyAdmin("2","brand-list.php");
$uid = $_SESSION['uid'];?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Brand List">
  <title>Brand List - Pro Dasher</title>
  <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="vendors/css/tables/datatable/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/animate/animate.css">
  <link rel="stylesheet" type="text/css" href="css/global.css">
</head>
<body class="vertical-layout vertical-overlay-menu 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-overlay-menu" data-col="2-columns">
  <?php require 'php/navigation.php';
  require 'php/left-menu.php'; ?>
  <input type="hidden" value="<?php echo $uid; ?>" class="get-uid">
  <input type="hidden" value="0" class="get-bid">
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title mb-0">Brand List</h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a>
                </li>
                <li class="breadcrumb-item active">Brand List
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right text-md-right col-md-6 col-12">
          <div class="btn-group">
            <button class="btn btn-round btn-info" type="button" data-toggle="modal" data-target="#addBrand"><i class="icon-cog3"></i> Add Brand</button>
          </div>
        </div>
      </div>
      <div class="content-body">
        <section id="multi-column">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3>Master Brand List</h3>
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
                      <table class='table table-striped table-bordered brands'>
                        <thead>
                          <tr>
                          <th>Brand Name</th>
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
        <div class="modal fade text-left" id="addBrand" tabindex="-1" role="dialog" aria-labelledby="addBrand" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="addBrand"> Add Brand</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form>
                <div class="modal-body">
                  <fieldset class="form-group floating-label-form-group">
                    <label for="sname">Brand Name</label>
                    <input type="text" class="form-control required" id="bname" placeholder="Brand Name">
                  </fieldset>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success btn-lg" id="but-addBrand">Add</button>
                  <button type="button" id="but-loading" style="display:none;" class="btn btn-info btn-lg" disabled="disabled"><i class="fa fa-spinner fa-spin"></i></button>
                  <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal fade text-left" id="editBrand" tabindex="-1" role="dialog" aria-labelledby="editBrand" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="editBrand"> Edit Brand</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form>
                <div class="modal-body">
                  <div class="editBrandBody"></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-float btn-success btn-lg" id="but-editBrand">Edit</button>
                  <button type="button" id="but-loading" style="display:none;" class="btn btn-float btn-info btn-lg" disabled="disabled"><i class="fa fa-spinner fa-spin"></i></button>
                  <input type="reset" class="btn btn-float btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="vendors/js/vendors.min.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
  <script src="vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
  <script src="js/add-brand.js" type="text/javascript"></script>
  <script>
  $('.brands').dataTable( {
    "processing": true,
    "serverSide": true,
    "ajax": "php/blist.php"
  } );

  $(document).off('focus', 'input').on('focus', 'input', function () {
    $(this).removeClass('is-invalid');
    $(this).attr('autocomplete', 'off');
  });

$(document).off('click', '#but-editBrand').on('click', '#but-editBrand', function () {
  document.getElementById("but-loading").style.display = "block";
  document.getElementById("but-addBrand").style.display = "none";
  var isFormValid = 1;
  var changeLogged = 0;
  //Checks each field is not empty.
  $(".editbrand").each(function() {
    if ($.trim($(this).val()).length == 0) {
      $(this).addClass("is-invalid");
      isFormValid = 0;
      document.getElementById("but-loading").style.display = "none";
      document.getElementById("but-editBrand").style.display = "block";
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
        data.append('uid', $('.get-uid').val());
        data.append('changeID', "17");
        data.append('bid', $('.get-bid').val());
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
          data.append('bid', $('.get-bid').val());
          data.append('bname', $('.editbrand#bname').val());
          $.ajax({
            type: "POST",
            contentType: false,
            processData: false,
            cache: false,
            url: 'php/edit-brand.php',
            data: data,
            success: function(data) {
              if(data == "servfailure") {
                window.location.href = "https://admin.prodasher.com/error-500.php";
              }
              //Edit successful, hide the window, refresh the table on main page, show success message.
              if(data == "complete") {
                $('#editBrand').modal('hide');
                document.getElementById("but-loading").style.display = "none";
                document.getElementById("but-editBrand").style.display = "block";
                $('.brands').DataTable().ajax.reload();
                swal("Success! The brand's information has been updated!", {
                  icon: "success",
                });
              }
            }
          });
        }
      }
      } else {
        swal("The brand information did not change!");
      }
    });
  }
});

  $(document).off('click', '.editBrand').on('click', '.editBrand', function () {
    $('.get-bid').val($(this).attr('id'));
    var data = new FormData();
    data.append('bid', $(this).attr('id'));
    $.ajax({
      type: "POST",
      contentType: false,
      processData: false,
      cache: false,
      url: 'php/layout-editbrand.php',
      data: data,
      success: function(data) {
        $('.editBrandBody').html(data);
      }
    });
  });
  //END
  </script>
</body>
</html>
