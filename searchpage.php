<?php
include "database.php";
include "header.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filters</title>
    <link rel="stylesheet" href="elec.css">
    </head>
<body style="margin: 0px; background-color: grey;">

<h1 style="margin-top: 150px;" class="texty">Search</h1>
<form action="searchpage.php" method="POST">
<input type="text" name="searchQuery" class="inputFilter">
<button type="submit" class="fb" >Search</button>
</form>
<div class="cardRow" style="margin-top: 30px; margin-left: 10px ">
<?php

if (isset($_POST["searchQuery"])) {
    # code...

    $word = $_POST["searchQuery"];

    $toSearch = "SELECT * FROM elec WHERE device LIKE '%$word%'";
}


else{
    $toSearch = "select * from elec;";
}
    $returnedResult = mysqli_query($conn,$toSearch);
    while( $row = mysqli_fetch_assoc($returnedResult)){  
    
?>

<div class="newcard" style="width: 180px;">  <a href="product.php?id=<?php echo $row["deviceid"];  ?>" style= "text-decoration: none; color:black"> 
        <img src= "images/<?php echo $row["image"] ?>"  alt="Product Image" class="product-image">
        <h3 class="product-name" style="font-family: Arial, Helvetica, sans-serif;">
        <?php echo $row["device"] ?>
    </h3>
        <p class="product-price">
        <?php echo $row["price"] ?>
        </p>

        <p class="descript" style="color:gray">
        <?php echo $row["description"] ?>      
        </p>
        <button class="add-to-cart-button">Add to Cart</button>

        </a>
    </div>
<?php
    }
    ?>

</div>
<script src="backend.js"></script>

</body>

</html>

