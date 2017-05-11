<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Authentication - Signup</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />

        <link rel="stylesheet" href="<?php echo ROOT_LIB_CSS; ?>/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo ROOT_LIB_CSS; ?>/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo ROOT; ?>/css/myStyle.css" />
    </head>
    <body>
        <main class="signup-content">
            <div class="container">
                <h1>Regístrate</h1>
                <hr />
                <article>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="signup">
                        <!-- Name input -->
                        <div class="form-group <?php echo empty($errors["name"]) ? "" : "has-danger"; ?>">
                            <div class="form-data">
                                <i class="fa fa-user left-icon" aria-hidden="true"></i>
                                <input type="text" class="form-control form-control-danger" id="name" name="name" placeholder="Usuario" value="<?php echo $username; ?>" />
                            </div>
                            <?php if (!empty($errors["name"])): ?>
                            <div class="form-control-feedback"><?php echo $errors["name"]; ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Password input -->
                        <div class="form-group <?php echo empty($errors["password"]) ? "" : "has-danger"; ?>">
                            <div class="form-data">
                                <i class="fa fa-lock left-icon" aria-hidden="true"></i>
                                <input type="password" class="form-control form-control-danger" id="password" name="password" placeholder="Contraseña" value="<?php echo $password; ?>" />
                            </div>
                            <?php if (!empty($errors["password"])): ?>
                            <div class="form-control-feedback"><?php echo $errors["password"]; ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Confirm input -->
                        <div class="form-group <?php echo empty($errors["confirm"]) ? "" : "has-danger"; ?>">
                            <div class="form-data">
                                <i class="fa fa-lock left-icon" aria-hidden="true"></i>
                                <input type="password" class="form-control form-control-danger" id="confirm" name="confirm" placeholder="Reescribir contraseña" value="<?php echo $confirm; ?>"/>
                                <i class="fa fa-arrow-right right-icon" aria-hidden="true" onclick="signup.submit()"></i>
                            </div>
                            <?php if (!empty($errors["confirm"])): ?>
                            <div class="form-control-feedback"><?php echo $errors["confirm"]; ?></div>
                            <?php endif; ?>
                        </div>
                    </form>
                </article>

                <!-- Navigation to login if already have an account -->
                <div class="navigation-content">
                    <p>¿Ya tienes cuenta?</p>
                    <a href="login.php">Iniciar sesión</a>
                </div>
            </div>
        </main>

        <script src="<?php echo ROOT_LIB; ?>/jquery-3.2.0.min.js"></script>
        <script src="<?php echo ROOT_LIB; ?>/tether.min.js"></script>
        <script src="<?php echo ROOT_LIB; ?>/bootstrap.min.js"></script>
    </body>
</html>
