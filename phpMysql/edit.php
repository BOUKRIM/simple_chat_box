<?php
include_once('database.php');

// select one of data to update
if(isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $update = true;

    $select_id_query = "SELECT * FROM messages WHERE id_comment=$id";
    $result=mysqli_query($link,$select_id_query) ;
    
    if($result->num_rows){
        $row = $result->fetch_array();
        $cmt = $row['msg'];
       
    }
}
// update one of data
if(isset($_POST['update'])) {
   
    $cmt = $_POST['msg'];
   

    $update_query= "UPDATE messages SET msg='$cmt' WHERE id_comment=$id";
    $result2=mysqli_query($link,$update_query) ;
    if(!$result2){
        echo "erreur :" . mysqli_query($$result2);
    }

    header("location:index.php");
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- bootsrap 5.0.0 css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<!-- insert - form -->
<div class="container mt-3">
    <div class="row">
        <div class="container col-md-6 offset-md-3">
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="mb-3">
                    <label class="form-label">message</label>
                    <input type="text" name="msg" class="form-control" value="<?php echo $cmt; ?>" placeholder="Enter your name">
                </div>
                
                <div class="mb-3">
                    <?php if($update == true): ?>
                        <button type="submit" class="btn btn-success" name="update">Update</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</div>
