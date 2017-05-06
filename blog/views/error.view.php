<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Blog - Error</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />

        <link rel="stylesheet" href="<?php echo ROOT_LIB_CSS; ?>/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo ROOT_LIB_CSS; ?>/bootstrap.min.css"  />
        <link rel="stylesheet" href="<?php echo ROOT; ?>/css/myStyle.css" />
    </head>
    <body>
        <section class="main-content error-content">
            <main class="info-content">
                <article class="container text-center">
                    <img class="mb-3" src="<?php echo ROOT; ?>/images/unhappy.png" alt="Unhappy image" />
                    <h1 class="font-weight-bold">Ha ocurrido un error</h1>

                    <!-- Show error message set into cookie -->
                    <?php
                        if (isset($_COOKIE["error_message"])) {
                            echo "<p>" . $_COOKIE["error_message"] . "</p>";
                            $_COOKIE = array();
                        }
                    ?>
                </article>
            </main>
        </section>

        <script src="<?php echo ROOT_LIB; ?>/jquery-3.2.0.min.js"></script>
        <script src="<?php echo ROOT_LIB; ?>/tether.min.js"></script>
        <script src="<?php echo ROOT_LIB; ?>/bootstrap.min.js"></script>
    </body>
</html>
