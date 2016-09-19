<?php

//include_once("PHP/administrador.php"); 

//var_dump($_POST);
var_dump($_FILES);

//Valido que se haya cargado OK
if (!isset($_FILES["file"])) 
{


}
else
{
	//valido el tamaño
	if ($_FILES["file"]["error"]) 
	{
		echo "ERROR-->No se cargo archivo";
	}
	else
	{
		//Obtengo el tamaño del archivo
		$tamaño=$_FILES['file']['size'];
		if ($tamaño>1024000) 
		{
			echo "ERROR-->El archivo es muy grande";
		}
		else
		{
			//obtengo el tamaño de la imagen
			//si el archivo no es una imagen, retorna FALSE
			$esUnaImagen=getimagesize($_FILES["file"]["temp_name"]);
		}
		if (!$esUnaImagen) 
		{
			echo "No es una imagen";
		}
		else
		{
			$NombreCompleto=explode(".",$_FILES['file']['name']);
			$Extension=end($NombreCompleto);
			//defino antes las extensiones que seran validas
			$arrayDeExtValida=array("jpg","jpeg","gif","bmp","png");

			if (!in_array($Extension, $arrayDeExtValida)) 
			{
				echo "error de extencion";
			}
			else
					{
						//$destino =  "fotos/".$_FILES["foto"]["name"];
						$destino = "imagenes/". $_POST['dni'].".".$Extension;
						$foto=$_POST['dni'].".".$Extension;
						//MUEVO EL ARCHIVO DEL TEMPORAL AL DESTINO FINAL
    					if (move_uploaded_file($_FILES["foto"]["tmp_name"],$destino))
    					{		
      						 echo "ok";
      					}
      					else
      					{   
      						// algun error;
      					}
					}

		}
	}

}
?>