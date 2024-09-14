<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?= pubUrl("/assets/logo.jpeg") ?>">
    <title>Kotolika</title>
    <link rel="stylesheet" href="<?= pubUrl("assets/vendor/bootstrap/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?= pubUrl("assets/libs/css/style.css") ?>">
    <link rel="stylesheet" href="<?= pubUrl("assets/global.css") ?>">

    <style>
        <?= $style ?>
    </style>
</head>
<body>
<?= include_component("flash-message") ?>

<?= $content ?>


<script src="<?= pubUrl("assets/vendor/jquery/jquery-3.3.1.min.js") ?>"></script>

<script>
    <?= $script ?>
</script>


<?php
/**
 * <script src="<?= pubUrl("assets/vendor/slimscroll/jquery.slimscroll.js") ?>"></script>
 * <script src="<?= pubUrl("assets/libs/js/main-js.js") ?>"></script>
 * <script src="<?= pubUrl("assets/vendor/charts/chartist-bundle/chartist.min.js")?>"></script>
 * <script src="<?= pubUrl("assets/vendor/charts/sparkline/jquery.sparkline.js") ?>"></script>
 * <script src="<?= pubUrl("assets/vendor/charts/morris-bundle/raphael.min.js") ?>" ></script>
 * <script src="<?= pubUrl("assets/vendor/charts/morris-bundle/morris.js") ?>"></script>
 * <script src="<?= pubUrl("assets/vendor/charts/c3charts/c3.min.js") ?>"></script>
 * <script src="<?= pubUrl("assets/vendor/charts/c3charts/d3-5.4.0.min.js") ?>"></script>
 * <script src="<?= pubUrl("assets/vendor/charts/c3charts/C3chartjs.js") ?>"></script>
 * <script src="<?= pubUrl("assets/libs/js/dashboard-ecommerce.js") ?>"></script>
 */

?>
</body>
</html>