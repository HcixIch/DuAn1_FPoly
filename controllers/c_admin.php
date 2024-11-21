<?php
include_once './viewsadmin/header.php';
    if (isset($_GET['view'])){
        switch ($_GET['view']) {
            case 'addpro':
                include_once './viewsadmin/addpro.php';
                break;
        }
    }
    else{
            $Allcates = $cates->getAllCategories();
            
            include_once './viewsadmin/home.php';
    }
include_once './viewsadmin/footer.php';
?>