<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Upload</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />

        <link rel="stylesheet" href="<?php echo ROOT_LIB_CSS; ?>/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo ROOT_LIB_CSS; ?>/bootstrap.min.css"  />
        <link rel="stylesheet" href="<?php echo ROOT; ?>/css/myStyle.css" />
    </head>
    <body>
        <section class="upload-content main-content">
            <!-- Load general header -->
            <?php
                $pageTitle = "Agregar fotos";
                require "../views/header.view.php";
            ?>

            <main class="form-content">
                <div class="container">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                        <!-- Image file input -->
                        <div class="form-group row <?php echo empty($errors["photo"]) ? "" : "has-danger"; ?>">
                            <label for="photo" class="col-12 form-control-label">Seleccione tu foto:</label>
                            <div class="col-12">
                                <input type="file" class="form-control form-control-danger" id="photo" name="photo" />
                            </div>
                            <?php if (!empty($errors["photo"])): ?>
                            <div class="col-12 form-control-feedback"><?php echo $errors["photo"]; ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Title input -->
                        <div class="form-group row <?php echo empty($errors["title"]) ? "" : "has-danger"; ?>">
                            <label for="title" class="col-12 form-control-label">Título de la foto:</label>
                            <div class="col-12">
                                <input type="text" class="form-control form-control-danger" id="title" name="title" placeholder="Ingrese un título" value="<?php echo $title; ?>" />
                            </div>
                            <?php if (!empty($errors["title"])): ?>
                            <div class="col-12 form-control-feedback"><?php echo $errors["title"]; ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Description input -->
                        <div class="form-group row <?php echo empty($errors["description"]) ? "" : "has-danger"; ?>">
                            <label for="description" class="col-12 form-control-label">Descripción:</label>
                            <div class="col-12">
                                <textarea class="form-control form-control-danger" id="description" name="description" rows="3" placeholder="Ingrese una descripción"><?php echo $description; ?></textarea>
                            </div>
                            <?php if (!empty($errors["description"])): ?>
                            <div class="col-12 form-control-feedback"><?php echo $errors["description"]; ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary" name="submit">Subir foto</button>
                            </div>
                        </div>
                    </form>
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
