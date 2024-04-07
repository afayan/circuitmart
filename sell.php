<?php

use function PHPSTORM_META\type;

    require_once "database.php";

    $sql = "SELECT * FROM elec";
    $all_product = $conn->query($sql);
    echo "Hello";

    $row = mysqli_fetch_assoc($all_product);

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sell Page</title>

  <style>

body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.container {
  width: 80%;
  margin: 50px auto;
}

h1 {
  text-align: center;
}

form {
  max-width: 600px;
  margin: 0 auto;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"],
textarea,
select,
input[type="number"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
}

textarea {
  resize: vertical;
}

button {
  display: block;
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}

  </style>
</head>
<body>
  <div class="container">
    <h1>Sell Your Product</h1>
    <form action="sell.php" method="post">
      <div class="form-group">
        <label for="product-name">Product Name:</label>
        <input type="text" id="product-name" name="product-name" required>
      </div>
      <div class="form-group">
        <label for="product-description">Product Description:</label>
        <textarea id="product-description" name="product-description" rows="4" required></textarea>
      </div>

      <div class="form-group">
  <label for="product-image">Upload Image:</label>
  <input type="file" id="product-image" name="image" required>
</div>

     
      <div class="form-group">
        <label for="product-price">Price ($):</label>
        <input type="number" id="product-price" name="product-price" required>
      </div>

      <label for="product-type">Type of device:</label>
      
      <div style="display: flex; flex-direction:row">
      <input type="radio" name="type" value="laptop">
      <p>laptop</p>
      <div style="flex: 1;"></div>
      <input type="radio" name="type" value="phone">
      <p>phone</p>
      <div style="flex: 1;"></div>
      <input type="radio" name="type" value="other">
      <p>other</p>   
      </div>


      <input type="number" name="RAM" placeholder="Enter device RAM (GB)">
      <input type="number" name="ROM" placeholder="Enter device ROM (GB)">

      <button type="submit" name="sell">Sell Now</button>
    </form>
  </div>
</body>
</html>

<?php

if(isset($_POST["sell"])){



    $name = $_POST["product-name"];
    $description = $_POST["product-description"];
    $price = $_POST["product-price"];
    $image = $_POST["image"];
    $type = $_POST["type"];

    $ram = $_POST["RAM"];
    $rom = $_POST["ROM"];

    $storage = null;
    $performance = null;



   //laptop specs
      if($ram>8){
        $performance = "high";
      }

      elseif ($ram<4) {
        $performance = "low";
        # code...
      }

      else{
        $performance = "medium";
      }

  
      if($type == "laptop"){ //rom for laptops
        if ($rom >= 1000) {
          # code...
          $storage = "high";
        }

        elseif($rom <= 200){
          $storage = "low";
        }

        else{
          $storage = "medium";
        }

      }

      else {
        if ($rom >= 64) {
          $storage = "high";
        }

        elseif($rom <= 8){
          $storage = "low";
        }

        else{
          $storage = "medium";
        }
      }
  



    echo $name;

    $insert = "INSERT INTO elec (device, price, image, description, storage, performance, type) VALUES ('$name', $price, '$image', '$description','$storage','$performance','$type')";

    mysqli_query($conn, $insert);

  }
?>
