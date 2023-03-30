<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   

<?php include 'components/user_header.php'; ?>

<div class="heading">
   <h3>About Us</h3>
   <p><a href="home.php">Home</a> <span> / About</span></p>
</div>



<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about-veggo.gif" alt="">
      </div>

      <div class="content">
         <h3>VEGGO: Marketing, Sales and Inventory of Fresh Vegetables</h3>
         <p>A web-based system where farmers and vendors can sell their products and consumers can purchase products online.</p>
         <a href="menu.php" class="btn">our menu</a>
      </div>

   </div>

</section>


<section class="steps">

   <h1 class="title">simple steps</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/register.png" alt="">
         <h3>Login</h3>
         <p>To avail our VEGGO product, you must login first.
</p>
      </div>

      <div class="box">
         <img src="images/choose.png" alt="">
         <h3>Choose Order</h3>
         <p>You can choose your order online in a fast and easy way.</p>
      </div>

      <div class="box">
         <img src="images/step-3.png" alt="">
         <h3>Enjoy Veggies</h3>
         <p>Enjoy our VEGGO product, fresh and healthy.</p>
      </div>

   </div>

</section>


<?php include 'components/footer.php'; ?>


<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>


<script src="js/script.js"></script>

</body>
</html>