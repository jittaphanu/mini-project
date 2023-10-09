<!DOCTYPE html>
<html>
<head>
    <title>รายการสินค้า</title>
</head>
<body>
    <h1>รายการสินค้า</h1>
    <table border="1">
        <tr>
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>ราคา</th>
            <th>จำนวนในสต็อก</th>
        </tr>
        <?php
        // เชื่อมต่อฐานข้อมูล (เปลี่ยนตามการตั้งค่าของคุณ)
        $db_host = 'localhost';
        $db_user = 'ชื่อผู้ใช้ฐานข้อมูล';
        $db_password = 'รหัสผ่านฐานข้อมูล';
        $db_name = 'ชื่อฐานข้อมูล';

        $conn = new mysqli('localhost', 'root', '', 'miniprojectweb');

        // ตรวจสอบการเชื่อมต่อ
        if ($conn->connect_error) {
            die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
        }

        // คำสั่ง SQL
        $sql = "SELECT * FROM product";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // แสดงผลลัพธ์ในตาราง
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["product_id"] . "</td>";
                echo "<td>" . $row["pname"] . "</td>";
                echo "<td>" . $row["price"] . "</td>";
                echo "<td>" . $row["stock_quatity"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>ไม่พบข้อมูล</td></tr>";
        }

        // ปิดการเชื่อมต่อฐานข้อมูล
        $conn->close();
        ?>
    </table>
</body>
</html>
