<?php
require_once '../../views/partials/header.php';
?>

<div class="container py-4">
    <div class="row">
        <?php require_once '../../views/partials/user-sidebar.php'; ?>
        <div class="col-md-9 mt-4 mt-md-0">
            <h2 class="text-uppercase fw-bold"><?php echo (isset($title)) ? $title : 'Lịch sử giao dịch'; ?></h2>
            <?php require_once '../../views/partials/message.php'; ?>
            <form action="/user/change-password" method="post">
                <div class="form-outline mb-3">
                    <input type="password" id="old_password" name="old_password" class="form-control">
                    <label for="old_password" class="form-label">Mật khẩu</label>
                </div>
                <div class="form-outline mb-3">
                    <input type="password" id="password" name="password" class="form-control">
                    <label for="password" class="form-label">Mật khẩu mới</label>
                </div>
                <div class="form-outline mb-3">
                    <input type="password" id="password_confirm" name="password_confirm" class="form-control">
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
