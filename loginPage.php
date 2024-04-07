<?php
    include_once "database.php";
    session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In to Exclusive</title>
    <link rel="stylesheet" href="LogIn.css">
</head>

<body>
    <header>
        <div class="summerSale">
            <p>Summer Sale for All Swin Suits And Free Express Delievery - OFF 50%!</p>
            <a href="" class="shopNow">ShopNow</a>
            <select name="" id="" class="language">
                <option value="">English</option>
                <option value="">Hindi</option>
                <option value="">Read More....</option>
            </select>
        </div>

        <div class="NavigationBar">
            <h2>CircuitMart</h2>
            <ul>
                <li>Home</li>
                <li>Contact</li>
                <a href="sell.php"><li>Sell</li> </a>
                <a href="signup.php"><li>Sign Up</li></a>
            </ul>
            <label for=" "></label>
            <div class="search-container">
                <form action="">
                    <input type="text" placeholder="What are you looking for?" class="search-input">
                    <button type="submit" class="search-button">
                        <img src="/sem4miniproj/Assests/SVG/search.svg" alt="Search Icon" class="search-icon">
                    </button>
                </form>
            </div>
        </div>
        <div class="line">
        </div>
    </header>
    <main>
        <div class="SignInPage">
            <div class="Img">
                <img src="images/stock1.jpg" alt="">
            </div>
            <div class="InputForm">
                <h1>Log in to Exclusive</h1>
                <p>Enter your details below</p>
                <form action="loginPage.php" method="post">
                    <label for="Email"></label>
                    <input type="email" name="Email" id="" placeholder="Email" required>
                    <br>

                    <label for="Password"></label>
                    <input type="password" name="Password" id="" placeholder="Password" required>
                    <br>
                    <div class="buttons">
                    <button id="firstButton" type="submit" name = "loginButton">
                        <a style="color: white; text-decoration: none;" >Log In</a>
                    </button>
                    <button>Forget Password?</button>

                </div>
                </form>

            </div>
        </div>
    </main>
    <footer>
        <div class="container-1">
            <nav>
                <ul>
                    <li>Exclusive</li>
                </ul>
                <h2>Subscribe</h2>
                <!-- <p>Survey No, 12, Ghodbunder Rd, , Kasarvadavali, Thane West, Thane, Maharashtra 400615</p> -->
                <p>Get 10% off your first order</p>
  
            </nav>
        </div>
        <div class="container-2">
            <ul>
                <li>Support</li>
            </ul>
            <p> Thane West, Thane 400615</p>
            <p>exclusive@gmail.com</p>
            <p>+88015-88888-9999</p>
        </div>
        <div class="container-3">
            <ul>
                <li>Account</li>
                <li>My Account</li>
                <li>login / Register</li>
                <li>Cart </li>
                <li>Whistlist</li>
                <li>Shop</li>
            </ul>
        </div>
        <div class="container-4">
            <ul>
                <li>Quick Link</li>
                <li>Privacy Policy</li>
                <li>Terms Of Use</li>
                <li>FAQ</li>
                <li>Contact</li>
            </ul>
        </div>
        <div class="container-5">
            <ul>
                <li>Download App</li>
            </ul>
        </div>
    </footer>
    <div class="container-6">
        <p>Copyright &copy; Rimel 2022. All rights reserved.</p>
    </div>

    <script>localStorage.clear(); // Clears the local storage</script>
</body>

</html>

<?php

if(isset($_POST['loginButton'])){
    $email = $_POST['Email'];
    $inputpassword = $_POST['Password'];

   // echo $email;
   // echo $inputpassword;


   $verify = "select * from users where email = '$email' ;";
   $userInfo = mysqli_query($conn, $verify);

   $row = mysqli_fetch_assoc($userInfo);

    $retrievedPassword = $row['password'];

   // echo $retrievedPassword;

    if (password_verify($inputpassword, $retrievedPassword)) {
      //  echo "correct";
        # code...

        //session_start();
        $_SESSION['username'] = $row['username'];
        $_SESSION['Loggedemail'] = $row['email'];

        echo "<script>window.location.href = 'homepage.php';</script>";
                exit();
    }
    else{
        echo "incorrect password. Get Lost";
    }

}


?>