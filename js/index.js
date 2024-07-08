$(document).ready(function () {
  $(".slick-carousel-center_home").slick({
    centerMode: true,
    centerPadding: "488px",
    slidesToShow: 1,
    dots: false,
    arrows: false,
    autoplay: false,
    infinite: true,
    responsive: [
      {
        breakpoint: 1400,
        settings: {
          centerMode: true,
          centerPadding: "400px",
          slidesToShow: 1,
        },
      },

      {
        breakpoint: 1200,
        settings: {
          centerMode: true,
          centerPadding: "311px",
          slidesToShow: 1,
        },
      },

      {
        breakpoint: 992,
        settings: {
          centerMode: true,
          centerPadding: "190px",
          slidesToShow: 1,
        },
      },

      {
        breakpoint: 768,
        settings: {
          centerMode: true,
          centerPadding: "101px",
          slidesToShow: 1,
        },
      },

      {
        breakpoint: 575,
        settings: {
          centerMode: true,
          centerPadding: "70px",
          slidesToShow: 1,
        },
      },

      {
        breakpoint: 425,
        settings: {
          centerMode: true,
          centerPadding: "30px",
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
    autoplay: false,
    infinite: true,
    responsive: [
      {
        breakpoint: 1400,
        settings: {
          centerMode: true,
          centerPadding: "395px",
          slidesToShow: 1,
        },
      },

      {
        breakpoint: 1200,
        settings: {
          centerMode: true,
          centerPadding: "305px",
          slidesToShow: 1,
        },
      },

      {
        breakpoint: 992,
        settings: {
          centerMode: true,
          centerPadding: "185px",
          slidesToShow: 1,
        },
      },

      {
        breakpoint: 768,
        settings: {
          centerMode: true,
          centerPadding: "95px",
          slidesToShow: 1,
        },
      },

      {
        breakpoint: 575,
        settings: {
          centerMode: true,
          centerPadding: "38px",
          slidesToShow: 1,
        },
      },

      {
        breakpoint: 425,
        settings: {
          centerMode: true,
          centerPadding: "13px",
          slidesToShow: 1,
        },
      },

      {
        breakpoint: 375,
        settings: {
          centerMode: true,
          centerPadding: "50px",
          slidesToShow: 1,
        },
      },
    ],
  });
});

// APIS FETCHING

// FOR COMMUNITY CHOICE
document.addEventListener("DOMContentLoaded", function () {
  // Fetch community choices on page load
  fetchCommunityChoices();

  function fetchCommunityChoices() {
    const apiUrl = "https://recipe.edevz.com/client/api/communityChoice.php";

    fetch(apiUrl)
      .then((response) => response.json())
      .then((data) => {
        if (data.success && Array.isArray(data.recommendations)) {
          updateCommunityContent(data.recommendations);
          initializeSlickSlider();
          addLikeButtonListeners(); // Add listeners for like buttons
        }
      })
      .catch((error) =>
        console.error("Error fetching community choices:", error)
      );
  }

  function updateCommunityContent(recipes) {
    const communityContent = document.getElementById("community-content");
    communityContent.innerHTML = "";

    recipes.forEach((recipe) => {
      const cardHtml = `
        <div class="card" data-recipe-id="${recipe.recipe_id}">
            <img src="${
              recipe.picture_url || "../assets/images/speghati.jpg"
            }" class="card-img-top img-fluid" alt="${recipe.title}">
            <div class="card-body">
                <h6 class="card-title d-flex justify-content-between">
                    ${recipe.title}
                    <span class="d-flex align-items-center">
                        <i class="fa-solid fa-star me-1" style="color: #FFD43B;"></i>
                        ${recipe.rating}
                    </span>
                </h6>
                <div class="card-btn">
                    <a href="#" class="text-decoration-none primary me-2">Button 1</a>
                    <a href="#" class="text-decoration-none primary">Button 2</a>
                </div>
                <div class="card-bottom d-flex mt-3">
                    <div class="likes-icon">
                        <i class="fa-regular fa-heart like-button" style="color: #e0525e;" data-liked="${
                          recipe.isLiked === "1"
                        }"></i>
                        <span>${recipe.total_likes}</span>
                    </div>
                    <div class="comments-icons ms-4">
                        <i class="fa-regular fa-message"></i>
                        <span>${recipe.total_comments}</span>
                    </div>
                    <div class="share-icon ms-4">
                        <i class="fa-regular fa-paper-plane"></i>
                        <span>${recipe.total_likes}</span>
                    </div>
                    <div class="save-icon ms-auto">
                        <i class="fa-regular fa-bookmark" style="color: #f6ddd7; background: var(--primary-color); padding: 8px 10px; border-radius: 5px;"></i>
                    </div>
                </div>
            </div>
        </div>
      `;

      communityContent.insertAdjacentHTML("beforeend", cardHtml);
    });
  }

  function initializeSlickSlider() {
    $(".slick-carousel-center_community").slick({
      centerMode: true,
      centerPadding: "482px",
      slidesToShow: 1,
      dots: false,
      arrows: false,
      autoplay: false,
      infinite: true,
      responsive: [
        {
          breakpoint: 1400,
          settings: {
            centerMode: true,
            centerPadding: "393px",
            slidesToShow: 1,
          },
        },
        {
          breakpoint: 1200,
          settings: {
            centerMode: true,
            centerPadding: "303px",
            slidesToShow: 1,
          },
        },
        {
          breakpoint: 992,
          settings: {
            centerMode: true,
            centerPadding: "183px",
            slidesToShow: 1,
          },
        },
        {
          breakpoint: 768,
          settings: {
            centerMode: true,
            centerPadding: "93px",
            slidesToShow: 1,
          },
        },
        {
          breakpoint: 575,
          settings: {
            centerMode: true,
            centerPadding: "35px",
            slidesToShow: 1,
          },
        },
        {
          breakpoint: 425,
          settings: {
            centerMode: true,
            centerPadding: "10px",
            slidesToShow: 1,
          },
        },
        {
          breakpoint: 375,
          settings: {
            centerMode: true,
            centerPadding: "9px",
            slidesToShow: 1,
          },
        },
        {
          breakpoint: 320,
          settings: {
            centerMode: true,
            centerPadding: "10px",
            slidesToShow: 1,
          },
        },
      ],
    });
  }

  function addLikeButtonListeners() {
    document.querySelectorAll(".like-button").forEach((button) => {
      button.addEventListener("click", function () {
        const isLiked = this.getAttribute("data-liked") === "true";
        const recipeId = this.closest(".card").getAttribute("data-recipe-id");
        const userId = sessionStorage.getItem("userId"); // Retrieve userId from sessionStorage

        if (!userId) {
          console.log("User not logged in");
          return; // Handle not logged in scenario as needed
        }

        if (isLiked) {
          unlikeRecipe(recipeId, this, userId);
        } else {
          likeRecipe(recipeId, this, userId);
        }
      });
    });
  }

  function likeRecipe(recipeId, button) {
    const apiUrl = "https://recipe.edevz.com/client/api/cmLike.php";
    const userId = sessionStorage.getItem("userId"); // Retrieve userId from sessionStorage

    fetch(apiUrl, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ recipe_id: recipeId, user_id: userId }),
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.json();
      })
      .then((data) => {
        if (data.success) {
          button.setAttribute("data-liked", "true");
          button.classList.remove("fa-regular");
          button.classList.add("fa-solid");
          const likesCount = button.nextElementSibling;
          likesCount.textContent = parseInt(likesCount.textContent) + 1;
        } else {
          console.error("Like failed", data);
        }
      })
      .catch((error) => console.error("Error liking recipe:", error));
  }

  function unlikeRecipe(recipeId, button, userId) {
    const apiUrl = "https://recipe.edevz.com/client/api/cmUnlike.php";

    fetch(apiUrl, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ recipe_id: recipeId, user_id: userId }),
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.json();
      })
      .then((data) => {
        if (data.success) {
          button.setAttribute("data-liked", "false");
          button.classList.remove("fa-solid");
          button.classList.add("fa-regular");
          const likesCount = button.nextElementSibling;
          likesCount.textContent = parseInt(likesCount.textContent) - 1;
        } else {
          console.error("Unlike failed", data);
        }
      })
      .catch((error) => console.error("Error unliking recipe:", error));
  }
});
// FOR COMMUNITY CHOICE

// FOR BLOGS SECTION
$(document).ready(function () {
  $.ajax({
    url: "https://recipe.edevz.com/client/api/blogs.php",
    type: "GET",
    dataType: "json",
    success: function (response) {
      if (response.success) {
        const blogPosts = response.blog_posts;
        let blogHTML = "";
        for (let i = 0; i < blogPosts.length && i < 4; i++) {
          const blog = blogPosts[i];
          if (i === 0) {
            $("#blog-container .left-side-col_bg .body .mb-0").text(
              blog.blog_title
            );
            $("#blog-container .left-side-col_bg .description .mb-0").text(
              blog.blog_description
            );
            $("#blog-container .left-side-col_bg .blog-btn a").attr(
              "href",
              blog.blog_image_url
            );
          } else {
            const imageURL = blog.blog_image_url
              ? blog.blog_image_url
              : "../assets/images/blog1.jpg";
            blogHTML += `
                          <div class="row">
                              <div class="card mb-3">
                                  <div class="row g-0">
                                      <div class="col-md-4 bg-image">
                                          <img src="${imageURL}" class="img-fluid rounded-start" alt="...">
                                      </div>
                                      <div class="col-md-8">
                                          <div class="card-body">
                                              <p class="card-title">${blog.blog_title}</p>
                                              <p class="card-text">${blog.blog_description}</p>
                                              <div class="right-side-card_btn mt-1">
                                                  <a href="#" class="btn btn-white">Read More</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      `;
          }
        }
        $("#blog-container .right-side_col").html(blogHTML);
      }
    },
    error: function (error) {
      console.error("Error fetching blog posts:", error);
    },
  });
});
// FOR BLOGS SECTION

// FOR QUICK EASY AND SWEET DESSERTS
document.addEventListener("DOMContentLoaded", function () {
  fetchQuickRecipes();
  fetchDessertsRecipes();

  function fetchDessertsRecipes() {
    const apiUrl = "https://recipe.edevz.com/client/api/sweetDesserts.php";

    fetch(apiUrl)
      .then((response) => response.json())
      .then((data) => {
        if (data.success && Array.isArray(data.results)) {
          updateDessertsContent(data.results);
        }
      })
      .catch((error) =>
        console.error("Error fetching desserts recipes:", error)
      );
  }

  function fetchQuickRecipes() {
    const apiUrl = "https://recipe.edevz.com/client/api/quickEasy.php";

    fetch(apiUrl)
      .then((response) => response.json())
      .then((data) => {
        if (data.success && Array.isArray(data.results)) {
          updateQuickContent(data.results);
        }
      })
      .catch((error) => console.error("Error fetching quick recipes:", error));
  }

  function updateDessertsContent(recipes) {
    const dessertsContent = document.getElementById("desserts-content");
    dessertsContent.innerHTML = "";

    // Limit to the first 3 recipes
    const limitedRecipes = recipes.slice(0, 3);

    limitedRecipes.forEach((recipe) => {
      const hasPicture = recipe.picture_url && recipe.picture_url.trim() !== "";
      const bgImage = hasPicture
        ? recipe.picture_url
        : "../assets/images/breakFast.jpg";

      const cardHtml = `
      <div class="card mb-3">
          <div class="row g-0">
              <div class="col-md-4 internal-colomns" style="background-image: url('${bgImage}'); background-size: cover; background-position: center;">
              </div>
              <div class="col-md-8">
                  <div class="card-body">
                      <h5 class="card-title">${recipe.title}</h5>
                      <p class="card-text primary">${recipe.calories} Calories</p>
                      <div class="left-side-card_btn">
                          <a href="#" class="btn btn-danger">Button</a>
                          <a href="#" class="btn btn-danger">Button</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  `;

      dessertsContent.insertAdjacentHTML("beforeend", cardHtml);
    });
  }

  function updateQuickContent(recipes) {
    const quickContent = document.getElementById("quick-easy-content");
    quickContent.innerHTML = "";

    // Limit to the first 3 recipes
    const limitedRecipes = recipes.slice(0, 3);

    limitedRecipes.forEach((recipe) => {
      const hasPicture = recipe.picture_url && recipe.picture_url.trim() !== "";
      const bgImage = hasPicture
        ? recipe.picture_url
        : "../assets/images/breakFast.jpg";

      const cardHtml = `
      <div class="row">
          <div class="col-12">
              <div class="card mb-3">
                  <div class="row g-0">
                      <div class="col-md-4 internal-colomns" style="background-image: url('${bgImage}'); background-size: cover; background-position: center;">
                      </div>
                      <div class="col-md-8">
                          <div class="card-body">
                              <h5 class="card-title">${recipe.title}</h5>
                              <p class="card-text primary">${recipe.time_to_cook} minutes to cook</p>
                              <div class="left-side-card_btn">
                                  <a href="#" class="btn btn-danger">Button</a>
                                  <a href="#" class="btn btn-danger">Button</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  `;

      quickContent.insertAdjacentHTML("beforeend", cardHtml);
    });
  }
});
// FOR QUICK EASY AND SWEET DESSERTS

// FOR FREQUENTLY ASKED QUESTIONS
$(document).ready(function () {
  $.ajax({
    url: "https://recipe.edevz.com/client/api/faq.php",
    method: "GET",
    dataType: "json",
    success: function (response) {
      if (response.success) {
        var faqs = response.faqs;
        var accordionContent = "";
        faqs.forEach(function (faq, index) {
          var itemId = "panelsStayOpen-collapse" + (index + 1);
          var headingId = "heading" + (index + 1);
          accordionContent += `
                      <div class="accordion-item">
                          <h2 class="accordion-header" id="${headingId}">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                  data-bs-target="#${itemId}" aria-expanded="false"
                                  aria-controls="${itemId}">
                                  ${faq.question}
                              </button>
                          </h2>
                          <div id="${itemId}" class="accordion-collapse collapse">
                              <div class="accordion-body">
                                  ${faq.answer}
                              </div>
                          </div>
                      </div>
                  `;
        });
        $("#accordionPanelsStayOpenExample").html(accordionContent);
      }
    },
    error: function (error) {
      console.log("Error fetching FAQs:", error);
    },
  });
});
// FOR FREQUENTLY ASKED QUESTIONS

// API FETCHING
