<?php
require_once '../../views/partials/header.php';
?>

<div class="container py-4">
    <div class="row">
        <div class="col-md-3">
            <h5 class="text-uppercase">Menu tài khoản</h5>
            <div class="list-group mt-4">
                <a href="/user/profile" class="list-group-item list-group-item-action active" aria-current="true">Thông tin tài khoản</a>
                <a href="/user/change-password" class="list-group-item list-group-item-action" aria-current="true">Đổi mật khẩu</a>
                <a href="/user/trans" class="list-group-item list-group-item-action">Lịch sử giao dịch</a>
            </div>
        </div>
        <div class="col-md-9">
            <h2 class="text-uppercase fw-bold">Thông tin tài khoản</h2>
            <table class="table table-striped">
                <tbody><tr>
                    <th scope="row">ID của bạn:</th>
                    <th><span class="c-font-uppercase"><?php echo $user['id']; ?></span></th>
                </tr>
                <tr>
                    <th scope="row">Tên tài khoản:</th>
                    <th><?php echo $user['username']; ?></th>
                </tr>
                <tr>
                    <th scope="row">Số dư tài khoản:</th>
                    <td><b class="text-danger"><?php echo number_format($user['balance']); ?>đ</b></td>
                </tr>
                <tr>
                    <th scope="row">Số điện thoại:</th>
                    <td><?php echo $user['phone']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Nhóm tài khoản:</th>
                    <td>Thành viên</td>
                </tr>
                <tr>
                    <th scope="row">Ngày tham gia:</th>
                    <td><?php echo $user['created_at']; ?></td>
                </tr>
                </tbody></table>
        </div>
    </div>
</div>

<?php
require_once '../../views/partials/footer.php';
?>
