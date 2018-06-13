<!DOCTYPE html>
<html class="loading" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Dasher Application">
  <title>Dasher Application - Pro Dasher</title>
  <link rel="apple-touch-icon" href="../app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="../app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/vendors.min.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/app.min.css">
  <link rel="stylesheet" type="text/css" href="../vendors/js/easyauto/easy-autocomplete.min.css">
  <link rel="stylesheet" type="text/css" href="../css/global.css">
  <link rel="stylesheet" type="text/css" href="css/wizard.css">
</head>
<body class="vertical-layout vertical-overlay-menu 1-column menu-expanded fixed-navbar">
  <div class="bg"></div>
  <div class="bgCover" id="theCover"></div>
  <div class="sendCover" id="sendCover"></div>
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-shadow navbar-brand-center" data-nav="brand-center">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item">
            <a class="navbar-brand" href="/">
              <h3 class="brand-text">Pro Dasher</h3>
            </a>
          </li>
        </ul>
      </div>
      <div class="navbar-container">
        <div class="collapse navbar-collapse justify-content-end">
          <ul class="nav navbar-nav">
            <li class="nav-item">
              <a class="nav-link mr-2 nav-link-label" onclick="window.history.go(-1); return false;"><i class="ficon ft-arrow-left"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-2 nav-link-label" href="https://www.prodasher.com/index.php"><i class="ficon ft-home"></i></a>
            </li>
            <li class="dropdown nav-item">
              <a class="nav-link mr-2 nav-link-label" href="https://prodasher.zendesk.com/hc/en-us" data-toggle="dropdown"><i class="ficon ft-help-circle"></i></a>
            </li>
          </ul>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container step1">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                <div class="card-header border-0 pb-0">
                  <div class="card-title text-center">
                      <h3 class="brand-text">Dasher Requirements</h3>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    Must be:
                    <ul>
                      <li>18+ years old.</li>
                      <li>able to pass a background check.</li>
                      <li>able to lift 25+ lbs.</li>
                      <li>able to read, write, and speak English fluently.</li>
                      <li>authorized to work in the United States.</li>
                    </ul>
                    Must have:
                    <ul>
                      <li>clean driving record (no DUI, no wreckless driving).</li>
                      <li>an (Android Smart Phone 5.1 or newer) or (iPhone with iOS 10 or newer).</li>
                      <li>a reliable vehicle manufactured 2000 or newer with no major damage.</li>
                      <li>a valid driver's license.</li>
                      <li>a valid vehicle insurance certificate.</li>
                    </ul>
                    <button type="button" id="step1" class="btn btn-success btn-block btn-lg"><i class="ft-thumbs-up"></i> I Agree</button>
                    <button type="button" id="disagree" class="btn btn-warning btn-block btn-lg"><i class="ft-x"></i> I Disagree</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="flexbox-container step2" style="display:none;">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                <div class="card-header border-0 pb-0">
                  <div class="card-title text-center">
                      <h3 class="brand-text">What district do you want to work?</h3>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal">
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control input-lg required" id="city" placeholder="Zip Code" tabindex="1">
                        <input type="hidden" id="cityID">
                        <div class="form-control-position">
                          <i class="ft-home"></i>
                        </div>
                        <div class="help-block font-small-3">*Start typing a zip code and select from the drop down.</div>
                      </fieldset>
                      <button type="button" id="step2" class="btn btn-danger btn-block btn-lg" disabled><i class="ft-arrow-right"></i> Continue</button>
                      <button type="button" id="back1" class="btn btn-info btn-block btn-lg"><i class="ft-arrow-left"></i> Back</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="flexbox-container step3" style="display:none;">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                <div class="card-header border-0 pb-0">
                  <div class="card-title text-center">
                      <h3 class="brand-text">Tell us about you...</h3>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal" id="form3">
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control input-lg required" id="fname" placeholder="First Name" tabindex="1" autocomplete="given-name">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                        <div class="help-block font-small-3">*What is your first name?</div>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control input-lg required" id="lname" placeholder="Last Name" tabindex="2" autocomplete="family-name">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                        <div class="help-block font-small-3">*What is your last name?</div>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control input-lg required" id="email" placeholder="Email" tabindex="3" autocomplete="email">
                        <div class="form-control-position">
                          <i class="ft-mail"></i>
                        </div>
                        <div class="help-block font-small-3">*What is your email address?</div>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control input-lg required" id="phonenum" placeholder="Phone Number" tabindex="4" autocomplete="phone">
                        <div class="form-control-position">
                          <i class="ft-smartphone"></i>
                        </div>
                        <div class="help-block font-small-3">*What is your cell phone number?</div>
                      </fieldset>
                      <button type="button" id="step3" class="btn btn-danger btn-block btn-lg" disabled><i class="ft-arrow-right"></i> Continue</button>
                      <button type="button" id="back2" class="btn btn-info btn-block btn-lg"><i class="ft-arrow-left"></i> Back</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="flexbox-container step4" style="display:none;">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                <div class="card-header border-0 pb-0">
                  <div class="card-title text-center">
                      <h3 class="brand-text">Email and Phone Verification</h3>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal" id="form4">
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control input-lg required" id="emailver" placeholder="Email Verification" tabindex="1">
                        <div class="form-control-position">
                          <i class="ft-mail"></i>
                        </div>
                        <div class="help-block font-small-3">*Check your email for a 5 case sensitive code.</div>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control input-lg required" id="phonever" placeholder="Phone Verification" tabindex="2">
                        <div class="form-control-position">
                          <i class="ft-smartphone"></i>
                        </div>
                        <div class="help-block font-small-3">*Check your text messages for a 6 digit code.</div>
                      </fieldset>
                      <button type="button" id="step4" class="btn btn-danger btn-block btn-lg" disabled><i class="ft-arrow-right"></i> Continue</button>
                      <button type="button" id="back3" class="btn btn-info btn-block btn-lg"><i class="ft-arrow-left"></i> Back</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section><br><br>
        <section class="flexbox-container step5" style="display:none;">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                <div class="card-header border-0 pb-0">
                  <div class="card-title text-center">
                      <h3 class="brand-text">Additional Details</h3>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal" id="form5">
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control input-lg required special" id="address" placeholder="Address" tabindex="1" autocomplete="address-line1">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                        <div class="help-block font-small-3">*Address you are able to receive packages to.</div>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control input-lg" id="address2" placeholder="Address 2nd Line" tabindex="2" autocomplete="address-line2">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                        <div class="help-block font-small-3">*Apt #, Suite #, please put here.</div>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control input-lg required special" id="zipcode" placeholder="Zip Code" tabindex="3" autocomplete="postal-code">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                        <div class="help-block font-small-3">*We only need your address zip code.</div>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control input-lg required special" id="birthday" placeholder="Date of Birth" tabindex="4">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                        <div class="help-block font-small-3">*MM/DD/YYYY format</div>
                      </fieldset>
                      <div class="container">
                        <div class="row">
                          <div class="col-4">
                            <button type="button" id="Male" class="btn btn-success btn-block btn-md gender"><i class="fa-male"></i> Male</button>
                          </div>
                          <div class="col-4"></div>
                          <div class="col-4">
                            <button type="button" id="Female" class="btn btn-success btn-block btn-md gender"><i class="fa-female"></i> Female</button>
                          </div>
                        </div>
                      </div><br><br>
                      <button type="button" id="step5" class="btn btn-danger btn-block btn-lg" disabled><i class="ft-arrow-right"></i> Continue</button>
                      <button type="button" id="back4" class="btn btn-info btn-block btn-lg"><i class="ft-arrow-left"></i> Back</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="flexbox-container step6" style="display:none;">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                <div class="card-header border-0 pb-0">
                  <div class="card-title text-center">
                      <h3 class="brand-text">Additional Details</h3>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal" id="form6">
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control input-lg required" id="username" placeholder="Username" tabindex="1" autocomplete="username">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                        <div class="help-block font-small-3">*Create username to login to system.</div>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" class="form-control input-lg required" id="password" placeholder="Password" tabindex="2" autocomplete="password">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                        <div class="help-block font-small-3">*Password must be at least 8 characters.</div>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" class="form-control input-lg required" id="verpass" placeholder="Verify Password" tabindex="3">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                        <div class="help-block font-small-3">*Type the same password as above.</div>
                      </fieldset>
                      <button type="button" id="step6" class="btn btn-danger btn-block btn-lg" disabled><i class="ft-arrow-right"></i> Continue</button>
                      <button type="button" id="back5" class="btn btn-info btn-block btn-lg"><i class="ft-arrow-left"></i> Back</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="flexbox-container step7" style="display:none;">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                <div class="card-header border-0 pb-0">
                  <div class="card-title text-center">
                      <h3 class="brand-text">Upload Documents</h3>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal" id="form7">
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control input-lg required" id="socialsec" placeholder="Social Security #" tabindex="1">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                        <div class="help-block font-small-3">*Number will be encrypted after submission.</div>
                      </fieldset>
                      <div class="col-md-12">
                        <label class="file-upload btn btn-block btn-info">
                          Upload Driver's License ... <input type="file" accept=".pdf, .jpg, .jpeg" id="driverLic">
                          <div class="help-block font-small-3">*Must be in JPG or PDF format.</div>
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label class="file-upload btn btn-block btn-info">
                          Upload Vehicle Insurance ... <input type="file" accept=".pdf, .jpg, .jpeg" id="vehIns">
                          <div class="help-block font-small-3">*Must be in JPG or PDF Format.</div>
                        </label>
                      </div>
                      <button type="button" id="step7" class="btn btn-danger btn-block btn-lg"><i class="ft-arrow-right"></i> Continue</button>
                      <button type="button" id="back6" class="btn btn-info btn-block btn-lg"><i class="ft-arrow-left"></i> Back</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="flexbox-container step8" style="display:none;">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                <div class="card-header border-0 pb-0">
                  <div class="card-title text-center">
                      <h3 class="brand-text">Schedule Interview</h3>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal" id="form8">
                      <!-- Calendly inline widget begin -->
                      <div class="calendly-inline-widget" data-url="https://calendly.com/pro-dasher/dasher-interview/" style="min-width:320px;height:580px;"></div>
                      <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js"></script>
                      <!-- Calendly inline widget end -->
                      <button type="button" id="step8" class="btn btn-danger btn-block btn-lg"><i class="ft-arrow-right"></i> Continue</button>
                      <button type="button" id="back7" class="btn btn-info btn-block btn-lg"><i class="ft-arrow-left"></i> Back</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="flexbox-container step9" style="display:none;">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                <div class="card-header border-0 pb-0">
                  <div class="card-title text-center">
                      <h3 class="brand-text">Confirm Your Details</h3>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div class="confirmDetails"></div>
                    <button type="button" id="step9" class="btn btn-danger btn-block btn-lg"><i class="ft-arrow-right"></i> Submit Application</button>
                    <button type="button" id="back8" class="btn btn-info btn-block btn-lg"><i class="ft-arrow-left"></i> Back</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="flexbox-container appInfo" style="display:none;">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                <div class="card-content">
                  <div class="card-body">
                    <div class="appMessage"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <script src="../vendors/js/vendors.min.js" type="text/javascript"></script>
  <script src="../vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
  <script src="../vendors/js/easyauto/jquery.easy-autocomplete.min.js"></script>
  <script src="../js/maskedinput/jquery.maskedinput.js" type="text/javascript"></script>
  <script src="../js/global.js" type="text/javascript"></script>
  <script src="js/wizard.js" type="text/javascript"></script>
</body>
</html>
