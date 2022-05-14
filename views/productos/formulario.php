<div class="campo">
    <label for="nombre">Nombre</label>
    <input 
        type="text"
        id="nombre"
        placeholder="Nombre Producto"
        name="nombre"
        value="<?php echo $producto->nombre;?>"
    >
</div>

<div class="campo">
    <label for="precio">Precio</label>
    <input 
        type="number"
        id="precio"
        placeholder="Precio Producto"
        name="precio"
        value="<?php echo $producto->precio;?>"
    >
</div>