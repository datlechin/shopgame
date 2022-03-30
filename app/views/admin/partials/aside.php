<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/" class="brand-link">
        <img src="<?php echo asset('assets/backend/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo asset('assets/backend/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $user['email']; ?></a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/admin" class="nav-link <?php echo (isCurrentUrl('/admin')) ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Bảng điều khiển
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/users" class="nav-link <?php echo (isCurrentUrl('/admin/users')) ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Người dùng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/money" class="nav-link <?php echo (isCurrentUrl('/admin/money')) ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-money-bill-wave"></i>
                        <p>
                            Cộng trừ tiền
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/charges" class="nav-link <?php echo (isCurrentUrl('/admin/charges')) ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-credit-card"></i>
                        <p>
                            Thẻ cào nạp
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/categories" class="nav-link <?php echo (isCurrentUrl('/admin/categories')) ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Danh mục
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/game-item" class="nav-link <?php echo (isCurrentUrl('/admin/game-item')) ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Tài khoản game
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/report-sell-acc" class="nav-link <?php echo (isCurrentUrl('/admin/report-sell-acc')) ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-poll"></i>
                        <p>
                            Lịch sử bán nick
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/tran-log" class="nav-link <?php echo (isCurrentUrl('/admin/tran-log')) ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-retweet"></i>
                        <p>
                            Lịch sử giao dịch
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/settings" class="nav-link <?php echo (isCurrentUrl('/admin/settings')) ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Cài đặt
                        </p>
                    </a>
                </li>
            </ul>
        </nav>

    </div>

</aside>