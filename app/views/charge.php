<?php
require_once 'partials/header.php';
?>

    <div class="container py-4">
        <div class="row">
            <?php
            require_once '../views/partials/user-sidebar.php';
            ?>
            <div class="col-md-9 mt-4 mt-md-0">
                <h2 class="text-uppercase fw-bold"><?php echo (isset($title)) ? $title : 'Lịch sử giao dịch'; ?></h2>
                <?php require_once 'partials/message.php'; ?>
                <p class="text-center text-danger">Lưu ý: Nạp thẻ chọn sai mệnh giá sẽ bị mất thẻ 100%.</p>
                <form action="/nap-the" method="post">
                    <div class="row justify-content-center mb-3">
                        <label for="username" class="col-md-2 form-label">Tên tài khoản</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>" readonly>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-3">
                        <label for="telco" class="col-md-2 form-label">Loại thẻ</label>
                        <div class="col-md-6">
                            <select name="telco" id="telco" class="form-control">
                                <option value="VIETTEL">Viettel</option>
                                <option value="MOBIFONE">Mobifone</option>
                                <option value="VINAPHONE">Vinaphone</option>
                                <option value="GATE">Gate</option>
                                <option value="VCOIN">Vcoin</option>
                                <option value="GARENA">Garena</option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-3">
                        <label for="amount" class="col-md-2 form-label">Mệnh giá</label>
                        <div class="col-md-6">
                            <select name="amount" id="amount" class="form-control">
                                <option value="">Chọn mệnh giá</option>
                                <option value="10000">10,000đ</option>
                                <option value="20000">20,000đ</option>
                                <option value="30000">30,000đ</option>
                                <option value="50000">50,000đ</option>
                                <option value="100000">100,000đ</option>
                                <option value="200000">200,000đ</option>
                                <option value="300000">300,000đ</option>
                                <option value="500000">500,000đ</option>
                                <option value="1000000">1,000,000đ</option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-3">
                        <label for="serial" class="col-md-2 form-label">Số serial</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="serial" name="serial" placeholder="Nhập số serial">
                        </div>
                    </div>
                    <div class="row justify-content-center mb-3">
                        <label for="pin" class="col-md-2 form-label">Mã thẻ</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="pin" name="pin" placeholder="Nhập mã thẻ">
                        </div>
                    </div>
                    <div class="row justify-content-center mb-3">
                        <div class="col-md-6 offset-md-2">
                            <button type="submit" class="btn btn-primary btn-block">Nạp thẻ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
require_once 'partials/footer.php';
?>