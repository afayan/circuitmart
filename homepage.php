<?php
    require_once "database.php";

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
  <div class="topbar" >
    <p style="font-size: 20px; margin-left: 15px; font-family:Verdana, Geneva, Tahoma, sans-serif; color: white; margin-right:-30px ;">Circuit Mart</p>
    <div style="width: 30%; display: flex; flex: 1;"></div>
    <div>
        <button class="topbutton" onclick="dropProfile()">Profile</button>
        <button class="topbutton" onclick="saveCart()">Cart</button>
    </div>
</div>

    <div class="sidebar">       
        <button class="button" onclick="window.location.href='homepage.php'">
            <span class="button-content" >Home </span>
          </button>
          <button class="button" onclick="window.location.href='sell.php'">
            <span class="button-content">Sell </span>
          </button>
          <button class="button">
            <span class="button-content">Offers </span>
          </button>
          <button class="button">
            <span class="button-content">Service </span>
          </button>
          <button class="button" onclick="window.location.href='filters.php'">
            <span class="button-content"  >Laptops </span>
          </button>
          <button class="button" onclick="window.location.href='filters.php'">
            <span class="button-content"  >Mobiles </span>
          </button>
          <button class="button" onclick="window.location.href='filters.php'">
            <span class="button-content" >Filter </span>
          </button>
             
          
     
    </div>


    <div class="video-container">
      <video autoplay muted src="images/ecelec2.mp4"></video>
  </div>
  <h1 class="titles">For you</h1>

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
    while($row = mysqli_fetch_assoc($all_product)){
      
      if ($counter < 6) {
        # code...
      
      $counter++;
    ?>

<div class="newcard" style="width: 40px;">  <a href="product.php?id=<?php echo $row["deviceid"];  ?>" > 
        <img src= "images/<?php echo $row["image"] ?>"  alt="Product Image" class="product-image">
        <h3 class="product-name" style="font-family: Arial, Helvetica, sans-serif;">
        <?php echo $row["device"] ?>
    </h3>
        <p class="product-price">
        <?php echo $row["price"] ?>
        </p>
        <button class="add-to-cart-button">Add to Cart</button>

        </a>
    </div>
    <?php
    }}
    ?>
    </div>



    <h1 class="titles">Phones</h1>

<div class="cardRow" style="margin-top: 30px;">
  <?php
  while($row = mysqli_fetch_assoc($phoneList)){   
  ?>

<div class="newcard" style="width: 40px;">
      <img src= "images/<?php echo $row["image"] ?>"  alt="Product Image" class="product-image">
      <h3 class="product-name" style="font-family: Arial, Helvetica, sans-serif;">
      <?php echo $row["device"] ?>
  </h3>
      <p class="product-price">
      <?php echo $row["price"] ?>
      </p>
      <button class="add-to-cart-button">Add to Cart</button>
  </div>
  <?php
  }
  ?>
  </div>



  <h1 class="titles">Laptops</h1>

<div class="cardRow" style="margin-top: 30px;">
  <?php
  while($row = mysqli_fetch_assoc($laptopList)){   
  ?>

<div class="newcard" style="width: 40px;">
      <img src= "images/<?php echo $row["image"] ?>"  alt="Product Image" class="product-image">
      <h3 class="product-name" style="font-family: Arial, Helvetica, sans-serif;">
      <?php echo $row["device"] ?>
  </h3>
      <p class="product-price">
      <?php echo $row["price"] ?>
      </p>
      <button class="add-to-cart-button">Add to Cart</button>
  </div>
  <?php
  }
  ?>
  </div>

    <script src="backend.js"></script>

</body>
</html>