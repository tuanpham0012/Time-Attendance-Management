<?php

if($_SESSION['chucvu'] !== 'SupperAdmin' && $id != $_SESSION['id_nhanvien']):

    echo '<h2>Không được phép truy cập<h2>' ;
else :

$dates = isset($_POST['time']) ?  $_POST['time'] : $date;

$month = date('m',strtotime($dates));
$year = date('Y',strtotime($dates));
$day = date('d',strtotime($dates));

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

$_SESSION['url'] = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

//$users = query($conn, '*', 'nhan_vien', '');


    $page_size = 8;
    $prarams = "Where Day(c.thoigian) <= $day  and Month(c.thoigian) = $month and Year(c.thoigian) = $year";
    if($id) $prarams.=" and c.id_nhanvien = $id"; else $prarams.=" and c.id_nhanvien = ".$_SESSION['id_nhanvien'];
    $total = countQuery($conn, '*', 'chamcong c LEFT JOIN nhan_vien n ON c.id_nhanvien = n.id_nhanvien', $prarams);
    $tk1 = countQuery($conn, '*', 'chamcong c LEFT JOIN nhan_vien n ON c.id_nhanvien = n.id_nhanvien', $prarams." and c.tinhtrang like 'Nghỉ'");
    $tk2 = countQuery($conn, '*', 'chamcong c LEFT JOIN nhan_vien n ON c.id_nhanvien = n.id_nhanvien', $prarams." and c.tinhtrang like 'Đúng Giờ'");
    $tk3 = countQuery($conn, '*', 'chamcong c LEFT JOIN nhan_vien n ON c.id_nhanvien = n.id_nhanvien', $prarams." and c.tinhtrang like 'Đi Muộn'");
    $prarams .=' ORDER BY c.id_nhanvien LIMIT ' . ($page_index-1)*$page_size . ','.$page_size;
    $chamcong = query($conn, 'c.*,n.*', 'chamcong c LEFT JOIN nhan_vien n ON c.id_nhanvien = n.id_nhanvien', $prarams);
    $base_url = 'index.php?m=chamcong&a=detail&id='.$id;
    $link = paginate($base_url, $total, $page_index, $page_size);

$stt = 0;

    if($module === 'chamcong'){
        if($deleted == 1){
            echo '<script language="javascript">';
			echo 'alert("Chấm công thành công")';
			echo '</script>';

        }
        else if($deleted == 0){
            echo '<script language="javascript">';
			echo 'alert("Chấm công thất bại")';
			echo '</script>';
        }
    }
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
    <div>
        <a href="index.php?m=chamcong&a=update">
            <button class="btn btn-success" style="margin:0px 50px 20px 5px">Chấm Công</button>
        </a>

        <p class="btn btn-info" style="margin:0px 10px 20px 50px"> Số ngày đi làm: <?php echo $tk2+$tk3; ?></p>
        <p class="btn btn-info" style="margin:0px 10px 20px 10px"> Số ngày đúng giờ: <?php echo $tk2 ?></p>
        <p class="btn btn-info" style="margin:0px 10px 20px 10px"> Số ngày đi muộn: <?php echo $tk3; ?></p>
        <p class="btn btn-info" style="margin:0px 10px 20px 10px"> Số ngày nghỉ: <?php echo $tk1; ?></p>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên Nhân Viên</th>
                <th scope="col">Mã Nhân Viên</th>
                <th scope="col">Thời Gian</th>
                <th scope="col">Tình Trạng</th>
                <th scope="col">Trạng Thái</th>
                <th scope="col">Ghi Chú</th>
                <th scope="col">Xử lí</th>
            </tr>
        </thead>
        <tbody>
            <?php if ( is_array($chamcong) && count($chamcong) > 0 ): ?>
                <?php foreach($chamcong as $key => $cc ): ?>
                <tr>
                    <th scope="row"><?php echo ++$stt; ?></th>
                    <td><?php echo $cc['hoten']; ?></td>
                    <td><?php echo $cc['manhanvien']; ?></td>
                    <td style="max-width:150px;"><?php echo $cc['thoigian']; ?></td>
                    <td><?php echo $cc['tinhtrang']; ?></td>
                    <td><?php echo $cc['status']; ?></td>
                    <td><?php echo $cc['ghichu']; ?></td>
                    <?php if ( $_SESSION['chucvu'] ==='SupperAdmin'): ?>
                    <td style="max-width:150px;" class="text-center">
                                <a href="index.php?m=chamcong&a=edit&id=<?php echo $cc['id_nhanvien']."&time=".$cc['thoigian']; ?>">
                                    <button class="btn btn-success btn-sm" style="margin-bottom:10px"><i class="fa fa-upload" aria-hidden="true"></i></button>
                                </a>
                    </td>
                    <?php endif; ?>
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

<?php endif; ?>