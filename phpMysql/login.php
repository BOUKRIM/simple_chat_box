<?php
include_once('database.php');
session_start();
if (isset($_SESSION['name'])) {
    header("location: index.php");
}
if(isset($_POST['login'])){
$name=$_POST['name'];
$password=$_POST['password'];
$query_log="SELECT * FROM utilisateurs WHERE nam='$name' AND password='$password'";
$result=mysqli_query($link,$query_log);
if(mysqli_num_rows($result) >0){
    $_SESSION['name']=$name;
    header("location:index.php");
}
   
else{
    echo "Enter nom ou email correct! ";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet"  href="css/login.css?v=<?php echo time(); ?>">
    <title>LOGIN</title>
</head>
<body>
    <div class="content">
    <form action="login.php" method="post">
    <label >Name: </label><BR>
    <input type="text" class="email" name="name" id="email" placeholder="Saisir votre name"><BR><BR>
    <label >Password: </label><BR>
    <input type="password" class="password" name="password" id="password" placeholder="Saisir votre password"><BR><BR>
    <button type="submit" name="login" class="login" >Log in</button> <br><br>
    <label for="">Première fois ici?  <a href="sign-up.php">   Créez un compte.</a></label>
    </form>
    </div>
</body>
</html>