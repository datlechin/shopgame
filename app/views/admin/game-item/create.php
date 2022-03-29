<?php

use ShopGame\core\PaginationWidget;

require_once PATH_ROOT . '/views/admin/partials/header.php';
?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin tài khoản game</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="/admin/game-item/create" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="category_id">Danh mục game (*)</label>
                                    <select id="category_id" name="category_id" class="form-control custom-select">
                                        <?php foreach ($categories as $category) : ?>
                                            <option value="<?= $category['id'] ?>" <?php echo ((isset($_GET['category_id'])) && $_GET['category_id'] == $category['id']) ? 'selected' : '' ?>><?= $category['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="acc_name">Tài khoản game (*)</label>
                                    <input type="text" id="acc_name" name="acc_name" class="form-control" placeholder="Tài khoản đăng nhập vào game" value="<?= $acc_name ?? '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="acc_pass">Mật khẩu game</label>
                                    <input type="text" id="acc_pass" name="acc_pass" class="form-control" placeholder="Mật khẩu đăng nhập vào game" value="<?= $acc_pass ?? '' ?>"">
                                </div>
                                <div class=" form-group">
                                    <label for="price">Giá bán (*)</label>
                                    <input type="number" id="price" name="price" class="form-control" placeholder="Giá bán tính bằng card" value="<?= $price ?? '' ?>"">
                                </div>
                                <div class=" form-group">
                                    <label for="image">Ảnh đại diện</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                                            <label class="custom-file-label" for="image">Ảnh xem trước</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="content">Nội dung bằng hình ảnh</label>
                                    <textarea id="content" name="content" class="form-control" rows="2" placeholder="Dán link ảnh vào đây, phân cách bằng dấu ,"><?= $content ?? '' ?></textarea>
                                    <!-- <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="content" name="content[]" accept="image/*" multiple>
                                            <label class="custom-file-label" for="image">Ảnh thông tin chi tiết tài khoản</label>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="form-group">
                                    <label for="description">Mô tả</label>
                                    <textarea id="description" name="description" class="form-control" rows="2" placeholder="Thông tin bổ sung thêm về nick ngoài ảnh"><?= $description ?? '' ?></textarea>
                                </div>
                                <a href="/admin/game-item" class="btn btn-secondary">Quay lại</a>
                                <button type="submit" class="btn btn-success float-right">Thêm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="<?php echo asset('assets/backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js'); ?>"></script>
    <script>
        bsCustomFileInput.init();

        $('#category_id').on('change', function() {
            const category_id = $(this).val();
            window.location.href = '/admin/game-item/create?category_id=' + category_id;
        });
    </script>

<?php
require_once PATH_ROOT . '/views/admin/partials/footer.php';
?>