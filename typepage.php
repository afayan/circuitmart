<?php

use function PHPSTORM_META\type;

include "database.php";
include "header.php";


$type = "";

echo "hell";

if (isset($_GET["type"])) {
    # code...

    $type = $_GET["type"];
    echo $type;

    $query_for_get_type = "select * from elec where type = '$type'";

    $type_sorted = mysqli_query($conn, $query_for_get_type);

?>
    <h1 class="titles" style="top: 120px; margin-top:140px"><?= $type ?>s</h1>

  <div class="cardRow" style=" display: flex;
    flex-direction: row;
    flex-wrap: wrap; /* Allow flex items to wrap onto multiple lines */
    justify-content: flex-start;
    height: max-content;
    background-color: rgb(68, 68, 68);
    z-index: 20px;
    top: 90px;
    margin: 10px;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.18);
    box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);">
    <?php
    while($row = mysqli_fetch_assoc($type_sorted)){
      

    ?>

<div class="newcard" style="width: 180px;">  <a href="product.php?id=<?php echo $row["deviceid"];  ?>" style= "text-decoration: none; color:black"> 
        <img src= "images/<?php echo $row["image"] ?>"  alt="Product Image" class="product-image">
        <h3 class="product-name" style="font-family: Arial, Helvetica, sans-serif;">
        <?php echo $row["device"] ?>
    </h3>
        <p class="product-price">
        <?php echo $row["price"] ?>
        </p>
      <!--  <button class="add-to-cart-button">Add to Cart</button>  -->


      <p class="descript" style="color:gray">
        <?php echo $row["description"] ?>      
        </p>
        </a>
    </div>
    <?php
    }}
    ?>
    </div>


?>

