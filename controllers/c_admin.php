<?php
include_once './viewsadmin/header.php';
    if (isset($_GET['view'])){
        switch ($_GET['view']) {
            case 'home':
                include_once './models/m_database.php';
                include_once './models/m_product.php';
                include_once './viewsadmin/home.php';
                break;
            default:
                include_once './models/m_database.php';
                include_once './models/m_product.php';
                include_once './viewsadmin/home.php';
        }
    }
include_once './viewsadmin/footer.php';
?>