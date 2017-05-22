<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Contact</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />

        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/myStyle.css">
    </head>
    <body>
        <section class="form-content">
            <div class="py-3 container">
                <?php if ($sent): ?>
                <div class="alert alert-success" role="alert">
                    <strong>Well done!</strong> Message is sent.
                </div>
                <?php endif; ?>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <!-- Name input -->
                    <div class="form-group row <?php echo empty($errors["name"]) ? "" : "has-danger"; ?>">
                        <label for="name" class="col-sm-4 form-control-label">Nombre</label>
                        <div class="col-sm-8">
                            <input class="form-control form-control-danger"
                                id="name" name="name"
                                type="text"
                                placeholder="Ingrese su nombre"
                                value="<?php if (!$sent && isset($name)) echo $name; ?>" />
                        </div>
                        <?php if (!empty($errors["name"])): ?>
                        <div class="col-sm-8 offset-sm-4 form-control-feedback"><?php echo $errors["name"]; ?></div>
                        <?php endif; ?>
                    </div>

                    <!-- Email input -->
                    <div class="form-group row <?php echo empty($errors["email"]) ? "" : "has-danger"; ?>">
                        <label for="email" class="col-sm-4 form-control-label">Correo</label>
                        <div class="col-sm-8">
                            <input class="form-control form-control-danger"
                                id="email" name="email"
                                type="text"
                                placeholder="Ingrese su correo"
                                value="<?php if (!$sent && isset($email)) echo $email; ?>" />
                        </div>
                        <?php if (!empty($errors["email"])): ?>
                        <div class="col-sm-8 offset-sm-4 form-control-feedback"><?php echo $errors["email"]; ?></div>
                        <?php endif; ?>
                    </div>

                    <!-- Message input -->
                    <div class="form-group row <?php echo empty($errors["message"]) ? "" : "has-danger"; ?>">
                        <label for="message" class="col-sm-4 form-control-label">Message</label>
                        <div class="col-sm-8">
                            <textarea class="form-control form-control-danger"
                                id="message"
                                name="message"
                                rows="3"
                                placeholder="Ingrese su mensaje"><?php if (!$sent && isset($message)) echo $message; ?></textarea>
                        </div>
                        <?php if (!empty($errors["message"])): ?>
                        <div class="col-sm-8 offset-sm-4 form-control-feedback"><?php echo $errors["message"]; ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-8 offset-sm-4">
                            <button type="submit" class="btn btn-primary" name="submit">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <script src="../lib/jquery-3.2.0.min.js"></script>
        <script src="../lib/tether.min.js"></script>
        <script src="../lib/bootstrap.min.js"></script>
    </body>
</html>
