<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Croknticos | Del Horno a tu Mesa</title>
    <link href="https://fonts.googleapis.com/css2?family=Arapey:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>

    <div class="contenedor-app">
        <!-- seccion izquierda -->
        <div class="imagen"></div>
        <!-- seccion derecha -->
        <div class="app">
            <?php echo $contenido; ?>
        </div>
    </div>
    
    <?php
    
        echo $script ?? '';

    ?>
    
</body>
</html>