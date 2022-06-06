<?php


    $users = query($conn, '*', 'nhan_vien', '');

    if( isset($_SESSION['add_pr']) && isset($_POST['name']) && $_SESSION['add_pr'] === $_POST['name']) unset($_POST['name']);

    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $manhanvien = isset($_POST['manhanvien']) ? $_POST['manhanvien'] : null;
    $ngaybatdau = isset($_POST['ngaybatdau']) ? $_POST['ngaybatdau'] : null;
    $ngaybangiao = isset($_POST['ngaybangiao']) ? $_POST['ngaybangiao'] : null;
    $ngayketthuc = isset($_POST['ngayketthuc']) ? $_POST['ngayketthuc'] : null;
    $mota = isset($_POST['mota']) ? $_POST['mota'] : '';
    $id_u = $_SESSION['id_nhanvien'];
    $dates = date('Y/m/d H:i:s');
    if($name && $manhanvien && $ngaybatdau && $ngaybangiao && $ngayketthuc){
        $stt = 0;
        $id = query($conn, '*', 'projects', 'Where id > 0 ORDER BY id DESC');
        if( is_array($id) && count($id) > 0)
        $stt = $id[0]['id'];
        $ma = 'DA';
        if($stt < 10) $ma.= '0000'.$stt;
        else if($stt < 100) $ma.= '000'.$stt;
        else if($stt < 1000) $ma.= '00'.$stt;
        else if($stt < 10000) $ma.= '0'.$stt;

        $columns = 'maduan, tenduan, mota, NgayBatDau, NgayBanGiao, NgayKetThuc, id_trangthai, id_nhanvien, manhanvien, ngaytao, ngaysua';
        $values = "'$ma', '$name', '$mota', '$ngaybatdau', '$ngaybangiao', '$ngayketthuc', 1, $id_u, '$manhanvien', '$dates', '$dates'";
        
        $add_pr = insert($conn, 'projects', $columns, $values);

        if($add_pr){
            $_SESSION['add_pr'] = $_POST['name'];
			echo '<script language="javascript">';
			echo 'alert("Tạo dự án thành công! Hãy chờ duyệt")';
			echo '</script>';
        }

    }


?>


<div class="col-lg-8 pms-mt-10">
    <h3 class="title1">Dự Án Mới</h3>
    <a href="index.php?m=project&a=list">
            <button class="btn btn-info btn-sm" style="margin-bottom:30px"><< Quay lại</button>
    </a>
    <form action="" method="POST">
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputEmail4">Tên Dự Án</label>
            <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group col-md-6">
            <label for="inputState">Người Phụ Trách</label>
            <select name="manhanvien" id="manhanvien" class="form-control">
                <option value="-1">Choose...</option>
                <?php if($users): foreach($users as $key => $user): ?>
                <option value="<?php echo $user['manhanvien'] ?>"><?php echo $user['hoten'] ?></option>
                <?php endforeach; endif; ?>
            </select>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="inputAddress">Ngày Bắt Đầu</label>
            <input type="date" class="form-control" id="ngaybatdau" name="ngaybatdau">
        </div>
        <div class="form-group col-md-6">
            <label for="inputAddress2">Ngày Bàn Giao(Dự Tính)</label>
            <input type="date" class="form-control" id="ngaybangiao" name="ngaybangiao">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">Ngày Kết Thúc(Dự Tính)</label>
                <input type="date" class="form-control" id="ngayketthuc" name="ngayketthuc">
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="inputAddress">Mô tả</label>
            <textarea type="text" class="form-control" id="mota" name="mota" cols="40" rows="5" placeholder="Mô tả"></textarea>
        </div>
        <div style="padding:30px 50px;" class="form-group col-md-12">
            <button  type="submit" class="btn btn-primary">Tạo dự án</button>
        </div>
        
    </form>
</div>