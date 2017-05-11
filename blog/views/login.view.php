<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Blog - Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />

        <link rel="stylesheet" href="<?php echo ROOT_LIB_CSS; ?>/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo ROOT_LIB_CSS; ?>/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo ROOT; ?>/css/myStyle.css" />
    </head>
    <body>
        <section class="main-content login-content">
            <main class="form-content">
                <article class="container">
                    <h1>Iniciar Sesión</h1>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="signin">
                        <!-- Input username -->
                        <div class="form-group <?php echo empty($errors["name"]) ? "" : "has-danger"; ?>">
                            <div class="form-data">
                                <i class="fa fa-user left-icon" aria-hidden="true"></i>
                                <input type="text" class="form-control <?php echo empty($errors["name"]) ? "" : "form-control-danger"; ?>" id="name" name="name" placeholder="Usuario" value="<?php echo $username; ?>" />
                            </div>
                            <?php if (!empty($errors["name"])): ?>
                            <div class="form-control-feedback"><?php echo $errors["name"]; ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Input password -->
                        <div class="form-group <?php echo empty($errors["password"]) ? "" : "has-danger"; ?>">
                            <div class="form-data">
                                <i class="fa fa-lock left-icon" aria-hidden="true"></i>
                                <input type="password" class="form-control <?php echo empty($errors["name"]) ? "" : "form-control-danger"; ?>" id="password" name="password" placeholder="Contraseña" value="<?php echo $password; ?>"/>
                                <i class="fa fa-arrow-right right-icon" aria-hidden="true" onclick="signin.submit()"></i>
                            </div>
                            <?php if (!empty($errors["password"])): ?>
                            <div class="form-control-feedback"><?php echo $errors["password"]; ?></div>
                            <?php endif; ?>
                        </div>
                    </form>
                </article>
            </main>
        </section>

        <script src="<?php echo ROOT_LIB; ?>/jquery-3.2.0.min.js"></script>
        <script src="<?php echo ROOT_LIB; ?>/tether.min.js"></script>
        <script src="<?php echo ROOT_LIB; ?>/bootstrap.min.js"></script>
    </body>
</html>
