<?php

use ShopGame\core\PaginationWidget;

require_once ROOT_PATH . '/app/views/admin/partials/header.php';
?>

<link rel="stylesheet" href="<?php echo asset('assets/backend/plugins/summernote/summernote-bs4.min.css'); ?>">

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Chỉnh sửa <?= $category['name'] ?></h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/admin/categories/<?= $category['id'] ?>/edit" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="type" class="form-label">Loại danh mục</label>
                                <select class="form-control" id="type" name="type">
                                    <option value="game" <?= selected($category['type'], 'game') ?>>Danh mục game</option>
                                    <option value="blog" <?= selected($category['type'], 'blog') ?>>Danh mục blog</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên danh mục</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nhập tên danh mục" value="<?= $category['name'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Ảnh thu nhỏ</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                                    <label class="custom-file-label" for="image">Chọn ảnh</label>
                                    <div class="mt-3">
                                        <img src="<?= $category['image'] ?>" width="200">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 mt-5">
                                <label for="summernote" class="form-label">Mô tả</label>
                                <textarea id="summernote" name="description"><?= $category['description'] ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?php echo asset('assets/backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js'); ?>"></script>
<script src="<?php echo asset('assets/backend/plugins/summernote/summernote-bs4.min.js'); ?>"></script>

<script>
    $(function() {
        bsCustomFileInput.init();
        $('#summernote').summernote({
            height: 150,
        })
    });
</script>

<?php
require_once ROOT_PATH . '/app/views/admin/partials/footer.php';
?>