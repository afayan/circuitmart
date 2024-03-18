<?php
    require_once "database.php";

    $sql = "SELECT * FROM elec";
    $all_product = $conn->query($sql);
    echo "Hello";
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filters</title>
    <link rel="stylesheet" href="elec.css">

    <style>
        .categories{
            font-family: Arial, Helvetica, sans-serif;
            padding: 10px;
            padding-top: 0px;
            padding-bottom: 0px;
        }
    </style>
</head>
<body style="margin: 0px; background-color: grey;">
    <label class="cyberpunk-checkbox-label">
        <input type="checkbox" class="cyberpunk-checkbox">
        Check me</label>



        <div class="topbar" >
            <p style="font-size: 20px; margin-left: 15px; font-family:Verdana, Geneva, Tahoma, sans-serif; color: white; margin-right:-30px ;">EC Elec</p>
            <form class="form">
                <label for="search">
                    <input required="" autocomplete="off" placeholder="Search electronics" id="search" type="text">
                    <div class="icon">
                        <svg stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="swap-on">
                            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linejoin="round" stroke-linecap="round"></path>
                        </svg>
                        <svg stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="swap-off">
                            <path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-linejoin="round" stroke-linecap="round"></path>
                        </svg>
                    </div>
                    <button type="reset" class="close-btn">
                        <svg viewBox="0 0 20 20" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" fill-rule="evenodd"></path>
                        </svg>
                    </button>
                </label>
            </form>
            <div style="width: 30%; display: flex; flex: 1;"></div>
            <div>
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

            <div class="filterBar">

                <form action="filters.php" method="post">


                    <h1>Device type</h1>
                    <div style="display: flex; flex-direction:row">
                    <div style="display: flex; flex-direction:row">
                    <p class="categories">Laptop</p>
                    <input type="radio" name="type" value="laptop">
                    </div>

                    <div style="display: flex; flex-direction:row">
                    <p class="categories">Phone</p>
                    <input type="radio" name="type" value="phone">
                    </div>

                    <div style="display: flex; flex-direction:row">
                    <p class="categories">other</p>
                    <input type="radio" name="type" value="other">
                    </div>
                    </div>


                    <h1>Performance</h1>
                    <div style="display: flex; flex-direction:row">
                    <div style="display: flex; flex-direction:row">
                    <p class="categories">Low</p>
                    <input type="radio" name="performance" value="low">
                    </div>

                    <div style="display: flex; flex-direction:row">
                    <p class="categories">Medium</p>
                    <input type="radio" name="performance" value="medium">
                    </div>

                    <div style="display: flex; flex-direction:row">
                    <p class="categories">High</p>
                    <input type="radio" name="performance" value="high">
                    </div>
                    </div>

                    <h1>Price</h1>
                    <div style="display: flex; flex-direction:row">
                    <div style="display: flex; flex-direction:row">
                    <p class="categories">Low</p>
                    <input type="radio" name="price" value="<15000">
                    </div>

                    <div style="display: flex; flex-direction:row">
                    <p class="categories">Medium</p>
                    <input type="radio" name="price" value=">15000 AND price <50000">
                    </div>

                    <div style="display: flex; flex-direction:row">
                    <p class="categories">High</p>
                    <input type="radio" name="price" value=">50000">
                    </div>
                    </div>
                    
                    <h1>Storage</h1>
                    <div style="display: flex; flex-direction:row">
                    <div style="display: flex; flex-direction:row">
                    <p class="categories">Low</p>
                    <input type="radio" name="storage" value="low">
                    </div>

                    <div style="display: flex; flex-direction:row">
                    <p class="categories">Medium</p>
                    <input type="radio" name="storage" value="medium">
                    </div>

                    <div style="display: flex; flex-direction:row">
                    <p class="categories">High</p>
                    <input type="radio" name="storage" value="high">
                    </div>
                    </div>

                    <input type="text" placeholder="any keywords?" name="keywords">

                    <button class="LetsFilter" onclick="LetsFilter()" type="submit" name="filter"> Lets Filter </button>

               </form>

                
            </div>

            <h1 class="titles" style="margin-left: 300px; margin-top: 130px;">Filtered</h1>

    <div class="cardRow" style="margin-top: 30px; margin-left: 310px ">
        <?php

        if(isset($_POST["filter"])){

            echo $performance = $_POST["performance"];
            echo $price = $_POST["price"];
            echo $storage = $_POST["storage"];
            echo $keyword = $_POST["keywords"];
            echo $type = $_POST["type"];

            
            if($keyword!=null){
                $filter = "SELECT * FROM elec WHERE performance = '$performance' AND price $price AND storage = '$storage' AND device = '$keyword' AND type = '$type'; ";
             }

             else{
                $filter = "SELECT * FROM elec WHERE performance = '$performance' AND price $price AND storage = '$storage' AND type = '$type';; ";
             }
            //$filter = "SELECT * from elec WHERE performance = '$performance' ;"; //filter query here

            $filteredresult = mysqli_query($conn, $filter);

           

            //echo $filteredresult;
           // echo "Cktmart";
        ?>

<?php
    while( $row = mysqli_fetch_assoc($filteredresult)){   
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
    }}
    ?>
    </div>


            <script src="backend.js"></script>

        </body>

</html>
