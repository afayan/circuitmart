<?php

session_start();

use function PHPSTORM_META\type;

include "database.php";

$final = 0;
//$_SESSION['flag'] = 0;
$varflag = 0;
//echo "session flag at beginning is " .  $_SESSION['flag'] . "now";

$_SESSION['toPay'] = 0;
//echo $_SESSION['userId'];


$price = $_COOKIE['amount'];

$_SESSION['toPay'] = $price;
    //echo $price;

    $final = $price;
    $couponsAvailable = array();

    //function checkCoupon($entered, $conn){
        $id = $_SESSION['userId'];
        $q = "select * from coupons where userId = $id;";
    
        $mycoupons = mysqli_query($conn, $q);

        $j = 0;

        while ($cp = mysqli_fetch_assoc($mycoupons)) {
            # code...
        

            $cid = $cp['couponType'] . $cp['couponId'];
           // echo $cid;

            $couponsAvailable[$j] = $cid;
            $j++;
        }
      
       //}

       //checkCoupon("890", $conn);

       
    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="elec.css">

    <style>

body {
  background: linear-gradient(135deg, rgba(30, 64, 80, 0.403), rgba(16, 110, 187, 0.227));
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-radius: 0px;
    border:1px solid rgba(255, 255, 255, 0.18);
    box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
    background-color: #2196f3;
}

@keyframes firework {
  0% { transform: translate(var(--x), var(--initialY)); width: var(--initialSize); opacity: 1; }
  50% { width: 0.5vmin; opacity: 1; }
  100% { width: var(--finalSize); opacity: 0; }
}

/* @keyframes fireworkPseudo {
  0% { transform: translate(-50%, -50%); width: var(--initialSize); opacity: 1; }
  50% { width: 0.5vmin; opacity: 1; }
  100% { width: var(--finalSize); opacity: 0; }
}
 */
.firework,
.firework::before,
.firework::after
{
    position: absolute;
    z-index: 999;
  --initialSize: 0.5vmin;
  --finalSize: 45vmin;
  --particleSize: 0.2vmin;
  --color1: yellow;
  --color2: khaki;
  --color3: white;
  --color4: lime;
  --color5: gold;
  --color6: mediumseagreen;
  --y: -30vmin;
  --x: -50%;
  --initialY: 60vmin;
  content: "";
  animation: firework 2s 2;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, var(--y));
  width: var(--initialSize);
  aspect-ratio: 1;
  background: 
    /*
    radial-gradient(circle, var(--color1) var(--particleSize), #0000 0) 0% 0%,
    radial-gradient(circle, var(--color1) var(--particleSize), #0000 0) 100% 0%,
    radial-gradient(circle, var(--color1) var(--particleSize), #0000 0) 100% 100%,
    radial-gradient(circle, var(--color1) var(--particleSize), #0000 0) 0% 100%,
    */
    
    radial-gradient(circle, var(--color1) var(--particleSize), #0000 0) 50% 0%,
    radial-gradient(circle, var(--color2) var(--particleSize), #0000 0) 100% 50%,
    radial-gradient(circle, var(--color3) var(--particleSize), #0000 0) 50% 100%,
    radial-gradient(circle, var(--color4) var(--particleSize), #0000 0) 0% 50%,
    
    /* bottom right */
    radial-gradient(circle, var(--color5) var(--particleSize), #0000 0) 80% 90%,
    radial-gradient(circle, var(--color6) var(--particleSize), #0000 0) 95% 90%,
    radial-gradient(circle, var(--color1) var(--particleSize), #0000 0) 90% 70%,
    radial-gradient(circle, var(--color2) var(--particleSize), #0000 0) 100% 60%,
    radial-gradient(circle, var(--color3) var(--particleSize), #0000 0) 55% 80%,
    radial-gradient(circle, var(--color4) var(--particleSize), #0000 0) 70% 77%,
    
    /* bottom left */
    radial-gradient(circle, var(--color5) var(--particleSize), #0000 0) 22% 90%,
    radial-gradient(circle, var(--color6) var(--particleSize), #0000 0) 45% 90%,
    radial-gradient(circle, var(--color1) var(--particleSize), #0000 0) 33% 70%,
    radial-gradient(circle, var(--color2) var(--particleSize), #0000 0) 10% 60%,
    radial-gradient(circle, var(--color3) var(--particleSize), #0000 0) 31% 80%,
    radial-gradient(circle, var(--color4) var(--particleSize), #0000 0) 28% 77%,
    radial-gradient(circle, var(--color5) var(--particleSize), #0000 0) 13% 72%,
    
    /* top left */
    radial-gradient(circle, var(--color6) var(--particleSize), #0000 0) 80% 10%,
    radial-gradient(circle, var(--color1) var(--particleSize), #0000 0) 95% 14%,
    radial-gradient(circle, var(--color2) var(--particleSize), #0000 0) 90% 23%,
    radial-gradient(circle, var(--color3) var(--particleSize), #0000 0) 100% 43%,
    radial-gradient(circle, var(--color4) var(--particleSize), #0000 0) 85% 27%,
    radial-gradient(circle, var(--color5) var(--particleSize), #0000 0) 77% 37%,
    radial-gradient(circle, var(--color6) var(--particleSize), #0000 0) 60% 7%,
    
    /* top right */
    radial-gradient(circle, var(--color1) var(--particleSize), #0000 0) 22% 14%,
    radial-gradient(circle, var(--color1) var(--particleSize), #0000 0) 45% 20%,
    radial-gradient(circle, var(--color1) var(--particleSize), #0000 0) 33% 34%,
    radial-gradient(circle, var(--color1) var(--particleSize), #0000 0) 10% 29%,
    radial-gradient(circle, var(--color1) var(--particleSize), #0000 0) 31% 37%,
    radial-gradient(circle, var(--color1) var(--particleSize), #0000 0) 28% 7%,
    radial-gradient(circle, var(--color1) var(--particleSize), #0000 0) 13% 42%
    ;
  background-size: var(--initialSize) var(--initialSize);
  background-repeat: no-repeat;
}

.firework::before {
  --x: -50%;
  --y: -50%;
  --initialY: -50%;
/*   transform: translate(-20vmin, -2vmin) rotate(40deg) scale(1.3) rotateY(40deg); */
  transform: translate(-50%, -50%) rotate(40deg) scale(1.3) rotateY(40deg);
/*   animation: fireworkPseudo 2s infinite; */
}

.firework::after {
  --x: -50%;
  --y: -50%;
  --initialY: -50%;
/*   transform: translate(44vmin, -50%) rotate(170deg) scale(1.15) rotateY(-30deg); */
  transform: translate(-50%, -50%) rotate(170deg) scale(1.15) rotateY(-30deg);
/*   animation: fireworkPseudo 2s infinite; */
}

.firework:nth-child(2) {
  --x: 30vmin;
}

.firework:nth-child(2),
.firework:nth-child(2)::before,
.firework:nth-child(2)::after {
  --color1: pink;
  --color2: violet;
  --color3: fuchsia;
  --color4: orchid;
  --color5: plum;
  --color6: lavender;  
  --finalSize: 40vmin;
  left: 30%;
  top: 60%;
  animation-delay: -0.25s;
}

.firework:nth-child(3) {
  --x: -30vmin;
  --y: -50vmin;
}

.firework:nth-child(3),
.firework:nth-child(3)::before,
.firework:nth-child(3)::after {
  --color1: cyan;
  --color2: lightcyan;
  --color3: lightblue;
  --color4: PaleTurquoise;
  --color5: SkyBlue;
  --color6: lavender;
  --finalSize: 35vmin;
  left: 70%;
  top: 60%;
  animation-delay: -0.4s;
}

    </style>
</head>
<body style="display:flex ; flex-direction: row; margin: 0px">
    <form action="checkout.php" method="post" style="height: 100%; z-index:99; position:absolute; margin:20px; width:50%">

    <div style="display:flex;   flex-direction: column; width:100%; height:100%; flex: 1; padding:0px">
    <h1 style="font-family: Arial, Helvetica, sans-serif; color:white;">Youre almost there!
  </h1>
    <!--<p class="showAmount"></p>-->

    <h2 class="textyWhite">Personal Details</h2>
    <div style="display: flex; flex-direction:row;">
    <input class="checkOutButtons" type="text" placeholder="First Name" style="flex:1">
    <input class="checkOutButtons" type="text" placeholder="Last Name" style="flex:1">
    </div>
    
    <p style="font-family: Arial, Helvetica, sans-serif; color:white; margin:10px">Email: <?= $_SESSION['Loggedemail']; ?></p>
    <h2 class="textyWhite">Address</h2>


    <div style="display: flex; flex-direction:row;">

    <input list="countries" id="country" name="country" class="checkOutButtons" placeholder="country" style="width: 460px;">

    <datalist id="countries">
    <!-- Countries will be dynamically populated here -->
    </datalist>
    <input class="checkOutButtons" type="number" placeholder="postal code">

    </div>


    <input class="checkOutButtons" type="text" placeholder="street address">

    <h2 class="textyWhite">Payment</h2>
<div style="display: flex; flex-direction:row;">
    <div>
    <select id="card-type" name="card-type" class="checkOutButtons">
      <option value="" selected disabled>Select Card</option>
      <option value="visa">Visa</option>
      <option value="mastercard">Mastercard</option>
      <option value="amex">American Express</option>
    </select>
  </div>

    <input type="text" id="card-number" name="card-number" class="checkOutButtons" placeholder="Card Number">
    <i class="fab fa-cc-visa"></i>
    <i class="fab fa-cc-mastercard"></i>
    <i class="fab fa-cc-amex"></i>

    <input type="text" id="expiration-date" name="expiration-date" class="checkOutButtons" placeholder="Expiration Date (MM/YYYY)">
    <input type="text" id="cvv" name="cvv" class="checkOutButtons" placeholder="CVV">
    <input type="text" id="cardholder-name" name="cardholder-name" class="checkOutButtons" placeholder="Cardholder Name">

    </div>
  
  
   


    <div>
    <input class="checkOutButtons"  type="text" placeholder="Enter coupon ID" name="enteredCouponId" style=" color: white;
      border: 2px solid #8707ff;
      color:black;
      border-radius: 10px;
      padding: 10px 25px;
      background: transparent;
      max-width: 190px;">
        <button class="checkOutButtons" name="checkCoupon">Check Coupon</button>
    </div>
     

        <input class="checkOutButtons" type="text" name="finalPrice" value="<?php echo $_SESSION['toPay']; ?>" placeholder="Final Price">
        <div id="new-price-container" class="texty" style=" margin-left:10px;color: white;"></div>
        <button class="checkOutButtons" name="placeOrder">Place Order</button>
    </div>
       

    </form>
    <div class="cartRow" style=" right: 60px; position:fixed">    


    </div>


            
    <a href="billing.php" style="text-decoration:none; padding:10px; margin-left: 900px"><button class="fb">Back</button></a>
    <script>
        var amount = 0;
        var mycart 
        cartRow = document.querySelector('.cartRow');
        function getValuesForBill() {
            mycart = JSON.parse(localStorage.getItem('readyCart')); 
            amount = JSON.parse(localStorage.getItem('TotalAmount'));

            console.log(mycart);
            console.log(amount);

            //let showAmount = document.querySelector('.showAmount');
            //showAmount.innerHTML = amount;

            document.cookie = "amount = "+amount;

            cartRow = document.querySelector('.cartRow')
            let cartItemRenderings2 = '<h1 class = "textyWhite" >Cart summary</h1>';

            for (let i = 0; i < mycart.length; i++) {
                const name = mycart[i].name;
                const price = mycart[i].price;
                const html = `<div class="finalCards">
                                <p class = "texty"; >${name}</p>
                                <p class = "texty"; >Item price = ${price}</p>
                            </div>`;
                cartItemRenderings2 += html;
                //totalprice += price;
            }

            cartRow.innerHTML = cartItemRenderings2;



            //mycart.forEach(element => {
                //html += `${element}`;
            //});
            
        }    

        getValuesForBill();


        fetch('https://restcountries.com/v3.1/all')
    .then(response => response.json())
    .then(data => {
      const countriesDatalist = document.getElementById('countries');
      data.forEach(country => {
        const option = document.createElement('option');
        option.value = country.name.common;
        countriesDatalist.appendChild(option);
      });
    })
    .catch(error => {
      console.error('Error fetching countries:', error);
    });

    

    </script>
</body>
</html>

<?php

//echo "Array elements:\n";
foreach ($couponsAvailable as $element) {
    //echo $element . "\n";
}
   if (isset($_POST['checkCoupon'])) {
    # code...
        $enteredId = $_POST['enteredCouponId'];
        //echo $enteredId;


        if (in_array($enteredId, $couponsAvailable) ) {
            # code...
            //echo "valid coupon";
            applyCoupon($enteredId[0], $final);
            $_SESSION['used'] = $enteredId;
            $_SESSION['flag'] = 1;
            $varflag = 1;


            //echo "session flag is " .  $_SESSION['flag'] . "and varflag is " . $varflag;
            //its working till here
        }

        else {
           // echo "invalid coupon";
           // echo $_SESSION['flag'];
            
            // Display an alert message
            echo "<script>alert('Invalid coupon ID');</script>";


        }
   } 

   //else{
   // $_SESSION['flag'] = 0;
   //}

   if (isset($_POST['placeOrder'])) {

        echo $_SESSION['flag'] . "sess flag before";
        # code...
    # code...

    echo "order placed";

    $willPay = $_SESSION['toPay'];
    $willId = $_SESSION['userId'];
    $add = "insert into expense( spent, userId) values ($willPay,$willId);" ;  
   // echo $add;

    mysqli_query($conn, $add);

    //to delete coupon used

    echo "session flag just before delete is " .  $_SESSION['flag'] . ", and varflag is " . $varflag;
    
    if ($_SESSION['flag'] == 1) {
        deleteCoupon($conn);
    }

    if ($willPay >= 10000 && $willPay < 50000) {
      # code...
      $_SESSION['won'] = 'A';
    } else if ($willPay >= 50000 && $willPay < 100000) {
      $_SESSION['won'] = 'B';

      # code...
    }else if ($willPay >= 100000){
      $_SESSION['won'] = 'C';
    }
    else{
      $_SESSION['won'] = 'O';
    }
    
    //header("Location:exit.php");
    echo '<script>window.location.href = "exit.php";</script>';

    echo "I should have exited as of now";
 
   }

   function deleteCoupon($conn){
    echo "i have to delete " . $_SESSION['used'] ;

    $numToDel = substr($_SESSION['used'], 1);

    $deleteQuery = "delete from coupons where couponId = $numToDel;";

    mysqli_query($conn, $deleteQuery);
   }


   function applyCoupon($cType){

    $_SESSION['flag'] = 1;
    
    ?>  
    
    <div class="firework"></div>
    <div class="firework"></div>
    <div class="firework"></div>
    
    <?php
    if ($cType == 'A') {
        # coupon for 20% discount
        echo "function reached, your type is A";
        $_SESSION['toPay'] = $_SESSION['toPay'] - ((20/100)*$_SESSION['toPay']);
        echo $_SESSION['toPay'];
        //header("Location: ".$_SERVER['PHP_SELF']);
        ?>
        <p>New Price = <?= $_SESSION['toPay'] ?></p>
        <script>
        document.getElementById('new-price-container').innerHTML = "<p>New Price = <?= $_SESSION['toPay'] ?></p>";
        </script>

        <?php
            $flag = 1;

    }

    elseif ($cType == 'B') {
        # code...
        echo "type is B";
        $_SESSION['toPay'] = $_SESSION['toPay'] - ((10/100)*$_SESSION['toPay']);
        ?>
        
        <p>New Price = <?= $_SESSION['toPay'] ?></p>
        <script>
        document.getElementById('new-price-container').innerHTML = "<p>New Price = <?= $_SESSION['toPay'] ?></p>";
        </script>
        
        <?php
            $flag = 1;

    }

    elseif ($cType == 'C') {
        echo "type is C";
        $_SESSION['toPay'] = $_SESSION['toPay'] - ((20/100)*$_SESSION['toPay']);
        ?>
        
        <p>New Price = <?= $_SESSION['toPay'] ?></p>
        <script>
        document.getElementById('new-price-container').innerHTML = "<p>New Price = <?= $_SESSION['toPay'] ?></p>";
        </script>
        
        <?php
            $flag = 1;

    }
    //return $final;
   }   
?>