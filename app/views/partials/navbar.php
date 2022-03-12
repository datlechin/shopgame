<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand me-2" href="/">
            <img
                src="https://mdbcdn.b-cdn.net/wp-content/uploads/2018/06/logo-mdb-jquery-small.webp"
                height="35"
                alt="MDB Logo"
                loading="lazy"
                style="margin-top: -5px;"
            />
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#navbarButtonsExample"
            aria-controls="navbarButtonsExample"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarButtonsExample">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Trang chủ</a>
                </li>
            </ul>

            <div class="d-flex align-items-center">
                <?php if (isLoggedIn()) : ?>
                    <a class="btn btn-outline-black me-3" href="/user/profile">
                        <i class="fas fa-user-alt"></i>
                        <?php echo $user['username']; ?> - $ <?php echo number_format($user['balance']); ?>
                    </a>
                    <a class="btn btn-outline-black me-3" href="/logout">Đăng xuất</a>
                <?php else : ?>
                <a href="/login" class="btn btn-outline-black me-3">
                    Đăng nhập
                </a>
                <a href="/register" class="btn btn-outline-black me-3">
                    Đăng ký
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
