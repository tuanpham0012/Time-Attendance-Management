<?php

if($_SESSION['chucvu'] !== 'SupperAdmin'):

    echo '<h2>Không được phép truy cập<h2>';
else :

    if($id && $id > 0){
        $table = 'chamcong c LEFT JOIN nhan_vien n ON c.id_nhanvien = n.id_nhanvien';
        $param = "Where c.id_nhanvien = $id and c.thoigian = '$date'";
        $chamcong = query($conn, '*', $table, $param);
    }

    $tinhtrang = isset($_POST['tinhtrang']) ? $_POST['tinhtrang'] : null;
    $status = isset($_POST['status']) ? $_POST['status'] : null;
    $ghichu = isset($_POST['ghichu']) ? $_POST['ghichu'] : " ";
    if($tinhtrang && $status){
        
        $values = " tinhtrang = '$tinhtrang', status = $status, ghichu = '$ghichu'";
        $params = "Where id_nhanvien = $id and thoigian = '$date'";
        $edit_cc = update($conn, 'chamcong', $values, $params);

        if($edit_cc){
			echo '<script language="javascript">';
			echo 'alert("Chỉnh sửa thành công")';
            echo '</script>';
        }
        else{
            echo '<script language="javascript">';
			echo 'alert("Chỉnh sửa thất bại")';
			echo '</script>';
        }

    }


?>


<div class="col-lg-8 pms-mt-10">
    <h3 class="title1">Chỉnh Sửa Thông Tin</h3>
    <a href="<?php echo $_SESSION['url'] ?>">
            <button class="btn btn-info btn-sm" style="margin-bottom:30px"><< Quay lại</button>
    </a>

    

    <?php if(is_array($chamcong) && count($chamcong) > 0): ?>
    <form action="" method="POST" onsubmit="return check();">
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">Họ Tên Nhân Viên</label>
        <input readonly="readonly" type="text" class="form-control" id="name" name="name" value="<?php echo $chamcong[0]['hoten'] ?>">
    </div>
    <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputAddress2">Ngày Chấm Công</label>
        <input type="text" readonly="readonly" class="form-control" id="thoigian" name="thoigian" value="<?php echo $chamcong[0]['thoigian'] ?>">
    </div>
        <div class="form-group col-md-6">
            <label for="inputState">Tình Trạng</label>
            <select id="tinhtrang" name="tinhtrang" class="form-control">
                <option value = "<?php echo $chamcong[0]['tinhtrang'] ?>"><?php echo $chamcong[0]['tinhtrang'] ?></option>
                <option value="Nghỉ">Nghỉ</option>
                <option value="Đúng Giờ">Đúng Giờ</option>
                <option value="Đi Muộn">Đi Muộn</option>
            </select>
        </div>
        <div class="form-group col-md-6">
        <label for="inputState">Trạng Thái</label>
            <select id="status" name="status" class="form-control">
                <option value="<?php echo $chamcong[0]['status'] ?>"><?php echo $chamcong[0]['status'] ?></option>
                <option value="0">Chưa Duyệt (0)</option>
                <option value="1">Đã Duyệt (1)</option>
            </select>
        </div>
    </div>
    <div class="form-group col-md-12">
        <label for="inputAddress">Ghi Chú</label>
        <textarea type="text" class="form-control" id="ghichu" name="ghichu" cols="40" rows="5" placeholder="Ghi Chú"></textarea>
    </div>
    <div style="padding:30px 50px;" class="form-group col-md-12">
        <button  type="submit" class="btn btn-primary">Lưu</button>
    </div>
    
    </form>
    <?php else: ?>
        <h2>Nhân viên không tồn tại<h2>
    <?php endif;?> 
        
</div>



<script>

        function check(){
            var chucvu = '<?php echo $user[0]['chucvu'] ?>';
            var n_chucvu = document.getElementById('chucvu').value;

            if( chucvu !== n_chucvu && chucvu === 'SupperAdmin'){
                alert('Không được sửa chức vụ của người dùng này!');
                return false;
            }
            return true;

        }
</script>

<?php endif;?>