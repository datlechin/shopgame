<?php
require_once 'partials/header.php';
?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <span>Đăng ký thành viên</span>
                    </div>
                    <?php if (isset($error)): ?>
                        <span class="text-center mt-3 text-danger">
                        <?php echo $error ?>
                    </span>
                    <?php endif; ?>
                    <div class="card-body">
                        <form action="/register" method="post">
                            <div class="input-group form-outline mb-3">
                                <input type="text" id="username" name="username" class="form-control" value="<?php echo (isset($username)) ? $username : ''; ?>">
                                <label for="username" class="form-label">Tên tài khoản</label>
                                <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                            </div>
                            <div class="input-group form-outline mb-3">
                                <input type="email" id="email" name="email" class="form-control" value="<?php echo (isset($email)) ? $email : ''; ?>">
                                <label for="email" class="form-label">Email</label>
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <div class="input-group form-outline mb-3">
                                <input type="text" id="phone" name="phone" class="form-control" value="<?php echo (isset($phone)) ? $phone : ''; ?>">
                                <label for="phone" class="form-label">Số điện thoại</label>
                                <span class="input-group-text"><i class="fas fa-mobile-screen-button"></i></span>
                            </div>
                            <div class="input-group form-outline mb-3">
                                <input type="password" id="password" name="password" class="form-control">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <div class="input-group form-outline mb-3">
                                <input type="password" id="password_confirm" name="password_confirm" class="form-control">
                                <label for="password_confirm" class="form-label">Nhập lại mật khẩu</label>
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <button class="btn btn-danger btn-block">Đăng ký</button>
                        </form>
                        <div class="text-center mt-3">
                            <p>Hoặc</p>
                            <a href="#" class="btn btn-primary d-md-inline-block">
                                <i class="fab fa-facebook"></i> Facebook
                            </a>
                            <a href="/login" class="btn btn-success d-md-inline-block">
                                <i class="fas fa-key"></i> Đăng nhập
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
require_once 'partials/footer.php';
?>