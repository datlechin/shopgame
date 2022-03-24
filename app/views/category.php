<?php
require_once 'partials/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-info">
                <h4 class="alert-heading"><?php echo $category['name']; ?></h4>
                <?php echo html_entity_decode($category['description']); ?>
            </div>
        </div>
        <form action="/game/<?php echo $category['slug']; ?>" method="get">
            <div class="row">
                <div class="col-md-3">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="find">Tìm kiếm</span>
                        <input type="text" name="find" id="find" class="form-control" placeholder="Tìm kiếm">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="id">Mã số</span>
                        <input type="text" name="id" id="id" class="form-control" placeholder="Mã số">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="price">Giá tiền</span>
                        <select class="form-select" name="price" id="price">
                            <option value="">Chọn giá tiền</option>
                            <option value="duoi-50k">Dưới 50K</option>
                            <option value="tu-50k-200k">Từ 50K - 200K</option>
                            <option value="tu-200k-500k">Từ 200K - 500K</option>
                            <option value="tu-500k-1-trieu">Từ 500K - 1 Triệu</option>
                            <option value="tren-1-trieu">Trên 1 Triệu</option>
                            <option value="tren-5-trieu">Trên 5 Triệu</option>
                            <option value="tren-10-trieu">Trên 10 Triệu</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="status">Trạng thái</span>
                        <select class="form-select" name="status" id="status">
                            <option value="1" selected="">Chưa bán</option>
                            <option value="0">Đã bán</option>
                            <option value="3">Đã đặt cọc</option>
                            <option value="-999">Tất cả</option>
                        </select>
                    </div>
                </div>
            </div>
            <button class="btn btn-info">Tìm kiếm</button>
            <a href="/game/<?php echo $category['slug']; ?>" class="btn btn-danger">Tất cả</a>
        </form>
        <?php if (!$accounts): ?>
            <p class="text-center text-danger py-3">Hiện tại không có tài khoản nào phù hợp với yêu cầu của bạn! Hệ thống cập nhật nick thường xuyên bạn vui lòng theo dõi web trong thời gian tới !</p>
        <?php endif; ?>
    </div>
</div>

<?php
require_once 'partials/footer.php';
?>