<?php 
session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECelec</title>
    <link rel="stylesheet" href="elec.css">
</head>
<body style="margin: 0px; background-color: skyblue;
/*
background: 
    linear-gradient(#0007, #0000),
    #123;
*/
   
">
  <div class="topbar" >
    <p style="font-size: 20px; margin-left: 15px; font-family:Verdana, Geneva, Tahoma, sans-serif; color: white; margin-right:-30px ;">Circuit Mart</p>
    <div style="width: 30%; display: flex; flex: 1;"></div>
    <div>
        <button class="topbutton" onclick="dropProfile()">Hello <?php echo $_SESSION['username'] ?></button>
        <button class="topbutton" onclick="saveCart()">Cart</button>
    </div>
</div>

<div class="profileMenu" style="height: 200px; top: -600px; position:absolute; z-index:998">
  <p><?php echo $_SESSION['Loggedemail']; ?></p>
  <form method="post" action="header.php">
  <button class="logout" type="submit" name="logout">logout</button>
</form>
  <button onclick="dropProfile()" class="fb">back</button>
</div>

    <div class="sidebar">       
        <button class="topbutton" onclick="window.location.href='homepage.php'">
            <span class="button-content" >Home </span>
          </button>
          <button class="topbutton">
            <span class="button-content">Sevices </span>
          </button>

          <button class="topbutton" onclick="window.location.href='filters.php'">
            <span class="button-content" >Filter </span>
          </button>

          <button class="topbutton" onclick="window.location.href='searchpage.php'">
            <span class="button-content" >Search </span>
          </button>
             
          <button class="topbutton" onclick="window.location.href='typepage.php?type=laptop'">
            <span class="button-content" >Laptops </span>
          </button>

          <button class="topbutton" onclick="window.location.href='typepage.php?type=phone'">
            <span class="button-content" >Phones </span>
          </button>

          <button class="topbutton" onclick="window.location.href='coupons.php?name=<?php echo $_SESSION['Loggedemail']; ?>'">
            <span class="button-content" >Coupons </span>
          </button>
          
     
    </div>
 <script>
    var profileMenu = document.querySelector('.profileMenu');

  function saveCart(){
    var cart = JSON.parse(localStorage.getItem('cart')) || [];
    console.log(cart);
    localStorage.setItem('finalCart',JSON.stringify(cart))
    window.location.href='billing.php';
  }

  function dropProfile() {
    profileMenu.style.top = (profileMenu.style.top === '0px') ? '-600px' : '0px';
    //setProfile();
}

  function setProfile() {
      //profInfo.innerHTML = `<p>Name: ${name}</p><p>Email: ${email}</p><p>Password: ${password}</p>`;
  }

 </script>
</body>
</html>
<?php

if (isset($_POST["logout"])) {
  # code...
  session_start();
session_destroy();
header("Location: loginPage.php");
exit();
}

?>
