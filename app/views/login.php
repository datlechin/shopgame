<?php
require_once 'partials/header.php';
?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <span>Đăng nhập hệ thống</span>
                    </div>
                    <?php if (isset($error)) : ?>
                        <span class="text-center mt-3 text-danger">
                            <?=$error?>
                        </span>
                    <?php endif; ?>
                    <div class="card-body">
                        <form action="/login" method="post">
                            <div class="input-group form-outline mb-3">
                                <input type="text" id="username" name="username" class="form-control" value="<?php echo (isset($username)) ? $username : ''; ?>">
                                <label for="username" class="form-label">Tên tài khoản</label>
                                <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                            </div>
                            <div class="input-group form-outline mb-3">
                                <input type="password" id="password" name="password" class="form-control">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="remember" name="remember" checked />
                                        <label class="form-check-label" for="remember"> Ghi nhớ</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <a href="#!">Quên mật khẩu?</a>
                                </div>
                            </div>
                            <button class="btn btn-success btn-block">Đăng nhập</button>
                        </form>
                        <div class="text-center mt-3">
                            <p>Hoặc</p>
                            <a href="/login-fb" class="btn btn-primary d-md-inline-block me-3">
                                <i class="fab fa-facebook"></i> Facebook
                            </a>
                            <a href="/register" class="btn btn-danger d-md-inline-block">
                                <i class="fas fa-key"></i> Tạo tài khoản
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