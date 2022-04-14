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
                            <h3 class="card-title">Danh sách game & blog</h3>
                            <div class="card-tools">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#addCateModal">Thêm
                                    mới
                                </button>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên danh mục</th>
                                    <th>Loại danh mục</th>
                                    <th>Hình ảnh</th>
                                    <th>Trạng thái</th>
                                    <th>Cập nhật lúc</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($categories as $category) : ?>
                                    <tr>
                                        <td><?php echo $category['id']; ?></td>
                                        <td><a href="/game/<?php echo $category['slug']; ?>"
                                               target="_blank"><?php echo $category['name']; ?></a></td>
                                        <td>
                                            <?php if ($category['type'] == 'game') : ?>
                                                <span class="badge badge-success">Game</span>
                                            <?php else : ?>
                                                <span class="badge badge-warning">Blog</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><img src="<?php echo $category['image']; ?>"
                                                 alt="<?php echo $category['name']; ?>" width="80"></td>
                                        <td>
                                            <?php if ($category['status'] == 1) : ?>
                                                <span class="badge badge-success">Hoạt động</span>
                                            <?php else : ?>
                                                <span class="badge badge-danger">Đã tắt</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo $category['updated_at']; ?></td>
                                        <td>
                                            <a href="/admin/categories/<?= $category['id'] ?>/edit" class="btn btn-primary">Sửa</a>
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
            <div class="modal fade" id="addCateModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm danh mục mới</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="cateForm">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Loại danh mục</label>
                                    <select class="form-control" id="type">
                                        <option value="game">Danh mục game</option>
                                        <option value="blog">Danh mục blog</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Tên danh mục</label>
                                    <input type="text" id="name" class="form-control" placeholder="Nhập tên danh mục">
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Ảnh thu nhỏ</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" accept="image/*">
                                        <label class="custom-file-label" for="image">Chọn ảnh</label>
                                        <div id="preview"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="summernote" class="form-label">Mô tả</label>
                                    <textarea id="summernote"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-primary" id="addCate">Thêm mới</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="<?php echo asset('assets/backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js'); ?>"></script>
    <script src="<?php echo asset('assets/backend/plugins/summernote/summernote-bs4.min.js'); ?>"></script>

    <script>
        $(function () {
            bsCustomFileInput.init();
            $('#summernote').summernote()
        });

        $("#addCate").click(function () {
            let description = $('#summernote').summernote('code');
            let type = $("#type").val();
            let name = $("#name").val();
            let image = $("#image")[0];

            let formData = new FormData();
            formData.append("type", type);
            formData.append("name", name);
            formData.append("description", description);
            formData.append("image", image.files[0]);

            $.ajax({
                url: '/admin/categories',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (res) {
                    if (res.status === 'success') {
                        toastr.success(res.message);
                        setTimeout(function () {
                            window.location.reload();
                        }, 1000);
                    } else {
                        toastr.error(res.message);
                    }
                }
            });
        });
    </script>

<?php
require_once ROOT_PATH . '/app/views/admin/partials/footer.php';
?>