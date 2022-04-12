<?php
require_once 'partials/header.php';
?>
<link rel="stylesheet" href="<?= asset('assets/backend/plugins/summernote/summernote-bs4.min.css') ?>">

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Chung</h3>
                    </div>
                    <div class="card-body">
                        <form action="/admin/settings" method="post">
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
                            <div class="form-group">
                                <label>Chế độ tối:</label>
                                <select name="dark_mode" class="form-control">
                                    <option value="0" <?php echo (setting('dark_mode') == 0) ? 'selected' : ''; ?>>Tắt</option>
                                    <option value="1" <?php echo (setting('dark_mode') == 1) ? 'selected' : ''; ?>>Bật</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Lưu lại</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cấu hình đăng nhập Facebook</h3>
                    </div>
                    <div class="card-body">
                        <form action="/admin/settings" method="post">
                            <div class="form-group">
                                <label>ID ứng dụng:</label>
                                <input type="text" name="facebook_app_id" class="form-control" value="<?php echo setting('facebook_app_id'); ?>">
                            </div>
                            <div class="form-group">
                                <label>Secret ứng dụng:</label>
                                <input type="text" name="facebook_app_secret" class="form-control" value="<?php echo setting('facebook_app_secret'); ?>">
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
                        <form action="/admin/settings" method="post">
                            <div class="form-group">
                                <label>Thông báo trang chủ:</label>
                                <textarea name="noticeModal" id="summernote" class="form-control"><?php echo setting('noticeModal'); ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Lưu lại</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cấu hình nạp thẻ</h3>
                    </div>
                    <div class="card-body">
                        <form action="/admin/settings" method="post">
                            <div class="form-group">
                                <label for="charge_provider">Kênh nạp:</label>
                                <select name="charge_provider" id="charge_provider" class="form-control custom-select">
                                    <option value="CARDVIP">Cardvip.vn</option>
                                     <option value="TSR">Thesieure.com</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Partner ID: <small>(Là partner ID bên TSR, Cardvip thì để trống)</small></label>
                                <input type="text" name="charge_partner_id" class="form-control" value="<?php echo setting('charge_partner_id'); ?>">
                            </div>
                            <div class="form-group">
                                <label>API Key:</label>
                                <input type="text" name="charge_api_key" class="form-control" value="<?php echo setting('charge_api_key'); ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Lưu lại</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        URL callback là: <code><?= site_url('callback') ?></code>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Chân trang</h3>
                    </div>
                    <div class="card-body">
                        <form action="/admin/settings" method="post">
                            <div class="form-group">
                                <label>Nội dung cột 1:</label>
                                <textarea name="footer_content" id="footer_content" rows="4" class="form-control"><?php echo setting('footer_content'); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>ID Fanpage Facebook</label>
                                <input type="text" name="facebook_fanpage_id" class="form-control" value="<?php echo setting('facebook_fanpage_id'); ?>">
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
    $(function() {
        $('#summernote').summernote({
            minHeight: 167,
        });
        $('#footer_content').summernote({
            minHeight: 167,
        });
    });

    $(document).ready(function() {
        $('form').each(function() {
            $(this).submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '/admin/settings',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(data) {
                        if (data.status === 'success') {
                            toastr.success(data.message);
                        } else {
                            toastr.error(data.message);
                        }
                    }
                });
            })
        })
    });
</script>

<?php
require_once 'partials/footer.php';
?>