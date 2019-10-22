<?php if (!empty($_SESSION['notifications'])) {
    foreach ($_SESSION['notifications'] as $type => $messages) {
        foreach ($messages as $msg) {
            require 'notification/item-alert.php';
        }
    }
    $_SESSION['notifications'] = [];
}
