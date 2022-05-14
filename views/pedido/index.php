<h1 class="nombre-pagina">Haz Tu Pedido</h1>
<p class="descripcion-pagina">Elige tus productos y coloca tus datos</p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
?>

<div class="app">

    <nav class="tabs">
        <button class="actual" type="button" data-paso="1">Productos</button>
        <button type="button" data-paso="2">Información Pedido</button>
        <button type="button" data-paso="3">Resumen</button>
    </nav>

    <div id="paso-1" class="seccion">
        <h2>Productos</h2>
        <p class="text-center">Elige tus productos</p>
        <div id="productos" class="listado-productos"></div>
    </div>
    <div id="paso-2" class="seccion">
        <h2>Tus Datos y Pedido</h2>
        <p class="text-center">Coloca tus datos y selecciona la fecha de entrega</p>

        <form class="formulario">
            
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input 
                    id="nombre"
                    type="text"
                    placeholder="Tu Nombre"
                    value="<?php echo $nombre; ?>"
                    disabled
                />
            </div>

            <div class="campo">
                <label for="fecha">Fecha</label>
                <input 
                    id="fecha"
                    type="date"
                    min="<?php echo date('Y-m-d', strtotime('+1 day') ); ?>"
                        
                />
            </div>

            <div class="campo">
                <label for="hora">Hora</label>
                <input 
                    id="hora"
                    type="time"
                />
            </div>
            <input type="hidden" id="id" value="<?php echo $id; ?>" >

        </form>

        <p class="text-warning">* Agenda tu entrega entre lunes y viernes 
            </br> Desde las 8 am hasta las 5:59 pm </p>

    </div>
    <div id="paso-3" class="seccion contenido-resumen">
        <h2>Resumen</h2>
        <p class="text-center">Verifica que todo esté correcto</p>
    </div>

    <div class="paginacion">
        <button
            id="anterior"
            class="boton"
        >&laquo; Anterior</button>

        <button
            id="siguiente"
            class="boton"
        >Siguiente &raquo;</button>
    </div>
</div>

<?php
    $script = "
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script src='build/js/app.js'></script>
    ";
?>