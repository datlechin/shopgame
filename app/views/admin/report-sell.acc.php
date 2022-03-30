<?php

use ShopGame\core\PaginationWidget;

require_once ROOT_PATH . '/app/views/admin/partials/header.php';
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
                                    <th>Thời gian</th>
                                    <th>#</th>
                                    <th>Tài khoản</th>
                                    <th>Người bán</th>
                                    <th>Tên game</th>
                                    <th>Giá bán</th>
                                    <th>Người mua</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($accounts as $account): ?>
                                    <tr>
                                        <td><?= $account['sold_at'] ?></td>
                                        <td>#<?= $account['id'] ?></td>
                                        <td><?= $account['acc_name'] ?></td>
                                        <td><?= getUsernameById($account['seller_id']) ?></td>
                                        <td><?= categoryName($account['category_id']) ?></td>
                                        <td><?= number_format($account['price']) ?>đ</td>
                                        <td><?= getUsernameById($account['buyer_id']) ?></td>
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
require_once ROOT_PATH . '/app/views/admin/partials/footer.php';
?>