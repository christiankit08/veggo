<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $msg = $_POST['msg'];
   $msg = filter_var($msg, FILTER_SANITIZE_STRING);

   $select_message = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND message = ?");
   $select_message->execute([$name, $email, $msg]);

   if($select_message->rowCount() > 0){
      $message[] = 'Already sent message!';
   }else{

      $insert_message = $conn->prepare("INSERT INTO `messages`(user_id, name, email, message) VALUES(?,?,?,?)");
      $insert_message->execute([$user_id, $name, $email, $msg]);

      $message[] = 'Sent message successfully!';

   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact</title>


   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

  
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   

<?php include 'components/user_header.php'; ?>


<div class="heading">
   <h3>Contact Us</h3>
   <p><a href="home.php">Home</a> <span> / Contact</span></p>
</div>



<section class="contact">

   <div class="row">

      <div class="image">
         <img src="images/veggies.gif" alt="">
      </div>

      <form action="" method="post">
         <h3>Tell us something!</h3>
         <input type="text" name="name" maxlength="50" class="box" placeholder="Enter your name" required>
         <input type="email" name="email" maxlength="50" class="box" placeholder="Enter your email" required>
         <textarea name="msg" class="box" required placeholder="Enter your message" maxlength="500" cols="30" rows="10"></textarea>
         <input type="submit" value="send message" name="send" class="btn">
      </form>

   </div>

</section>





<?php include 'components/footer.php' ?>



<script src="js/script.js"></script>

</body>
</html>