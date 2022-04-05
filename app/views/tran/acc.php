<?php

use ShopGame\core\PaginationWidget;

require_once ROOT_PATH . '/app/views/partials/header.php';
?>

<div class="container py-4">
    <div class="row">
        <?php require_once ROOT_PATH . '/app/views/partials/user-sidebar.php'; ?>
        <div class="col-md-9 mt-4 mt-md-0">
            <h2 class="text-uppercase fw-bold"><?php echo (isset($title)) ? $title : 'Tài khoản đã mua'; ?></h2>
            <?php require_once ROOT_PATH . '/app/views/partials/message.php'; ?>
            <form action="/tran/acc" method="get">
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="started_at">Mã tài khoản</span>
                            <input type="text" class="form-control" name="id" placeholder="Mã tài khoản game" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="group_id">Loại game</span>
                            <select id="group_id" name="trade_type" class="form-control c-square c-theme">
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="price">Giá tiền</span>
                            <select name="price" class="form-select">
                                <option value="">Chọn giá tiền</option>
                                <option value="1">Dưới 50K</option>
                                <option value="2">Từ 50K - 200K</option>
                                <option value="3">Từ 200K - 500K</option>
                                <option value="4">Từ 500K - 1 Triệu</option>
                                <option value="5">Trên 1 Triệu</option>
                                <option value="6">Trên 5 Triệu</option>
                                <option value="7">Trên 10 Triệu</option>
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
                    <div class="col-md-4">
                        <button class="btn btn-info">Tìm kiếm</button>
                        <a href="/tran/acc" class="btn btn-danger">Tất cả</a>
                    </div>
                </div>
            </form>
            <div class="table-responsive mt-4">
                <table class="table <?= (setting('dark_mode') == 1) ? 'table-dark' : null ?> table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Thời gian</th>
                            <th>ID</th>
                            <th>Loại game</th>
                            <th>Tài khoản</th>
                            <th>Giá tiền</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <?php if (count($accounts) > 0) : ?>
                        <?php foreach ($accounts as $account) : ?>
                            <tr>
                                <td><?= $account['sold_at'] ?></td>
                                <td>#<?= $account['id'] ?></td>
                                <td><?= categoryName($account['category_id']) ?></td>
                                <td><?= $account['acc_name'] ?></td>
                                <td><?php echo number_format($account['price']); ?>đ</td>
                                <td><a href="/tran/acc/<?= $account['id'] ?>" data-id="<?= $account['id'] ?>" class="btn btn-info check">Xem</a></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr class="text-center">
                            <td colspan="6">Không có dữ liệu</td>
                        </tr>
                    <?php endif; ?>
                </table>
                <?php PaginationWidget::widget(['pagination' => $pagination]); ?>
            </div>
        </div>
    </div>
    <div class="modal fade" id="noticeModal" tabindex="-1" aria-labelledby="noticeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="noticeModal">Xem thông tin tài khoản</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary close-modal" data-mdb-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.check').click(function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            $.ajax({
                url: '/tran/check/' + id,
                type: 'GET',
                success: function(data) {
                    $('.modal-body').html(data);
                    $('#noticeModal').modal('show');
                }
            });
        });
    });
</script>

<?php
require_once ROOT_PATH . '/app/views/partials/footer.php';
