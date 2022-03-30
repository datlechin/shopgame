<form action="/buyacc/<?=$account['id']?>" method="post">
    <input type="hidden" name="id" value="<?=$account['id']?>">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xác nhận mua tài khoản</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <ul class="nav nav-tabs nav-fill mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="ex2-tab-1" data-mdb-toggle="tab" href="#payment" role="tab">Thanh toán</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex2-tab-2" data-mdb-toggle="tab" href="#info" role="tab">Thông tin tài khoản</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="payment" role="tabpanel" aria-labelledby="ex2-tab-1">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th colspan="2" class="fw-bold">Thông tin tài khoản #<?= $account['id'] ?></th>
                    </tr>
                    </tbody>
                    <tbody>
                    <tr>
                        <td>Tên game:</td>
                        <th class="fw-bold">Liên quân</th>
                    </tr>
                    <tr>
                        <td>Giá tiền:</td>
                        <th class="text-info fw-bold"><?= number_format($account['price']) ?>đ</th>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="ex2-tab-2">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th colspan="2" class="fw-bold">Chi tiết tài khoản #<?= $account['id'] ?></th>
                    </tr>
                    </tbody>
                    <tbody>
                    <tr></tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row form-group">
            <label for="coupon" class="col-md-3 ms-0 ms-md-3 form-label">Mã giảm giá</label>
            <div class="col-md-7">
                <input type="text" id="coupon" name="coupon" class="form-control" placeholder="Mã giảm giá">
                <span class="text-muted small">Nhập mã giảm giá nếu có để nhận ưu đãi</span>
            </div>
        </div>
        <?php if (!$userClass->isLoggedIn()): ?>
            <p class="text-danger text-center my-3">Vui lòng đăng nhập để mua tài khoản.</p>
        <?php elseif ($user['balance'] < $account['price']): ?>
            <p class="text-danger text-center my-3">Bạn không đủ tiền để mua tài khoản, nhấp vào nút <strong>Nạp thẻ</strong> để nạp thêm tiền.</p>
        <?php endif; ?>
    </div>
    <div class="modal-footer">
        <?php if (!$userClass->isLoggedIn()): ?>
            <a href="/login" class="btn btn-success">Đăng nhập</a>
        <?php elseif ($user['balance'] < $account['price']): ?>
            <a href="/nap-the" class="btn btn-primary">Nạp thẻ</a>
        <?php else: ?>
            <button type="submit" class="btn btn-danger">Mua ngay</button>
        <?php endif; ?>
        <button type="button" class="btn btn-outline-info" data-mdb-dismiss="modal">Đóng</button>
    </div>
</form>