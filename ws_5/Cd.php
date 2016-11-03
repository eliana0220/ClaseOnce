<?php
class Cd
{
	public $id;
	public $interpret;
	public $jahr;
	public $titel;
	
	public static function TraerTodos()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		
		$sql = "SELECT id, interpret, jahr, titel
				FROM cds";

		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();

		return $consulta->fetchall();
		
	}

		 public function GuardarCD()
	 {

				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into cds (titel,interpret,jahr)values('$this->titulo','$this->cantante','$this->año')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				

	 }

	 		public static function ConstruirGrilla()
		{

			$lista = Cd::TraerTodos();

			$grilla = '<table class="table">
							<tr>
								<th>  ID     	   </th>
								<th>  CANTANTE     </th>	
								<th>  AÑO 		   </th>
								<th>  TÍTULO	   </th>	
								<th>        	   </th>
							</tr> 
						</thead>';   

			foreach ($lista as $reg)
			{
				//<td>".$cd['id']."</td><td>".$cd['interpret']."</td><td>".$cd['jahr']."</td><td>".$cd['titel']

				$cd = array();
				$cd["id"] = $reg->id;
				$cd["cantante"] = $reg->interpret;
				$cd["anio"] = $reg->jahr;
				$cd["titulo"] = $reg->titel;
				
				$cd = json_encode($cd);
		
				$grilla .= "<tr>
								<td>".$reg->id.    "</td>
								<td>".$reg->interpret.      "</td>
								<td>".$reg->jahr."</td>
								<td>".$reg->titel.  	   "</td>
								
								<td>
									<input type='button' value='Borrar' class='MiBotonUTN' id='btnEliminar' onclick='BorrarCelular($celular)' />
									<input type='button' value='Modificar' class='MiBotonUTN' id='btnModificar' onclick='ModificarCelular($celular)' />
								</td>
								
							</tr>";
			}
		
			$grilla .= '</table>';		
		
			return $grilla;
		}//cierre ConstruirGrilla
}