<?php
require_once '../../views/partials/header.php';
?>

<div class="container py-4">
    <div class="row">
        <?php require_once '../../views/partials/user-sidebar.php'; ?>
        <div class="col-md-9 mt-4 mt-md-0">
            <h2 class="text-uppercase fw-bold">Đổi mật khẩu</h2>
            <?php if (isset($error)) { ?>
                <div class="alert alert-danger">
                    <?php echo $error; ?>
                </div>
            <?php } ?>
            <form action="/user/change-password" method="post">
                <div class="form-outline mb-3">
                    <input type="text" id="old_password" name="old_password" class="form-control">
                    <label for="old_password" class="form-label">Mật khẩu</label>
                </div>
                <div class="form-outline mb-3">
                    <input type="text" id="password" name="password" class="form-control">
                    <label for="password" class="form-label">Mật khẩu mới</label>
                </div>
                <div class="form-outline mb-3">
                    <input type="text" id="password_confirm" name="password_confirm" class="form-control">
                    <label for="password_confirm" class="form-label">Xác nhận mật khẩu</label>
                </div>
                <button class="btn btn-primary">Đổi mật khẩu</button>
            </form>
        </div>
    </div>
</div>

<?php
require_once '../../views/partials/footer.php';
?>
