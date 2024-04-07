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
            flex-direction: column;
            padding-top: 180px;
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
        }
        .rightside {
    flex-direction: column;
    padding: 20px;
    align-items: center; 
    justify-content: flex-start; 
    top: 260px;
    height: 60%;
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

        .deviceName{
            top: 90px;
        }
    </style>
</head>
<body >

<div style="display: flex; flex-direction:row">
    <div class="leftside">
        <img src="images/<?php echo $row['image'] ?>" alt="Product Image" style= "max-height: 500px;">
    </div>
    <div class="rightside">
        <h2 class="deviceName"><?php echo $row['device']; ?></h2>
        <p><strong>Price:</strong> <?php echo $row['price']; ?></p>
        <p><strong>Description:</strong> <?php echo $row['description']; ?></p>
        <!-- You can add more details here if needed -->
        <button class="add-to-cart-button">Add to Cart</button>
    </div>

    </div>
    <h1>Related</h1>

    <div class="cardRow" style="margin-top: 30px; margin-left: 10px ">

    <?php
    $type = $row['type'];

    $relatedQuery = "select * from elec where type = '$type';";

    $relatedItems = mysqli_query($conn, $relatedQuery);
    
    while( $nrow = mysqli_fetch_assoc($relatedItems)){ 

    ?>

<div class="newcard" style="width: 180px;">  <a href="product.php?id=<?php echo $nrow["deviceid"];  ?>" style= "text-decoration: none; color:black"> 
        <img src= "images/<?php echo $nrow["image"] ?>"  alt="Product Image" class="product-image">
        <h3 class="product-name" style="font-family: Arial, Helvetica, sans-serif;">
        <?php echo $nrow["device"] ?>
    </h3>
        <p class="product-price">
        <?php echo $nrow["price"] ?>
        </p>

        <p class="descript" style="color:gray">
        <?php echo $nrow["description"] ?>      
        </p>
        <button class="add-to-cart-button">Add to Cart</button>

        </a>
    </div>
    <?php
    }
    ?>

</div>



    <script>
    // Function to handle adding a product to the cart
    function addToCart(productId) {
        // Retrieve the product information based on its ID
        var product = {
            id: productId,
            name :'<?php echo $row["device"]; ?>',
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
