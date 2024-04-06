<?php
    require_once "database.php";
    include "header.php";

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
                $filter = "SELECT * FROM elec WHERE performance = '$performance' AND price $price AND storage = '$storage' AND device LIKE '%$keyword%' AND type = '$type'; ";
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
    }}
    ?>
    </div>


            <script src="backend.js"></script>

        </body>

</html>
