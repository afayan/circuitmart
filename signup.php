<?php
include "database.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp to Exclusive</title>
    <link rel="stylesheet" href="SignUp.css">
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
                <li>About</li>
                <li>Sign Up</li>
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
                <img src="/sem4miniproj/Assests/Images/SignIn.png" alt="">
            </div>
            <div class="InputForm">
                <h1>Create an account</h1>
                <p>Enter your details below</p>
                <form action="signup.php" method="post">
                    <label for="Name"></label>
                    <input name="Name" type="text" placeholder="Name">
                    <br>

                    <label for="Email"></label>
                    <input type="email" name="Email" id="" placeholder="Email">
                    <br>

                    <label for="PhoneNumber"></label>
                    <input type="number" name="PhoneNumber" id="" placeholder="Phone Number">
                    <br>

                    <label for="Password"></label>
                    <input type="password" name="Password" id="" placeholder="Password">
                    <br>

                    <div class="buttons">
                    <button id="firstButton" type="submit" name="createAccount"><a style="color: white; text-decoration: none;">Create Account</a></button>
                    <br>
                    <button id="secondButton" type="button">
                        <img width="5px" src="https://img.icons8.com/color/48/000000/google-logo.png" alt="Google logo">
                        Sign Up With Google</button>
                </div>
                <div class="AlreadyHaveOne">
                    <p>Already Have One ? </p>
                    <button><a href="loginPage.php">Log In</a></button>
                </div>
                </form>
 
            </div>
        </div>
    </main>
    
    <div class="container-6">
        <p>Copyright &copy; Rimel 2022. All rights reserved.</p>
    </div>
</body>

</html>

<?php
if(isset($_POST["createAccount"])){
    $email = $_POST["Email"];
    $password = $_POST["Password"];
    $name = $_POST["Name"];
   // $password = $_POST['Password'];

    echo $email;
    echo $password;
    echo $name;

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    echo $hashedPassword;

    $addUser = "INSERT INTO USERS(username, password, email) values ('$name','$hashedPassword','$email');";

    mysqli_query($conn, $addUser);

}
?>