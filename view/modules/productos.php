<div class="container">
	<p></p>
	<div class="row align-items-center">
		<h2>Productos</h2>
	</div>
	<div class="container">
		<div class="row align-items-center">
			<table class="table">
				<thead>
					<tr>
						<th>ID Producto</th>
						<th>Nombre</th>
						<th>Referencia</th>
						<th>Precio</th>
						<th>Peso</th>
						<th>Categoría</th>
						<th>Stock</th>
						<th>Fecha Creación</th>
						<th>Fecha Última Venta</th>
						<th>Vender</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$mostrar = new Controller();
					$mostrar->mostrarProductoController();
					$vender = new Controller();
					$vender->ventaProductoController();
					$eliminar = new Controller();
					$eliminar->eliminarProductoController();
					?>					
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php

if (isset($_GET["action"])) {
	if ($_GET["action"] == "cambio") {
		echo "Product UPDATE";
	}else if ($_GET["action"] == "vendido") {
		echo "Product SELL";
	}else if ($_GET["action"] == "novendido") {
		echo "NO SELL. CERO 0 unidades en Stock";
	}
}


