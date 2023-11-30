$(window).on("scroll", function () {
  if ($(window).scrollTop() > 50) {
    $(".header-wrapper").addClass("active");
  } else {
    $(".header-wrapper").removeClass("active");
  }
});
