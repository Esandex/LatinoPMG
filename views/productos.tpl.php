<?php require 'template/inicio.php'; ?>
	<!-- Contenido mostrado -->
	<?php while ($arrProductos=mysql_fetch_array($lis_productos)) {?>
		<div class="tarjeta">
	        <div id="idUsuario" style="display: none;"></div>
	        <div class="titulo"></div>
	        
	        <div class="detalles">
	          <p><?= $arrProductos['DESCRIPCION']; ?></p>
	          <p><?= $arrProductos['PRECIO_VENTA']; ?> USD</p>
	        </div>
	        <div class="social"></div>
	        <div class="opciones">
	          <div class="agregarMenus" onclick="asignarMenu(this);"></div>
	        </div>   
      </div>
	<?php } ?>
	<!-- Cajas de dialogo -->
	<div id="dNewProducto" class="cajaDialogo">
		<div class="formulario">
			<div class="encabezado">
				NUEVO PRODUCTO	
				<div class="cerrar"></div>
			</div>
			<div class="detalles">
				<form id="nuevoProducto">
					<label>Descripcion</label>
					<input name="descripcion" type="text" class="vaciar">
					<label>Precio Venta</label>
					<input name="precio_venta" type="number" class="vaciar">
					<input id="btnInsProducto" type="submit" value="Guardar">
				</form>
			</div>
		</div>
	</div>

	<div class="botonNuevo" onclick="mostraCajaDialogo('#dNewProducto')"></div>
<?php require 'template/fin.php'; ?>