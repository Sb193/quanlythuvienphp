



    <div class="dl-horizontal">
        <div class="card shadow mb-6 ">
            <form action="" method="post">
                <div class="form-horizontal">
                    <div class="card-header">
                        <h4 class="font-weight-bold text-primary d-flex justify-content-center align-items-center m-0">Thông tin đầu sách</h4>
                    </div>


                    <div class="card-body">
                        <!--Start form-->
                        <div class="form-group">
                            <label for="TenDS" class="control-label col-md-12">Tên đầu sách</label>
                            <div class="col-md-12">
                                <input readonly type="text" name="TenDS" id="" class="form-control bg-white" value="<?php echo $dausach->getTenDS() ?>">
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TenTG" class="control-label col-md-12">Tên tác giả</label>
                            <div class="col-md-12">
                                <input readonly type="text" name="TenTG" id="" class="form-control bg-white" value="<?php echo $dausach->getTenTG() ?>">
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TenDS" class="control-label col-md-12">Thể loại</label>
                            <div class="col-md-12">
                            <input readonly type="text" name="TheLoai" id="" class="form-control bg-white" value="<?php echo $dausach->getTheLoai()->getTenTL() ?>">
                                
                            </div>
                        </div>

                        <div class="form-group d-flex align-items-center">
                            <div class="col-md-offset-2 col-md-5 text-right">
                                <a href="index.php?controller=sach&action=addbook&id=<?php echo $dausach->getMaDS()?>" class="btn btn-primary h4 pl-3 pr-3">Thêm sách</a>
                            </div>

                            <div class="col-md-offset-2 col-md-5 ">
                                <a href="index?controller=sach&action=index" class="btn btn-default h4 pl-3 pr-3">Trở lại</a>
                            </div>
                        </div>

                    </div>

                </div>
            </form>


            <script src="https://kit.fontawesome.com/d69cbc9d77.js" crossorigin="anonymous"></script>
        </div>

        <?php
        foreach ($sachs as $sach) {
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
                                    <input readonly type="text" name="TenDS" id="" class="form-control bg-white" value="<?php echo $sach->getMaSach() ?>">
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="TenTG" class="control-label col-md-12">Trạng Thái</label>
                                <div class="col-md-12">
                                    <input readonly type="text" name="TenTG" id="" class="form-control bg-white" value="<?php echo $sach->getTrangThai() ?>">
                                    
                                </div>
                            </div> 

                            <div class="form-group d-flex align-items-center justify-content-center">
                                <button class="btn btn-danger">Xóa</button>
                            </div>

                        </div>

                        </div>

                    </div>
                </form>


                
            </div>


        <?php }?>

    </div>
    <script src="https://kit.fontawesome.com/d69cbc9d77.js" crossorigin="anonymous"></script>



