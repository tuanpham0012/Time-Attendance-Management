<?php

if($_SESSION['chucvu'] !== 'SupperAdmin'):

    echo '<h2>Không được phép truy cập<h2>' ;
else :


    $phongban = query($conn, '*', 'phongban', '');

    if( isset($_SESSION['add_nv']) && isset($_POST['name']) && $_SESSION['add_nv'] === $_POST['name']) unset($_POST['name']);

    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $phong = isset($_POST['maphongban']) ? $_POST['maphongban'] : null;
    $quequan = isset($_POST['quequan']) ? $_POST['quequan'] : null;
    $diachi = isset($_POST['diachi']) ? $_POST['diachi'] : null;
    $sdt = isset($_POST['sdt']) ? $_POST['sdt'] : null;
    $gioitinh = isset($_POST['gioitinh']) ? $_POST['gioitinh'] : null;
    $chucvu = isset($_POST['chucvu']) ? $_POST['chucvu'] : null;
    $ngaysinh = isset($_POST['ngaysinh']) ? $_POST['ngaysinh'] : null;
    $ngayvao = isset($_POST['ngayvao']) ? $_POST['ngayvao'] : null;
    $ngaytao = date('Y/m/d');
    if($name && $phong && $quequan && $diachi && $sdt && $gioitinh && $chucvu && $ngaysinh && $ngayvao){
        $stt = 0;
        $id = query($conn, '*', 'nhan_vien', 'Where id_nhanvien > 0 ORDER BY id_nhanvien DESC');
        if( is_array($id) && count($id) > 0)
        $stt = $id[0]['id_nhanvien'];
        $ma = 'NV';
        if($stt < 10) $ma.= '0000'.$stt;
        else if($stt < 100) $ma.= '000'.$stt;
        else if($stt < 1000) $ma.= '00'.$stt;
        else if($stt < 10000) $ma.= '0'.$stt;

        $columns = 'hoten, manhanvien, gioitinh, ngaysinh, quequan, diachi, sdt, maphongban, ngayvao, chucvu, ngaytao';
        $values = "'$name', '$ma', '$gioitinh', '$ngaysinh', '$quequan', '$diachi', '$sdt', '$phong', '$ngayvao', '$chucvu', '$ngaytao'";
        
        $add_nv = insert($conn, 'nhan_vien', $columns, $values);

        if($add_nv){
            $_SESSION['add_nv'] = $_POST['name'];
			echo '<script language="javascript">';
			echo 'alert("Thêm nhân viên thành công")';
			echo '</script>';
        }

    }


?>


<div class="col-lg-8 pms-mt-10">
    <h3 class="title1">Thêm Nhân Viên Mới</h3>
    <a href="<?php echo $_SESSION['url'] ?>">
            <button class="btn btn-info btn-sm" style="margin-bottom:30px"><< Quay lại</button>
    </a>
    <form action="" method="POST">
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">Họ Tên</label>
        <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group col-md-4">
        <label for="inputState">Phòng Ban</label>
        <select name="maphongban" id="maphongban" class="form-control">
            <option value="-1">Choose...</option>
            <?php if($phongban): foreach($phongban as $key => $ma): ?>
            <option value="<?php echo $ma['maphong'] ?>"><?php echo $ma['tenphong'] ?></option>
            <?php endforeach; endif; ?>
        </select>
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="inputAddress">Quê quán</label>
        <input type="text" class="form-control" id="quequan" name="quequan">
    </div>
    <div class="form-group col-md-6">
        <label for="inputAddress2">Địa Chỉ</label>
        <input type="text" class="form-control" id="diachi" name="diachi">
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputCity">Số Điện Thoại</label>
            <input type="text" class="form-control" id="sdt" name="sdt">
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">Giới Tính</label>
            <select id="gioitinh" name="gioitinh" class="form-control">
                <option selected>Choose...</option>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
                <option value="Khác">Khác</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">Chức Vụ</label>
            <select id="chucvu" name="chucvu" class="form-control">
                <option selected>Choose</option>
                <option value="Admin">Admin</option>
                <option value="User">User</option>  
            </select>
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="inputAddress">Ngày Sinh</label>
        <input type="date" class="form-control" id="ngaysinh" name="ngaysinh">
    </div>
    <div class="form-group col-md-6">
        <label for="inputAddress2">Ngày Vào</label>
        <input type="date" class="form-control" id="ngayvao" name="ngayvao">
    </div>
    <div class="form-group col-md-12">
        <div class="form-check">
        <input class="form-check-input" type="file" id="gridCheck">
        </div>
    </div>
    <div style="padding:30px 50px;" class="form-group col-md-12">
        <button  type="submit" class="btn btn-primary">Thêm nhân viên</button>
    </div>
    
    </form>
</div>

            <?php endif; ?>