<?php
    require_once "database.php";
    #include "header.php";


    $userEmail = $_GET['name'];
    $getId = "select * from users where email = '$userEmail';";
    $userId = mysqli_query($conn, $getId);
    $firstRow = mysqli_fetch_assoc($userId);
    $requiredId =  $firstRow['userId'];

    $getCoupons = "select * from coupons where userId = $requiredId;";
    $coupons = mysqli_query($conn, $getCoupons);

    ?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .cookieCard {
  width: 300px;
  height: 200px;
  background: linear-gradient(to right,rgb(137, 104, 255),rgb(175, 152, 255));
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: center;
  gap: 20px;
  padding: 20px;
  position: relative;
  overflow: hidden;
}

.cookieCard::before {
  width: 150px;
  height: 150px;
  content: "";
  background: linear-gradient(to right,rgb(142, 110, 255),rgb(208, 195, 255));
  position: absolute;
  z-index: 1;
  border-radius: 50%;
  right: -25%;
  top: -25%;
}

.cookieHeading {
  font-size: 1.5em;
  font-weight: 600;
  color: rgb(241, 241, 241);
  z-index: 2;
}

.cookieDescription {
  font-size: 0.9em;
  color: rgb(241, 241, 241);
  z-index: 2;
}

.cookieDescription a {
  color: rgb(241, 241, 241);
}

.acceptButton {
  padding: 11px 20px;
  background-color: #7b57ff;
  transition-duration: .2s;
  border: none;
  color: rgb(241, 241, 241);
  cursor: pointer;
  font-weight: 600;
  z-index: 2;
}

.acceptButton:hover {
  background-color: #714aff;
  transition-duration: .2s;
}
    </style>
</head>
<body>
    

    <?php

    while ($couponNo = mysqli_fetch_assoc($coupons) ) {
        # code...

        if ($couponNo['couponType'] == 'A') {
            ?>
            <div class="cookieCard" style="background: linear-gradient(to right, rgb(255, 104, 104), rgb(255, 152, 152));
">
              <p class="cookieHeading">CircuitMart Gamma Coupon</p>
              <p class="cookieDescription">Get 20% off on your purchase!</p>
              <button class="acceptButton">Coupon Code: <?php  echo $couponNo['couponType'];
        echo $couponNo['couponId']; ?></button>
            </div>
                    <?php        }


elseif ($couponNo['couponType'] == 'B') {
    ?>
    <div class="cookieCard" style="background: linear-gradient(to right, rgb(93, 230, 93), rgb(136, 230, 136));
">
      <p class="cookieHeading">CircuitMart Beta Coupon.</p>
      <p class="cookieDescription">By using this website you automatically accept that we use cookies. <a href="#">What for?</a></p>
      <button class="acceptButton">Coupon Code: <?php  echo $couponNo['couponType'];
        echo $couponNo['couponId']; ?></button>    </div>
            <?php  }


else {
    ?>
    <div class="cookieCard">
      <p class="cookieHeading">CircuitMart Alpha Coupon.</p>
      <p class="cookieDescription">By using this website you automatically accept that we use cookies. <a href="#">What for?</a></p>
      <button class="acceptButton">Coupon Code: <?php  echo $couponNo['couponType'];
        echo $couponNo['couponId']; ?></button>    </div>
            <?php 
            }

        
        echo $couponNo['couponType'];
        echo $couponNo['couponId'];
    }
?>
</body>
</html>
