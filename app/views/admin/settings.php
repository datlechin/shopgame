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
                        <form action="">
                            <div class="form-group">
                                <label>Tên trang web:</label>
                                <input type="text" class="form-control" value="<?php echo setting('title'); ?>">
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="text" class="form-control" value="<?php echo setting('email'); ?>">
                            </div>
                            <div class="form-group">
                                <label>Từ khóa:</label>
                                <input type="text" class="form-control" value="<?php echo setting('keywords'); ?>">
                            </div>
                            <div class="form-group">
                                <label>Mô tả:</label>
                                <textarea class="form-control" rows="3"><?php echo setting('description'); ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Lưu lại</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once 'partials/footer.php';
?>