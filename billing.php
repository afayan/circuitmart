<!-- billing.html -->
<?php 
    include "header.php";
    $_SESSION['flag'] = 0;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
    <link rel="stylesheet" href="elec.css">
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
    <div id="cartItems" style="display: flex; flex-direction:row; margin-top:10px">
    </div>
    </div>


    <div style="
     background: linear-gradient(135deg, rgba(30, 64, 80, 0.403), rgba(16, 110, 187, 0.227));
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-radius: 0px;
    border:1px solid rgba(255, 255, 255, 0.18);
    box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
    width: 400px; bottom:0px; position:absolute; height:40%; padding:20px; border-radius:10px; margin:10px">
    <p class="total" style="font-family: Arial, Helvetica, sans-serif;"></p>
    <button class="billingButtons" onclick="checkOut()">checkout</button>
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

    var amount = 0;

    var totalprice = 0;

    function renderItems() {
    let cartItemRenderings = '';
    totalprice = 0; // Reset total price

    for (let i = 0; i < cart.length; i++) {
        const name = cart[i].name;
        const price = cart[i].price;
        const html = `<div class="cartItemCards">
                        <p class = "texty"; >${name}</p>
                        <p class = "texty"; >Item price = ${price}</p>
                        <button onclick="deleteItem(${i});" class = "delbuttons">Delete</button>
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

function checkOut(){
    //localStorage.clear();
    localStorage.setItem('readyCart', JSON.stringify(cart));
    localStorage.setItem('TotalAmount', JSON.stringify(totalprice));
    document.cookie = "amount = "+totalprice;

    window.location.href = "checkout.php";
}

renderItems(); // Call renderItems initially to display the cart

    </script>
</body>
</html>
<?php
//$_SESSION['toPay'] = $price;
?>
