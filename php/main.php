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
            <li><a href="../php/shopping.php">Shopping</a></li>
            <li><a href="../html/History.html">History</a></li>
            <li><a href="../php/home.php">Profile</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div class="main">
            <!-- <a href="../php/login.php" class="user"><i class="ri-user-line"></i>Login</a>
            <a href="../php/register.php">Register</a> -->
            <?php
            $select = mysqli_query($conn, "SELECT * FROM member WHERE member_id = '$user_id'") or die('query failed');
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
            
            <img src="../image/S__56123600.jpg">
            <img src="../image/S__56123602.jpg">
            <img src="../image/S__56123603.jpg">
            <img src="../image/S__56123604.jpg">
        </div>
    </div>
    
    
    <div>
        <h2 class="text2">เรามีชนิดให้คุณได้เลือกตบเเต่งดังนี้</h2>
        <div class="products-container">
            <img src="https://storage.googleapis.com/cvstock-932a9.appspot.com/DFA5Q25WTI30" alt="Product Image 1">
            <img src="https://storage.googleapis.com/cvstock-932a9.appspot.com/DFA5Q25WTI30" alt="Product Image 2">
            <img src="https://storage.googleapis.com/cvstock-932a9.appspot.com/DFA5Q25WTI30" alt="Product Image 3">
            <img src="https://storage.googleapis.com/cvstock-932a9.appspot.com/DFA5Q25WTI30" alt="Product Image 4">
            <img src="https://storage.googleapis.com/cvstock-932a9.appspot.com/DFA5Q25WTI30" alt="Product Image 5">
            <img src="https://storage.googleapis.com/cvstock-932a9.appspot.com/DFA5Q25WTI30" alt="Product Image 6">
            <img src="https://storage.googleapis.com/cvstock-932a9.appspot.com/DFA5Q25WTI30" alt="Product Image 7">
            <img src="https://storage.googleapis.com/cvstock-932a9.appspot.com/DFA5Q25WTI30" alt="Product Image 8">
        </div>
    </div>
    
    


  <!-- link js here -->
  <script type="text/javascript" src="../js/js1.js"></script>


</body>
</html>