<?php if (isset($error)) { ?>
    <div class="alert alert-danger">
        <?=$error?>
    </div>
<?php } ?>
<?php if (isset($success)) { ?>
    <div class="alert alert-success">
        <?=$success?>
    </div>
<?php } ?>
