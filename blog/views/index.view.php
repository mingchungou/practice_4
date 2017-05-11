<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Blog - Welcome</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />

        <link rel="stylesheet" href="<?php echo ROOT_LIB_CSS; ?>/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo ROOT_LIB_CSS; ?>/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo ROOT; ?>/css/myStyle.css" />
    </head>
    <body>
        <section class="main-content welcome-content">
            <!-- Load general header -->
            <?php require "views/header.view.php"; ?>

            <!-- Load the blogs dynamically -->
            <main class="blogs-content">
                <div class="container">
                    <?php foreach ($blogs as $blog):?>
                    <article class="blog-item">
                        <h2 class="title"><?php echo $blog["title"]; ?></h2>
                        <p class="date"><?php echo parseDate($blog["created"]); ?></p>
                        <div class="thumb">
                            <img src="<?php echo ROOT . "/images/" . $blog["thumb"]; ?>" alt="<?php echo $blog["thumb"]; ?>" />
                        </div>
                        <p class="extract"><?php echo $blog["extract"] ?></p>
                        <a class="extra" href="<?php echo ROOT . "/templates/single.php?id=" . $blog["id"]; ?>">Leer más</a>
                    </article>
                    <?php endforeach; ?>
                </div>
            </main>

            <!-- Load general pagination -->
            <?php
                $paginationLink = ROOT . "/index.php?page=";
                require "views/pagination.view.php";
            ?>

            <!-- Load general footer -->
            <?php require "views/footer.view.php"; ?>
        </section>

        <script src="<?php echo ROOT_LIB; ?>/jquery-3.2.0.min.js"></script>
        <script src="<?php echo ROOT_LIB; ?>/tether.min.js"></script>
        <script src="<?php echo ROOT_LIB; ?>/bootstrap.min.js"></script>
    </body>
</html>
