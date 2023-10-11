<?php
    include 'config.php';

    if(isset($_POST['submit'])){
        
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
        $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $img_folder = '../image/uploaded_img/'.$image;

        $select = mysqli_query($conn, "SELECT * FROM member WHERE email = '$email' AND password = '$pass'") or die('query failed');
        // เช็ตว่ามีชื่อนี้หรือยัง

        
        if(mysqli_num_rows($select) > 0){//ในกรณีที่มีบัญชีเเล้ว
            $message[] = 'user already exits';
        }else{
            if($pass != $cpass){//pass and cpass ไม่เมหือนกัะน
                $message[] = 'confrim password not matched!!!';
            }elseif($image_size > 2000000){
                $message[] = 'image size is too large!!!';
            }else{//สร้าง
                $insert = mysqli_query($conn,"INSERT INTO member(username, email, password, image) VALUES('$name','$email','$pass','$image')") or die('query failed');

                if($insert){
                    move_uploaded_file($image_tmp_name, $img_folder);
                    $message[] = 'register successfully!!';
                    header('location:login.php');
                }else{
                    $message[] = 'register failed!!';
                }
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>

    <!-- css stylelink -->
    <link rel="stylesheet" href="../css/registerphp.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
        <h3>register now</h3>
        <?php
            if(isset($message)){
                foreach($message as $message){
                    echo '<div class="message">'.$message.'</div>';
                }
                
            }
        ?>
        <input type="text" name="name" placeholder="enter username" class="box" required>
        <input type="email" name="email" placeholder="enter email" class="box" required>
        <input type="password" name="password" placeholder="enter password" class="box" required>
        <input type="password" name="cpassword" placeholder="confirm password" class="box" required>
        <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
        <input type="submit" name="submit" value="register now" class="btn">
        <p>already have an account? <a href="login.php">login now</a></p>
        </form>
    </div>
</body>
</html>