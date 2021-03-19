<?php
include_once('database.php');

session_start();


if(isset($_POST['signup'])){
    $utilisateur=$_POST['nom'];
    $password=$_POST['password'];
    $query_two="INSERT INTO utilisateurs (nam,password)VALUE('$utilisateur','$password')";
    $signup = mysqli_query($link,$query_two);
    if(!$signup){
    echo "erreur :" . mysqli_query($query_two);
}else{
    
    header("location:login.php");
}
}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet"  href="css/sign-up.css?v=<?php echo time(); ?>">
    <title>sign Up</title>
</head>
<body>
    <div class="content">
    <form action="sign-up.php" method="post">
    <label >Nom utilisateur: </label><BR>
    <input type="text" class="nom" name="nom" id="nom" placeholder="Saisir votre username"><BR><BR>
    <label >Password: </label><BR>
    <input type="password" class="password" name="password" id="password" placeholder="Saisir votre password"><BR><BR>
    <button type="submit" name="signup" class="signup" >sign up</button> <br><br>
    <label for="">vous déja inscrer !! <a href="login.php">Login</a></label>
    </form>
    </div>
</body>
</html>