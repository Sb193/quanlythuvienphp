<h3>Thống kê sách</h3>
<div class="row">

    <div class="col-xl-8 col-lg-7">

        <!-- Area Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Số lượng sách cho mượn theo tháng</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
                <hr>
                <p>Biểu đồ thống kê số lượng sách được cho mượn theo tháng</p>
            </div>
        </div>


    </div>

    <!-- Donut Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Trạng thái sách trong thời điểm hiện tại</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4">
                    <canvas id="myPieChart"></canvas>
                </div>
                <hr>
                <p>Biểu đồ thống kê số lượng sách đang cho mượn và còn lại trong thư viện</p>
            </div>
        </div>
    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Page level plugins -->
<script src="asset/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="asset/js/demo/chart-area-sachthang.js"></script>
<script src="asset/js/demo/chart-pie-sach.js"></script>






