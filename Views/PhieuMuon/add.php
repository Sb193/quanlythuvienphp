


<div class="d-flex justify-content-center">
    <div class="col-md-8">
        <div class="card shadow mb-6 ">
            <form action="" method="post">
                <div class="form-horizontal">
                    <div class="card-header">
                        <h4 class="font-weight-bold text-primary d-flex justify-content-center align-items-center m-0">Biểu mẫu thêm phiếu mượn</h4>
                    </div>


                    <div class="card-body">
                        <span class="text-danger"><?php echo $erorr ?></span>
                        <!--Start form-->

                        
                        <div class="form-group">
                            <label for="hoten" class="control-label col-md-12">Mã thẻ thư viện</label>
                            <div class="col-md-12">
                                <input type="text" name="MaTTV" id="" class="form-control">
                                <span class="text-danger"><?php echo $erorr_mattv ?></span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="hoten" class="control-label col-md-12">Mã nhân viên</label>
                            <div class="col-md-12">
                                <input type="text" name="MaNV" id="" class="form-control">
                                <span class="text-danger"><?php echo $erorr_manv ?></span>
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="ngaysinh" class="control-label col-md-12">Ngày mượn</label>
                                <div class="col-md-12">
                                    <input type="date" name="NgayMuon" id="" class="form-control">
                                    <span class="text-danger"><?php echo $erorr_ngaymuon ?></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="sdt" class="control-label col-md-12">Ngày trả</label>
                                <div class="col-md-12">
                                    <input type="date" name="NgayTra" id="" class="form-control">
                                    <span class="text-danger"><?php echo $erorr_ngaytra ?></span>
                                </div>
                            </div>


                            
                        </div>

                        <div class="form-group">
                            <label for="diachi" class="control-label col-md-12">Lựa chọn</label>
                            <div class="col-md-12">
                                <select class="form-control" name="LuaChon" id="">
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

                        

                        
                        

                        <!--End Form-->
                        <div class="form-group d-flex align-items-center">
                            <div class="col-md-offset-2 col-md-5 text-right">
                                <input type="submit" name="add_phieumuon" value="Thêm" class="btn btn-primary pl-3 pr-3" />
                            </div>

                            <div class="col-md-offset-2 col-md-5 ">
                                <a href="index?controller=phieumuon&action=index" class="btn btn-default h4 pl-3 pr-3">Trở lại</a>
                            </div>
                        </div>


                    </div>

                </div>
            </form>


            <script src="https://kit.fontawesome.com/d69cbc9d77.js" crossorigin="anonymous"></script>
        </div>
    </div>
</div>


