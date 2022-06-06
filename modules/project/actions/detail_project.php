<?php


if (isset($id) && $id > 0) {
    $select = 'p.*,n.hoten,v.hoten as name,t.trangthai';
    $table = ' (((projects p LEFT JOIN nhan_vien n ON p.id_nhanvien = n.id_nhanvien)
                LEFT JOIN nhan_vien v ON p.manhanvien = v.manhanvien) LEFT JOIN trangthai_project t ON p.id_trangthai = t.id_trangthai)';
    $prarams = "Where p.id = ".$id;
    $projects = query($conn, $select, $table, $prarams);
}
?>
<?php if(isset($projects)): ?>
    <div class="col-lg-10 " style="margin-top: 10px">
        <h3 class="title1">Chi tiết Dự Án</h3>
        <a href="index.php?m=project&a=list">
            <button class="btn btn-info btn-sm" style="margin-bottom:20px"><< Quay lại</button>
        </a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Thông tin Dự Án</th>
            
                <th scope="col">#</th>
                <th scope="col">Thông tin Dự Án</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Mã Số</td>
                <th><?php echo $projects[0]['maduan'];?></th>

                <td>Tên Dự Án</td>
                <th><?php echo $projects[0]['tenduan']; ?></th>
            </tr>
            <tr>
                <td>Mô Tả</td>
                <td><span></span></td>

                <td>Ngày Bàn Giao</td>
                <th><?php echo formatDate($projects[0]['NgayBanGiao']); ?></th>
            </tr>
            <tr>
                <td>Ngày Bắt Đầu</td>
                <th><?php echo formatDate($projects[0]['NgayBatDau']); ?></th>
                
                <td>Ngày Kết Thúc</td>
                <th><?php echo formatDate($projects[0]['NgayKetThuc']); ?></th>
                
            </tr>
            <tr>
                
            </tr>
            <tr>
                <td>Người Tạo</td>
                <th><?php echo $projects[0]['name']; ?></th>

                <td>Trạng Thái</td>
                <th><?php echo $projects[0]['trangthai']; ?></th>
            </tr>
            <tr>
                <td>Người Phụ Trách</td>
                <th><?php echo $projects[0]['hoten']; ?></th>

                <td></td>
                <th></th>

            </tr>
            <tr>
                <td>Ngày Tạo</td>
                <th><?php echo formatDate($projects[0]['ngaytao']); ?></th>

                <td>Chỉnh Sửa Cuối</td>
                <th><?php echo formatDate($projects[0]['ngaysua']); ?></th>
            </tr>
            </tbody>
        </table>
    </div>
<?php else: ?>
        <h2>Nhân viên không tồn tại<h2>
<?php endif; ?>
