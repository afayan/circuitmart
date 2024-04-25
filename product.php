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
            justify-items: flex-start;
            align-items: center;
        }
        .leftside {
            max-height: 600px;
            flex-direction: column;
        }
        .rightside {
        
        margin-top: 0px;    
        font-family: Arial, Helvetica, sans-serif;
        flex-direction: column;
        padding: 20px;
        align-items: center; 
        justify-content: flex-start; 
        top: 0px;
        height: 98%;
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


        .rating {
  display: inline-block;
}

.rating input {
  display: none;
}

.rating label {
  float: right;
  cursor: pointer;
  color: #ccc;
  transition: color 0.3s;
}

.rating label:before {
  content: '\2605';
  font-size: 30px;
}

.rating input:checked ~ label,
.rating label:hover,
.rating label:hover ~ label {
  color: #6f00ff;
  transition: color 0.3s;
}


.rateStars:not(:checked) > input {
  position: absolute;
  appearance: none;
}

.rateStars:not(:checked) > label {
  float: right;
  cursor: pointer;
  font-size: 30px;
  color: #666;
}

.rateStars:not(:checked) > label:before {
  content: '★';
}

.rateStars > input:checked + label:hover,
.rateStars > input:checked + label:hover ~ label,
.rateStars > input:checked ~ label:hover,
.rateStars > input:checked ~ label:hover ~ label,
.rateStars > label:hover ~ input:checked ~ label {
  color: #e58e09;
}

.rateStars:not(:checked) > label:hover,
.rateStars:not(:checked) > label:hover ~ label {
  color: #ff9e0b;
}

.rateStars > input:checked ~ label {
  color: #ffa723;
}
    </style>
</head>
<body >

<div style="display: flex; flex-direction:row; margin-top:-70px">
    <div class="leftside">
        <img src="images/<?php echo $row['image'] ?>" alt="Product Image" style= "max-height: 500px;">

        <button class="add-to-cart-button" style="margin: 30px; padding: 30px 70px">Add to Cart</button>
    
    </div>
    <div class="rightside">
        <h1 class="texty"><?php echo $row['device']; ?></h1>

        <?php
            $averageFind = "SELECT AVG(rating) AS average_rating FROM rating WHERE product_id = $id;";
            $avgres = mysqli_query($conn, $averageFind);
            $avgrow = mysqli_fetch_assoc($avgres);
            $averageRating = $avgrow['average_rating'];
            //echo $averageRating . "and ";
            $intAverage = intval($averageRating);
            //echo $intAverage;
        ?>

        <p>Rated <?= $averageRating ?>/5</p>

        <div class="rateStars">
            <?php
            for ($i = 5; $i >= 1; $i--) {
                ?>
                <input value="<?php echo $i; ?>" name="ratee" id="staar<?php echo $i; ?>" type="radio"
                    <?php if ($i == $intAverage) { echo 'checked = "" '; } ?> >
                <label title="text" for="staar<?php echo $i; ?>">  </label>
                <?php
                //echo "checked ".$i;
            }
            ?>
        </div>

    


        <p style="font-size: 30px; text-align: left;"><strong>Price:  &#8377 </strong> <?php echo $row['price']; ?>  </p>
        <p style=" text-align: left; "><strong></strong> <?php echo $row['description']; ?></p>
        <p style=" text-align: left; /* Align text to the left */
    white-space: pre-wrap; /* Preserve line breaks */"><strong>About</strong> <?php echo $row['info']; ?></p>

        <!-- You can add more details here if needed -->
        
    </div>


    </div>
    
    <form action="product.php?id= <?= $id ?>" method="post" style="padding:30px; display:flex; flex-direction:column; margin: 10px;
    width:560px;
     background: linear-gradient(135deg, rgba(30, 64, 80, 0.403), rgba(16, 110, 187, 0.227));
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-radius: 0px;
    border:1px solid rgba(255, 255, 255, 0.18);
    box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
    background-color: #2196f3;
    
    
    ">
    <p class="texty" style="font-size: 20px; margin:0px; padding-bottom:17px">Already used this product? Add a review!</p>
    
    <div>
        <p class="texty" style="padding: 0px; margin:0px">Rate your experience out of 5</p>
        <div class="rating">
            <input value="5" name="rating" id="star5" type="radio">
            <label for="star5"></label>
            <input value="4" name="rating" id="star4" type="radio">
            <label for="star4"></label>
            <input value="3" name="rating" id="star3" type="radio">
            <label for="star3"></label>
            <input value="2" name="rating" id="star2" type="radio">
            <label for="star2"></label>
            <input value="1" name="rating" id="star1" type="radio">
            <label for="star1"></label>
        </div>

        </div>
        


        <input type="text" placeholder="review" name="review" style="margin: 0px; padding: 7px; border:none; border-radius:8px; width: 400px; margin-bottom: 20px; margin-top:10px">

        <button type="submit" name="addreview" class="fb"> Add review</button>
    </form>

    <h1 class="texty">Reviews</h1>
    <?php
    $mail2 = $_SESSION['Loggedemail'];
    $getReviews = "SELECT * FROM rating where product_id = $id;";
    $revs= mysqli_query($conn, $getReviews);

    while($revRows = mysqli_fetch_assoc($revs))

    {
        if ($revRows['review'] != NULL) {
            # code...
        ?> 
        
        <div style="background-color: #ccc; margin: 3px; border-radius: 10px;width:550px; margin-left:20px; padding-left:10px" class="texty">
            <div style="display: flex; flex-direction:row">
            <p class="texty"> <?php echo $revRows['userid'];?> </p>
            <div style="width: 40px;"></div>
            <p> rated <?php echo $revRows['rating']; ?>/5</p>
            </div>
   
            <p style="padding-left: 20px;padding-right: 20px ; font-size: 20px; padding-bottom: 10px"> <?php echo $revRows['review'];?> </p>
        </div>
        
        <?php
    }        }

    ?>
    <h1 class="texty">Related</h1>

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

        console.log("Cart updated:", cart);  
        alert(product.name + ' added to cart');
          }

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
if (isset($_POST['addreview'])) {
    # code...
    
    $review =  $_POST['review'];
    $rating =  $_POST['rating'];
    $userMail =  $_SESSION['Loggedemail'];
    echo  $id;


    try {
        $addReview = "INSERT INTO rating(review, rating, userid, product_id) VALUES ('$review', $rating, '$userMail', $id);";
        mysqli_query($conn, $addReview);
    } catch (mysqli_sql_exception $e) {
        // Handle the exception (e.g., display an error message)
        echo "Error: " . $e->getMessage();
    }

}
?>
