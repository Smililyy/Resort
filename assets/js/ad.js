const allSideMenu = document.querySelectorAll("#sidebar .side-menu.top li a");

allSideMenu.forEach((item) => {
  const li = item.parentElement;
  item.addEventListener("click", function () {
    allSideMenu.forEach((i) => {
      i.parentElement.classList.remove("active");
    });
    li.classList.add("active");
  });
});

// TOGGLE SIDEBAR
const menuBar = document.querySelector("#content nav .bx.bx-menu");
const sidebar = document.getElementById("sidebar");

menuBar.addEventListener("click", function () {
  sidebar.classList.toggle("hide");
});

const searchButton = document.querySelector(
  "#content nav form .form-input button"
);
const searchButtonIcon = document.querySelector(
  "#content nav form .form-input button .bx"
);
const searchForm = document.querySelector("#content nav form");

searchButton.addEventListener("click", function (e) {
  if (window.innerWidth < 576) {
    e.preventDefault();
    searchForm.classList.toggle("show");
    if (searchForm.classList.contains("show")) {
      searchButtonIcon.classList.replace("bx-search", "bx-x");
    } else {
      searchButtonIcon.classList.replace("bx-x", "bx-search");
    }
  }
});

if (window.innerWidth < 768) {
  sidebar.classList.add("hide");
} else if (window.innerWidth > 576) {
  searchButtonIcon.classList.replace("bx-x", "bx-search");
  searchForm.classList.remove("show");
}

window.addEventListener("resize", function () {
  if (this.innerWidth > 576) {
    searchButtonIcon.classList.replace("bx-x", "bx-search");
    searchForm.classList.remove("show");
  }
});

const switchMode = document.getElementById("switch-mode");

switchMode.addEventListener("change", function () {
  if (this.checked) {
    document.body.classList.add("dark");
  } else {
    document.body.classList.remove("dark");
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const menuItems = document.querySelectorAll(".menu-item");
  const contentItems = document.querySelectorAll(".content-item");

  menuItems.forEach((item) => {
    item.addEventListener("click", function () {
      const dataContent = item.getAttribute("data-content");
      contentItems.forEach((contentItem) => {
        contentItem.style.display = "none";
      });
      const selectedContent = document.getElementById(dataContent);
      if (selectedContent) {
        selectedContent.style.display = "block";
      }
    });
  });
});

const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const tabs = $$(".menu-item");
const panes = $$(".content-item");

tabs.forEach(function (tab, index) {
  tab.onclick = function () {
    $(".menu-item.active").classList.remove("active");
    $(".content-item.active").classList.remove("active");

    this.classList.add("active");
    panes[index].classList.add("active");
  };
});

