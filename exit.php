<?php
session_start();

//echo $_SESSION['won'];
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank U</title>
    <style>

        .congo{
            position: absolute;
            z-index: 9999;
            top: 70%;
            font-size: 40px;
            font-family: Arial, Helvetica, sans-serif;
            left: 30%;
            width: 420px;
        }

.cookieCard {
    z-index: 99999;
    width: 300px;
    height: 200px;
    background: linear-gradient(to right,rgb(137, 104, 255),rgb(175, 152, 255));
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
    gap: 20px;
    padding: 20px;
    position:absolute;
    overflow: hidden;
    top: 60%;
    left: 60%;
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

*{padding:0;margin:0}.wrapper{height:100vh;display:flex;justify-content:center;align-items:center;background-color:#eee}.checkmark__circle{stroke-dasharray: 166;stroke-dashoffset: 166;stroke-width: 2;stroke-miterlimit: 10;stroke: #7ac142;fill: none;animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards}.checkmark{width: 56px;height: 56px;border-radius: 50%;display: block;stroke-width: 2;stroke: #fff;stroke-miterlimit: 10;margin: 10% auto;box-shadow: inset 0px 0px 0px #7ac142;animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both}.checkmark__check{transform-origin: 50% 50%;stroke-dasharray: 48;stroke-dashoffset: 48;animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards}@keyframes stroke{100%{stroke-dashoffset: 0}}@keyframes scale{0%, 100%{transform: none}50%{transform: scale3d(1.1, 1.1, 1)}}@keyframes fill{100%{box-shadow: inset 0px 0px 0px 30px #7ac142}}
    </style>
</head>
<body>
    <h1 style="margin-top: 10% ; margin-left:28%; position:absolute; font-family:Arial, Helvetica, sans-serif; font-size:40px">Thank You for shopping with us, <?= $_SESSION['username'] ;?>
    <p style="font-size: 20px;">click anywhere to continue</p>
</h1>
    
<div class="wrapper"> <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"> <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/> <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
</svg>
</div>

<a href="homepage.php">Continue shopping</a>


<?php

if ($_SESSION['won']) {
    # code...


if ($_SESSION['won'] == 'A') {
    
?>

<p class="congo">Congrats! You won a BRONZE coupon</p>
<div class="cookieCard" style="background: linear-gradient(to right, rgb(205, 127, 50), rgb(184, 115, 51));">
  <p class="cookieHeading">Cookies.</p>
  <p class="cookieDescription">By using this website you automatically accept that we use cookies. <a href="#">What for?</a></p>
  <button class="acceptButton">Understood</button>
</div>

<?php

} else if ($_SESSION['won'] == 'B') {
    # code...
    ?>

    <div>

    <p class="congo">Congrats! You won a SILVER coupon</p>
    <div class="cookieCard" style="background: linear-gradient(to right, rgb(192, 192, 192), rgb(224, 224, 224));">
  <p class="cookieHeading">Coupon.</p>
  <p class="cookieDescription">By using this website you automatically accept that we use cookies. <a href="#">What for?</a></p>
  <button class="acceptButton">Understood</button>
</div>

    </div>

 

<?php
    
}

elseif ($_SESSION['won'] == 'C') {
    # code...
    ?>
    <p class="congo">Congrats! You won a GOLD coupon</p>

    <div class="cookieCard" style="background: linear-gradient(to right, rgb(255, 215, 0), rgb(255, 245, 0));">
      <p class="cookieHeading">Cookies.</p>
      <p class="cookieDescription">By using this website you automatically accept that we use cookies. <a href="#">What for?</a></p>
      <button class="acceptButton">Understood</button>
    </div>
    
    <?php

}}


?>

<script>
        document.body.addEventListener('click', function() {
            window.location.href = "homepage.php"; 
        });
    </script>
</body>

</html>