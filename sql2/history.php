<!DOCTYPE html>
<html>
<head>
    <title>สรุปคำสั่งซื้อตามวันที่</title>
</head>
<body>
    <h1>สรุปคำสั่งซื้อตามวันที่ '2023-09-25'</h1>
    <table border="1">
        <tr>
            <th>ชื่อผู้ใช้</th>
            <th>สินค้าทั้งหมดในตะกร้า</th>
            <th>ยอดรวมของสินค้าในตะกร้า</th>
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
        $sql = "SELECT member.username, SUM(lists.order_quatity) AS total_quantity, 
                SUM(lists.order_quatity * product.price) AS total_price
                FROM lists
                JOIN product ON product.product_id = lists.product_id
                JOIN orders ON orders.order_id = lists.order_id
                JOIN member ON member.member_id = orders.member_id
                WHERE orders.date = '2023-09-25'
                GROUP BY lists.order_id";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // แสดงผลลัพธ์ในตาราง
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["total_quantity"] . "</td>";
                echo "<td>" . $row["total_price"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>ไม่พบข้อมูล</td></tr>";
        }

        // ปิดการเชื่อมต่อฐานข้อมูล
        $conn->close();
        ?>
    </table>
</body>
</html>
