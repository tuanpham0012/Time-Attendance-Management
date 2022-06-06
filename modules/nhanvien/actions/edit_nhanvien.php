<?php

if( $id && $_SESSION['chucvu'] !== 'SupperAdmin' && $id != $_SESSION['id_nhanvien']):

    echo '<h2>Không được phép truy cập<h2>' ;
else :

    $phongban = query($conn, '*', 'phongban', '');

    if($id && $id > 0){
        $param = 'Where id_nhanvien = '.$id;
        $user = query($conn, '*', 'nhan_vien', $param);
    }

    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $phong = isset($_POST['maphongban']) ? $_POST['maphongban'] : null;
    $quequan = isset($_POST['quequan']) ? $_POST['quequan'] : null;
    $diachi = isset($_POST['diachi']) ? $_POST['diachi'] : null;
    $sdt = isset($_POST['sdt']) ? $_POST['sdt'] : null;
    $gioitinh = isset($_POST['gioitinh']) ? $_POST['gioitinh'] : null;
    $chucvu = isset($_POST['chucvu']) ? $_POST['chucvu'] : null;
    $ngaysinh = isset($_POST['ngaysinh']) ? $_POST['ngaysinh'] : null;
    $ngayvao = isset($_POST['ngayvao']) ? $_POST['ngayvao'] : null;
    $ngaysua = date('Y/m/d H:i:s');
    if($name && $phong && $quequan && $diachi && $sdt && $gioitinh && $chucvu && $ngaysinh && $ngayvao){
        
        $values = " hoten = '$name', gioitinh = '$gioitinh', ngaysinh = '$ngaysinh', quequan = '$quequan', diachi = '$diachi', sdt = '$sdt', maphongban = '$phong', ngayvao = '$ngayvao', chucvu = '$chucvu', chinhsuacuoi = '$ngaysua'";
    
        $edit_nv = update($conn, 'nhan_vien', $values, $param);

        if($edit_nv){
			echo '<script language="javascript">';
			echo 'alert("Sửa thông tin nhân viên thành công")';
			echo '</script>';
        }

    }


?>


<div class="col-lg-8 pms-mt-10">
    <h3 class="title1">Chỉnh Sửa Thông Tin</h3>
    <a href="index.php?m=home">       
            <button class="btn btn-info btn-sm" style="margin-bottom:30px"><< Quay lại</button>
        </a>
    <?php if(is_array($user) && count($user) > 0): ?>
    <form action="" method="POST" onsubmit="return check();">
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">Họ Tên</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $user[0]['hoten'] ?>">
        </div>
        <div class="form-group col-md-4">
        <label for="inputState">Phòng Ban</label>
        <select name="maphongban" id="maphongban" class="form-control">
            <option value="<?php echo $user[0]['maphongban'] ?>"><?php echo $user[0]['maphongban'] ?></option>
            <?php if($_SESSION['chucvu'] === 'SupperAdmin'): ?>
            <?php if($phongban): foreach($phongban as $key => $ma): ?>
            <option value="<?php echo $ma['maphong'] ?>"><?php echo $ma['tenphong'] ?></option>
            <?php endforeach; endif; endif;?>
        </select>
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="inputAddress">Quê quán</label>
        <input type="text" class="form-control" id="quequan" name="quequan" value="<?php echo $user[0]['quequan'] ?>">
    </div>
    <div class="form-group col-md-6">
        <label for="inputAddress2">Địa Chỉ</label>
        <input type="text" class="form-control" id="diachi" name="diachi" value="<?php echo $user[0]['diachi'] ?>">
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputCity">Số Điện Thoại</label>
            <input type="text" class="form-control" id="sdt" name="sdt" value="<?php echo $user[0]['sdt'] ?>">
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">Giới Tính</label>
            <select id="gioitinh" name="gioitinh" class="form-control">
                <option value = "<?php echo $user[0]['gioitinh'] ?>"><?php echo $user[0]['gioitinh'] ?></option>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
                <option value="Khác">Khác</option>
            </select>
        </div>
        <div class="form-group col-md-4">
        <label for="inputState">Chức Vụ</label>
            <select id="chucvu" name="chucvu" class="form-control">
                <option value="<?php echo $user[0]['chucvu'] ?>"><?php echo $user[0]['chucvu'] ?></option>
                <?php if($_SESSION['chucvu'] === 'SupperAdmin'): ?>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
                <?php endif; ?>
            </select>
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="inputAddress">Ngày Sinh</label>
        <input type="date" class="form-control" id="ngaysinh" name="ngaysinh" value="<?php echo $user[0]['ngaysinh'] ?>">
    </div>
    <div class="form-group col-md-6">
        <label for="inputAddress2">Ngày Vào</label>
        <input <?php if($_SESSION['chucvu'] !== 'SupperAdmin') echo 'readonly' ?> type="date" class="form-control" id="ngayvao" name="ngayvao" value="<?php echo $user[0]['ngayvao'] ?>">
    </div>
    <div class="form-group col-md-12">
        <div class="form-check">
        <input class="form-check-input" type="file" id="gridCheck">
        </div>
    </div>
    <div style="padding:30px 50px;" class="form-group col-md-12">
        <button  type="submit" class="btn btn-primary">Lưu</button>
    </div>
    
    </form>
    <?php else: ?>
        <h2>Nhân viên không tồn tại<h2>
    <?php endif;?>; 
        
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