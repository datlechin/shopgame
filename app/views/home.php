<?php
require_once 'partials/header.php';
?>
    <div id="carousel" class="carousel slide" data-mdb-ride="carousel">
        <div class="carousel-indicators">
            <button
                    type="button"
                    data-mdb-target="#carouselIndicator"
                    data-mdb-slide-to="0"
                    class="active"
                    aria-current="true"
                    aria-label="Slide 1"
            ></button>
            <button
                    type="button"
                    data-mdb-target="#carouselIndicator"
                    data-mdb-slide-to="1"
                    aria-label="Slide 2"
            ></button>
            <button
                    type="button"
                    data-mdb-target="#carouselIndicator"
                    data-mdb-slide-to="2"
                    aria-label="Slide 3"
            ></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item" data-mdb-interval="5000">
                <img src="https://nick.vn/storage/images/lITvp1Ph8r_1623147594.jpg" class="d-block w-100" alt="Camera"/>
            </div>
            <div class="carousel-item active" data-mdb-interval="5000">
                <img src="https://nick.vn/storage/images/XoBF4ldarS_1623147567.jpg" class="d-block w-100" alt="Exotic Fruits"/>
            </div>
        </div>
        <button class="carousel-control-prev" data-mdb-target="#carousel" type="button" data-mdb-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Trước</span>
        </button>
        <button class="carousel-control-next" data-mdb-target="#carousel" type="button" data-mdb-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Sau</span>
        </button>
    </div>
    <div class="container">
        <div class="mt-4">
            <h3 class="text-center text-uppercase fw-bold">Danh mục game</h3>
            <div class="row">
                <div class="col-sm-3 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="https://nick.vn/storage/images/0jjbYp7OmJ_1623164374.gif" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase text-center fw-bold">
                                <a href="">Game liên quân</a>
                            </h5>
                            <p class="card-text text-center">
                                Số tài khoản: 1,255<br>
                                Đã bán: 125
                            </p>
                            <div class="text-center">
                                <a href="#" class="btn btn-primary btn-block">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="https://nick.vn/storage/images/bHhkJqAKlB_1623164417.gif" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase text-center fw-bold">
                                <a href="">Game free fire</a>
                            </h5>
                            <p class="card-text text-center">
                                Số tài khoản: 1,255<br>
                                Đã bán: 125
                            </p>
                            <div class="text-center">
                                <a href="#" class="btn btn-primary btn-block">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="https://nick.vn/storage/images/nijYzYWqiq_1623164431.gif" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase text-center fw-bold">
                                <a href="">Game liên minh</a>
                            </h5>
                            <p class="card-text text-center">
                                Số tài khoản: 1,255<br>
                                Đã bán: 125
                            </p>
                            <div class="text-center">
                                <a href="#" class="btn btn-primary btn-block">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="https://nick.vn/storage/images/Sbcs9ooDuN_1623164443.gif" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase text-center fw-bold">
                                <a href="">Game ngọc rồng</a>
                            </h5>
                            <p class="card-text text-center">
                                Số tài khoản: 1,255<br>
                                Đã bán: 125
                            </p>
                            <div class="text-center">
                                <a href="#" class="btn btn-primary btn-block">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
require_once 'partials/footer.php';
?>