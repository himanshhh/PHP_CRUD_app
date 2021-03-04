 //user name validation starts
 function dish_validation(){
    'use strict';
    var dish_name = document.getElementById("name");
    var dish_value = document.getElementById("name").value;
    var letters = /^[a-zA-Z]+$/;
    if(!dish_value.match(letters))
    {
    document.getElementById('name_err').innerHTML = '!DISH MUST BE ALPHABETIC CHARACTERS ONLY!';
    dish_name.focus();
    document.getElementById('name_err').style.color = "black";
    document.getElementById('name_err').style.backgroundColor = "red";

    }
    else
    {
    document.getElementById('name_err').innerHTML = 'Valid dish';
    document.getElementById('name_err').style.color = "black";
    document.getElementById('name_err').style.backgroundColor = "green";
    }
    }

    function price_validation(){
      'use strict';
      var dish_price = document.getElementById("price");
    var dish_value = document.getElementById("price").value;
    var numbers = /^(?:[3-9]|[1-4][0-9])$/;

    if(!dish_value.match(numbers))
    {
    document.getElementById('price_err').innerHTML = '!PRICE MUST BE BETWEEN 3 & 49 EUROS ONLY!';
    dish_price.focus();
    document.getElementById('price_err').style.color = "black";
    document.getElementById('price_err').style.backgroundColor = "red";
    }
    else
    {
    document.getElementById('price_err').innerHTML = 'Valid price';
    document.getElementById('price_err').style.color = "black";
    document.getElementById('price_err').style.backgroundColor = "green";
    }
    }

    


