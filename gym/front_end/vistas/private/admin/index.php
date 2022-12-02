<!doctype html>
<html lang="en">

<head>
    <?php
    include_once('../plantilla/head.php');
    ?>
</head>

<body>

    <nav class="site-header sticky-top py-1">
        <?php
        include_once('../plantilla/navbar.php');
        ?>
    </nav>

    <main class="container">
        <div>
            <?php
            include_once('crear.php');
            ?>
        </div>
        <div>
            <?php
            include_once('data.php');
            ?>
        </div>
    </main>


    <footer class="container py-5">
        <?php
        include_once('../plantilla/footer.php');
        ?>
    </footer>


    <?php
    include_once('../plantilla/script.php');
    ?>


</body>

</html>