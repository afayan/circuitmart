<!-- billing.html -->
<?php 
    include "header.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
    <style>
        .cartItemCards{
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            margin: 10px;
        }

    </style>
</head>
<body style="background-color: grey;">
    <div style="margin-left: 40px;">
    <h1 style="margin-top: 180px;">Shopping Cart</h1>
    <div id="cartItems" style="display: flex; flex-direction:row; background-color:aqua; margin-top:10px">
    </div>
    </div>


    <div style="background-color: yellow; width: 400px; bottom:0px; position:absolute; height:40%; padding:20px; border-radius:10px; margin:10px">
    <p class="total"></p>
    <button class="billingButtons">checkout</button>
    </div>


    
    <script>
        function getCartFromLocalStorage() {
    var finalcart = JSON.parse(localStorage.getItem('cart'));
    return finalcart;
    }

    function updateCartInStorage(cartNew){
        localStorage.setItem('cart', JSON.stringify(cartNew));
    }

    
    cart = getCartFromLocalStorage()
    cartItems = document.querySelector('#cartItems')
    total = document.querySelector('.total')

    var totalprice = 0;

    function renderItems() {
    let cartItemRenderings = '';
    totalprice = 0; // Reset total price

    for (let i = 0; i < cart.length; i++) {
        const name = cart[i].name;
        const price = cart[i].price;
        const html = `<div class="cartItemCards">
                        <p>${name}</p>
                        <p>Item price = ${price}</p>
                        <button onclick="deleteItem(${i});">Delete</button>
                      </div>`;
        cartItemRenderings += html;
        totalprice += price;
    }

    cartItems.innerHTML = cartItemRenderings;
    total.textContent = `Total price: ${totalprice}`;
    
}

function deleteItem(index) {
    cart.splice(index, 1);
    renderItems(); // Update the cart display after deletion
    localStorage.setItem('cart', JSON.stringify(cart));
}

renderItems(); // Call renderItems initially to display the cart

    </script>
</body>
</html>

