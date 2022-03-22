<?php
require_once 'partials/header.php';
?>

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
                                <button type="submit" class="btn btn-primary">Lưu lại</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
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
        });
    </script>

<?php
require_once 'partials/footer.php';
?>