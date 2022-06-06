<?php

$timkiem_p = isset($_POST['timkiem']) ? $_POST['timkiem'] : $timkiem;
$tt_p = isset($_POST['trangthai']) ? $_POST['trangthai'] : $trangthai;
$trangthai_p = query($conn, '*', 'trangthai_project', '');

    $prarams = ' Where p.id > 0 ';
    $page_size = 6;
    if($timkiem_p) $prarams .= "and p.tenduan like '%$timkiem_p%'"; if($tt_p) $prarams .= "and p.id_trangthai = $tt_p";
    $total = countQuery($conn, '*', 'projects p', $prarams);
    $prarams .=' ORDER BY p.id_trangthai LIMIT ' . ($page_index-1)*$page_size . ','.$page_size;
    $select = 'p.*,n.hoten,v.hoten as name,t.trangthai';
    $table = ' (((projects p LEFT JOIN nhan_vien n ON p.id_nhanvien = n.id_nhanvien)
                LEFT JOIN nhan_vien v ON p.manhanvien = v.manhanvien) LEFT JOIN trangthai_project t ON p.id_trangthai = t.id_trangthai)';
    $projects = query($conn, $select, $table, $prarams);
    $base_url = 'index.php?m=project&a=list&timkiem='.$timkiem_p; if($tt_p) $base_url .= "&trangthai=$tt_p";
    $link = paginate($base_url, $total, $page_index, $page_size);

$stt = 0;

    if($module === 'nhanvien'){
        if($deleted == 1){
            echo '<script language="javascript">';
			echo 'alert("Xóa nhân viên thành công")';
			echo '</script>';

        }
        else if($deleted == 0){
            echo '<script language="javascript">';
			echo 'alert("Xóa nhân viên thất bại")';
			echo '</script>';
        }
    }
?>

<style>
td{
    max-width:10px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;

}
</style>

<div class="col-lg-24">
    <h3 class="title1">Danh sách Dự Án</h3>
    <a href="index.php?m=home">
        <button class="btn btn-success" style="margin-bottom:10px">Thêm mới</button>
    </a>
    <!-- <a href="index.php?m=user&a=deleted">
        <button class="btn btn-danger" style="margin-bottom:10px">Xóa nhiều</button>
    </a> -->
    <form style="margin: 5px 0px 5px 0px;   " action = "" method="POST" class="form-inline">
        <div class="form-group mx-sm-3 mb-2">
            <label for="timkiem" class="sr-only">Tìm Tên Nv</label>
            <input type="text" class="form-control" name="timkiem" id="timkiem" placeholder="Tên nhân viên">
        </div>
        <select name="trangthai" id="trangthai" class="form-control mx-sm-3 mb-2">
            <option value="">Choose...</option>
            <?php if($trangthai_p): foreach($trangthai_p as $key => $tt): ?>
            <option value="<?php echo $tt['id_trangthai'] ?>"><?php echo $tt['trangthai'] ?></option>
            <?php endforeach; endif; ?>
        </select>
        <button type="submit" class="btn btn-primary mb-2">Tìm Kiếm</button>
        
    </form>
    <div class="table-responsive">
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Dự Án</th>
            <th scope="col">Mô Tả</th>
            <th scope="col">Trạng Thái</th>
            <th scope="col">Người Phụ Trách</th>
            <th scope="col">Người Tạo</th>
            <th scope="col">Ngày Tạo</th>
            <th scope="col">Ngày Sửa</th>
            <th class="text-center">Xử lý</th>
            </tr>
        </thead>
        <tbody>
            <?php if ( is_array($projects) && count($projects) > 0 ): ?>
                <?php foreach($projects as $key => $project ): ?>
                <tr>
                <th scope="row"><?php echo ++$stt; ?></th>
                <td><?php echo $project['tenduan']; ?></td>
                <td><?php echo $project['mota']; ?></td>
                <td><?php echo $project['trangthai']; ?></td>
                <td><?php echo $project['name']; ?></td>
                <td><?php echo $project['hoten']; ?></td>
                <td><?php echo $project['ngaytao']; ?></td>
                <td><?php echo $project['ngaysua']; ?></td>
                <td style="max-width:150px;" class="text-center">
                            <a  href="index.php?m=project&a=join&id=<?php echo $project['id']."&maduan=".$project['maduan']; ?>">
                                <button <?php if($project['id_trangthai'] != 2) echo "disabled = 'disabled'" ?> class="btn btn-primary btn-sm" style="margin-bottom:10px"><i class="fa fa-sign-in" aria-hidden="true"></i></button>
                            </a>
                            <?php if ($_SESSION['chucvu'] !== 'SupperAdmin'): ?>
                            <a href="index.php?m=project&a=update&id=<?php echo $project['id'] ?>">
                                <button class="btn btn-primary btn-sm" style="margin-bottom:10px"><i class="fa fa-check-circle-o" aria-hidden="true"></i></button>
                            </a>
                            <a href="index.php?m=project&a=detail&id=<?php echo $project['id'] ?>">
                                <button class="btn btn-info btn-sm" style="margin-bottom:10px"><i class="fa fa-info-circle" aria-hidden="true"></i></button>
                            </a>
                            <a href="index.php?m=project&a=edit&id=<?php echo $project['id'] ?>">
                                <button class="btn btn-success btn-sm" style="margin-bottom:10px"><i class="fa fa-upload" aria-hidden="true"></i></button>
                            </a>
                            <a href="javascript:void(0)" onclick="confirmDelete(<?php echo $project['id'] ?>)">
                                <button class="btn btn-danger btn-sm" style="margin-bottom:10px"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </a>
                            <?php endif; ?>
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
            window.location.href = "index.php?m=project&a=delete&id=" + id;
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