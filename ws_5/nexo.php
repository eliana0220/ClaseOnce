<?php  

require_once("AccesoDatos.php");
require_once("Cd.php");

$queHago=$_POST['queHacer'];

var_dump("llegue al nexo");
switch ($queHago) 
{
	case 'Insertar':
			$cd = new cd();
			$cd->id=$_POST['id'];
			$cd->cantante=$_POST['cantante'];
			$cd->titulo=$_POST['titulo'];
			$cd->año=$_POST['anio'];
			$cantidad=$cd->GuardarCD();
			echo $cantidad;

		break;

	case 'mostrarGrilla': 
						$grilla = cd:: ConstruirGrilla();
						echo ($grilla);
						break;
}

?>