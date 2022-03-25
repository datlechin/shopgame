<?php
require_once 'partials/header.php';
?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Cộng trừ tiền thành viên</h3>
                        </div>
                        <div class="card-body">
                            <form action="/admin/money" method="post">
                                <div class="form-group">
                                    <label for="username">Tên tài khoản người nhận</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Tên tài khoản, email hoặc SĐT người nhận" value="<?php echo (isset($username)) ? $username : '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="type">Loại giao dịch</label>
                                    <select class="form-control" id="type" name="type">
                                        <option value="1" <?php echo (isset($type) && $type == 1) ? 'selected' : '' ?>>Cộng tiền</option>
                                        <option value="2" <?php echo (isset($type) && $type == 2) ? 'selected' : '' ?>>Trừ tiền</option>
                                        <option value="3" <?php echo (isset($type) && $type == 3) ? 'selected' : '' ?>>Hoàn tiền</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="money">Số tiền</label>
                                    <input type="number" class="form-control" id="money" name="money" placeholder="Số tiền" value="<?php echo (isset($money)) ? $money : '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="description">Nội dung</label>
                                    <textarea class="form-control" id="description" name="description" rows="2"><?php echo (isset($description)) ? $description : '' ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Thực hiện</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
require_once 'partials/footer.php';
?>