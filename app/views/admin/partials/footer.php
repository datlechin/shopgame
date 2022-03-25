</div>
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
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