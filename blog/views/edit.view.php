<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Blog - Edit</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />

        <link rel="stylesheet" href="<?php echo ROOT_LIB_CSS; ?>/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo ROOT_LIB_CSS; ?>/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo ROOT; ?>/css/myStyle.css" />
    </head>
    <body>
        <section class="main-content add-content">
            <!-- Load general header -->
            <?php require "../views/header.view.php"; ?>

            <!-- Form add -->
            <main class="form-content">
                <article class="container">
                    <h2>Editar Artículo</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                        method="POST"
                        enctype="multipart/form-data">

                        <!-- Title input -->
                        <div class="form-group row <?php echo empty($errors["title"]) ? "" : "has-danger"; ?>">
                            <label for="title" class="col-md-2 form-control-label">Título:</label>
                            <div class="col-md-10">
                                <input class="form-control form-control-danger"
                                    id="title"
                                    type="text"
                                    name="title"
                                    placeholder="Ingrese un título"
                                    value="<?php echo isset($blog) ? $blog["title"] : $title; ?>" />
                            </div>
                            <?php if (!empty($errors["title"])): ?>
                            <div class="col-md-10 offset-md-2 form-control-feedback"><?php echo $errors["title"]; ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Id hidden input -->
                        <input type="hidden" name="id" value="<?php echo isset($blog) ? $blog["id"] : $id; ?>" />

                        <!-- Extract input -->
                        <div class="form-group row <?php echo empty($errors["extract"]) ? "" : "has-danger"; ?>">
                            <label for="title" class="col-md-2 form-control-label">Extracto:</label>
                            <div class="col-md-10">
                                <input class="form-control form-control-danger"
                                    id="extract"
                                    type="text"
                                    name="extract"
                                    placeholder="Ingrese un extracto"
                                    value="<?php echo isset($blog) ? $blog["extract"] : $extract; ?>" />
                            </div>
                            <?php if (!empty($errors["extract"])): ?>
                            <div class="col-md-10 offset-md-2 form-control-feedback"><?php echo $errors["extract"]; ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Text input -->
                        <div class="form-group row <?php echo empty($errors["text"]) ? "" : "has-danger"; ?>">
                            <label for="description" class="col-md-2 form-control-label">Texto:</label>
                            <div class="col-md-10">
                                <textarea class="form-control form-control-danger"
                                    id="text"
                                    name="text"
                                    placeholder="Ingrese el texto"><?php echo isset($blog) ? $blog["text"] : $text; ?></textarea>
                            </div>
                            <?php if (!empty($errors["text"])): ?>
                            <div class="col-md-10 offset-md-2 form-control-feedback"><?php echo $errors["text"]; ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Image file input -->
                        <div class="form-group row <?php echo empty($errors["thumb"]) ? "" : "has-danger"; ?>">
                            <label for="photo" class="col-md-2 form-control-label">Foto:</label>
                            <div class="col-md-10">
                                <input class="form-control form-control-danger"
                                    id="thumb"
                                    type="file"
                                    name="thumb" />
                            </div>
                            <?php if (!empty($errors["thumb"])): ?>
                            <div class="col-md-10 offset-md-2 form-control-feedback"><?php echo $errors["thumb"]; ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Saved thumb hidden input -->
                        <input type="hidden"
                            name="thumb-stored"
                            value="<?php echo isset($blog) ? $blog["thumb"] : $thumbStored; ?>" />

                        <!-- Admin current page hidden input -->
                        <input type="hidden" name="page" value="<?php echo $page; ?>" />

                        <div class="form-group row">
                            <div class="col-md-10 offset-md-2">
                                <button type="submit" class="btn btn-primary" name="submit">Modificar artículo</button>
                            </div>
                        </div>
                    </form>
                </article>
            </main>

            <!-- Load general footer -->
            <?php require "../views/footer.view.php"; ?>
        </section>

        <script src="<?php echo ROOT_LIB; ?>/jquery-3.2.0.min.js"></script>
        <script src="<?php echo ROOT_LIB; ?>/tether.min.js"></script>
        <script src="<?php echo ROOT_LIB; ?>/bootstrap.min.js"></script>
    </body>
</html>
