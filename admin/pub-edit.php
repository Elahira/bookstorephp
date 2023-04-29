<?php
require_once('inc/db.php');

session_start();

if (!isset($_SESSION['usernameadmin'])) {
    header('location: ../page-login.php');
}

if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $get_pub_id = "SELECT * from nhaphathanh where Idnph = '$edit_id'";
    $run_edit_id = $conn->query($get_pub_id);
    if ($run_edit_id->num_rows > 0) {
        $row_edit_id = $run_edit_id->fetch_array();
        $edit_name = $row_edit_id['Tennph'];
?>
        <div class="card-body">
            <div class="card-title">
                <h4>Sửa nhà phát hành</h4>
            </div>
            <form action="inc/process.php?edit_publisher=<?php echo $edit_id ?>" method="post">
                <div class="form-group">
                    <label for="publisher">Tên nhà phát hành mới:*</label>
                    <input type="text" placeholder="Nhà phát hành..." class="form-control" name="edit-pub-name" value="<?php echo $edit_name; ?>" required>
                </div>
                <input type="submit" value="Sửa" name="edit-publisher" class="btn btn-primary">
            </form>
        </div>
<?php
    }
}
?>