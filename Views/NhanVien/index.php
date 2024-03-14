
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Mã nhân viên</th>
            <th>Họ Tên</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Tài khoản</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Mã nhân viên</th>
            <th>Họ Tên</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Tài khoản</th>
            <th>Chức năng</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
            foreach ($data as $staff){    
        ?>
        <tr>
            <td><?php echo $staff->getMaNV();?></td>
            <td><?php echo $staff->getHoTen();?></td>
            <td><?php echo $staff->getNgaySinh();?></td>
            <td><?php echo $staff->getDiaChi();?></td>
            <td><?php echo $staff->getSdt();?></td>
            <td><?php echo $staff->getTaiKhoan()->getTaiKhoan();?></td>
            <td>
                <a href="index.php?controller=nhanvien&action=detail&id=<?php echo $staff->getMaNV();?>">Chi tiết</a>
                <a href="index.php?controller=nhanvien&action=edit&id=<?php echo $staff->getMaNV();?>">Sửa</a>
                <a href="index.php?controller=nhanvien&action=delete&id=<?php echo $staff->getMaNV();?>">Xóa</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>