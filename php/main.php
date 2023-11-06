<?php
include 'config.php';
session_start();
if(!isset($_SESSION['user_id'])){
    header('location:login.php');
    exit();
};
if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();  
    header('location:login.php');
}
$user_id = $_SESSION['user_id'];
$username = $_SESSION['user_name'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>miniproject</title>
    
</head>
<body>
    
    <header class="bk-main">
        
        <a class="logo"><i class="ri-cactus-line"></i><span>My Cactus</span></a>
        <ul class="navbar">
            <li><a href="#" class="active">Home</a></li>
            <li><a href="./shopping1.php">Shopping</a></li>
            <?php 
                if($username === 'admin'){
                    $url = "./pageadmin.php";
                }else{
                    $url = "./history.php";
                }
            ?>
            <li><a href="<?=$url?>">History</a></li>
            <li><a href="./home.php">Profile</a></li>
            <li><a href="../html/aboutus.html">About us</a></li>
        </ul>
        <div class="main">
            <!-- <a href="../php/login.php" class="user"><i class="ri-user-line"></i>Login</a>
            <a href="../php/register.php">Register</a> -->
            <?php
            $select = mysqli_query($conn, "SELECT * FROM member WHERE member.member_id = '$user_id'") or die('query failed');
            if(mysqli_num_rows($select) > 0){
                $fetch = mysqli_fetch_assoc($select);
            }
            ?>
            <h3>hello <?php echo $fetch['username'] ?></h3>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>

    </header>

    <div class="text1">
        <h2>หากคุณกำลังมองหาการจัดสวนง่ายๆ</h2>
    </div>
    
    <!-- slider picture -->
     <div class="slider-main">
        
        <div class="slider-wrapper">
            
            <img src="../image/sl3.jpg">
            <img src="../image/sl2.jpg">
            <img src="../image/sl1.jpg">
            <img src="../image/sl4.jpg">
        </div>
    </div>
    
    
    <h2 class="text2">เรามีชนิดให้คุณได้เลือกตบเเต่งดังนี้</h2>
    
    
    <?php $select2 = mysqli_query($conn, "SELECT * FROM specise ") or die('query failed');?>
    <div class="list">
        <?php while($row = mysqli_fetch_assoc($select2)):?>
        <div class="item">
        
            <div class="products-container">
                
                <div class="image">
                    <a href="./shopping.php?specise_id=<?= $row['specise_id']?>">
                    <img src='../image/img_specise/<?=$row["specise_id"]?>.jpg'></a>
                </div>
                <div class="sname"><?=$row["sname"]?></div>
                
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <div class="custom">
        <a href="../html/custom.html">Custom your own</a>
    </div>
    


  <!-- link js here -->
  <script type="text/javascript" src="../js/js1.js"></script>


</body>
</html>