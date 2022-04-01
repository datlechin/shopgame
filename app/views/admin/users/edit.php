<?php
require_once ROOT_PATH . '/app/views/admin/partials/header.php';
?>

    <section class="content">
        <div class="container">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thông tin người dùng</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/admin/users/edit/<?= $userEdit['id'] ?>" method="post">
                        <div class="form-group">
                            <label for="name">Họ tên</label>
                            <input type="text" id="name" name="name" class="form-control" value="<?= $userEdit['name'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="username">Tên người dùng</label>
                            <input type="text" id="username" class="form-control" value="<?= $userEdit['username'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" id="email" class="form-control" value="<?= $userEdit['email'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="<?= $userEdit['phone'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="role">Vai trò</label>
                            <select id="role" name="role" class="form-control custom-select">
                                <option value="user" <?= selected($userEdit['role'], 'user') ?>>Thành viên</option>
                                <option value="admin" <?= selected($userEdit['role'], 'admin') ?>>Quản trị viên</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="lock">Trạng thái</label>
                            <?php if ($userEdit['lock'] == 1): ?>
                                <span class="badge badge-info">Hoạt động</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Khóa</span>
                            <?php endif; ?>
                            <select id="lock" name="lock" class="form-control custom-select">
                                <option value="1" <?= selected($userEdit['lock'], 1) ?>>Kích hoạt</option>
                                <option value="0" <?= selected($userEdit['lock'], 0) ?>>Khoá</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="balance">Số dư</label>
                            <input type="text" id="balance" class="form-control" value="<?= $userEdit['balance'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu mới</label>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="created_at">Đăng ký lúc</label>
                            <input type="text" id="created_at" class="form-control" value="<?= $userEdit['created_at'] ?>"
                                   disabled>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php
require_once ROOT_PATH . '/app/views/admin/partials/footer.php';
?>