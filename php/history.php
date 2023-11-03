<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

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
        
        $select = mysqli_query($conn, "SELECT member.member_id,member.username , member.address , member.email , member.tel,member.image,product.pname,product.price,orders.total FROM member JOIN orders ON member.member_id = orders.member_id JOIN lists ON orders.order_id=lists.order_id JOIN product ON product.product_id=lists.product_id WHERE member.member_id='$user_id';") or die('query failed');
        if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
        }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <?php
            if($fetch['image'] == ''){
                echo '<img src="../image/default-avatar.png">';
            }else{
                echo '<img src="../image/uploaded_img/'. $fetch['image'] .'">';
            }
            if(isset($message)){
                foreach($message as $message){
                    echo '<div class="message">' . $message . '</div>';
                }   
            }
        ?>
        
        <div class="flex">
        
            <div class="inputBox">
            
                <span>username :</span>
                <h2 class="box"><?php echo $fetch['username']?></h2>
                <span>youremail :</span>
                <h2 class="box"><?php echo $fetch['email']?></h2>
                <span>your address :</span>
                <h2 class="box"><?php echo $fetch['address']?></h2>
                <span>tel :</span>
                <h2 class="box"><?php echo $fetch['tel']?></h2>
                <?php while ($row = mysqli_fetch_assoc($select)): ?>
                <span>name</span>
                <h2 class="box"><?php echo $row['pname']?></h2>
                <?php endwhile;?> 
                <span>price</span>
                <h2 class="box"><?php echo $fetch['total']?></h2>
                
                
            </div>
        

        </div>
        
        <!-- <input type="submit" value="update profile" name="update_profile" class="btn"> -->
        <a href="home.php" class="delete-btn">go back</a>
    </form>

    </div>


</body>
</html>