$(document).ready(function () {
  $(".slick-carousel-center_home").slick({
    centerMode: true,
    centerPadding: "492px",
    slidesToShow: 1,
    dots: false,
    arrows: false,
    autoplay: true,
    infinite: true,
    responsive: [
      {
        breakpoint: 1400,
        settings: {
          arrows: true,
          centerMode: true,
          centerPadding: "0px",
          slidesToShow: 3,
        },
      },

      {
        breakpoint: 1200,
        settings: {
          arrows: true,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 2,
        },
      },

      {
        breakpoint: 992,
        settings: {
          arrows: true,
          centerMode: true,
          centerPadding: "190px",
          slidesToShow: 1,
        },
      },

      {
        breakpoint: 768,
        settings: {
          arrows: true,
          centerMode: true,
          centerPadding: "102px",
          slidesToShow: 1,
        },
      },

      {
        breakpoint: 576,
        settings: {
          arrows: true,
          centerMode: true,
          centerPadding: "0px",
          slidesToShow: 1,
        },
      },
    ],
  });
});

$(document).ready(function () {
  $(".slick-carousel-center_trending").slick({
    centerMode: true,
    centerPadding: "485px",
    slidesToShow: 1,
    dots: false,
    arrows: false,
    autoplay: true,
    infinite: true,
    responsive: [
      {
        breakpoint: 1400,
        settings: {
          arrows: true,
          centerMode: true,
          centerPadding: "72.5px",
          slidesToShow: 3,
        },
      },

      {
        breakpoint: 1200,
        settings: {
          arrows: true,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 2,
        },
      },

      {
        breakpoint: 992,
        settings: {
          arrows: true,
          centerMode: true,
          centerPadding: "185px",
          slidesToShow: 1,
        },
      },

      {
        breakpoint: 768,
        settings: {
          arrows: true,
          centerMode: true,
          centerPadding: "95px",
          slidesToShow: 1,
        },
      },

      {
        breakpoint: 575,
        settings: {
          arrows: true,
          centerMode: true,
          centerPadding: "0",
          slidesToShow: 1,
        },
      },
    ],
  });
});

$(document).ready(function () {
  $.ajax({
    url: "../api/loginStatus.php",
    method: "GET",
    dataType: "json",
    success: function (response) {
      if (response.logged_in) {
        $("#login-link").addClass("d-none");
        $("#profile-dropdown").removeClass("d-none");
        $("#username").text(response.name);
        console.log(response); // Log the response for debugging
      } else {
        // console.log("here");
        $("#login-link").removeClass("d-none");
        $("#profile-dropdown").addClass("d-none");
      }
    },
    error: function (xhr, status, error) {
      console.error("AJAX error:", status, error);
    },
  });
});


