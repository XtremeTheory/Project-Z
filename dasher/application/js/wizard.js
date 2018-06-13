$('#city').mask('00000');
$('#phonever').mask('000000', {clearIfNotMatch: true});
$('#phonenum').mask('000-000-0000', {clearIfNotMatch: true});
$('#birthday').mask('00/00/0000', {clearIfNotMatch: true});
$('#socialsec').mask('000-00-0000', {clearIfNotMatch: true});
var verifyPhone = "";
var fname = "";
var lname = "";
var email = "";
var birthday = "";
var address = "";
var address2 = "";
var zipcode = "";
var phonenum = "";
var gender = "";
var username = "";
var password = "";
var socialsec = "";

function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
}

var x = 0;
var options = {
  url: function(phrase) {
    return "php/search-city.php?phrase=" + phrase;
  },
  getValue: "name",
  requestDelay: 400,
  placeholder: "Search by Zip Code",
  template: {
    type: "custom",
    method: function(value, item) {
      if(item.name == "None") {
        var distInfo = "No Result.";
        return "<div><h6>" + distInfo + "</h6></div>";
      } else {
        var distInfo = item.zipcode + " - " + "District " + item.name;
        return "<div data-item-id='" + item.id + "' ><h6>" + distInfo + "</h6></div>";
      }
    }
  },
  list: {
    onClickEvent: function() {
      var data = $("#city").getSelectedItemData().id;
      var cityLive = $("#city").getSelectedItemData().live;
      x = data;
      $('#cityID').val(x);
      if(cityLive == 1) {
        $('#step2').prop("disabled", false);
        $('.appInfo').fadeIn();
        $('.appMessage').html("<span class='success'>Alright! We are looking for more Dashers in this district! Click continue.</span>");
      } else {
        $('.appInfo').fadeIn();
        $('.appMessage').html("<span class='error'>We are not accepting any applications at this time for this district.</span>");
      }
    },
    onHideListEvent: function() {
      if(x == "0") {
        $('#city').val("");
      }
    }
  }
};
jQuery("#city").easyAutocomplete(options);

$(document).off('click', '#step1').on('click', '#step1', function () {
  $('.step1').fadeOut();
  $('.appInfo').fadeOut();

  function implode() {
    $('.step2').fadeIn();
  }

  setTimeout(implode, 400);
});

$(document).off('click', '#step2').on('click', '#step2', function () {
  $('.step2').fadeOut();
  $('.appInfo').fadeOut();
  function implode() {
    $('.step3').fadeIn();
  }

  setTimeout(implode, 400);
});

$("#form3 input").keyup(function() {
  var empty = false;
  $("#form3 input").each(function() {
    if ($(this).val() == '') {
      empty = true;
    }
  });

  if (empty) {
    $('#step3').attr('disabled', 'disabled');
  } else {
    $('#step3').removeAttr('disabled');
  }
});


$(document).off('click', '#step3').on('click', '#step3', function () {
  function makeCode() {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    for (var i = 0; i < 5; i++)
      text += possible.charAt(Math.floor(Math.random() * possible.length));
      return text;
  }

  var randomFixedInteger = function (length) {
    return Math.floor(Math.pow(10, length-1) + Math.random() * (Math.pow(10, length) - Math.pow(10, length-1) - 1));
  }

  var isFormValid = "";
  var randomCode1 = makeCode();
  var textSent = "FALSE";
  var randomCode = randomFixedInteger(6);
  var theText = "Your Dasher verification code is " + randomCode;
  email = $('#email').val();
  fname = $('#fname').val();
  lname = $('#lname').val();
  phonenum = $('#phonenum').val();

  if(!isValidEmailAddress($('#email').val())) {
      $('#email').addClass("is-invalid");
      swal("Uh Oh!", "This does not seem to be an email address...", "error");
  } else {
    $('#sendCover').fadeIn();
    $.ajax({
      type: "POST",
      cache: false,
      url: 'php/checkContact.php',
      data: {fname: fname, lname: lname, email: email, phonenum: phonenum},
      success: function(result) {
        if(result == "servfailure") {
          window.location.href = "https://dasher.prodasher.com/error-500.php";
        } else if(result == "isBanned") {
          window.location.href = "https://dasher.prodasher.com/banned.php";
        } else if(result == "emailExist") {
          $('#sendCover').fadeOut();
          $('#email').addClass("is-invalid");
          isFormValid = "FALSE";
          swal("Uh Oh!", "This email is already registered.", "error");
        } else if(result == "phoneExist") {
          $('#sendCover').fadeOut();
          $('#phonenum').addClass("is-invalid");
          isFormValid = "FALSE";
          swal("Uh Oh!", "This phone number is already registered.", "error");
        } else {
          if(isFormValid != "FALSE") {
            var xhr = new XMLHttpRequest();
            phonenum = "1" + phonenum.replace(/-/g, "");
            xhr.open("GET", "https://platform.clickatell.com/messages/http/send?apiKey=Lv1m_ozbQHalYf4PJvBUYg==&to=" + phonenum + "&content=" + theText, true);
            xhr.onreadystatechange = function(){
              if (xhr.readyState == 4 && xhr.status == 202) {
                verifyPhone = randomCode;

                $.ajax({
                 type: "POST",
                 cache: false,
                 url: 'php/confirmContact.php',
                 data: {fname: fname, lname: lname, email: email, randomcode: randomCode1},
                 success: function(result) {
                   if(result != "failed") {
                     verifyEmail = result;
                     $('.step3').fadeOut();
                     $('.appInfo').fadeOut();

                     function implode() {
                       $('.step4').fadeIn();
                     }

                     setTimeout(implode, 400);

                     function showHint() {
                       $('.appInfo').fadeIn();
                       $('.appMessage').html("<span>If you have not received a text and/or email, click the back button, and check your input.  When you click continue, it will resend a new code to your email and smart phone.</span>");
                     }

                     setTimeout(showHint, 4000);
                   } else {
                     window.location.href = "https://dasher.prodasher.com/error-500.php";
                   }
                   $('#sendCover').fadeOut();
                 }
               });
              }
            };
            xhr.send();
        }
        }
      }
    });
  }
});

$("#form4 input").keyup(function() {
  var empty = false;
  $("#form4 input").each(function() {
    if ($(this).val() == '') {
      empty = true;
    }
  });

  if (empty) {
    $('#step4').attr('disabled', 'disabled');
  } else {
    $('#step4').removeAttr('disabled');
  }
});

$(document).off('click', '#step4').on('click', '#step4', function () {
  var emailver = $('#emailver').val();
  var phonever = $('#phonever').val();
  var isFormValid = "TRUE";

  if(emailver != verifyEmail) {
    $('#emailver').addClass("is-invalid");
    isFormValid = "FALSE";
    swal("Uh Oh!", "Check your email again, it will be a 5 alphanumeric case sensitive code.", "error");
  }

  if(phonever != verifyPhone) {
    $('#phonever').addClass("is-invalid");
    isFormValid = "FALSE";
    swal("Uh Oh!", "Check your text message again, it will be a six digit code.", "error");
  }

  if(isFormValid == "TRUE") {
    $('.step4').fadeOut();
    $('.appInfo').fadeOut();

    function implode() {
      $('.step5').fadeIn();
    }

    setTimeout(implode, 400);
  }
});

$(".special").keyup(function() {
  var empty = false;
  $(".special").each(function() {
    if ($(this).val() == '') {
      empty = true;
    }
  });

  if (empty) {
    $('#step5').attr('disabled', 'disabled');
  } else {
    $('#step5').removeAttr('disabled');
  }
});

$(".gender").click(function(){
   gender = this.id;
});

$(document).off('click', '#step5').on('click', '#step5', function () {
  address = $('#address').val();
  address2 = $('#address2').val();
  zipcode = $('#zipcode').val();
  birthday = $('#birthday').val();
  var isFormValid = "TRUE";

  if(gender == "") {
    $('.gender').addClass("is-invalid");
    isFormValid = "FALSE";
    swal("Uh Oh!", "Click a gender.", "error");
  }

  if(isFormValid == "TRUE") {
    $('.step5').fadeOut();
    $('.appInfo').fadeOut();

    function implode() {
      $('.step6').fadeIn();
    }

    setTimeout(implode, 400);
  }
});

$("#form6 input").keyup(function() {
  var empty = false;
  $("#form6 input").each(function() {
    if ($(this).val() == '') {
      empty = true;
    }
  });

  if (empty) {
    $('#step6').attr('disabled', 'disabled');
  } else {
    $('#step6').removeAttr('disabled');
  }
});

$(document).off('click', '#step6').on('click', '#step6', function () {
  username = $('#username').val();
  password = $('#password').val();
  var verpass = $('#verpass').val();
  var isFormValid = "TRUE";

  if(password !== verpass) {
    $('#verpass').addClass("is-invalid");
    isFormValid = "FALSE";
    swal("Uh Oh!", "Passwords do not match.", "error");
  }

  if(isFormValid == "TRUE") {
    $.ajax({
     type: "POST",
     cache: false,
     url: 'php/checkLogin.php',
     data: {username: username},
     success: function(result) {
       if(result == "servfailure") {
         window.location.href = "https://dasher.prodasher.com/error-500.php";
       }
       if(username == "userBanned") {
         $('#username').addClass("is-invalid");
         swal("Uh Oh!", "Username is not allowed to be used.", "error");
       }
       if(result == "userExist") {
         $('#username').addClass("is-invalid");
         swal("Uh Oh!", "Username is already being used.", "error");
       }
       if(result == "passed") {
         $('.step6').fadeOut();
         $('.appInfo').fadeOut();

         function implode() {
           $('.step7').fadeIn();
         }

         setTimeout(implode, 400);
       }
     }
   });
  }
});

$(document).off('click', '#step7').on('click', '#step7', function () {
  var isFormValid = "TRUE";
  socialsec = $('#socialsec').val();

  if($('#socialsec').val() == "") {
    $('#socialsec').addClass("is-invalid");
    swal("Uh Oh!", "Please enter in your social security #.", "error");
    isFormValid = "FALSE";
  }

  if(document.getElementById("driverLic").files.length == 0) {
    $('#driverLic').addClass("is-invalid");
    swal("Uh Oh!", "Please upload your driver's license.", "error");
    isFormValid = "FALSE";
  }

  if(document.getElementById("vehIns").files.length == 0) {
    $('#vehIns').addClass("is-invalid");
    swal("Uh Oh!", "Please upload your vehicle insurance.", "error");
    isFormValid = "FALSE";
  }

  if(isFormValid != "FALSE") {
    $('.step7').fadeOut();
    $('.appInfo').fadeOut();

    function implode() {
      $('.step8').fadeIn();
    }

    setTimeout(implode, 400);
  }
});

$(document).off('click', '#step8').on('click', '#step8', function () {
  $('.step8').fadeOut();
  $('.appInfo').fadeOut();

  function implode() {
    $('.step9').fadeIn();
  }

  setTimeout(implode, 400);
  $('.confirmDetails').html("<b>First and Last Name: </b>" + fname + " " + lname + "<br>");
  $('.confirmDetails').append("<b>Address: </b>" + address + "<br>");
  $('.confirmDetails').append("<b>Address 2nd Line: </b>" + address2 + "<br>");
  $('.confirmDetails').append("<b>Zip Code: </b>" + zipcode + "<br>");
  $('.confirmDetails').append("<b>Gender: </b>" + gender + "<br>");
  $('.confirmDetails').append("<b>Email: </b>" + email + "<br>");
  $('.confirmDetails').append("<b>Phone Number: </b>" + phonenum + "<br>");
  $('.confirmDetails').append("<b>Date of Birth: </b>" + birthday + "<br>");
  $('.confirmDetails').append("<b>Social Security #: </b>" + socialsec + "<br><br>");
  $('.confirmDetails').append("*You should have received your interview confirmation by email.<br>Please confirm before submitting.<br><br>");
});

$(document).off('click', '#step9').on('click', '#step9', function () {
  console.log("Sending data...");
  $('#sendCover').fadeIn();
 var file_data = $('#driverLic').prop('files')[0];
 var file_data1 = $('#vehIns').prop('files')[0];
 var form_data = new FormData();
 form_data.append('file', file_data);
 form_data.append('file1', file_data1);
 form_data.append('fname', fname);
 form_data.append('lname', lname);
 form_data.append('address', address);
 form_data.append('address2', address2);
 form_data.append('zipcode', zipcode);
 form_data.append('gender', gender);
 form_data.append('phonenum', phonenum);
 form_data.append('email', email);
 form_data.append('birthday', birthday);
 form_data.append('username', username);
 form_data.append('password', password);
 form_data.append('socialsec', socialsec);
 $.ajax({
     url: 'php/submitApplication.php', // point to server-side PHP script
     dataType: 'text',  // what to expect back from the PHP script, if anything
     cache: false,
     contentType: false,
     processData: false,
     data: form_data,
     type: 'post',
     success: function(result) {
       console.log(result);
       if(result == "servfailure") {
         window.location.href = "https://dasher.prodasher.com/error-500.php";
       }
       if(result == "passed") {
         window.location.href = "https://dasher.prodasher.com/application/success.php";
       }
     }
  });
});

$(document).off('click', '#disagree').on('click', '#disagree', function () {
  $('.appInfo').fadeIn();
  $('.appMessage').html("<span class='error'>You clicked that you disagree with the requirements.  Unfortunately, you can not proceed with your application if you do not agree to these requirements.</span>");
});

$(document).off('click', '#male').on('click', '#male', function () {
  $('#male').prop("disabled", true);
  $('#female').prop("disabled", false);
});

$(document).off('click', '#female').on('click', '#female', function () {
  $('#female').prop("disabled", true);
  $('#male').prop("disabled", false);
});

$(document).off('click', '#back1').on('click', '#back1', function () {
  $('.step2').fadeOut();
  $('.appInfo').fadeOut();

  function implode() {
    $('.step1').fadeIn();
  }

  setTimeout(implode, 400);
});

$(document).off('click', '#back2').on('click', '#back2', function () {
  $('.step3').fadeOut();
  $('.appInfo').fadeOut();

  function implode() {
    $('.step2').fadeIn();
  }

  setTimeout(implode, 400);
});

$(document).off('click', '#back3').on('click', '#back3', function () {
  $('.step4').fadeOut();
  $('.appInfo').fadeOut();

  function implode() {
    $('.step3').fadeIn();
  }

  setTimeout(implode, 400);
});

$(document).off('click', '#back4').on('click', '#back4', function () {
  $('.step5').fadeOut();
  $('.appInfo').fadeOut();

  function implode() {
    $('.step4').fadeIn();
  }

  setTimeout(implode, 400);
});

$(document).off('click', '#back5').on('click', '#back5', function () {
  $('.step6').fadeOut();
  $('.appInfo').fadeOut();

  function implode() {
    $('.step5').fadeIn();
  }

  setTimeout(implode, 400);
});

$(document).off('click', '#back6').on('click', '#back6', function () {
  $('.step7').fadeOut();
  $('.appInfo').fadeOut();

  function implode() {
    $('.step6').fadeIn();
  }

  setTimeout(implode, 400);
});

$(document).off('click', '#back7').on('click', '#back7', function () {
  $('.step8').fadeOut();
  $('.appInfo').fadeOut();

  function implode() {
    $('.step7').fadeIn();
  }

  setTimeout(implode, 400);
});

$(document).off('click', '#back8').on('click', '#back8', function () {
  $('.step9').fadeOut();
  $('.appInfo').fadeOut();

  function implode() {
    $('.step8').fadeIn();
  }

  setTimeout(implode, 400);
});
