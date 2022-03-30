<?php
require_once 'partials/header.php';
?>

<div class="container py-4">
    <?php require_once 'partials/message.php'; ?>
    <div class="row text-sm-start text-center">
        <div class="col-md-4 mb-3">
            <h3 class="fw-bold">#<?= $account['id'] ?></h3>
            <span class="text-danger fw-bold"><?= categoryName($account['category_id']) ?></span>
        </div>
        <div class="col-md-4 mb-3">
            <div class="fs-2 fw-bold text-info text-uppercase"><?= number_format($account['price']) ?> Card</div>
            <div class="fs-2 fw-bold text-info text-uppercase"><?= number_format($account['price']) ?> ATM</div>
        </div>
        <div class="col-md-4 mb-3">
            <?php if ($account['status'] == 1): ?>
            <button class="btn btn-info btn-block buyacc">Mua ngay</button>
            <?php else: ?>
            <button class="btn btn-danger btn-block buyacc" disabled>Đã bán</button>
            <?php endif; ?>
            <a href="/nap-the" class="btn btn-success btn-block">Nạp thẻ cào</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <p class="text-uppercase fw-bold mb-0">Nổi bật: <span class="text-danger"><?= $account['description'] ?></span></p>
        </div>
    </div>
    <hr>
    <div class="text-center mt-4 game-content">
        <?php
        $images = explode(',', $account['content']);
        foreach ($images as $image):
        ?>
        <img src="<?= $image ?>" data-fancybox="content" class="my-1 img-thumbnail img-responsive">
        <?php endforeach; ?>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
</div>

<script>
    $(".buyacc").click(function() {
        $.ajax({
            url: '/buyacc/<?= $account['id'] ?>',
            success: function(data) {
                $("#exampleModal .modal-content").html(data);
                $("#exampleModal").modal('show');
            }
        });
    });
</script>

<?php
require_once 'partials/footer.php';
?>