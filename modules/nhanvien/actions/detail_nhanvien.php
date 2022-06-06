<?php

if($_SESSION['chucvu'] !== 'SupperAdmin' && $id != $_SESSION['id_nhanvien']):

    echo '<h2>Không được phép truy cập<h2>' ;
else :


if (isset($id) && $id > 0) {
    $tbl = 'nhan_vien n Left join account a ON n.manhanvien = a.manhanvien';
    $user = query($conn, '*', $tbl, ' Where n.id_nhanvien = '.$id);
}
?>
<?php if(isset($user[0])): ?>
    <div class="col-lg-10 " style="margin-top: 10px">
        <h3 class="title1">Chi tiết USER</h3>
        <a href="index.php?m=home">       
            <button class="btn btn-info btn-sm" style="margin-bottom:20px"><< Quay lại</button>
        </a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Thông tin cá nhân</th>
            
                <th scope="col">#</th>
                <th scope="col">Thông tin cá nhân</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Ảnh đại diện</td>
                <th><img src="publics/images/<?php echo $user[0]['anh'];?>" style="width:100px"></th>

                <td>Mã nhân viên</td>
                <th><?php echo $user[0]['manhanvien']; ?></th>
            </tr>
            <tr>
                <td><span></span></td>
                <td><span></span></td>

                <td>Tên</td>
                <th><?php echo $user[0]['hoten']; ?></th>
            </tr>
            <tr>
                <td>Giới tính</td>
                <th><?php echo $user[0]['gioitinh']; ?></th>
                
                <td>Username</td>
                <th><?php echo $user[0]['username']; ?></th>
                
            </tr>
            <tr>
                
            </tr>
            <tr>
                <td>Ngày Sinh</td>
                <th><?php echo formatDate($user[0]['ngaysinh']); ?></th>

                <td>Password</td>
                <th>*******</th>
            </tr>
            <tr>
                <td>Quê quán</td>
                <th><?php echo $user[0]['quequan']; ?></th>

                <td>Email</td>
                <th><?php echo $user[0]['email']; ?></th>

            </tr>
            <tr>
                <td>Địa Chỉ</td>
                <th><?php echo $user[0]['quequan']; ?></th>

                <td>Chức vụ</td>
                <th><?php echo $user[0]['chucvu']; ?></th>

            </tr>
            <tr>
                <td>Số điện thoại</td>
                <th><?php echo $user[0]['quequan']; ?></th>

                <td>Ngày Vào</td>
                <th><?php echo formatDate($user[0]['ngayvao']); ?></th>
            </tr>
            <tr>
                <td>Lần Đăng Nhập Cuối</td>
                <th><?php echo formatDate($user[0]['dangnhapcuoi']); ?></th>

                <td>Lần Chỉnh Sửa Cuối</td>
                <th><?php echo formatDate($user[0]['chinhsuacuoi']); ?></th>
            </tr>
            </tbody>
        </table>
    </div>
<?php else: ?>
        <h2>Nhân viên không tồn tại<h2>
<?php endif;
    endif; ?>
