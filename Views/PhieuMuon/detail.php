<div class="d-flex justify-content-center">
<div class="dl-horizontal col-md-8">
        <div class="card shadow mb-6 ">
            
                <div class="form-horizontal">
                    <div class="card-header">
                        <h4 class="font-weight-bold text-primary d-flex justify-content-center align-items-center m-0">Thông tin đầu phiếu mượn</h4>
                    </div>


                    <div class="card-body">
                        <!--Start form-->
                        <div class="form-group">
                            <label for="TenDS" class="control-label col-md-12">Mã phiếu mượn</label>
                            <div class="col-md-12">
                                <input readonly type="text" name="TenDS" id="" class="form-control bg-white" value="<?php echo $phieumuon->getMaPM() ?>">
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TenTG" class="control-label col-md-12">Thẻ thư viện</label>
                            <div class="col-md-12">
                                <input readonly type="text" name="TenTG" id="" class="form-control bg-white" value="<?php echo $phieumuon->getMaTTV() ?>">
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TenDS" class="control-label col-md-12">Thể loại</label>
                            <div class="col-md-12">
                            <input readonly type="text" name="TheLoai" id="" class="form-control bg-white" value="<?php echo $phieumuon->getMaNV(); ?>">
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="ngaysinh" class="control-label col-md-12">Ngày mượn</label>
                                <div class="col-md-12">
                                    <input type="date" name="NgayMuon" id="" class="form-control">
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="sdt" class="control-label col-md-12">Ngày trả</label>
                                <div class="col-md-12">
                                    <input type="date" name="NgayTra" id="" class="form-control">
                                    
                                </div>
                            </div>


                            
                        </div>

                        <div class="form-group">
                            <label for="diachi" class="control-label col-md-12">Lựa chọn</label>
                            <div class="col-md-12">
                                <select class="form-control" name="LuaChon" id="">
                                    <!-- Sửa sau-->
                                    <option value="Tại chỗ">Tại chỗ</option>
                                    <option value="Mang về">Mang về</option>
                                </select>
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label for="taikhoan" class="control-label col-md-12">Trạng thái</label>
                            <div class="col-md-12">
                                <select class="form-control" name="TrangThai" id="">

                                    <option value="Đang mượn">Đang mượn</option>
                                    <option value="Đã hoàn thành">Đã hoàn thành</option>
                                    <option value="Quá hạn">Quá hạn</option>
                                </select>
                            </div>
                        </div>

                        

                    </div>

                </div>
            


            
        </div>
        <?php
        foreach ($ct as $ctpm) {
        ?>
            <div class="card shadow mt-4 mb-2">
                <form action="" method="post">
                    <div class="form-horizontal">
                        <div class="card-header bg-warning ">
                            <h4 class="font-weight-bold text-white d-flex justify-content-center align-items-center m-0">Thông tin sách</h4>
                        </div>


                        <div class="card-body">
                            <!--Start form-->
                            <div class="form-group">
                                <label for="TenDS" class="control-label col-md-12">Mã Sách</label>
                                <div class="col-md-12">
                                    <input readonly type="text" name="TenDS" id="" class="form-control bg-white" value="<?php echo $ctpm->getMaSach() ?>">
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="TenTG" class="control-label col-md-12">Tên sách</label>
                                <div class="col-md-12">
                                    <input readonly type="text" name="TenTG" id="" class="form-control bg-white" value="<?php echo $ctpm->getSach()->DauSach->getTenDS() ?>">
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="TenTG" class="control-label col-md-12">Tên tác giả</label>
                                <div class="col-md-12">
                                    <input readonly type="text" name="TenTG" id="" class="form-control bg-white" value="<?php echo $ctpm->getSach()->DauSach->getTenTG() ?>">
                                    
                                </div>
                            </div>


                        </div>

                        

                    </div>
                </form>


                
            </div>


        <?php }?>
        <div>
            <div class="card shadow mb-6">
                <div class="card-header">
                    <h4 class="text-primary">Thêm chi tiết phiếu</h4>
                </div>

                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <input hidden type="text" name="MaPM" id="" class="form-control bg-white" value="<?php echo $phieumuon->getMaPM() ?>">
                            <label for="TenDS" class="control-label col-md-12">Mã Sách</label>
                            <div class="col-md-12">
                                <input type="text" name="MaSach" id="" class="form-control bg-white">
                                
                            </div>
                        </div>

                        <span class="text-danger"><?php echo $error ?></span>

                        <div class="form-group d-flex align-items-center">
                            <div class="col-md-offset-2 col-md-5 text-right">
                                <input type="submit" name="add_sach" value="Thêm" class="btn btn-primary pl-3 pr-3" />
                            </div>

                            <div class="col-md-offset-2 col-md-5 ">
                                <a href="index?controller=phieumuon&action=index" class="btn btn-default h4 pl-3 pr-3">Trở lại</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

</div>
    <script src="https://kit.fontawesome.com/d69cbc9d77.js" crossorigin="anonymous"></script>
</div>