<?php
    session_start();
    include './config.php';
    if(isset($_SESSION['cart']) && empty($_SESSION['cart'])){
        ///
    }
    if(isset($_POST['Submit'])&&isset($_SESSION['cart'])){
        $user_id = $_SESSION['user_id'];
        $sql = "INSERT INTO orders (member_id,date,time) VALUE('$user_id',CURRENT_DATE,CURRENT_TIME)";
        $rs = mysqli_query($conn, $sql);
        if($rs){
            $mbID = mysqli_insert_id($conn);
            foreach($_SESSION["cart"] as $item){
                $pid = $item["product_id"];
                $qty = $item["qty"];
                $sql2 = "INSERT INTO lists (order_id,product_id,order_quatity) VALUE('$mbID','$pid','$qty')";
                $rs2 = mysqli_query($conn, $sql2);
            }
        }
    }
    if ($rs&&$rs2) {
        unset($_SESSION["cart"]); //complete
        echo "<script type='text/javascript'>alert('ส่งออเดอร์สำเร็จ'); 
                    window.location = './main.php'
                </script>";
       
    }else
    {
        echo "Error";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/payment.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="../css/payment.css" rel="stylesheet">
    
</head>
<body>
    <header class="bk-main">
       <a class="logo"><i class="ri-cactus-line"></i><span>My Cactus</span></a>
        <div class="center-text">Payment</div>
    </header>

    <h1>รายการสินค้า</h1>
    <div class="product-list">

    
    <?php $sum =0; 
    foreach ($_SESSION['cart'] as $item) { 
        $sum += $item['price'] * $item['qty'];
        ?>
            
    <div class="list">
        <div class="pic">
            <?php
                $imageFileName = $item['pname'] . '.jpg'; 
                $imagePath = '../image/img_product/' . $imageFileName;
            ?>
            <img src="<?php echo $imagePath; ?>">
        </div>
        <div class="details">
            <b><p>ชื่อสินค้า: <?=$item['pname']?> </p></b>
            <b><p>จำนวน: <?=$item['qty']?> ชิ้น</p></b>
            <b><p>ราคา: <?=$item['price']?> ฿</p></b>
        </div>
    </div>
    <?php } ?>
    </div>
        

   <div class="slip">

        <div class="payment-form">
            <h2 class="price">ยอดชำระเงินทั้งหมด  <?php echo $sum ?> ฿</h2>
            <form action="payment1.php" method="post" enctype="multipart/form-data">
                <label for="image">แนบสลิป:</label>
                <input type="file" name="image" id="image"> 
                <input type="submit" name="Submit" value="สั่งซื้อ">
            </form>
        </div>
    </div>
</body>
</html>