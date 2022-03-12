<?php
require_once '../../views/partials/header.php';
?>

<div class="container py-4">
    <div class="row">
        <?php require_once '../../views/partials/user-sidebar.php'; ?>
        <div class="col-md-9 mt-4 mt-md-0">
            <h2 class="text-uppercase fw-bold">Chuyển tiền</h2>
            <?php require_once '../../views/partials/message.php'; ?>
            <form action="/user/transfer" method="post">
                <div class="form-outline mb-3">
                    <input type="text" id="user" class="form-control" value="<?php echo $user['username']; ?> - <?php echo number_format($user['balance']); ?>đ" disabled>
                    <label for="user" class="form-label">Thông tin</label>
                </div>
                <div class="form-outline mb-3">
                    <input type="text" id="username" name="username" class="form-control" value="<?php echo (isset($username)) ? $username : ''; ?>">
                    <label for="username" class="form-label">Tài khoản/ID người nhận</label>
                </div>
                <div class="form-outline mb-3">
                    <input type="number" id="amount" name="amount" class="form-control" value="<?php echo (isset($amount)) ? $amount : ''; ?>">
                    <label for="amount" class="form-label">Số tiền</label>
                </div>
                <div class="form-outline mb-3">
                    <textarea id="description" name="description" class="form-control"><?php echo (isset($description)) ? $description : ''; ?></textarea>
                    <label for="description" class="form-label">Nội dung chuyển tiền</label>
                </div>
                <button class="btn btn-info">Thực hiện</button>
            </form>
        </div>
    </div>
</div>

<?php
require_once '../../views/partials/footer.php';
?>
