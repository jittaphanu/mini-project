<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
   <!-- <link rel="stylesheet" href="../css/payment.css">-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <style>
       *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;   
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
            list-style: none;
        }
        header {
            position: fixed;
            width: 100%;
            top: 0;
            left: 0; /* เปลี่ยน right เป็น left */
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center; /* เพิ่มบรรทัดนี้ */
            background: transparent;
            padding: 2%;
            transition: all 0.5s ease;
            color: white;
        }
        .center-text {
            font-size: 26px;
            flex: 1; /* เพิ่มบรรทัดนี้ */
            text-align: center;
        }

        .logo{
            display: flex;
            align-items: center;
        }
        .logo i{
            color: var(--main-color);
            font-size: 25px;
            margin-right: 3px;

        }
        .logo span{
            color: var(--text-color);
            font-size: 1.5rem;
            font-weight: 600;
        }
        .bk-main{
            background-color: #222327;
        }

        :root{
            --bg-color: #222327;
            --text-color: #fff;
            --main-color: #29fd53;
        }

        body{
            min-height: 100vh;
            /* background-color: var(--bg-color); */
            color: var(--text-color);
            background: url(../image/cactusbg.png);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        h1 {
            margin-left: 200px;
            padding:0 80px 20px;
            display: flex;
            column-gap: 1rem;
            row-gap: 1rem;
            margin-top: 8%;
            /* grid-template-columns: auto auto auto auto;    */
            flex-wrap: wrap; 
        }

        .list {
            display: flex;
            background-color: #BDC3B9;
            border-radius: 30px;
            margin-bottom: 10px;
            margin-left: 300px;
            margin-right: 300px;
        }
        .pic {
            display: flex;
            margin-left: 20px;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .pic img {
            width: 150px;
            height: 150px;
            border-radius: 30px;
        }
        .details {
            color: #222327;
            margin-left: 50px;
            padding: 10px;
            padding-top: 50px;
        }
        p{
            font-size: 20px;
        }

        .slip {
            color: #fff;
            background-color: #222327;
            padding: 5px;
            position: fixed; /* Set position to fixed */
            bottom: 0; /* Align it to the bottom */
            width: 100%; /* Make it full width */
            display: flex;
            justify-content: center;
        }
      
        .product-list {
            overflow: auto; /* เพื่อให้มีแถบเลื่อนเมื่อเนื้อหามาก */
            max-height: 600px; /* ปรับค่าตามที่คุณต้องการ ให้เลือนเมื่อเนื้อหามากขึ้น */
        }
    </style>
    
</head>
<body>
    <header class="bk-main">
       <a class="logo"><i class="ri-cactus-line"></i><span>My Cactus</span></a>
        <div class="center-text">Payment</div>
    </header>

    <h1>รายการสินค้า</h1>
    <div class="product-list">
    <?php 
        $pdo = new PDO("mysql:host=localhost;dbname=mycactus;charset=utf8", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);    
        
        //$order_id = $_GET['order_id'];
        $stmt = $pdo->prepare("SELECT lists.order_id, product.pname, lists.order_quatity, product.price,order_quatity*price 
        FROM lists JOIN product ON lists.product_id = product.product_id WHERE lists.order_id = 1");
        $stmt->execute();
       // $stmt->execute([$order_id]);
    ?>
    
    <?php while($row = $stmt->fetch()):?>
    <div class="list">
        <div class="pic">
            <?php
                $imageFileName = $row['pname'] . '.jpg'; 
                $imagePath = '../image/img_product/' . $imageFileName;
            ?>
            <img src="<?php echo $imagePath; ?>">
        </div>
        <div class="details">
            <b><p>ชื่อสินค้า: <?=$row['pname']?> </p></b>
            <b><p>จำนวน: <?=$row['order_quatity']?> ชิ้น</p></b>
            <b><p>ราคา: <?=$row['order_quatity*price']?> ฿</p></b>
        </div>
    </div>
    <?php endwhile; ?>
    </div>
        

   <div class="slip">
            <?php  
                //$order_id = $_GET['order_id'];
                $stmt = $pdo->prepare("SELECT lists.order_id, product.pname, lists.order_quatity, product.price, 
                SUM(lists.order_quatity*product.price) AS total_price
                FROM lists JOIN product ON lists.product_id = product.product_id WHERE lists.order_id = 1");
                $stmt->execute();
                // $stmt->execute([$order_id]);
                $row = $stmt->fetch();
            ?>

        <div class="payment-form">
            <h2 class="price">ยอดชำระเงินทั้งหมด  <?=$row['total_price']?> ฿</h2>
            <form action="payment1.php" method="post" enctype="multipart/form-data">
                <label for="image">แนบสลิป:</label>
                <input type="file" name="image" id="image"> 
                <input type="submit" value="สั่งซื้อ">
            </form>
        </div>
    </div>
</body>
</html>