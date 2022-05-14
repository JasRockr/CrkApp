<div class="barra">
    <p>Bienvenido: <?php echo $nombre ?? 'Invitado'; ?></p>

    <a class="boton" href="/logout">Cerrar Sesion</a>
</div>

<?php 
    if(isset($_SESSION['admin'])) { 
?>

    <div class="barra-productos">
        <a href="/admin" class="boton">Ver Pedidos</a>
        <a href="/productos" class="boton">Ver Productos</a>
        <a href="/productos/crear" class="boton">Nuevo Producto</a>
    </div>

<?php
    }
?>