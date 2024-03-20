


<div class="d-flex justify-content-center">
    <div class="col-md-8">
        <div class="card shadow mb-6 ">
            <form action="" method="post">
                <div class="form-horizontal">
                    <div class="card-header">
                        <h4 class="font-weight-bold text-primary d-flex justify-content-center align-items-center m-0">Biểu mẫu cập nhật đầu sách</h4>
                    </div>


                    <div class="card-body">
                        <span class="text-danger"><?php echo $erorr ?></span>
                        <!--Start form-->
                        
                        <input hidden type="text" name="MaDS" id="" class="form-control" value="<?php echo $data->getMaDS() ?>">
                        <div class="form-group">
                            <label for="TenDS" class="control-label col-md-12">Tên đầu sách</label>
                            <div class="col-md-12">
                                <input type="text" name="TenDS" id="" class="form-control" value="<?php echo $data->getTenDS() ?>">
                                <span class="text-danger"><?php echo $erorr_namebook ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TenTG" class="control-label col-md-12">Tên tác giả</label>
                            <div class="col-md-12">
                                <input type="text" name="TenTG" id="" class="form-control" value="<?php echo $data->getTenTG() ?>">
                                <span class="text-danger"><?php echo $erorr_nametg ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TenDS" class="control-label col-md-12">Thể loại</label>
                            <div class="col-md-12">
                                <select class="form-control" name="MaTL" id="">
                                    <?php
                                    foreach ($choicetl as $tl) {
                                    ?>

                                        <option <?php if($data->getTheLoai()->getMaTL() == $tl->getMaTL()){ echo "selected";} ?> value="<?php echo $tl->getMaTL()?>"><?php echo $tl->getTenTL()?></option>
                                    <?php } ?>
                                </select>
                                <span class="text-danger"><?php echo $erorr_cateid ?></span>
                            </div>
                        </div>

                    </div>

                </div>
            </form>


            <script src="https://kit.fontawesome.com/d69cbc9d77.js" crossorigin="anonymous"></script>
        </div>
    </div>
</div>

