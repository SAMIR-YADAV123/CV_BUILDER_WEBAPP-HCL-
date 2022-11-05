<?php
@include 'config.php';
// $conn = mysqli_connect('localhost','root','','userlogin');
// mysqli_connect('localhost','root','','userlogin');

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $pass = $_POST['password'];


   $quer=$conn->prepare("select * from user_form where email = ?");
   $quer->bind_param("s",$email);
   $quer->execute(); 
   $result=$quer->get_result();

   if($result->num_rows > 0){
      header('location:form.php');
   }
   else{
      $error[] = 'incorrect email or password!';
   }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register.php">register now</a></p>
      
   </form>

</div>

</body>
</html>