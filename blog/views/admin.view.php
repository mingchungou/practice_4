<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Blog - Admin</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />

        <link rel="stylesheet" href="<?php echo ROOT_LIB_CSS; ?>/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo ROOT_LIB_CSS; ?>/bootstrap.min.css"  />
        <link rel="stylesheet" href="<?php echo ROOT; ?>/css/myStyle.css" />
    </head>
    <body>
        <section class="main-content panel-content">
            <!-- Load general header -->
            <?php require "../views/header.view.php"; ?>

            <!-- Load the blogs dynamically -->
            <main class="blogs-content">
                <div class="container">
                    <article class="first-item">
                        <h1 class="mb-3">Panel de Control</h1>
                        <div class="options">
                            <a href="<?php echo ROOT . "/templates/add.php"; ?>">Agregar <i class="fa fa-plus" aria-hidden="true"></i></a>
                            <a href="<?php echo ROOT . "/templates/closeSession.php"; ?>">Cerrar sesión <i class="fa fa-sign-out" aria-hidden="true"></i></a>
                        </div>
                    </article>
                    <?php foreach ($blogs as $blog):?>
                    <article class="blog-item">
                        <h2 class="title mb-3"><?php echo $blog["title"]; ?></h2>
                        <a class="extra" href="<?php echo ROOT . "/templates/edit.php?id=" . $blog["id"] . "&page=" . $currentPage; ?>">Editar</a>
                        <a class="extra" href="<?php echo ROOT . "/templates/single.php?id=" . $blog["id"]; ?>">Ver</a>
                        <a class="extra" href="<?php echo ROOT . "/templates/remove.php?id=" . $blog["id"]; ?>">Borrar</a>
                    </article>
                    <?php endforeach; ?>
                </div>
            </main>

            <!-- Load general pagination -->
            <?php
                $paginationLink = ROOT . "/templates/admin.php?page=";
                require "../views/pagination.view.php";
            ?>

            <!-- Load general footer -->
            <?php require "../views/footer.view.php"; ?>
        </section>

        <script src="<?php echo ROOT_LIB; ?>/jquery-3.2.0.min.js"></script>
        <script src="<?php echo ROOT_LIB; ?>/tether.min.js"></script>
        <script src="<?php echo ROOT_LIB; ?>/bootstrap.min.js"></script>
    </body>
</html>
