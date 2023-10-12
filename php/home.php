<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login.php');
};
if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();  
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <!-- custom css file link -->
    <link rel="stylesheet" href="../css/registerphp.css">
</head>
<body>
    
<div class="container">

    <div class="profile">
        <?php
            $select = mysqli_query($conn, "SELECT * FROM member WHERE member_id = '$user_id'") or die('query failed');
            if(mysqli_num_rows($select) > 0){
                $fetch = mysqli_fetch_assoc($select);
            }
            if($fetch['image'] == ''){
                echo '<img src="../image/default-avatar.png">';
            }else{
                echo '<img src="../image/uploaded_img/.'.$fetch['image'].'">';
            }
        ?>
        <h3><?php echo $fetch['username']?></h3>
        <a href="updateprofile.php" class="btn">update profile</a>
        <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
        <a href="../html/main.html" class="btn-backtomain">back to main</a>
        <p>new <a href="login.php">login</a> or <a href="register.php">register</a></p>
    </div>

</div>


</body>
</html>