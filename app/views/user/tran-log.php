<?php
require_once '../../views/partials/header.php';
?>

<div class="container py-4">
    <div class="row">
        <?php require_once '../../views/partials/user-sidebar.php'; ?>
        <div class="col-md-9 mt-4 mt-md-0">
            <h2 class="text-uppercase fw-bold"><?php echo (isset($title)) ? $title : 'Lịch sử giao dịch'; ?></h2>
            <?php require_once '../../views/partials/message.php'; ?>
            <form action="/user/tran-log" method="get">
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="group_id">Giao dịch</span>
                            <select id="group_id" name="trade_type" class="form-control c-square c-theme">
                                <option value="" <?php echo (isset($_GET['trade_type']) && $_GET['trade_type'] == '') ? 'selected' : ''; ?>>-- Tất cả --</option>
                                <option value="1" <?php echo (isset($_GET['trade_type']) && $_GET['trade_type'] == '1') ? 'selected' : ''; ?>>Nạp thẻ</option>
                                <option value="2" <?php echo (isset($_GET['trade_type']) && $_GET['trade_type'] == '2') ? 'selected' : ''; ?>>Chuyển tiền</option>
                                <option value="3" <?php echo (isset($_GET['trade_type']) && $_GET['trade_type'] == '3') ? 'selected' : ''; ?>>Nhận tiền</option>
                                <option value="4" <?php echo (isset($_GET['trade_type']) && $_GET['trade_type'] == '4') ? 'selected' : ''; ?>>Rút tiền</option>
                                <option value="5" <?php echo (isset($_GET['trade_type']) && $_GET['trade_type'] == '5') ? 'selected' : ''; ?>>Cộng tiền</option>
                                <option value="6" <?php echo (isset($_GET['trade_type']) && $_GET['trade_type'] == '6') ? 'selected' : ''; ?>>Trừ tiền</option>
                                <option value="7" <?php echo (isset($_GET['trade_type']) && $_GET['trade_type'] == '7') ? 'selected' : ''; ?>>Hoàn tiền</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="started_at"><i class="fa fa-calendar"></i></span>
                            <input type="date" class="form-control" name="started_at" autocomplete="off" placeholder="Từ ngày" value="<?php echo (isset($_GET['started_at'])) ? $_GET['started_at'] : ''; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="started_at"><i class="fa fa-calendar"></i></span>
                            <input type="date" class="form-control" name="ended_at" autocomplete="off" placeholder="Đến ngày" value="<?php echo (isset($_GET['ended_at'])) ? $_GET['ended_at'] : ''; ?>">
                        </div>
                    </div>
                </div>
                <button class="btn btn-info">Tìm kiếm</button>
                <a href="/user/tran-log" class="btn btn-danger">Tất cả</a>
            </form>
            <div class="table-responsive mt-4">
                <table class="table <?= (setting('dark_mode') == 1) ? 'table-dark' : null ?> table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Thời gian</th>
                        <th>Giao dịch</th>
                        <th>Số tiền</th>
                        <th>Số dư cuối</th>
                        <th>Nội dung</th>
                        <th>Trạng thái</th>
                    </tr>
                    </thead>
                    <?php foreach ($transactions as $transaction): ?>
                        <tr>
                            <td><?php echo $transaction['created_at']; ?></td>
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
                </table>
                <?php \ShopGame\core\PaginationWidget::widget(['pagination' => $pagination]); ?>
            </div>
        </div>
    </div>
</div>

<?php
require_once '../../views/partials/footer.php';
?>
