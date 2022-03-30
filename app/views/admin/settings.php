<?php
require_once 'partials/header.php';
?>
    <link rel="stylesheet" href="../assets/backend/plugins/summernote/summernote-bs4.min.css">

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Chung</h3>
                        </div>
                        <div class="card-body">
                            <form action="/admin/settings" method="post" id="generalSettings">
                                <div class="form-group">
                                    <label>Tên trang web:</label>
                                    <input type="text" name="title" class="form-control" value="<?php echo setting('title'); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Từ khóa:</label>
                                    <input type="text" name="keywords" class="form-control" value="<?php echo setting('keywords'); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả:</label>
                                    <textarea name="description" class="form-control" rows="3"><?php echo setting('description'); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <labeL>Ảnh logo</label>
                                    <input type="text" name="logo" class="form-control" value="<?php echo setting('logo'); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Ảnh banner:</label> <span class="small">Phân cách ảnh bằng dấu ,</span>
                                    <textarea name="banners" class="form-control" rows="3"><?php echo setting('banners'); ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Lưu lại</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Thông báo</h3>
                        </div>
                        <div class="card-body">
                            <form action="/admin/settings" method="post" id="noticeSettings">
                                <div class="form-group">
                                    <label>Thông báo trang chủ:</label>
                                    <textarea name="noticeModal" id="summernote" class="form-control"><?php echo htmlentities(setting('noticeModal')); ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Lưu lại</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="<?= asset('assets/backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>
    <script src="<?= asset('assets/backend/plugins/summernote/summernote-bs4.min.js') ?>"></script>

    <script>
        $(function () {
            $('#summernote').summernote({
                minHeight: 167,
            })
        });

        $(document).ready(function () {
            $("#generalSettings").submit(function (e) {
                e.preventDefault();

                $.ajax({
                    url: '/admin/settings',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function (data) {
                        if (data.status === 'success') {
                            toastr.success(data.message);
                        } else {
                            toastr.error(data.message);
                        }
                    }
                });
            })
            $("#noticeSettings").submit(function (e) {
                e.preventDefault();

                $.ajax({
                    url: '/admin/settings',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function (data) {
                        if (data.status === 'success') {
                            toastr.success(data.message);
                        } else {
                            toastr.error(data.message);
                        }
                    }
                });
            })
        });
    </script>

<?php
require_once 'partials/footer.php';
?>