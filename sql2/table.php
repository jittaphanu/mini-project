<!DOCTYPE html>
<html>
<head>
    <title>รายชื่อสมาชิกและสรุปคำสั่งซื้อ</title>
</head>
<body>
    <h1>รายชื่อสมาชิกและสรุปคำสั่งซื้อ</h1>
    <table border="1">
        <tr>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>เบอร์โทร</th>
            <th>ที่อยู่</th>
            <th>จำนวนสินค้าทั้งหมด</th>
            <th>ราคารวมทั้งสิ้น</th>
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
        $sql = "SELECT member.first_name, member.last_name, member.tel, member.address,
                SUM(lists.order_quatity) AS total_quantity,
                SUM(lists.order_quatity * product.price) AS total_price
                FROM member
                JOIN orders ON member.member_id = orders.member_id
                JOIN lists ON orders.order_id = lists.order_id
                JOIN product ON lists.product_id = product.product_id
                GROUP BY lists.order_id";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // แสดงผลลัพธ์ในตาราง
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["first_name"] . "</td>";
                echo "<td>" . $row["last_name"] . "</td>";
                echo "<td>" . $row["tel"] . "</td>";
                echo "<td>" . $row["address"] . "</td>";
                echo "<td>" . $row["total_quantity"] . "</td>";
                echo "<td>" . $row["total_price"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>ไม่พบข้อมูล</td></tr>";
        }

        // ปิดการเชื่อมต่อฐานข้อมูล
        $conn->close();
        ?>
    </table>
</body>
</html>
