let advancedSearch = document.querySelector("#advSearchBtn");
let advContainer = document.querySelector("#advancedSearch-container");

let product = document.querySelectorAll(".product");

$(document).ready(function () {
    advancedSearch.addEventListener("click", () => {
        advContainer.style.display = "block";
        advancedSearch.style.display = "none";
        searchForm.style.width = "100%";
    });


    product.forEach(item => {
        item.addEventListener("mouseover", () => {
            console.log("click");

            let data = item.id;
            console.log(data);

            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "recipe.php",
                data: data,
                processData: false, //prevents from converting into a query string
                /*contentType option to false is used for multipart/form-data forms that pass files.
                When one sets the contentType option to false, it forces jQuery not to add a Content-Type header, otherwise, the boundary string will be missing from it.
                Also, when submitting files via multipart/form-data, one must leave the processData flag set to false, otherwise, jQuery will try to convert your FormData into a string, which will fail. */

                /*contentType: "application/x-www-form-urlencoded; charset=UTF-8", // this is the default value, so it's optional*/

                contentType: false, //contentType is the type of data you're sending,i.e.application/json; charset=utf-8
                cache: false,
                timeout: 600000,
                success: function (response) {
                    //response is a STRING (not a JavaScript object -> so we need to convert)
                    console.log("we had success!");
                    console.log(response);
                    //use the JSON .parse function to convert the JSON string into a Javascript object
                    // let parsedJSON = JSON.parse(response);
                    // console.log(parsedJSON);



                },
                error: function () {
                    console.log("error occurred");
                }
            });

        })
    });


});
