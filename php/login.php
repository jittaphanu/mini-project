<?php
    include 'config.php';
    session_start();

    if(isset($_POST['submit'])){
        
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        // $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, ($_POST['password']));

   
        $select = mysqli_query($conn, "SELECT * FROM member WHERE username = '$name' AND password = '$pass'") or die('query failed');
        // เช็ตว่ามีชื่อนี้หรือยัง

        
        if(mysqli_num_rows($select) > 0){//ในกรณีที่มีบัญชีเเล้ว
            $row = mysqli_fetch_assoc($select);
            $_SESSION['user_id'] = $row['member_id'];
            $_SESSION['user_name'] = $row['username'];
            header('location: ../php/main.php');
        }else{
            $message[] = 'incorrect email or password';
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- css stylelink -->
    <link rel="stylesheet" href="../css/registerphp.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
        <h3>Login now</h3>
        <?php
            if(isset($message)){
                foreach($message as $message){
                    echo '<div class="message">'.$message.'</div>';
                }
                
            }
        ?>
        <input type="text" name="name" placeholder="enter username" class="box" required>
        <!-- <input type="email" name="email" placeholder="enter email" class="box" required>          -->
        <input type="password" name="password" placeholder="enter password" class="box" required>
        <input type="submit" name="submit" value="login now" class="btn">
        <p>don't have an account <a href="register.php">register now</a></p>
        </form>
    </div>
</body>
</html>