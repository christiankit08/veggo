<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>



<section class="hero">

   <div class="swiper hero-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <div class="content">
               <span>Order Online</span>
               <h3>Fresh Vegetables</h3>
               <a href="menu.php" class="btn">See Menu</a>
            </div>
            <div class="image">
               <img src="images/home-veggie-1.png" alt="">
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="content">
               <span>Order Online</span>
               <h3>Fresh Vegetables</h3>
               <a href="menu.php" class="btn">See Menu</a>
            </div>
            <div class="image">
               <img src="images/home-veggie-2.png" alt="">
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="content">
               <span>Order Online</span>
               <h3>Fresh Vegetables</h3>
               <a href="menu.php" class="btn">See Menu</a>
            </div>
            <div class="image">
               <img src="images/home-veggie-3.png" alt="">
            </div>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<section class="category">

   <h1 class="title">Vegetable category</h1>

   <div class="box-container">

      <a href="category.php?category=crops" class="box">
         <img src="images/icon-1.png" alt="">
         <h3>Crops</h3>
      </a>

      <a href="category.php?category=leafy" class="box">
         <img src="images/icon-2.png" alt="">
         <h3>Leafy</h3>
      </a>

      <a href="category.php?category=cruciferous" class="box">
         <img src="images/icon-3.png" alt="">
         <h3>Cruciferous</h3>
      </a>

      <a href="category.php?category=nightshade" class="box">
         <img src="images/icon-4.png" alt="">
         <h3>Nightshade</h3>
      </a>

   </div>

</section>




<section class="products">

   <h1 class="title">Products</h1>

   <div class="box-container">

      <?php
         $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
         $select_products->execute();
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
         <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
         <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
         <div class="name"><?= $fetch_products['name']; ?></div>
         <div class="flex">
            <div class="price"><span>₱</span><?= $fetch_products['price']; ?></div>
            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
         </div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">no products added yet!</p>';
         }
      ?>

   </div>

   <div class="more-btn">
      <a href="menu.php" class="btn">view all</a>
   </div>

</section>

<section class="location">
   <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1696.0062352386808!2d123.95072307309789!3d10.31123272008129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sph!4v1680051876194!5m2!1sen!2sph" 
      width="1200" 
      height="500" 
      style="border:0;" 
      allowfullscreen=true 
      loading="lazy" 
      referrerpolicy="no-referrer-when-downgrade">
   </iframe>
</section>


<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".hero-slider", {
   loop:true,
   grabCursor: true,
   effect: "flip",
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
});

</script>

</body>
</html>