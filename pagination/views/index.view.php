<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Pagination</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />

        <link rel="stylesheet" href="../css/font-awesome.min.css" />
        <link rel="stylesheet" href="../css/bootstrap.min.css"  />
        <link rel="stylesheet" href="css/myStyle.css" />
    </head>
    <body>
        <section class="container">
            <h1>Articles</h1>

            <!-- Load list of articles -->
            <div class="article-content">
                <ul>
                    <?php foreach ($articles as $article): ?>
                        <li class="row">
                            <span class="col-sm-1"><strong><?php echo $article["id"] . ".- "; ?></strong></span>
                            <p class="col-sm-11"><?php echo $article["article"]; ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Create pagination -->
            <div class="pagination-content">
                <ul>
                    <!-- Set previous button -->
                    <?php if ($page == 1): ?>
                    <li class="disabled"><a href="#">
                    <?php else: ?>
                    <li><a href="?page=<?php echo $page - 1; ?>">
                    <?php endif; ?>
                        <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                    </a></li>

                    <!-- Set page buttons -->
                    <?php
                        for ($i = 0; $i < count($pageShow); $i++) {
                            if ($page === $pageShow[$i]) {
                                echo "<li class='active'><a href='?page=$pageShow[$i]'>$pageShow[$i]</a></li>";
                            } else {
                                echo "<li><a href='?page=$pageShow[$i]'>$pageShow[$i]</a></li>";
                            }
                        }
                    ?>

                    <!-- Set next button -->
                    <?php if ($page == $numberPages): ?>
                    <li class="disabled"><a href="#">
                    <?php else: ?>
                    <li><a href="?page=<?php echo $page + 1; ?>">
                    <?php endif; ?>
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </a></li>
                </ul>
            </div>
        </section>

        <script src="../lib/jquery-3.2.0.min.js"></script>
        <script src="../lib/tether.min.js"></script>
        <script src="../lib/bootstrap.min.js"></script>
    </body>
</html>
