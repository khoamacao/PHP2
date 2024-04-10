<?php
// Kết nối cơ sở dữ liệu
$connection = mysqli_connect("localhost", "root", "", "webdb");

// Lấy truy vấn từ dữ liệu gửi từ AJAX
$query = $_POST['query'];

// Thực hiện truy vấn
$query_run = mysqli_query($connection, $query);

// Kiểm tra và tạo bảng dữ liệu
if (mysqli_num_rows($query_run) > 0) {
    echo '<table class="table table-bordered" width="100%" cellspacing="0">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>MaHD</th>';
    echo '<th>Email</th>';
    echo '<th>Email_NhanVien</th>';
    echo '<th>TongTien</th>';
    echo '<th>Ngày Xuất</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = mysqli_fetch_assoc($query_run)) {
        echo '<tr>';
        echo '<td>' . $row['MaHD'] . '</td>';
        echo '<td>' . $row['Email'] . '</td>';
        echo '<td>' . $row['Email_NhanVien'] . '</td>';
        echo '<td>' . $row['TongTien'] . '</td>';
        echo '<td>' . $row['NgayThang'] . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo "<h2>Không tìm thấy hóa đơn</h2>";
}
?>
