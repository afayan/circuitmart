<!-- billing.html -->
<?php 
   // include "header.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
</head>
<body style="background-color: grey;">
    <h1>Shopping Cart</h1>
    <div id="cartItems" style="display: flex; flex-direction:row">

    </div>

    
    <script>
        function getCartFromLocalStorage() {
    var finalcart = JSON.parse(localStorage.getItem('finalCart'));
    return finalcart;
    }

    
    cart = getCartFromLocalStorage()
    cartItems = document.querySelector('#cartItems')

    function renderItems(){

        let cartItemRenderings = ''

        for(i = 0; i< cart.length; i++){
        const name = cart[i].name;
        const info = cart[i];
        const html = `<div><p>name = ${name}</p>
        <p>Item price</p>
        <button onclick="cart.splice(${i},1);renderItems()
        ">Delete</button></div>`

        cartItemRenderings+=html;

        cartItems.innerHTML = cartItemRenderings
    }
    }

    renderItems()
    </script>
</body>
</html>

