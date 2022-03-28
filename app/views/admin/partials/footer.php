</div>
<footer class="main-footer">
    <strong>Mã nguồn mở &copy; <?=date('Y', time())?></strong> Phát triển bởi <strong><a href="https://adminlte.io">Ngô Quốc Đạt</a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0-beta
    </div>
</footer>

<aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<script src="<?php echo asset('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo asset('assets/backend/plugins/toastr/toastr.min.js'); ?>"></script>
<script src="<?php echo asset('assets/backend/js/adminlte.min.js'); ?>"></script>
<script>
    <?php if (isset($success)): ?>
    toastr.success('<?php echo $success; ?>');
    <?php elseif (isset($error)): ?>
    toastr.error('<?php echo $error; ?>');
    <?php endif; ?>
</script>
</body>
</html>