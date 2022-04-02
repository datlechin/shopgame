<div class="form-horizontal">
    <div class="form-group row mb-3">
    <label class="col-md-3 form-label">Tài khoản:</b></label>
        <div class="col-md-9">
            <div class="input-group">
            <input class="form-control" type="text" placeholder="Tài khoản" readonly value="<?= $account['acc_name'] ?>">
                <button class="btn btn-outline-primary copy_user" type="button">
                    <i class="fa fa-copy"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="form-group row mb-3">
        <label class="col-md-3 form-label">Mật khẩu:</label>
        <div class="col-md-9">
            <div class="input-group">
                <input type="text" class="form-control" readonly placeholder="Mật khẩu" value="<?= $account['acc_pass'] ?>">
                <button class="btn btn-outline-primary copy_pass" type="button">
                    <i class="fa fa-copy"></i>
                </button>
            </div>
            <span class="small">Click vào nút copy để sao chép mật khẩu hoặc nhấp đúp vào ô mật khẩu để thấy mật khẩu.</span>
        </div>
    </div>
    <?php if ($account['checked_at'] !== null) : ?>
        <p class="fw-bold text-primary small">Đã lấy mật khẩu lần đầu tiên lúc: <?= $account['checked_at'] ?></p>
    <?php endif; ?>
    <div class="alert alert-danger">
        Để tránh các trường hợp xấu xảy ra, quý khách vui lòng thêm thông tin (Email và SĐT) để đảm bảo không có vấn đề gì sau khi giao dịch tại shop! Xin cảm ơn
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.copy_user').click(function () {
            let user = $(this).parent().find('input');
            user.select();
            document.execCommand('copy');
        });
        $('.copy_pass').click(function () {
            let pass = $(this).parent().find('input');
            pass.select();
            document.execCommand('copy');
        });
    });
</script>