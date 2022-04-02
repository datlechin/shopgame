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
                                        <th>ID</th>
                                        <th>Người bán</th>
                                        <th>Loại game</th>
                                        <th>Tài khoản</th>
                                        <th>Mật khẩu</th>
                                        <th>Hình ảnh</th>
                                        <th>Trạng thái</th>
                                        <th>Đăng lúc</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($accounts as $account) : ?>
                                        <tr>
                                            <td><?php echo $account['id']; ?></td>
                                            <td><?php echo getUsernameById($account['seller_id']); ?></td>
                                            <td><?= categoryName($account['category_id']); ?></td>
                                            <td><?php echo $account['acc_name']; ?></td>
                                            <td style="color: #fff"><?php echo $account['acc_pass']; ?></td>
                                            <td><img src="<?php echo $account['image']; ?>" class="img-size-64"></td>
                                            <td>
                                                <?php if ($account['status'] == 1) : ?>
                                                    <span class="badge badge-success">Đang bán</span>
                                                <?php elseif ($account['status'] == 0) : ?>
                                                    <span class="badge badge-info">Đã bán</span>
                                                <?php elseif ($account['status'] == 2) : ?>
                                                    <span class="badge badge-danger">Đã xóa</span>
                                                <?php endif; ?>

                                            </td>
                                            <td><?php echo $account['created_at']; ?></td>
                                            <td>
                                                <a href="/acc/<?php echo $account['id']; ?>" target="_blank" class="btn btn-success btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <?php if ($account['status'] == 1) : ?>
                                                    <a href="/admin/game-item/edit/<?php echo $account['id']; ?>" class="btn btn-primary btn-sm">Sửa</a>
                                                    <a href="/admin/game-item/delete/<?php echo $account['id']; ?>" class="btn btn-danger btn-sm">Xóa</a>
                                                <?php endif; ?>
                                            </td>
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