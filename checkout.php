<?php

session_start();

use function PHPSTORM_META\type;

include "database.php";

$final = 0;

$_SESSION['toPay'] = 0;
echo $_SESSION['userId'];


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
            echo $cid;

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
</head>
<body>
    <form action="checkout.php" method="post">
        <p class="showAmount"></p>
        <input type="text" placeholder="Enter coupon ID" name="enteredCouponId">
        <input type="text" name="finalPrice" value="<?php echo $_SESSION['toPay']; ?>" placeholder="Final Price">
        <button type="submit" name="checkCoupon">Check</button>
    </form>

    <script>
        var amount = 0;
        var mycart 
        function getValuesForBill() {
            mycart = JSON.parse(localStorage.getItem('readyCart')); 
            amount = JSON.parse(localStorage.getItem('TotalAmount'));

            console.log(mycart);
            console.log(amount);

            let showAmount = document.querySelector('.showAmount');
            showAmount.innerHTML = amount;

            document.cookie = "amount = "+amount;
            
        }    

        getValuesForBill();

    </script>
</body>
</html>

<?php

echo "Array elements:\n";
foreach ($couponsAvailable as $element) {
    echo $element . "\n";
}
   if (isset($_POST['checkCoupon'])) {
    # code...
        $enteredId = $_POST['enteredCouponId'];
        //echo $enteredId;


        if (in_array($enteredId, $couponsAvailable) ) {
            # code...
            echo "valid coupon";
            applyCoupon($enteredId[0], $final);
        }

        else {
            echo "invalid coupon";
        }
   } 


   function applyCoupon($cType){
    if ($cType == 'A') {
        # coupon for 20% discount
        echo "function reached, your type is A";
        $_SESSION['toPay'] = $_SESSION['toPay'] - ((20/100)*$_SESSION['toPay']);
        echo $_SESSION['toPay'];
        //header("Location: ".$_SERVER['PHP_SELF']);

        ?>
        
        <p>New Price = <?= $_SESSION['toPay'] ?></p>
        
        <?php
    }
    //return $final;
   }   
?>