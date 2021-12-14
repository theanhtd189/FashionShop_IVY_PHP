<?php
include_once '../class/user_class.php';
include_once '../class/admin_class.php';
if (isset($_GET['type'])) {
    if ($_GET['type'] == 'admin') {
        if ($_GET['check'] == 'username') {
            if (isset($_GET['value'])) {
                $f = new admin();
                echo $f->CheckUsernameAdmin($_GET['check']);
            } else
                echo 0;
        } else
            echo 0;
    } elseif ($_GET['type'] == 'user') {
        if ($_GET['check'] == 'email') {
            if (isset($_GET['value'])) {
                $f = new User_Function();
                echo $f->CheckEmailTonTai($_GET['check']);
            } else
                echo 0;
        } elseif ($_GET['check'] == 'username') {
        } else
            echo 0;
    } else
        echo 0;
} else
    echo 0;
