<?php
captureIP('product-list.php');
verifyAdmin("2","product-list.php"); ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Product List">
  <title>Product List - Pro Dasher</title>
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
  <link rel="stylesheet" type="text/css" href="vendors/js/easyauto/easy-autocomplete.min.css">
  <link rel="stylesheet" type="text/css" href="css/global.css">
<style>
	#interactive.viewport {position: relative; width: 100%; height: auto; overflow: hidden; text-align: center;}
	#interactive.viewport > canvas, #interactive.viewport > video {max-width: 100%;width: 100%;}
	canvas.drawing, canvas.drawingBuffer {position: absolute; left: 0; top: 0;}
</style>
</head>
<body class="vertical-layout vertical-overlay-menu 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-overlay-menu" data-col="2-columns">
  <?php require 'php/navigation.php';
  require 'php/left-menu.php'; ?>
  <input type="hidden" value="0" class="get-pid">
  <div id="warning-message">
    Unfortunately you're trying to view this on a very narrow screen.  Turn your device to landscape to view better.
  </div>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title mb-0">Product List</h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a>
                </li>
                <li class="breadcrumb-item active">Product List
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right text-md-right col-md-6 col-12">
          <div class="btn-group">
            <button class="btn btn-round btn-info" type="button" data-toggle="modal" data-target="#addProduct"><i class="icon-cog3"></i> Add Product</button>
          </div>
        </div>
      </div>
      <div class="content-body">
        <section id="product-approval">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Products - Need Approved</h4>
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
                    <p class="card-text">Products here need to be approved before going live.</p>
                      <table class='table table-striped table-bordered product-approval nowrap' width="100%">
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
        <section id="inventory-approval">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Store Inventory - Needs Approved</h4>
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
                    <p class="card-text">Products here need approved before going live.</p>
                      <table class='table table-striped table-bordered inventory-approval'>
                        <thead>
                          <tr>
                          <th>Product</th>
                          <th>Store</th>
                          <th>User</th>
                          <th>Date Added</th>
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
        <section id="master-plist">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Master Product List</h4>
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
                      <table class='table table-striped table-bordered master-plist'>
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
        <section id="master-ilist">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Master Inventory List</h4>
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
                      <table class='table table-striped table-bordered master-ilist'>
                        <thead>
                          <tr>
                            <th>Product</th>
                            <th>Store</th>
                            <th>User</th>
                            <th>Date Added</th>
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
                  <div class="step1" style="display:none;">
                  <fieldset class="form-group floating-label-form-group">
                    <label for="upc">UPC</label>
                    <p class="text-muted">The UPC can not already exist to be added.</p>
                    <div class="input-group">
                    <input type="text" class="form-control required" id="upc" placeholder="UPC">
                    <input type="hidden" id="productID">
                    <span class="input-group-btn">
                      <button class="btn btn-default" id="barcode" type="button" data-toggle="modal" data-target="#livestream_scanner">
                        <i class="fa fa-barcode"></i>
                      </button>
                    </span>
                  </div>
                  </fieldset>
                </div>
                <div class="step2" style="display:none;">
                  <fieldset class="form-group floating-label-form-group">
                    <label for="store">Store</label>
                    <p class="text-muted">If the store shows in the list, please select it.</p>
                      <input type='text' id='store' class='form-control required1 required2'>
                      <input type="hidden" id="storeID">
                  </fieldset>
                </div>
                <div class="step3" style="display:none;">
                  <fieldset class="form-group floating-label-form-group">
                    <label for="brand">Brand</label>
                    <p class="text-muted">If the brand shows in the list, please select it.</p>
                      <input type='text' id='brand' class='form-control required'>
                      <input type="hidden" id="brandID">
                  </fieldset>
                  <fieldset class="form-group floating-label-form-group">
                    <label for="pname">Product Name</label>
                    <p class="text-muted">If the product shows in the list, please select it.</p>
                    <input type='text' id='pname' class='form-control required' placeholder="Product Name">
                  </fieldset>
                  <fieldset class="form-group floating-label-form-group">
                    <label for="department">Department</label>
                    <select id="department" class='form-control required'>
                      <option value=''>Select Below</option>
                      <option value="Baby-Food">Baby - Food</option>
                      <option value="Dairy">Dairy</option>
                      <option value="Frozen-Meat">Frozen - Beef</option>
                      <option value="Frozen-Seafood">Frozen - Seafood</option>
                      <option value="Meat">Meat - Beef</option>
                      <option value="Meat">Meat - Seafood</option>
                      <option value="Produce">Produce</option>
                    </select>
                  </fieldset>
                  <div class='row'><div class='col-md-6'>
                    <label for="netwtqty">Net Wt #</label>
                    <input type='text' id="netwtqty" class='form-control required'>
                  </div>
                  <div class='col-md-6'>
                    <label for="netwtmsmt">Net Wt Size</label>
                    <select id="netwtmsmt" class='form-control required'>
                  <option value=''>Select Below</option>
                  <option value='floz'>Fl. Oz(s)</option>
                  <option value='gram'>Gram(s)</option>
                  <option value='oz'>Ounce(s)</option>
                  <option value='lb'>Pound(s)</option>
                  </select></div></div>
                </div>
                <div class="step4" style="display:none;">
                  <div class='row'><div class='col-md-6'>
                    <label for="price">Price</label>
                    <input type='text' id="price" class='form-control required2'>
                  </div>
                  <div class='col-md-6'>
                    <label for="aisle">Aisle</label>
                    <input type='text' id="aisle" class='form-control required2'>
                  </div></div><br>
                  <fieldset class="form-group floating-label-form-group">
                    <label for="notes">Notes</label>
                    <p class="text-muted">Any special notes about the location?</p>
                    <textarea id='notes' class='form-control required2' placeholder="Special Notes"></textarea>
                  </fieldset>
                </div>
              </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success btn-lg" style="display:none;" id="but-checkUPC">Check UPC</button>
                  <button type="button" class="btn btn-success btn-lg" style="display:none;" id="but-checkStore">Check Store</button>
                  <button type="button" class="btn btn-success btn-lg" style="display:none;" id="but-addProduct">Add Product</button>
                  <button type="button" class="btn btn-success btn-lg" style="display:none;" id="but-addInventory">Add Inventory</button>
                  <button type="button" id="but-loading" style="display:none;" class="btn btn-info btn-lg" disabled="disabled"><i class="fa fa-spinner fa-spin"></i></button>
                  <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal" id="livestream_scanner">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Barcode Scanner</h4>
              </div>
              <div class="modal-body" style="position: static">
                <div id="interactive" class="viewport"></div>
                <div class="error"></div>
              </div>
              <div class="modal-footer">
                <label class="btn btn-default pull-left">
                  <i class="fa fa-camera"></i> Use camera app
                  <input type="file" accept="image/*;capture=camera" capture="camera" class="hidden" />
                </label>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
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
  <script src="vendors/js/vendors.min.js" type="text/javascript"></script>
  <script src="vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
  <script src="vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
  <script src="vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <script src="vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <script src="vendors/js/easyauto/jquery.easy-autocomplete.min.js"></script>
  <script src="js/maskedinput/jquery.maskedinput.js" type="text/javascript"></script>
  <script type="text/javascript" src="js/quagga.min.js"></script>
<script type="text/javascript">
$(function() {
	// Create the QuaggaJS config object for the live stream
	var liveStreamConfig = {
			inputStream: {
				type : "LiveStream",
				constraints: {
					width: {min: 640},
					height: {min: 480},
					aspectRatio: {min: 1, max: 100},
					facingMode: "environment" // or "user" for the front camera
				}
			},
			locator: {
				patchSize: "medium",
				halfSample: true
			},
			numOfWorkers: (navigator.hardwareConcurrency ? navigator.hardwareConcurrency : 4),
			decoder: {
				"readers":[
					{"format":"ean_reader","config":{}}
				]
			},
			locate: true
		};
	// The fallback to the file API requires a different inputStream option.
	// The rest is the same
	var fileConfig = $.extend(
			{},
			liveStreamConfig,
			{
				inputStream: {
					size: 800
				}
			}
		);
	// Start the live stream scanner when the modal opens
	$('#livestream_scanner').on('shown.bs.modal', function (e) {
		Quagga.init(
			liveStreamConfig,
			function(err) {
				if (err) {
					$('#livestream_scanner .modal-body .error').html('<div class="alert alert-danger"><strong><i class="fa fa-exclamation-triangle"></i> '+err.name+'</strong>: '+err.message+'</div>');
					Quagga.stop();
					return;
				}
				Quagga.start();
			}
		);
    });

	// Make sure, QuaggaJS draws frames an lines around possible
	// barcodes on the live stream
	Quagga.onProcessed(function(result) {
		var drawingCtx = Quagga.canvas.ctx.overlay,
			drawingCanvas = Quagga.canvas.dom.overlay;

		if (result) {
			if (result.boxes) {
				drawingCtx.clearRect(0, 0, parseInt(drawingCanvas.getAttribute("width")), parseInt(drawingCanvas.getAttribute("height")));
				result.boxes.filter(function (box) {
					return box !== result.box;
				}).forEach(function (box) {
					Quagga.ImageDebug.drawPath(box, {x: 0, y: 1}, drawingCtx, {color: "green", lineWidth: 2});
				});
			}

			if (result.box) {
				Quagga.ImageDebug.drawPath(result.box, {x: 0, y: 1}, drawingCtx, {color: "#00F", lineWidth: 2});
			}

			if (result.codeResult && result.codeResult.code) {
				Quagga.ImageDebug.drawPath(result.line, {x: 'x', y: 'y'}, drawingCtx, {color: 'red', lineWidth: 3});
			}
		}
	});

	// Once a barcode had been read successfully, stop quagga and
	// close the modal after a second to let the user notice where
	// the barcode had actually been found.
	Quagga.onDetected(function(result) {
		if (result.codeResult.code){
      var theUPC = result.codeResult.code.substring(1, 13);
			$('#upc').val(theUPC);
			Quagga.stop();
			setTimeout(function(){ $('#livestream_scanner').modal('hide'); }, 1000);
		}
	});

	// Stop quagga in any case, when the modal is closed
    $('#livestream_scanner').on('hide.bs.modal', function(){
    	if (Quagga){
    		Quagga.stop();
    	}
    });

	// Call Quagga.decodeSingle() for every file selected in the
	// file input
	$("#livestream_scanner input:file").on("change", function(e) {
		if (e.target.files && e.target.files.length) {
			Quagga.decodeSingle($.extend({}, fileConfig, {src: URL.createObjectURL(e.target.files[0])}), function(result) {alert(result.codeResult.code);});
		}
	});
});
</script>
  <script>
  //Populates table on main Product-list page from database
  jQuery('.modal').on('show.bs.modal', function (e) {
    jQuery('body').css('overflow-y', 'hidden');
  });

  jQuery('.close').on('click', function (e) {
    jQuery('body').css('overflow-y', 'scroll');
  });

  $.fn.setCursorPosition = function(pos) {
  this.each(function(index, elem) {
    if (elem.setSelectionRange) {
      elem.setSelectionRange(pos, pos);
    } else if (elem.createTextRange) {
      var range = elem.createTextRange();
      range.collapse(true);
      range.moveEnd('character', pos);
      range.moveStart('character', pos);
      range.select();
    }
  });
  return this;
};

  $('.master-plist').dataTable( {
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
    "responsive": true,
    "processing": true,
    "serverSide": true,
    "ajax": "php/masterplist.php"
  } );

  $('.master-ilist').dataTable( {
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
    "responsive": true,
    "serverSide": true,
    "ajax": "php/masterilist.php"
  } );

  $('.inventory-approval').dataTable( {
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
    "responsive": true,
    "serverSide": true,
    "ajax": "php/invapplist.php"
  } );

  $('.product-approval').dataTable( {
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
    "responsive": true,
    "serverSide": true,
    "ajax": "php/proapplist.php"
  } );
  //END

  var x = 0;
  var boptions = {
    url: function(phrase) {
      return "php/search-brand.php?phrase=" + phrase;
    },
    getValue: "name",
    minLength: 3,
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
        var data = $("#brand").getSelectedItemData().id;
        x = data;
        if(data == 0) {
          $("#brand").val("");
          return;
        }
        $('#brandID').val(x);
      },
      onHideListEvent: function() {
        if(x == 0) {
          $("#brand").val("");
        }
      }
    }
  };

  jQuery("#brand").easyAutocomplete(boptions);

  var y = 0;
  var soptions = {
    url: function(phrase) {
      return "php/search-store.php?phrase=" + phrase;
    },
    getValue: "name",
    minLength: 3,
    requestDelay: 400,
    placeholder: "Start typing...",
    template: {
      type: "custom",
      method: function(value, item) {
        return "<div data-item-id='" + item.id + "' ><h6>" + item.name
        + " - " + item.address + "</h6></div>";
      }
    },
    list: {
      onClickEvent: function() {
        var data = $("#store").getSelectedItemData().id;
        y = data;
        if(data == 0) {
          $("#store").val("");
          return;
        }
        $('#storeID').val(y);
      },
      onHideListEvent: function() {
        if(y == 0) {
          $("#store").val("");
        }
      }
    }
  };

  jQuery("#store").easyAutocomplete(soptions);

  $('#upc').mask('000000000000');
  $('#price').mask('0,000.00', {reverse: true});

$(document).off('click', '#upc').on('click', '#upc', function () {
  var upc = $('#upc').val();
  if(upc == "____________") {
    $('#upc').setCursorPosition(0);
  }
});

$('#addProduct').on('shown.bs.modal', function (e) {
  $('#but-addProduct').hide();
  $('#but-checkStore').hide();
  $(".step1").show();
  $(".step2").hide();
  $(".step3").hide();
  $(".step4").hide();
  $('#but-checkUPC').show();
});

  $(document).off('click', '#but-checkUPC').on('click', '#but-checkUPC', function () {
    var data = new FormData();
    data.append('upc', $('#upc').val());
    $.ajax({
      type: "POST",
      contentType: false,
      processData: false,
      cache: false,
      url: 'php/search-upc.php',
      data: data,
    }).done(function(result) {
      var obj = jQuery.parseJSON(result);
      var nextStep = obj.nextStep;
      if(nextStep == "servfailure") {
        window.location.href = "https://admin.prodasher.com/error-500.php";
      }
      if(nextStep == "upcExist") {
        swal("Heads Up!", "This UPC exists, lets check the store's inventory...", "info");
        $('#productID').val(obj.pid);
        $('.step2').show();
        $('#upc').attr('disabled','disabled');
        $('#barcode').attr('disabled','disabled');
        $('#but-checkUPC').hide();
        $('#but-checkStore').show();
      }
      if(nextStep == "noExist") {
        swal("Heads Up!", "This UPC does not exist.  Please add product.", "info");
        $('#productID').val(obj.pid);
        $('.step3').show();
        $('#upc').attr('disabled','disabled');
        $('#barcode').attr('disabled','disabled');
        $('#but-checkUPC').hide();
        $('#but-addProduct').show();
      }
    }).fail(function(jqXHR, textStatus, errorThrown) {
      console.log(jqXHR, textStatus, errorThrown);
    });
  });

  $(document).off('click', '#but-checkStore').on('click', '#but-checkStore', function () {
    var data = new FormData();
    data.append('storeID', $('#storeID').val());
    data.append('productID', $('#productID').val());
    $.ajax({
      type: "POST",
      contentType: false,
      processData: false,
      cache: false,
      url: 'php/search-storeinv.php',
      data: data,
    }).done(function(result) {
      var obj = jQuery.parseJSON(result);
      var nextStep = obj.nextStep;
      if(nextStep == "servfailure") {
        window.location.href = "https://admin.prodasher.com/error-500.php";
      }
      if(nextStep == "itemExist") {
        swal("Uh Oh!", "This product is already in the store's inventory. Please search and edit.", "warning");
        $('.step2').hide();
        $('.step1').show();
        $('#but-checkUPC').show();
        $("#upc").removeAttr('disabled');
        $("#barcode").removeAttr('disabled');
        $('#but-checkStore').hide();
      }
      if(nextStep == "noExist") {
        swal("Heads Up!", "This product is not in the store's inventory.  Please add product.", "info");
        $('#productID').val(obj.pid);
        $('#storeID').val(obj.sid);
        $('.step4').show();
        $('#store').attr('disabled','disabled');
        $('#but-checkStore').hide();
        $('#but-addInventory').show();
      }
    }).fail(function(jqXHR, textStatus, errorThrown) {
      console.log(jqXHR, textStatus, errorThrown);
    });
  });

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
$(document).off('click', '.deleteInventory').on('click', '.deleteInventory', function () {
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
      data.append('changeID', "1");
      data.append('pagename', "product-list.php");
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
          url: 'php/delete-product.php?task=deleteInv',
          data: data,
          success: function(data) {
            if(data == "servfailure") {
              window.location.href = "https://admin.prodasher.com/error-500.php";
            }
            if(data == "complete") {
              $('.master-ilist').DataTable().ajax.reload();
              $('.inventory-approval').DataTable().ajax.reload();
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
      data.append('changeID', "1");
      data.append('pagename', "product-list.php");
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
          url: 'php/delete-product.php?task=deletePro',
          data: data,
          success: function(data) {
            if(data == "servfailure") {
              window.location.href = "https://admin.prodasher.com/error-500.php";
            }
            if(data == "complete") {
              $('.master-plist').DataTable().ajax.reload();
              $('.product-approval').DataTable().ajax.reload();
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
  </script>
  <script src="app-assets/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/modal/components-modal.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/checkbox-radio.js" type="text/javascript"></script>
  <script src="js/add-product.js" type="text/javascript"></script>
  <script src="js/edit-product.js" type="text/javascript"></script>
</body>
</html>
