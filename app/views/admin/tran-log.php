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
                                    <input type="text" name="search" class="form-control float-right"
                                           placeholder="Tìm kiếm">
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
                                    <th>Thời gian</th>
                                    <th>Người dùng</th>
                                    <th>Giao dịch</th>
                                    <th>Số tiền</th>
                                    <th>Số dư cuối</th>
                                    <th>Nội dung</th>
                                    <th>Trạng thái</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($transactions as $transaction): ?>
                                    <tr>
                                        <td><?php echo $transaction['id']; ?></td>
                                        <td><?php echo $transaction['created_at']; ?></td>
                                        <td><?php echo getUsernameById($transaction['user_id']); ?></td>
                                        <td><?php echo getTradeName($transaction['trade_type']); ?></td>
                                        <td>
                                            <?php if (getTradeType($transaction['trade_type']) == 'plus'): ?>
                                                <span class="fw-bold text-success">+<?php echo number_format($transaction['amount']); ?>đ</span>
                                            <?php else: ?>
                                                <span class="fw-bold text-danger">-<?php echo number_format($transaction['amount']); ?>đ</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo number_format($transaction['balance']); ?>đ</td>
                                        <td><?php echo $transaction['description']; ?></td>
                                        <td>
                                            <?php if ($transaction['status'] == 1): ?>
                                                <span class="badge bg-success">Thành công</span>
                                            <?php elseif ($transaction['status'] == 0): ?>
                                                <span class="badge bg-warning">Đang chờ</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">Thất bại</span>
                                            <?php endif; ?>
                                        </td>
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