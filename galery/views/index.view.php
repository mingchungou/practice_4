<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Galery</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />

        <link rel="stylesheet" href="<?php echo ROOT_LIB_CSS; ?>/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo ROOT_LIB_CSS; ?>/bootstrap.min.css"  />
        <link rel="stylesheet" href="<?php echo ROOT; ?>/css/myStyle.css" />
    </head>
    <body>
        <section class="galery-content main-content">
            <!-- Load general header -->
            <?php
                $pageTitle = "Mi Increíble Galería en PHP y MySQL";
                require "views/header.view.php";
            ?>

            <!-- Load list of images -->
            <main class="imagelist-content">
                <div class="container">
                    <?php foreach ($photos as $photo): ?>
                    <article class="thumb">
                        <a href="<?php echo ROOT . "/templates/image.php?id=" . $photo["id"] . "&page=$page"; ?>">
                            <img src="images/<?php echo $photo['photo']; ?>" alt="<?php echo $photo['title']; ?>" />
                        </a>
                    </article>
                    <?php endforeach; ?>
                </div>
            </main>

            <!-- Create pagination -->
            <div class="pagination-content">
                <?php if ($page === 1 && $numberPages > 1): ?>
                <div class="container only-next">
                    <a class="navigation-btn" href="<?php echo ROOT . "/index.php?page=" . $nextPage; ?>">Siguiente <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                <?php elseif ($page > 1 && $page < $numberPages): ?>
                <div class="container both">
                    <a class="navigation-btn" href="<?php echo ROOT . "/index.php?page=" . $previousPage; ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> Anterior</a>
                    <a class="navigation-btn" href="<?php echo ROOT . "/index.php?page=" . $nextPage; ?>">Siguiente <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                <?php elseif ($page === $numberPages && $numberPages !== 1): ?>
                <div class="container only-prev">
                    <a class="navigation-btn" href="<?php echo ROOT . "/index.php?page=" . $previousPage; ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> Anterior</a>
                <?php endif; ?>
                </div>
            </div>

            <!-- Load general footer -->
            <?php require "views/footer.view.php"; ?>
        </section>

        <script src="<?php echo ROOT_LIB; ?>/jquery-3.2.0.min.js"></script>
        <script src="<?php echo ROOT_LIB; ?>/tether.min.js"></script>
        <script src="<?php echo ROOT_LIB; ?>/bootstrap.min.js"></script>
    </body>
</html>
