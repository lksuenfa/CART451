let advancedSearch = document.querySelector("#advSearchBtn");
let advContainer = document.querySelector("#advancedSearch-container");

let searchForm = document.querySelector("#searchForm");

advancedSearch.addEventListener("click", () => {
    advContainer.style.display = "block";
    advancedSearch.style.display = "none";
    searchForm.style.width = "100%";
})
