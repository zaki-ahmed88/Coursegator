<?php

/* if (isset($_SESSION['errors'])) { ?>
    <div class="alert alert-danger">
        <?php foreach ($_SESSION['errors'] as $error) { ?>
            <p class="mb-0"><?= $error; ?></p>
        <?php } ?>
        <?php unset($_SESSION['errors']) ?>
    </div>

<?php } ?> */






if ($session->has('errors')) { ?>
    <div class="alert alert-danger">
        <?php foreach ($session->get('errors') as $error) { ?>
            <p class="mb-0"><?= $error; ?></p>
        <?php } ?>
        <?php $session->remove('errors') ?>
    </div>

<?php } ?>