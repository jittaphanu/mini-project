<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile'])){

    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

    mysqli_query($conn, "UPDATE member SET username='$update_name' , email ='$update_email' WHERE member_id = '$user_id'") or die('query failed');
    $old_pass = $_POST['old_pass'];
    $update_pass = mysqli_real_escape_string($conn, ($_POST['update_pass']));
    $new_pass = mysqli_real_escape_string($conn, ($_POST['new_pass']));
    $confirm_pass = mysqli_real_escape_string($conn, ($_POST['confirm_pass']));

    if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){//ถ้าเปลี่ยน
        if($update_pass != $old_pass){
            $massage[] = 'old password not matched!!!';
        }elseif($new_pass != $confirm_pass){
            $massage[] = 'confirm password not matched!!!';
        }else{
            mysqli_query($conn, "UPDATE member SET password='$confirm_pass'  WHERE member_id = '$user_id'") or die('query failed');
            $massage[] = 'password update successfully!!';
        }

        
    }

    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = '../image/uploaded_img/'.$update_image;

    if(!empty($update_image)){
        if($update_image_size > 2000000){
            $message[] = 'image is too large';
        }else{
            $image_update_query = mysqli_query($conn, "UPDATE member SET image='$update_image'  WHERE member_id = '$user_id'") or die('query failed');
            if($image_update_query){
                move_uploaded_file($update_image_tmp_name, $update_image_folder);
            }
            $message[] = 'image update succesfully!!';
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>update profile</title>
    <link rel="stylesheet" href="../css/registerphp.css">
    <!-- custom css file link -->
</head>
<body>
    <div class="update-profile">
    <?php
        $select = mysqli_query($conn, "SELECT * FROM member WHERE member_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
        }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <?php
            if($fetch['image'] == ''){
                echo '<img src="../image/default-avatar.png">';
            }else{
                echo '<img src="../image/uploaded_img/.'.$fetch['image'].'">';
            }
            if(isset($message)){
                foreach($message as $message){
                    echo '<div class="message">'.$message.'</div>';
                }   
            }
        ?>
        <div class="flex">
            <div class="inputBox">
                <span>username :</span>
                <input type="text" name="update_name" value="<?php echo $fetch['username']?>" class="box">
                <span>youremail :</span>
                <input type="email" name="update_email" value="<?php echo $fetch['email']?>" class="box">
                <span>update your pic :</span>
                <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
            </div>
            <div class="inputBox">
                <input type="hidden" name="old_pass" value="<?php echo $fetch['password']?>">
                <span>old password :</span>
                <input type="password" name="update_pass" placeholder="enter previous password" class="box">
                <span>new password :</span>
                <input type="password" name="new_pass" placeholder="enter new password" class="box">
                <span>confirm password :</span>
                <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
            </div>
        </div>
        <input type="submit" value="update profile" name="update_profile" class="btn">
        <a href="home.php" class="delete-btn">go back</a>
    </form>

    </div>


</body>
</html>