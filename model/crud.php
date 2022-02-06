<?php

require_once ("conexion.php");

class Datos extends Conexion
{

	public static function registroProductoModel($datos, $tabla)
	{
		$stmt = Conexion::Conectar()->prepare("INSERT INTO $tabla(nombre, referencia, precio, peso, categoria, stock, fechaCreacion) VALUES(:nombre, :referencia, :precio, :peso, :categoria, :stock, :fechaCreacion)");

		$stmt->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
		$stmt->bindParam(":referencia", $datos['referencia'], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datos['precio'], PDO::PARAM_INT);
		$stmt->bindParam(":peso", $datos['peso'], PDO::PARAM_INT);
		$stmt->bindParam(":categoria", $datos['categoria'], PDO::PARAM_STR);
		$stmt->bindParam(":stock", $datos['stock'], PDO::PARAM_INT);
		$stmt->bindParam(":fechaCreacion", $datos['fechaCreacion'], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "Success";
		}else {
			return "Error";
		}
		$stmt->close();

	}
	public static function mostrarProductoModel($tabla)
	{
		$stmt = Conexion::Conectar()->prepare("SELECT idProducto, nombre, referencia, precio, peso, categoria, stock, fechaCreacion, fechaUltimaVenta FROM $tabla");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}

	public static function editarProductoModel($datos, $tabla)
	{
		$stmt = Conexion::Conectar()->prepare("SELECT idProducto, nombre, referencia, precio, peso, categoria, stock, fechaCreacion FROM $tabla WHERE idProducto = :idProducto");

		$stmt->bindParam(":idProducto", $datos, PDO::PARAM_INT);

		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}
public static function eliminarProductoModel($datos, $tabla)
{
	$stmt = Conexion::Conectar()->prepare("DELETE FROM $tabla WHERE idProducto = :idProducto");
	$stmt->bindParam(":idProducto", $datos, PDO::PARAM_INT);

	if ($stmt->execute()) {
		return "Success";
	}else
	{
		return "Error";
	}
	$stmt->close();
}	public static function actualizarProductoModel($datos, $tabla)
	{
		$stmt = Conexion::Conectar()->prepare("UPDATE $tabla SET nombre = :nombre, referencia = :referencia, precio = :precio, peso = :peso, categoria = :categoria, stock = :stock, fechaCreacion = :fechaCreacion WHERE idProducto = :idProducto");
		$stmt->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
		$stmt->bindParam(":referencia", $datos['referencia'], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datos['precio'], PDO::PARAM_INT);
		$stmt->bindParam(":peso", $datos['peso'], PDO::PARAM_INT);
		$stmt->bindParam(":categoria", $datos['categoria'], PDO::PARAM_STR);
		$stmt->bindParam(":stock", $datos['stock'], PDO::PARAM_INT);
		$stmt->bindParam(":fechaCreacion", $datos['fechaCreacion'], PDO::PARAM_STR);
		$stmt->bindParam(":idProducto", $datos["idProducto"], PDO::PARAM_INT);

		if ($stmt->execute()) {
			return "Success";
		}else
		{
			return "Error";
		}
		$stmt->close();

	}
	public static function ventaProductoModel($datos, $tabla)
	{
		$stmt = Conexion::Conectar()->prepare("UPDATE $tabla SET stock = :stock, fechaUltimaVenta = :fechaUltimaVenta WHERE idProducto = :idProducto");
		$stmt->bindParam(":idProducto", $datos['idProducto'], PDO::PARAM_INT);
		$stmt->bindParam(":stock", $datos['stock'], PDO::PARAM_INT);
		$stmt->bindParam(":fechaUltimaVenta", $datos['fechaUltimaVenta'], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "Success";
		}else
		{
			return "Error";
		}
		$stmt->close();
	}

}
