<?php
require_once 'partials/header.php';
?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo number_format($users); ?></h3>
                            <p>Người dùng</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="/admin/users" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo number_format($charges); ?></h3>

                            <p>Thẻ đã nạp</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="/admin/charges" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo number_format($accounts); ?></h3>

                            <p>Tài khoản game</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-grid"></i>
                        </div>
                        <a href="/admin/game-item" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
require_once 'partials/footer.php';
?>