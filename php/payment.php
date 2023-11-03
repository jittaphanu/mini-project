<!DOCTYPE html>
<html lang="en">
<?php
	$pdo = new PDO("mysql:host=localhost;dbname=mycactus;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);    
    ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/payment.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>
<body>
    <header class="bk-main">
       <a class="logo"><i class="ri-cactus-line"></i><span>My Cactus</span></a>
        <div class="center-text">Payment</div>
    </header>
    

    <?php 
        $lists_id = $_GET['produt_id'];
        $stmt = $pdo->prepare("SELECT lists.order_id, product.pname, lists.order_quatity, product.price FROM lists
        JOIN product ON lists.product_id = product.product_id WHERE lists.order_id = ?");
        $stmt->execute([$list_id]);
        $row = $stmt->fetch();
    ?>


    <h1>รายการสินค้า</h1>


    <div class="list">
        <div class="pic">
            <img src="" alt="Product Image">
        </div>
        <div class="details">
            <h3>ชื่อสินค้า: </h3>
            <p>ราคา:  </p>
            <p>จำนวน:  </p>
        </div>
    </div>


    <div class="total">
        <h3 class="price">ราคารวม</h3>
    </div>


    <div class="address">
        <h3>ที่อยู่</h3>
    </div>

    <div class="slip">

    </div>
</body>
</html>