<?php

use ShopGame\core\PaginationWidget;

require_once PATH_ROOT . '/views/admin/partials/header.php';
?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách tài khoản game</h3>
                            <div class="card-tools">
                                <a href="/admin/game-item/create" class="btn btn-primary">Thêm mới</a>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Người bán</th>
                                    <th>ID</th>
                                    <th>Loại game</th>
                                    <th>Tài khoản</th>
                                    <th>Mật khẩu</th>
                                    <th>Hình ảnh</th>
                                    <th>Người mua</th>
                                    <th>Trạng thái</th>
                                    <th>Cập nhật lúc</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($accounts as $account) : ?>
                                    <tr>
                                        <td><?php echo getUsernameById($account['seller_id']); ?></td>
                                        <td>#<?php echo $account['id']; ?></td>
                                        <td></td>
                                        <td><?php echo $account['acc_name']; ?></td>
                                        <td><?php echo $account['acc_pass']; ?></td>
                                        <td><img src="<?php echo $account['image']; ?>" alt="<?php echo $account['name']; ?>" width="80"></td>
                                        <td><?php echo getUsernameById($account['buyer_id']); ?></td>
                                        <td>
                                            <?php if ($account['status'] == 1) : ?>
                                                <span class="badge badge-success">Đang bán</span>
                                            <?php elseif ($account['status'] == 0) : ?>
                                                <span class="badge badge-info">Đã bán</span>
                                            <?php elseif ($account['status'] == 2) : ?>
                                                <span class="badge badge-danger">Đã xóa</span>
                                            <?php endif; ?>

                                        </td>
                                        <td><?php echo $account['updated_at']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            <?php PaginationWidget::widget(['pagination' => $pagination]); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
require_once PATH_ROOT . '/views/admin/partials/footer.php';
?>