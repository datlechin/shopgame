<?php
require_once '../../views/partials/header.php';
?>

<div class="container py-4">
    <div class="row">
        <?php
        require_once '../../views/partials/user-sidebar.php';
        ?>
        <div class="col-md-9">
            <h2 class="text-uppercase fw-bold">Đổi mật khẩu</h2>
            <form action="/change-password" method="post">
            </form>
        </div>
    </div>
</div>

<?php
require_once '../../views/partials/footer.php';
?>
