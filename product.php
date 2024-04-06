<?php
include_once "database.php";

include "header.php";

    $id = "";

    if (isset($_GET["id"])) {
        # code...
        $id = $_GET["id"];
    }
    echo $id;
    $query = "select * from elec where deviceid = $id";

    $productinfo = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($productinfo)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Info</title>
    <style>
        body {
            display: flex;
            flex-direction: row;
            margin: 0;
            height: 100vh;
        }
        .leftside, .rightside {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .leftside {
            background-color: aqua;
        }
        .rightside {
    background-color: bisque;
    flex-direction: column;
    padding: 20px;
    align-items: center; 
    justify-content: flex-start; 
    top: 0px;
}
        img {
            max-width: 100%;
            max-height: 100%;
            border: 1px solid black;
            border-radius: 5px;
        }
        h2, p, .buy-button {
            margin-bottom: 10px;
        }
        .buy-button {
            padding: 10px 20px;
            background-color: green;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="leftside">
        <img src="images/<?php echo $row['image'] ?>" alt="Product Image" style= "max-height: 500px">
    </div>
    <div class="rightside">
        <h2 class="deviceName"><?php echo $row['device']; ?></h2>
        <p><strong>Price:</strong> <?php echo $row['price']; ?></p>
        <p><strong>Description:</strong> <?php echo $row['description']; ?></p>
        <!-- You can add more details here if needed -->
        <button class="add-to-cart-button">Buy Now</button>
    </div>

    <script>
    // Function to handle adding a product to the cart
    function addToCart(productId) {
        // Retrieve the product information based on its ID
        var product = {
            id: productId,
            name: '<?php echo $row["device"]; ?>',
            price: <?php echo $row["price"]; ?>
            // Add more properties as needed
        };

        var cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Add the product to the cart
        cart.push(product);

        // Save the updated cart to local storage
        localStorage.setItem('cart', JSON.stringify(cart));

        console.log("Cart updated:", cart);    }

    // Event listener to add product to cart when the "Buy Now" button is clicked
    document.addEventListener('DOMContentLoaded', function() {
        var addToCartButtons = document.querySelectorAll('.add-to-cart-button');
        addToCartButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Extract the product ID from the button's data attribute or any other method
                var productId = button.getAttribute('data-product-id');
                addToCart(productId);
            });
        });
    });
</script>

</body>
</html>

<?php

?>
