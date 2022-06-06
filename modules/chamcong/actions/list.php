<?php

$timkiem_p = isset($_POST['timkiem']) ? $_POST['timkiem'] : $timkiem;

if($timkiem_p !== ''){
    $page_size = 6;
    $prarams = "Where hoten like '%$timkiem_p%'";
    $total = countQuery($conn, '*', 'nhan_vien', $prarams);
    $prarams .=' ORDER BY hoten LIMIT ' . ($page_index-1)*$page_size . ','.$page_size;
    $users = query($conn, '*', 'nhan_vien', $prarams);
    $base_url = 'index.php?m=chamcong&a=list&timkiem='.$timkiem_p;
    $link = paginate($base_url, $total, $page_index, $page_size);
}else{
    $page_size = 6;
    
    $prarams =' ORDER BY hoten LIMIT ' . ($page_index-1)*$page_size . ','.$page_size;
    $users = query($conn, '*', 'nhan_vien', $prarams);
    $total = countQuery($conn, '*', 'nhan_vien', '');
    $base_url = 'index.php?m=chamcong&a=list';
    $link = paginate($base_url, $total, $page_index, $page_size);
}

$stt = 0;
?>

<style>
td th{
    max-width:10px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;

}
</style>

<div class="col-lg-24">
    <h3 class="title1">Lịch Sử Chấm Công</h3>
    <a href="index.php?m=chamcong&a=add">
        <button class="btn btn-danger" style="margin-bottom:10px">Tạo Tháng Mới</button>
    </a>
    <form style="margin: 5px 0px 5px 0px;" action = "" method="POST" class="form-inline">
        <div class="form-group mx-sm-3 mb-2">
            <label class="sr-only">Tìm Tên Nv</label>
            <input type="text" class="form-control" name="timkiem" id="timkiem" placeholder="Tên nhân viên">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Tìm Kiếm</button>
    </form>
    <div class="table-responsive">
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Nhân Viên</th>
            <th scope="col">Mã Nhân Viên</th>
            <th scope="col">Giới Tính</th>
            <th scope="col">Địa Chỉ</th>
            <th scope="col">Số DT</th>
            <th scope="col">Chức Vụ</th>
            <th class="text-center">Xử lý</th>
            </tr>
        </thead>
        <tbody>
            <?php if ( is_array($users) && count($users) > 0 ): ?>
                <?php foreach($users as $key => $user ): ?>
                <tr>
                <th scope="row"><?php echo ++$stt; ?></th>
                <td><?php echo $user['hoten']; ?></td>
                <td><?php echo $user['manhanvien']; ?></td>
                <td><?php echo $user['gioitinh']; ?></td>
                <td><?php echo $user['diachi']; ?></td>
                <td><?php echo $user['sdt']; ?></td>
                <td><?php echo $user['chucvu']; ?></td>
                <td  class="text-center">
                            <a href="index.php?m=chamcong&a=detail&id=<?php echo $user['id_nhanvien'] ?>">
                                <button class="btn btn-info btn-sm" style="margin-bottom:10px"><i class="fa fa-info-circle" aria-hidden="true"></i></button>
                            </a>
                </td>
                </tr>
                <?php endforeach; 
            else: ?>
                <tr> 
                    <td colspan="7"><span style="color: red">Không có dữ liệu.</span></td>
                <tr>
            <?php endif; ?>

        </tbody>
        </table>
        
    </div>
    
</div>
<div class="col-lg-12 text-center">
    <div><?php echo $link; ?></div>
</div>
<script>
    function confirmDelete(id, chucvu) {
        
        var ask = confirm('Bạn có chắc chắn muốn xóa không?');
        if (ask) {
            var role = chucvu;
            if( role !== 'User'){
                alert('Không thể xóa ' + role);
                return false;
            }
            window.location.href = "index.php?m=nhanvien&a=delete&id=" + id;
        } else {
            return false;
        }
    }




    jQuery(document).ready(function () {
        jQuery('#chk_all' ).click( function () {
            jQuery('input[type="checkbox"]' ).prop('checked', this.checked)
        })

    });
</script>