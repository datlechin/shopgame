<?php
require_once '../../views/partials/header.php';
?>

<div class="container py-4">
    <div class="row">
        <?php
        require_once '../../views/partials/user-sidebar.php';
        ?>
        <div class="col-md-9 mt-4 mt-md-0">
            <h2 class="text-uppercase fw-bold"><?php echo (isset($title)) ? $title : 'Lịch sử giao dịch'; ?></h2>
            <table class="table <?= (setting('dark_mode') == 1) ? 'table-dark' : null ?> table-striped">
                <tbody>
                <tr>
                    <th scope="row">ID của bạn:</th>
                    <th><span class="c-font-uppercase"><?php echo $user['id']; ?></span></th>
                </tr>
                <?php if ($user['name']): ?>
                <tr>
                    <th scope="row">Họ tên:</th>
                    <th><?= $user['name'] ?></th>
                </tr>
                <?php endif; ?>
                <tr>
                    <th scope="row">Tên tài khoản:</th>
                    <th><?php echo $user['username']; ?></th>
                </tr>
                <tr>
                    <th scope="row">Địa chỉ email:</th>
                    <th><?php echo $user['email']; ?></th>
                </tr>
                <tr>
                    <th scope="row">Số dư tài khoản:</th>
                    <td><b class="text-danger"><?php echo number_format($user['balance']); ?>đ</b></td>
                </tr>
                <?php if ($user['phone']): ?>
                <tr>
                    <th scope="row">Số điện thoại:</th>
                    <td><?php echo $user['phone']; ?></td>
                </tr>
                <?php endif; ?>
                <tr>
                    <th scope="row">Nhóm tài khoản:</th>
                    <td><?php echo roleName($user['role']); ?></td>
                </tr>
                <tr>
                    <th scope="row">Ngày tham gia:</th>
                    <td><?php echo $user['created_at']; ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
require_once '../../views/partials/footer.php';
?>
