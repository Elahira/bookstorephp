<?php
require_once('inc/db.php');

session_start();
if (!isset($_SESSION['usernameadmin'])) {
    header('location: ../page-login.php');
}

$searchkey = $_GET['search'];
$query = "SELECT * FROM hoadon hd 
LEFT JOIN taikhoan tk ON tk.Idtk = hd.Idtk 
LEFT JOIN users u ON u.Idtk = tk.Idtk
WHERE CONCAT(Idhd,Ten,Diachi,Ngaymua,Ngaynhan) LIKE '%$searchkey%'
ORDER BY hd.statusHD ASC";

?>
<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>Mã đơn</th>
            <th>Tên khách hàng</th>
            <th>Địa chỉ</th>
            <th>Ngày mua</th>
            <th>Ngày giao</th>
            <th>Tình trạng</th>
            <th>Chi tiết đơn hàng</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $run = $conn->query($query);
        if ($run->num_rows > 0) {
            while ($row = $run->fetch_array()) {
                $hd_id = $row['Idhd'];
                $name = $row['Ten'];
                $address = $row['Diachi'];
                $ngay_mua = $row['Ngaymua'];
                $ngay_nhan = $row['Ngaynhan'];
                $hd_status = $row['StatusHD'];
        ?>
                <tr>
                    <td><?php echo $hd_id ?></td>
                    <td><?php echo $name ?></td>
                    <td><?php echo $address ?></td>
                    <td><?php echo $ngay_mua ?></td>
                    <td><?php echo $ngay_nhan ?></td>
                    <td><a href="orders.php?upstatus=<?php echo $hd_id ?>&status=<?php echo $hd_status ?>">
                            <?php
                            if ($hd_status == '1') {
                            ?>
                                <button type="button" class="btn btn-info">Chuẩn bị hàng</button>
                            <?php
                            }
                            if ($hd_status == '2') {
                            ?>
                                <button type="button" class="btn btn-danger">Đang giao</button>
                            <?php
                            }
                            if ($hd_status == '3') {
                            ?>
                                <button type="button" class="btn btn-success" style="color:#fff;" disabled>Đã giao</button>
                            <?php
                            }
                            ?>
                        </a></td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong<?php echo $hd_id ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $hd_id ?>"><i class="fa fa-trash-o"></i></button></td>
                </tr>
        <?php
            }
        } else {
            echo "Hiện tại không có đơn hàng";
        }
        ?>
    </tbody>
</table>