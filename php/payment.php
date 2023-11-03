<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/payment.css">
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
            padding:0 80px 10px;
            display: flex;
            column-gap: 1rem;
            row-gap: 1rem;
            margin-top: 5%;
            /* grid-template-columns: auto auto auto auto;    */
            flex-wrap: wrap; 
        }

        .list {
            display: flex;
            margin-left: 100px;
            margin-bottom: 50px;
        }
        .pic {
            display: flex;
        }
        .pic img {
            width: 150px;
            height: 150px;
            border-radius: 30px;
        }
        .details {
            margin-left: 100px;
            padding: 10px;
        }
        p{
            font-size: 20px;
        }
        .total{
            background-color: #222327;
            padding: 10px;
        }
        h3.price{
            text-align: center;
            align-items: center;
            justify-content: center;
        }

        div.address{
            margin-top: 30px;
            margin: 80px;
        }
    </style>
</head>
<body>
    <header class="bk-main">
       <a class="logo"><i class="ri-cactus-line"></i><span>My Cactus</span></a>
        <div class="center-text">Payment</div>
    </header><br><br>
    <h1 id="head">รายการสินค้า</h1>
    <?php
        $pdo = new PDO("mysql:host=localhost;dbname=mycactus;charset=utf8","root","");
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT lists.order_id, product.pname, lists.order_quatity, product.price FROM lists
        JOIN product ON lists.product_id = product.product_id WHERE lists.order_id = 1");
        $stmt->execute();
    ?>
    <?php while($row = $stmt->fetch()): ?>
    
    <div style="padding:15px;" class="list">
        <div class="pic">
            <img src="../image/img_product/">
        </div>
        <div class="details">
            <p>ชื่อสินค้า: <?=$row["pname"]?></p>
            <p>จำนวน: <?=$row["order_quatity"]?> ชิ้น</p>
            <p>ราคา: <?=$row["price"]?> บาท </p>
           
        </div>
    </div>
    <?php endwhile; ?>


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