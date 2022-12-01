let addIngBtn = document.querySelector("#addIngBtn");
let container = document.querySelector("#ing-container");

addIngBtn.addEventListener("click", () => {
    console.log("click");

    //    create new list item
    let newList = document.createElement("li");
    container.appendChild(newList);


    // create new label for ingredient name
    let newIngName = document.createElement("label");
    let labelText1 = document.createTextNode("Name :");
    newList.appendChild(newIngName);
    newIngName.appendChild(labelText1);
    newIngName.className = "ingName";
    newIngName.setAttribute("for", "ingName");

    // new input for ingredient name
    let newInput_name = document.createElement("input");
    newList.appendChild(newInput_name);
    newInput_name.setAttribute("type", "text");
    newInput_name.setAttribute("name", "ingName");

    // new label for ingredient qty
    let newIngQty = document.createElement("label");
    let labelText2 = document.createTextNode("Quantity :");
    newList.appendChild(newIngQty);
    newIngQty.appendChild(labelText2);
    newIngQty.setAttribute("for", "ingQty");




    // new input for ingredient qty
    let newInput_qty = document.createElement("input");
    newList.appendChild(newInput_qty);
    newInput_qty.setAttribute("type", "number");
    newInput_qty.setAttribute("name", "ingQty");
    newInput_qty.setAttribute("min", "0");
    newInput_qty.setAttribute("max", "1000");
    newInput_qty.setAttribute("step", "0.01");

    // new label for ingredient qty
    let newIngUnit = document.createElement("select");
    newList.appendChild(newIngUnit);
    newIngUnit.className = "units";
    newIngUnit.setAttribute("name", "ingQtyUnit");


    // add units to select options
    let units = ["g", "kg", "ml", "l", "cup", "unit", "tbsp", "tsp"];

    for (let i = 0; i < units.length; i++) {
        let newUnit = document.createElement("option");
        newIngUnit.appendChild(newUnit);
        newUnit.appendChild(document.createTextNode(units[i]));
        newUnit.setAttribute("value", units[i]);
    }

});