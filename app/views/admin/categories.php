<?php
require_once 'partials/header.php';
?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách game & blog</h3>
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
                                    <th>Tên danh mục</th>
                                    <th>Loại danh mục</th>
                                    <th>Vai trò</th>
                                    <th>Trạng thái</th>
                                    <th>Cập nhật lúc</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($categories as $category): ?>
                                    <tr>
                                        <td><?php echo $category['id']; ?></td>
                                        <td><?php echo $category['name']; ?></td>
                                        <td>
                                            <?php if ($category['type'] == 'game'): ?>
                                                <span class="badge badge-success">Game</span>
                                            <?php else: ?>
                                                <span class="badge badge-warning">Blog</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><img src="<?php echo $category['image']; ?>" alt="<?php echo $category['name']; ?>" width="80"></td>
                                        <td>
                                            <?php if ($category['status'] == 1): ?>
                                                <span class="badge badge-success">Hoạt động</span>
                                            <?php else: ?>
                                                <span class="badge badge-danger">Đã tắt</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo $category['updated_at']; ?></td>
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