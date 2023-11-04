<!DOCTYPE html>
<html lang="en">
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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $uploadDirectory = "../image/slip/"; // โฟลเดอร์ที่จะเก็บรูปภาพ
        $uploadedFile = $uploadDirectory . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadedFile)) {
            echo "ไฟล์ถูกอัปโหลดสำเร็จ";
        } else {
            echo "เกิดข้อผิดพลาดในการอัปโหลดไฟล์";
        }
    }
    ?>

    <div class="address">
        <h3>ชื่อและที่อยู่</h3>
        <?php
        
        $pdo = new PDO("mysql:host=localhost;dbname=mycactus;charset=utf8", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);    

        $stmt = $pdo->prepare('SELECT orders.order_id, orders.member_id, member.first_name, member.last_name,member.address, orders.total
        FROM orders JOIN member ON orders.member_id = member.member_id WHERE orders.order_id = 1');
        $stmt->execute();
        $row = $stmt->fetch();
        ?>

        <div style class="add">
        <p><?=$row['first_name'] ?> <?=$row['last_name'] ?> <?=$row['address'] ?></p>
        </div>
    </div>

</body>