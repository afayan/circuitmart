<?php
    require_once "database.php";
    include "header.php";
    include "cktmart.php";

    $sql = "SELECT * FROM elec";
    $phones = "SELECT * FROM elec WHERE type = 'phone';";
    $laptops = "SELECT * FROM elec WHERE type = 'laptop';";

    $phoneList = mysqli_query($conn, $phones);
    $laptopList = mysqli_query($conn, $laptops);
    $all_product = $conn->query($sql);

    $counter = 0;
    echo "Hello";
  //session_start();
    $devId = 0;
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECelec</title>
    <link rel="stylesheet" href="elec.css">
</head>
<body style="margin: 0px; background-color: grey;">


    <div class="video-container">
      <video autoplay muted src="images/cktmartvideo.mp4"></video>
  </div>
  <h1 class="titles">Popular</h1>

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

   $getPopularProducts = "  SELECT *
   FROM elec
   WHERE deviceid IN (
       SELECT product_id
       FROM (
           SELECT product_id, AVG(rating) AS average
           FROM rating
           GROUP BY product_id
       ) AS t
       WHERE average > (
           SELECT AVG(average)
           FROM (
               SELECT product_id, AVG(rating) AS average
               FROM rating
               GROUP BY product_id
           ) AS t
       )
   );";


   $popularProductsresult = mysqli_query($conn, $getPopularProducts);
   


    while($row = mysqli_fetch_assoc($popularProductsresult)){
      
      if ($counter < 6) {
        # code...
      
      $counter++;
    ?>

<div class="newcard" style="width: 180px;">  <a href="product.php?id=<?php echo $row["deviceid"];  ?>" style= "text-decoration: none; color:black"> 
        <img src= "images/<?php echo $row["image"] ?>"  alt="Product Image" class="product-image">
        <h3 class="product-name" style="font-family: Arial, Helvetica, sans-serif;">
        <?php echo $row["device"] ?>
    </h3>
        <p class="product-price">
        &#8377 <?php echo $row["price"] ?>
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



    <h1 class="titles">Phones</h1>

<div class="cardRow" style="margin-top: 30px;">
  <?php

  $count2 = 0;
  while($row = mysqli_fetch_assoc($phoneList)){
    
    if($count2 < 8){
      $count2++;
    
  ?>

<div class="newcard" style="width: 180px;">  <a href="product.php?id=<?php echo $row["deviceid"];  ?>" style= "text-decoration: none; color:black"> 
        <img src= "images/<?php echo $row["image"] ?>"  alt="Product Image" class="product-image">
        <h3 class="product-name" style="font-family: Arial, Helvetica, sans-serif;">
        <?php echo $row["device"] ?>
    </h3>
        <p class="product-price">
        &#8377
        <?php echo $row["price"] ?>
        </p>

        <p class="descript" style="color:gray">
        <?php echo $row["description"] ?>      
        </p>

        </a>
    </div>
  <?php
  }}
  ?>

<a href="typepage.php?type=phone" class="newcard" class="newcard" style="text-decoration: none; width:45px">
    more
  </a>
  </div>



  <h1 class="titles">Laptops</h1>

<div class="cardRow" style="margin-top: 30px;">
  <?php

  $count3 = 0;
  while($row = mysqli_fetch_assoc($laptopList)){   

    if($count3 < 8){
      $count3++;
  ?>

<div class="newcard" style="width: 180px;">  <a href="product.php?id=<?php echo $row["deviceid"];  ?>" style= "text-decoration: none; color:black;"> 
        <img src= "images/<?php echo $row["image"] ?>"  alt="Product Image" class="product-image">
        <h3 class="product-name" style="font-family: Arial, Helvetica, sans-serif;">
        <?php echo $row["device"] ?>
    </h3>
        <p class="product-price">
        &#8377
        <?php echo $row["price"] ?>
        </p>
        <p class="descript" style="color:gray">
        <?php echo $row["description"] ?>      
        </p>
        </a>
    </div>
  <?php
  }    }

  ?>
  <a href="typepage.php?type=laptop" class="newcard" style="text-decoration: none; width:45px">
    more
  </a>
  </div>

    <script src="backend.js"></script>

</body>
</html>