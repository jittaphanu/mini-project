<!DOCTYPE html>
<html>
<head>
    <title>สายพันธุ์และสินค้า</title>
</head>
<body>
    <h1>สายพันธุ์และสินค้า</h1>
    <table border="1">
        <tr>
            <th>สายพันธุ์</th>
            <th>ชื่อสินค้า</th>
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
        $sql = "SELECT specise.sname AS สายพันธุ์, product.pname AS ชื่อ
                FROM specise
                JOIN product ON product.species_id = specise.specise_id
                WHERE specise.specise_id = 's001'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // แสดงผลลัพธ์ในตาราง
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["สายพันธุ์"] . "</td>";
                echo "<td>" . $row["ชื่อ"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>ไม่พบข้อมูล</td></tr>";
        }

        // ปิดการเชื่อมต่อฐานข้อมูล
        $conn->close();
        ?>
    </table>
</body>
</html>
