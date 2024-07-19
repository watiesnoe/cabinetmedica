<?php
if (isset($_SESSION['notification']['message'])): ?>
    <div class="container">
        <div class="alert  alert-pro  alert-<?= $_SESSION['notification']['type']?> alert-dismissible">
            <div class="alert-text">
                <h4><?= $_SESSION['notification']['message']?></h4>
            </div>
            <button class="close" data-bs-dismiss="alert"></button>
        </div>
    </div>

    <?php $_SESSION['notification']=[]; ?>

<?php endif; ?>
