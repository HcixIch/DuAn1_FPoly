<?php
include_once './views/t_header.php';
if (isset($_GET['view'])) {
    switch ($_GET['view']) {
    }
} else {
    $title = 'Tin tức';
    include './views/page_banner.php';
    include './views/v_blog_content.php';
}
include_once './views/t_footer.php';
