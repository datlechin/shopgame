<?php
require_once '../../views/partials/header.php';
?>
<div class="container">
    <form action="/blog" method="get" class="mb-3 mt-3 mb-md-0">
        <div class="row">
            <div class="col-md-4 mb-2">
                <input type="text" id="search" name="q" class="form-control" placeholder="Nhập từ khóa tìm kiếm">
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                <a href="/blog" class="btn btn-danger">Tất cả</a>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-md-9">
            <div class="article-list">
            </div>
        </div>
        <div class="col-md-3">
            <h4 class="text-uppercase fw-bold">Danh mục</h4>
            <div class="list-group">
                <?php foreach ($categories as $category): ?>
                    <a href="/blog/<?php echo $category['slug']; ?>" class="list-group-item list-group-item-action <?php echo (isCurrentUrl('/blog/ ' . $category['slug'])) ? 'active' : ''; ?>"><?php echo $category['name']; ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php
require_once '../../views/partials/footer.php';
?>
