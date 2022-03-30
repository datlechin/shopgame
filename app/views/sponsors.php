<?php
require_once 'partials/header.php';
?>

<div class="container py-3">
    <h3 class="text-center fw-bold">Danh sách Sponsors</h3>
    <div class="alert alert-success">
        <ul>
            <li>Vietcombank: 1017595600 (Ngô Quốc Đạt)</li>
            <li>Momo: 0372124043 (Ngô Quốc Đạt)</li>
        </ul>
        <p>Ủng hộ tác giả bằng cách chuyển khoản về các tài khoản bên trên, bằng cách này bạn giúp chúng tôi đẩy nhanh quá trình phát triển dự án</p>
    </div>
    <div class="row">
        <?php
        foreach ($sponsors as $sponsor) {
        ?>
            <div class="col-sm-3 mb-3">
                <div class="card">
                    <div class="card-body">
                    <span class="fw-bold"><?= $sponsor['name'] ?></span>
                    <span class="small text-danger"><?=number_format($sponsor['money'])?>đ</span>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php
require_once 'partials/footer.php';
?>