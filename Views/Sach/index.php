
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Mã Người</th>
            <th>Họ Tên</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Mã Người</th>
            <th>Họ Tên</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
            foreach ($data as $user){    
        ?>
        <tr>
            <td><?php echo $user->getMaNguoi();?></td>
            <td><?php echo $user->getHoTen();?></td>
            <td><?php echo $user->getNgaySinh();?></td>
            <td><?php echo $user->getDiaChi();?></td>
            <td><?php echo $user->getSdt();?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
                            


    
