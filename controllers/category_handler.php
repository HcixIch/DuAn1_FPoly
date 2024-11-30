<?php
include_once 'models/m_category.php'; 
$cates = new Category();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $category = $cates->getCategoryById($id);

    if (isset($_POST['update_category'])) {
        $name_category = $_POST['name_category'];
        $cates->updateCategory($id, $name_category);
      
        header("Location: ?ctrl=admin");
        exit();
    }
}
include 'viewsadmin/editcate.php'; 
