<?php
require_once 'partials/header.php';
?>

    <div class="container py-4">
        <div class="row">
            <div class="col-md-4 mb-3">
                <h3 class="fw-bold">#<?=$account['id']?></h3>
                <span class="text-danger fw-bold"><?=categoryName($account['category_id'])?></span>
            </div>
            <div class="col-md-4 mb-3">
                <div class="fs-2 fw-bold text-info text-uppercase"><?=number_format($account['price'])?> Card</div>
                <div class="fs-2 fw-bold text-info text-uppercase"><?=number_format($account['price'])?> ATM</div>
            </div>
            <div class="col-md-4 mb-3">
                <button class="btn btn-info btn-block">Mua ngay</button>
                <button class="btn btn-success btn-block">Nạp thẻ cào</button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <p class="text-uppercase fw-bold mb-0">Nổi bật: <span class="text-danger"><?=$account['description']?></span></p>
            </div>
        </div>
        <hr>
        <div class="text-center mt-4">
            <img src="<?=$account['image']?>" alt="" class="img-thumbnail">
        </div>
    </div>

<?php
require_once 'partials/footer.php';
?>