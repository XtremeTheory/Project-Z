<?php
captureIP('email.php');
verifyAdmin("2","email.php"); ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Email System">
  <title>Email - Pro Dasher</title>
  <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/fonts/simple-line-icons/style.min.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/pages/email-application.css">
  <link rel="stylesheet" type="text/css" href="vendors/js/easyauto/easy-autocomplete.min.css">
  <style>
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
</head>
<body class="vertical-layout vertical-overlay-menu content-left-sidebar email-application menu-expanded fixed-navbar" data-open="click" data-menu="vertical-overlay-menu" data-col="content-left-sidebar">
  <?php require 'php/navigation.php';
  require 'php/left-menu.php'; ?>
  <div class="app-content content">
    <div class="sidebar-left">
      <div class="sidebar">
        <div class="sidebar-content email-app-sidebar d-flex">
          <div class="email-app-menu col-md-5 card d-none d-lg-block">
            <div class="form-group form-group-compose text-center">
              <button type="button" class="btn btn-danger btn-block my-1" data-toggle="modal" data-target="#composeEmail"><i class="ft-mail"></i> Compose</button>
            </div>
            <h6 class="text-muted text-bold-500 mb-1">Messages</h6>
            <div class="list-group list-group-messages">
              <a href="#" class="list-group-item active border-0 eLists" id="inboxButton"><i class="ft-inbox mr-1"></i> Inbox<span class="badge badge-secondary badge-pill float-right"><div class="unreadCount"></div></span></a>
              <a href="#" class="list-group-item list-group-item-action border-0 eLists" id="sentButton"><i class="la la-paper-plane-o mr-1"></i> Sent</a>
              <a href="#" class="list-group-item list-group-item-action border-0 eLists" id="draftButton"><i class="ft-file mr-1"></i> Draft</a>
              <a href="#" class="list-group-item list-group-item-action border-0 eLists" id="starButton"><i class="ft-star mr-1"></i> Starred<span class="badge badge-danger badge-pill float-right"><div class="starCount"></div></span></a>
              <a href="#" class="list-group-item list-group-item-action border-0 eLists" id="trashButton"><i class="ft-trash-2 mr-1"></i> Trash</a>
            </div>
            <h6 class="text-muted text-bold-500 mt-1 mb-1">Labels</h6>
            <div class="list-group list-group-messages">
              <a href="#" class="list-group-item list-group-item-action border-0 eLists" id="cortonaButton"><i class="ft-circle mr-1 info"></i> Cortona<span class="badge corCount badge-info badge-pill float-right"><div class="corCount"></div></span></a>
              <a href="#" class="list-group-item list-group-item-action border-0 eLists" id="followButton"><i class="ft-circle mr-1 warning"></i> Follow Up<span class="badge folCount badge-warning badge-pill float-right"><div class="fuCount"></div></span></a>
              <a href="#" class="list-group-item list-group-item-action border-0 eLists" id="urgentButton"><i class="ft-circle mr-1 danger"></i> Urgent<span class="badge urgCount badge-danger badge-pill float-right"><div class="urgentCount"></div></span> </a>
            </div>
          </div>
          <div class="email-app-list-wraper col-md-7 card p-0">
            <div class="email-app-list">
              <div class="card-body chat-fixed-search">
                <fieldset class="form-group position-relative has-icon-left m-0 pb-1">
                  <input type="text" class="form-control" id="iconLeft4" placeholder="Search email">
                  <div class="form-control-position">
                    <i class="ft-search"></i>
                  </div>
                </fieldset>
              </div>
              <div id="users-list" class="list-group">
                <div class="users-list-padding media-list">
                  <div class="emailList"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content-right">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <div class="card email-app-details d-none d-lg-block">
            <div class="card-content">
              <div class="emailBody"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade text-left" id="composeEmail" tabindex="-1" role="dialog" aria-labelledby="composeEmail" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title"> Compose Email</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form>
            <div class="modal-body">
              <div class="controls">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input id="toEmail" type="email" class="form-control required" placeholder="Email To">
                      <input type="hidden" id="userID">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="subject">Subject</label>
                      <input id="subject" type="text" class="form-control required" placeholder="Subject">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="form_message">Message</label>
                      <textarea id="message" class="form-control required" placeholder="Email Message" rows="4"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-outline-secondary btn-lg btn-success" id="sendEmail" value="Send">
              <button type="button" id="but-loading" style="display:none;" class="btn btn-info btn-lg" disabled="disabled"><i class="fa fa-spinner fa-spin"></i></button>
              <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
            </div>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" class="eid">
  <script src="vendors/js/vendors.min.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <script src="vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
  <script src="vendors/js/easyauto/jquery.easy-autocomplete.min.js"></script>
  <script>
  var curWindow = "inbox";
  function updateNums() {
      $.ajax({
        type: "POST",
        contentType: false,
        processData: false,
        cache: false,
        url: 'php/email-counts.php?task=getAll',
      }).done(function(result) {
        if(result == "servfailure") {
          window.location.href = "https://admin.prodasher.com/error-500.php";
        }
        var obj = jQuery.parseJSON(result);
        var unreadCount = obj.unreadCount;
        $('.unreadCount').text(unreadCount);
        var starCount = obj.starCount;
        $('.starCount').text(starCount);
        var corCount = obj.corCount;
        $('.corCount').text(corCount);
        var fuCount = obj.fuCount;
        $('.fuCount').text(fuCount);
        var urgentCount = obj.urgentCount;
        $('.urgentCount').text(urgentCount);
      }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR, textStatus, errorThrown);
      });
    }

    function updateLists(list) {
      var data = new FormData();
      data.append('task', list);
      $.ajax({
        type: "POST",
        contentType: false,
        processData: false,
        cache: false,
        url: 'php/list-emails.php',
        data: data,
      }).done(function(result) {
        if(result == "servfailure") {
          window.location.href = "https://admin.prodasher.com/error-500.php";
        }

        $('.emailList').html(result);
      }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR, textStatus, errorThrown);
      });
    }

    updateNums();
    updateLists("inbox");

    if(curWindow == "inbox") {
      setInterval(function() {updateLists(curWindow);}, 2500);
    }

    if($('#users-list').length > 0){
      $('#users-list').perfectScrollbar({
        theme:"dark"
      });
    }

    $('.emailBody').html("");

    var x = 0;
    var options = {
      url: function(phrase) {
        return "php/search-user.php?phrase=" + phrase;
      },
      getValue: "name",
      minLength: 3,
      requestDelay: 400,
      placeholder: "Start typing...",
      template: {
        type: "custom",
        method: function(value, item) {
          return "<div data-item-id='" + item.id + "' ><h6>" + item.name + "</h6></div>";
        }
      },
      list: {
        onClickEvent: function() {
          var data = $("#toEmail").getSelectedItemData().id;
          x = data;
          if(data == 0) {
            $("#userID").val("0");
            return;
          }
          $('#userID').val(x);
        },
        onHideListEvent: function() {
          if(x == 0) {
            $("#userID").val("0");
          }
        }
      }
    };

    $('#toEmail').change(function() {
      var str = ('#toEmail').val();
      if (str.toLowerCase().indexOf("name:") >= 0) {
        jQuery("#toEmail").easyAutocomplete(options);
      }
    });

    $('#toEmail, #subject, #message').on('focus', function() {
      $(this).removeClass('is-invalid');
    });

    $(document).off('click', '#sendEmail').on('click', '#sendEmail', function () {
      var isFormValid = true;

      document.getElementById("sendEmail").style.display = "none";
      document.getElementById("but-loading").style.display = "block";
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
        var data = new FormData();
        if($('#userID').val() > 0) {
          data.append('uid', $('#userID').val());
          data.append('email', "0");
        } else {
          data.append('email', $('#toEmail').val());
          data.append('uid', "0");
        }
        data.append('subject', $('#subject').val());
        data.append('message', $('#message').val());
        $.ajax({
          type: "POST",
          contentType: false,
          processData: false,
          cache: false,
          url: 'php/send-email.php',
          data: data,
          success: function(data) {
            console.log(data);
            if(data == "") {
              window.location.href = "https://admin.prodasher.com/error-500.php";
            }
            if(data == "servfailure") {
              window.location.href = "https://admin.prodasher.com/error-500.php";
            }
            if(data == "correct") {
              swal("Success!", "The email has been sent!", "success");
              document.getElementById("sendEmail").style.display = "block";
              document.getElementById("but-loading").style.display = "none";
              $('#addError').modal('hide');
            }
          }
        });
      } else {
        document.getElementById("sendEmail").style.display = "block";
        document.getElementById("but-loading").style.display = "none";
      }
    });

    $(document).off('click', '.deleteEmail').on('click', '.deleteEmail', function () {
      $('.eid').val($(this).attr('id'));
      var changeLogged = 0;
      swal({
        title: "Are you sure?",
        text: "Once deleted, it will be moved to the trash can!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          var data = new FormData();
          data.append('changeID', "13");
          data.append('pagename', "email.php");
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
            data.append('eid', $('.eid').val());
            $.ajax({
              type: "POST",
              contentType: false,
              processData: false,
              cache: false,
              url: 'php/delete-email.php',
              data: data,
              success: function(data) {
                if(data == "servfailure") {
                  window.location.href = "https://admin.prodasher.com/error-500.php";
                }
                if(data == "complete") {
                  updateLists(curWindow);
                  swal("Whoosh! The email was thrown in the trash!", {
                    icon: "success",
                  });
                }
              }
            });
          }
        }
        } else {
          swal("The email stayed where it is!");
        }
      });
    });

    $(document).off('click', '.emailButton').on('click', '.emailButton', function () {
      if (!$('.checkIcon').length) {
        $(this).find('p.checkMark').prepend('<i class="ft-check primary font-small-2 checkIcon"></i>');
      }
      $(this).find('p.checkMark').removeClass('text-bold-600');
      $('.emailButton').removeClass('bg-blue-grey bg-lighten-5 border-right-primary border-right-2');
      $(this).addClass('bg-blue-grey bg-lighten-5 border-right-primary border-right-2');
      var data = new FormData();
      data.append('eid', $(this).attr('id'));
      $.ajax({
        type: "POST",
        contentType: false,
        processData: false,
        cache: false,
        url: 'php/email-body.php',
        data: data,
      }).done(function(result) {
        if(result == "servfailure") {
          window.location.href = "https://admin.prodasher.com/error-500.php";
        }

        updateNums();
        $('.emailBody').html(result);
      }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR, textStatus, errorThrown);
      });
    });

    $(document).off('click', '.markUnread').on('click', '.markUnread', function () {
      var data = new FormData();
      data.append('task', 'markUnread');
      data.append('eid', $(this).attr('id'));
      $.ajax({
        type: "POST",
        contentType: false,
        processData: false,
        cache: false,
        url: 'php/update-email.php',
        data: data,
      }).done(function(result) {
        if(result == "servfailure") {
          window.location.href = "https://admin.prodasher.com/error-500.php";
        }
        if(result == "complete") {
          updateNums();
          $(".markUnread").remove();
          $(".checkIcon").remove();
          $(".checkMark").addClass('text-bold-600');
        }
      }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR, textStatus, errorThrown);
      });
    });

    $(document).off('click', '.markFollow').on('click', '.markFollow', function () {
      var data = new FormData();
      data.append('task', 'markFollow');
      data.append('eid', $(this).attr('id'));
      $.ajax({
        type: "POST",
        contentType: false,
        processData: false,
        cache: false,
        url: 'php/update-email.php',
        data: data,
      }).done(function(result) {
        if(result == "servfailure") {
          window.location.href = "https://admin.prodasher.com/error-500.php";
        }
        if(result == "complete") {
          updateNums();
          $(".markFollow").remove();
          $(".theBadge").removeClass('badge-danger');
          $(".theBadge").removeClass('badge-info');
          $(".theBadge").addClass('badge-warning');
          $(".theBadge").text('');
          $(".theBadge").text('Follow Up');
        }
      }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR, textStatus, errorThrown);
      });
    });

    $(document).off('click', '.markUrgent').on('click', '.markUrgent', function () {
      var data = new FormData();
      data.append('task', 'markUrgent');
      data.append('eid', $(this).attr('id'));
      $.ajax({
        type: "POST",
        contentType: false,
        processData: false,
        cache: false,
        url: 'php/update-email.php',
        data: data,
      }).done(function(result) {
        if(result == "servfailure") {
          window.location.href = "https://admin.prodasher.com/error-500.php";
        }
        if(result == "complete") {
          updateNums();
          $(".markUrgent").remove();
          $(".theBadge").removeClass('badge-warning');
          $(".theBadge").removeClass('badge-info');
          $(".theBadge").addClass('badge-danger');
          $(".theBadge").text('');
          $(".theBadge").text('Urgent');
        }
      }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR, textStatus, errorThrown);
      });
    });

    $(document).off('click', '.addStar').on('click', '.addStar', function () {
      var data = new FormData();
      data.append('task', 'addStar');
      data.append('eid', $(this).attr('id'));
      $.ajax({
        type: "POST",
        contentType: false,
        processData: false,
        cache: false,
        url: 'php/update-email.php',
        data: data,
      }).done(function(result) {
        if(result == "servfailure") {
          window.location.href = "https://admin.prodasher.com/error-500.php";
        }
        if(result == "complete") {
          updateNums();
          $(".starred").removeClass('blue-grey lighten-3');
          $(".starred").addClass('warning');
          $(".addStar").addClass('removeStar');
          $(".removeStar").removeClass('addStar');
          $(".starText").text('');
          $(".starText").text('Remove Star');
        }
      }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR, textStatus, errorThrown);
      });
    });

    $(document).off('click', '.removeStar').on('click', '.removeStar', function () {
      var data = new FormData();
      data.append('task', 'removeStar');
      data.append('eid', $(this).attr('id'));
      $.ajax({
        type: "POST",
        contentType: false,
        processData: false,
        cache: false,
        url: 'php/update-email.php',
        data: data,
      }).done(function(result) {
        if(result == "servfailure") {
          window.location.href = "https://admin.prodasher.com/error-500.php";
        }
        if(result == "complete") {
          updateNums();
          $(".starred").removeClass('warning');
          $(".starred").addClass('blue-grey lighten-3');
          $(".removeStar").addClass('addStar');
          $(".addStar").removeClass('removeStar');
          $(".starText").text('');
          $(".starText").text('Add Star');
        }
      }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR, textStatus, errorThrown);
      });
    });

    $(document).off('click', '#inboxButton').on('click', '#inboxButton', function () {
      curWindow = "inbox";
      updateLists("inbox");
      $('.active').addClass('list-group-item-action');
      $('.active').removeClass('active');
      $('#inboxButton').addClass('active');
      $('#inboxButton').removeClass('list-group-item-action');
      $('.emailList').html(result);
    });

    $(document).off('click', '#sentButton').on('click', '#sentButton', function () {
      curWindow = "sent";
      updateLists("sent");
      $('.active').addClass('list-group-item-action');
      $('.active').removeClass('active');
      $('#sentButton').addClass('active');
      $('#sentButton').removeClass('list-group-item-action');
    });

    $(document).off('click', '#draftButton').on('click', '#draftButton', function () {
      curWindow = "draft";
      updateLists("draft");
      $('.active').addClass('list-group-item-action');
      $('.active').removeClass('active');
      $('#draftButton').addClass('active');
      $('#draftButton').removeClass('list-group-item-action');
    });

    $(document).off('click', '#starButton').on('click', '#starButton', function () {
      curWindow = "star";
      updateLists("star");
      $('.active').addClass('list-group-item-action');
      $('.active').removeClass('active');
      $('#starButton').addClass('active');
      $('#starButton').removeClass('list-group-item-action');
    });

    $(document).off('click', '#trashButton').on('click', '#trashButton', function () {
      curWindow = "trash";
      updateLists("trash");
      $('.active').addClass('list-group-item-action');
      $('.active').removeClass('active');
      $('#trashButton').addClass('active');
      $('#trashButton').removeClass('list-group-item-action');
    });

    $(document).off('click', '#followButton').on('click', '#followButton', function () {
      curWindow = "follow";
      updateLists("follow");
      $('.active').addClass('list-group-item-action');
      $('.active').removeClass('active');
      $('#followButton').addClass('active');
      $('#followButton').removeClass('list-group-item-action');
    });

    $(document).off('click', '#urgentButton').on('click', '#urgentButton', function () {
      curWindow = "urgent";
      updateLists("urgent");
      $('.active').addClass('list-group-item-action');
      $('.active').removeClass('active');
      $('#urgentButton').addClass('active');
      $('#urgentButton').removeClass('list-group-item-action');
    });

    $(document).off('click', '#cortonaButton').on('click', '#cortonaButton', function () {
      curWindow = "cortona";
      updateLists("cortona");
      $('.active').addClass('list-group-item-action');
      $('.active').removeClass('active');
      $('#cortonaButton').addClass('active');
      $('#cortonaButton').removeClass('list-group-item-action');
    });
  </script>
</body>
</html>
