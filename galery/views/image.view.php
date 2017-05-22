<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Image</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />

        <link rel="stylesheet" href="<?php echo ROOT_LIB_CSS; ?>/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo ROOT_LIB_CSS; ?>/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo ROOT; ?>/css/myStyle.css" />
    </head>
    <body>
        <section class="image-content main-content">
            <!-- Load general header -->
            <?php
                $photoTitle = !empty($photo["title"]) ? $photo["title"] : $photo["photo"];
                $pageTitle = "Foto: $photoTitle";
                require "../views/header.view.php";
            ?>

            <!-- Show specific image -->
            <main class="photo-content">
                <div class="container">
                    <article class="photo">
                        <img src="../images/<?php echo $photo["photo"]; ?>" alt="<?php echo $photo["title"]; ?>" />
                        <p class="text-center my-3"><?php echo $photo["description"]; ?></p>
                    </article>
                </div>
            </main>

            <!-- Create pagination -->
            <div class="pagination-content">
                <div class="container">
                    <a class="navigation-btn" href="<?php echo ROOT . "/index.php?page=$page"; ?>">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar
                    </a>
                </div>
            </div>

            <!-- Load general footer -->
            <?php require "../views/footer.view.php"; ?>
        </section>

        <script src="<?php echo ROOT_LIB; ?>/jquery-3.2.0.min.js"></script>
        <script src="<?php echo ROOT_LIB; ?>/tether.min.js"></script>
        <script src="<?php echo ROOT_LIB; ?>/bootstrap.min.js"></script>
    </body>
</html>
