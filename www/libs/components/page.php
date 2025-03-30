<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?=$title?></title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="/resources/style/main.css">
    <link rel="stylesheet" href="/resources/style/nav.css">
    <?php
    if ($title !== "Login") { ?>
        <link rel="stylesheet" href="/resources/style/style.css">
    <?php }
    foreach ($css as $style) { ?>
        <link rel="stylesheet" href="/resources/style/<?=$style?>">
    <?php } ?>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"></script>
</head>
<body>
<?php
if($title !=="Login"){
    include_once $_SERVER["DOCUMENT_ROOT"] . "../libs/components/nav.php";
}
include_once $page;
?>
</body>
</html>