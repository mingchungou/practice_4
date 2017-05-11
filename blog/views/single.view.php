<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Blog - Single</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />

        <link rel="stylesheet" href="<?php echo ROOT_LIB_CSS; ?>/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo ROOT_LIB_CSS; ?>/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo ROOT; ?>/css/myStyle.css" />
    </head>
    <body>
        <section class="main-content single-content">
            <!-- Load general header -->
            <?php require "../views/header.view.php"; ?>

            <!-- Load the blog info -->
            <main class="blogs-content">
                <div class="container">
                    <article class="blog-item">
                        <h2 class="title"><?php echo $blog["title"]; ?></h2>
                        <p class="date"><?php echo parseDate($blog["created"]); ?></p>
                        <div class="thumb">
                            <img src="<?php echo ROOT . "/images/" . $blog["thumb"]; ?>" alt="<?php echo $blog["thumb"]; ?>" />
                        </div>
                        <p class="extract"><?php echo nl2br($blog["text"]); ?></p>
                    </article>
                </div>
            </main>

            <!-- Load general footer -->
            <?php require "../views/footer.view.php"; ?>
        </section>

        <script src="<?php echo ROOT_LIB; ?>/jquery-3.2.0.min.js"></script>
        <script src="<?php echo ROOT_LIB; ?>/tether.min.js"></script>
        <script src="<?php echo ROOT_LIB; ?>/bootstrap.min.js"></script>
    </body>
</html>
