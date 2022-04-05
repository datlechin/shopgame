<nav class="navbar navbar-expand-lg <?= (setting('dark_mode') == 1) ? 'navbar-dark bg-dark' : 'navbar-light bg-light' ?> fixed-top">
    <div class="container">
        <a class="navbar-brand me-2" href="/">
            <img src="<?= setting('logo') ?>" height="35" alt="<?= setting('title') ?>" loading="lazy" />
        </a>

        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarButtonsExample">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/sponsors">Sponsors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://zalo.me/g/ohmsbz685" target="_blank">Nhóm ZALO Dev</a>
                </li>
                <?php if ($userClass->isAdmin()) : ?>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="/admin">Trang quản trị</a>
                    </li>
                <?php endif; ?>
            </ul>

            <div class="d-flex align-items-center">
                <a class="btn btn-dark px-3 me-3" href="https://github.com/datlechin/shopgame" target="_blank"><i class="fab fa-github"></i></a>
                <?php if ($userClass->isLoggedIn()) : ?>
                    <a class="btn btn-secondary me-3" href="/user/profile">
                        <i class="fas fa-user-alt"></i>
                        <?= str_limit($user['username'], 15) ?> - $ <?= number_format($user['balance']) ?>
                    </a>
                    <a class="btn btn-info me-3" href="/logout">Đăng xuất</a>
                <?php else : ?>
                    <a href="/login" class="btn btn-success me-3">
                        <i class="fas fa-sign-in-alt"></i> Đăng nhập
                    </a>
                    <a href="/register" class="btn btn-danger me-3">
                        <i class="fas fa-user-plus"></i> Đăng ký
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>