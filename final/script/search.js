let advancedSearch = document.querySelector("#advSearchBtn");
let advContainer = document.querySelector("#advancedSearch-container");

let product = document.querySelectorAll(".product");

$(document).ready(function () {
    advancedSearch.addEventListener("click", () => {
        advContainer.style.display = "block";
        advancedSearch.style.display = "none";
        searchForm.style.width = "100%";
    });

    // submit form
    $("#searchForm").submit(function (event) {


        event.preventDefault();
        console.log("submit Search");


        let form = $('#searchForm')[0];
        let data = new FormData(form);

        $.ajax({
            type: "POST",
            enctype: 'text/plain',
            url: "query.php",
            data: data,
            processData: false, //prevents from converting into a query string
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (response) {
                // console.log(response);
                //use the JSON .parse function to convert the JSON string into a Javascript object
                let queryData = JSON.parse(response);
                console.log(queryData);
                // console.log(document.getElementById("catDish"));
                // displayResponse(parsedJSON);

                // console.log(queryData[0]["descript"]);


                let catDish = document.querySelector("#catDish");
                let grid = document.querySelector("#grid-wrapper");


                for (let i = 0; i < queryData.length; i++) {
                    // create new button 
                    let newBtn = document.createElement("button");
                    // fill button with description text


                    if (i == 0) {
                        let node = document.createTextNode(queryData[i].descript);
                        newBtn.appendChild(node);
                        catDish.appendChild(newBtn);
                    }

                    if (i > 0) {
                        // if general descript are similar to the one before do not show
                        if (queryData[i].descript !== queryData[i - 1].descript) {
                            let node = document.createTextNode(queryData[i].descript);
                            newBtn.appendChild(node);
                            catDish.appendChild(newBtn);
                        }
                    }

                    let newLink = document.createElement("a");
                    let newFig = document.createElement("figure");
                    let newCaption = document.createElement("figcaption");
                    let newImg = document.createElement("img");

                    newLink.href = `recipeQuery.php?recipe=${queryData[i].recipeID}`;
                    newLink.id = queryData[i].recipeID;
                    newLink.classList.add("product");

                    grid.appendChild(newLink);
                    newLink.appendChild(newFig);
                    newFig.appendChild(newImg);
                    newImg.classList.add("productImg");
                    let imgPath = queryData[i].recipeImg;
                    let imgPathRev = imgPath.replace('"', '');
                    newImg.src = imgPathRev;

                    newFig.appendChild(newCaption);
                    newCaption.classList.add("productTitle");
                    let captionTxt = document.createTextNode(queryData[i].recipeName);
                    newCaption.appendChild(captionTxt);


                    newBtn.addEventListener("click", () => {
                        // console.log(queryData[i].descript);

                        // delete all existing products
                        let products = document.querySelectorAll(".product");
                        products.forEach(item => {
                            item.remove();
                        })

                        let clickedTag = queryData[i].descript;

                        if (queryData[i].descript == clickedTag) {
                            newLink.classList.add("product");

                            grid.appendChild(newLink);
                            newLink.appendChild(newFig);
                            newFig.appendChild(newImg);
                            newImg.classList.add("productImg");
                            newImg.src = imgPathRev;
                            newFig.appendChild(newCaption);
                            newCaption.classList.add("productTitle");
                        }


                    });
                    $("#searchForm")[0].reset();
                }
            },
            error: function () {
                console.log("error occurred");
            }
        });


    });


    product.forEach(item => {
        item.addEventListener("click", () => {
            console.log("click");


        });
        $.ajax({
            url: "recipeQuery.php",
            type: 'GET',
            dataType: 'json', // added data type
            success: function (response) {
                console.log(response);
                let queryData = JSON.parse(response);
                console.log(queryData);
            }
        });

    })
});


// });
