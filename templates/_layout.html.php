<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "NO TITLE" ?> - Northwind</title>
    <link rel="stylesheet" href="./css/index.css">
</head>

<body class="page-<?= basename($_SERVER['SCRIPT_NAME'], ".php") ?>">
    <div class="site-wrapper">

        <?php
        include "templates/_sitenav.html.php";
        include "templates/_header.html.php";
        ?>

        <main class="main-content">

            <?= $output ?? 'NO TEMPLATE CONTENT - $output not defined' ?>

        </main>

        <?php
        include "templates/_footer.html.php"
        ?>

    </div>
</body>

</html>