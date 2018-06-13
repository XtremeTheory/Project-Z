$(window).on("load", function (e) {
  console.log("Page is completely loaded.");
  $('#theCover').fadeOut();
});

var bg = $(".bg");
function resizeBackground() {
  bg.height($(window).height() + 60);
}

$(window).resize(resizeBackground);
resizeBackground();

$(document).off('focus', 'input').on('focus', 'input', function () {
  $(this).removeClass('is-invalid');
});
