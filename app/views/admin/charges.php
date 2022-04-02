<?php
require_once 'partials/header.php';
?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="Tìm kiếm">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kênh nạp</th>
                                    <th>Request ID</th>
                                    <th>Người nạp</th>
                                    <th>Loại thẻ</th>
                                    <th>Khai báo/Mệnh giá thực</th>
                                    <th>Số serial/Mã thẻ</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày nạp</th>
                                    <th>Cập nhật</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($charges as $charge) : ?>
                                    <tr>
                                        <td><?php echo $charge['id']; ?></td>
                                        <td><?php echo chargeProvider($charge['provider']); ?></td>
                                        <td><?php echo $charge['request_id']; ?></td>
                                        <td><strong><?php echo getUsernameById($charge['user_id']); ?></strong></td>
                                        <td><?php echo $charge['telco']; ?></td>
                                        <td>
                                            <span><strong>Khai:</strong> <?php echo number_format($charge['amount_declared']); ?>đ</span><br>
                                            <span><strong>Thực:</strong> <?php echo number_format($charge['amount']); ?>đ</span>
                                        </td>
                                        <td>
                                            <span><strong>MT:</strong> <?php echo $charge['pin']; ?><br></span>
                                            <span><strong>SR:</strong> <?php echo $charge['serial']; ?></span>
                                        </td>
                                        <td>
                                            <?php if ($charge['status'] == 1) : ?>
                                                <span class="badge bg-success">Thành công</span>
                                            <?php elseif ($charge['status'] == 0) : ?>
                                                <span class="badge bg-warning">Đang chờ</span>
                                            <?php elseif ($charge['status'] == 2) : ?>
                                                <span class="badge bg-info">Sai mệnh giá</span>
                                            <?php elseif ($charge['status'] == 3) : ?>
                                                <span class="badge bg-danger">Thất bại</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo $charge['created_at']; ?></td>
                                        <td><?php echo $charge['updated_at']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        <?php \ShopGame\core\PaginationWidget::widget(['pagination' => $pagination]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once 'partials/footer.php';
?>