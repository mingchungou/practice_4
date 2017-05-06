<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Visit Counter</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />

        <link rel="stylesheet" href="css/myStyle.css" />
    </head>
    <body>
        <h1>Visit Counter</h1>
        <div class="counter-content">
            <p><?php echo $number; ?></p>
            <p><?php echo ($number > 1) ? "Visits" : "Visit"; ?></p>
        </div>
    </body>
</html>
