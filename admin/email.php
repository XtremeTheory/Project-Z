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
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/fonts/simple-line-icons/style.min.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/pages/email-application.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <!-- END Custom CSS-->
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
              <button type="button" class="btn btn-danger btn-block my-1"><i class="ft-mail"></i> Compose</button>
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
  </div>
  <script src="vendors/js/vendors.min.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <script>
  if($('#users-list').length > 0){
      $('#users-list').perfectScrollbar({
          theme:"dark"
      });
  }
  
  $('.emailBody').html("");

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
      var fuCount = obj.fuCount;
      $('.fuCount').text(fuCount);
      var urgentCount = obj.urgentCount;
      $('.urgentCount').text(urgentCount);
    }).fail(function(jqXHR, textStatus, errorThrown) {
      console.log(jqXHR, textStatus, errorThrown);
    });


    var data = new FormData();
    data.append('task', 'inbox');
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
      var data = new FormData();
      data.append('task', 'inbox');
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

        $('.active').addClass('list-group-item-action');
        $('.active').removeClass('active');
        $('#inboxButton').addClass('active');
        $('#inboxButton').removeClass('list-group-item-action');
        $('.emailList').html(result);
      }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR, textStatus, errorThrown);
      });
    });

    $(document).off('click', '#sentButton').on('click', '#sentButton', function () {
      var data = new FormData();
      data.append('task', 'sent');
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
        $('.active').addClass('list-group-item-action');
        $('.active').removeClass('active');
        $('#sentButton').addClass('active');
        $('#sentButton').removeClass('list-group-item-action');
        $('.emailList').html(result);
      }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR, textStatus, errorThrown);
      });
    });

    $(document).off('click', '#draftButton').on('click', '#draftButton', function () {
      var data = new FormData();
      data.append('task', 'draft');
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

        $('.active').addClass('list-group-item-action');
        $('.active').removeClass('active');
        $('#draftButton').addClass('active');
        $('#draftButton').removeClass('list-group-item-action');
        $('.emailList').html(result);
      }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR, textStatus, errorThrown);
      });
    });

    $(document).off('click', '#starButton').on('click', '#starButton', function () {
      var data = new FormData();
      data.append('task', 'star');
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

        $('.active').addClass('list-group-item-action');
        $('.active').removeClass('active');
        $('#starButton').addClass('active');
        $('#starButton').removeClass('list-group-item-action');
        $('.emailList').html(result);
      }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR, textStatus, errorThrown);
      });
    });

    $(document).off('click', '#trashButton').on('click', '#trashButton', function () {
      var data = new FormData();
      data.append('task', 'trash');
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

        $('.active').addClass('list-group-item-action');
        $('.active').removeClass('active');
        $('#trashButton').addClass('active');
        $('#trashButton').removeClass('list-group-item-action');
        $('.emailList').html(result);
      }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR, textStatus, errorThrown);
      });
    });

    $(document).off('click', '#followButton').on('click', '#followButton', function () {
      var data = new FormData();
      data.append('task', 'follow');
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

        $('.active').addClass('list-group-item-action');
        $('.active').removeClass('active');
        $('#followButton').addClass('active');
        $('#followButton').removeClass('list-group-item-action');
        $('.emailList').html(result);
      }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR, textStatus, errorThrown);
      });
    });

    $(document).off('click', '#urgentButton').on('click', '#urgentButton', function () {
      var data = new FormData();
      data.append('task', 'urgent');
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

        $('.active').addClass('list-group-item-action');
        $('.active').removeClass('active');
        $('#urgentButton').addClass('active');
        $('#urgentButton').removeClass('list-group-item-action');
        $('.emailList').html(result);
      }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR, textStatus, errorThrown);
      });
    });
  </script>
</body>
</html>
