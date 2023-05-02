<?php
require_once('inc/db.php');

session_start();

if (!isset($_SESSION['usernameadmin'])) {
    header('location: ../page-login.php');
}

if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $get_cat_id = "SELECT * from theloai where Idloai = '$edit_id'";
    $run_edit_id = $conn->query($get_cat_id);
    if ($run_edit_id->num_rows > 0) {
        $row_edit_id = $run_edit_id->fetch_array();
        $edit_name = $row_edit_id['Tenloai'];
?>

        <div class="card-body">
            <div class="card-title">
                <h4>Sửa thể loại</h4>
            </div>
            <form id="frm-edit" method="post">
                <div class="form-group">
                    <label for="category">Tên thể loại mới:*</label>
                    <input type="text" placeholder="Tên thể loại..." id="edit-cat-name" class="form-control" name="edit-cat-name" value="<?php echo $edit_name; ?>" required>
                </div>
                <input type="submit" value="Sửa" name="edit-category" class="btn btn-primary">
            </form>
        </div>
        <script>
            $('#frm-edit').submit(function() {
                var edit_id = <?php echo $edit_id; ?>;
                var edit_name = $('#edit-cat-name').val();
                $.ajax({
                    method: 'POST',
                    url: 'inc/process.php',
                    data: {
                        edit_category: edit_id,
                        edit_cat_name: edit_name
                    },
                    success: function(response) {
                        alert(response);
                        fetchdata();
                    }
                });
                return false;
            });
        </script>
<?php
    }
}
?>