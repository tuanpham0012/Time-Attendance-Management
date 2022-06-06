<?php

if( $id && $_SESSION['chucvu'] !== 'SupperAdmin'):

    echo '<h2>Không được phép truy cập<h2>' ;
else :

    $users = query($conn, '*', 'nhan_vien', '');
    $trangthai = query($conn, '*', 'trangthai_project', '');

    if($id && $id > 0){
        $param = 'Where id = '.$id;
        $projects = query($conn, '*', 'projects', $param);
    }

    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $manhanvien = isset($_POST['manhanvien']) ? $_POST['manhanvien'] : null;
    $ngaybatdau = isset($_POST['ngaybatdau']) ? $_POST['ngaybatdau'] : null;
    $ngaybangiao = isset($_POST['ngaybangiao']) ? $_POST['ngaybangiao'] : null;
    $ngayketthuc = isset($_POST['ngayketthuc']) ? $_POST['ngayketthuc'] : null;
    $id_tt = isset($_POST['trangthai']) ? $_POST['trangthai'] : null;
    $mota = isset($_POST['mota']) ? $_POST['mota'] : '';
    $dates = date('Y/m/d H:i:s');
    if($name && $manhanvien && $ngaybatdau && $ngaybangiao && $ngayketthuc){
        
        $values = " tenduan = '$name', mota = '$mota', NgayBatDau = '$ngaybatdau', NgayBanGiao = '$ngaybangiao', NgayKetThuc = '$ngayketthuc', id_trangthai = $id_tt, manhanvien = '$manhanvien', ngaysua = '$dates'";
    
        $edit_nv = update($conn, 'projects', $values, $param);

        if($edit_nv){
			echo '<script language="javascript">';
			echo 'alert("Sửa thông tin dự án thành công")';
			echo '</script>';
        }
        else{
            echo '<script language="javascript">';
			echo 'alert("Sửa thông tin dự án thất bại")';
			echo '</script>';
        }

    }


?>


<div class="col-lg-8 pms-mt-10">
    <h3 class="title1">Chỉnh Sửa Thông Tin</h3>
    <a href="index.php?m=project&a=list">
            <button class="btn btn-info btn-sm" style="margin-bottom:30px"><< Quay lại</button>
    </a>
    <?php if(is_array($projects) && count($projects) > 0): ?>
    <form action="" method="POST" onsubmit="return check();">
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputEmail4">Tên Dự Án</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $projects[0]['tenduan'] ?>">
            </div>
            <div class="form-group col-md-6">
            <label for="inputState">Người Phụ Trách</label>
            <select name="manhanvien" id="manhanvien" class="form-control">
                <option value="<?php echo $projects[0]['manhanvien'] ?>"><?php echo $projects[0]['manhanvien'] ?></option>
                <?php if($users): foreach($users as $key => $user): ?>
                <option value="<?php echo $user['manhanvien'] ?>"><?php echo $user['hoten'] ?></option>
                <?php endforeach; endif; ?>
            </select>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="inputAddress">Ngày Bắt Đầu</label>
            <input type="date" class="form-control" id="ngaybatdau" name="ngaybatdau" value="<?php echo $projects[0]['NgayBatDau'] ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputAddress2">Ngày Bàn Giao(Dự Tính)</label>
            <input type="date" class="form-control" id="ngaybangiao" name="ngaybangiao" value="<?php echo $projects[0]['NgayBanGiao'] ?>">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">Ngày Kết Thúc(Dự Tính)</label>
                <input type="date" class="form-control" id="ngayketthuc" name="ngayketthuc" value="<?php echo $projects[0]['NgayKetThuc'] ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">Trạng thái</label>
                <select id="trangthai" name="trangthai" class="form-control">
                <option value="<?php echo $projects[0]['id_trangthai'] ?>">Choose...</option>
                <?php if($trangthai): foreach($trangthai as $key => $tt): ?>
                <option value="<?php echo $tt['id_trangthai'] ?>"><?php echo $tt['trangthai'] ?></option>
                <?php endforeach; endif; ?>
            </select>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="inputAddress">Mô tả</label>
            <textarea type="text" class="form-control" id="mota" name="mota" cols="40" rows="5" placeholder="<?php echo $projects[0]['mota'] ?>"></textarea>
        </div>
        <div style="padding:30px 50px;" class="form-group col-md-12">
            <button  type="submit" class="btn btn-primary">Tạo dự án</button>
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