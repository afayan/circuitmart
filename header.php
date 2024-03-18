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
 <script src="elec.js"></script>
</body>
</html>