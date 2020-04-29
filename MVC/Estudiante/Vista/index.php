<html>
<style>
	h1 {
		color:blue;
		text-align: center;
	}

	div {
	  border-radius: 5px;
	  background-color: #f2f2f2;
	  padding: 20px;
	}
	a:link, a:visited {
	  background-color: #f44336;
	  color: white;
	  padding: 14px 25px;
	  text-align: center;
	  text-decoration: none;
	  display: inline-block;
	}

	a:hover, a:active {
	  background-color: green;
	}
	table {
	  border-collapse: collapse;
	  width: 100%;
	}

	th, td {
	  text-align: left;
	  padding: 8px;
	}

	tr:nth-child(even){background-color: #cceeff}

	th {
	  background-color: #4CAF50;
	  color: white;
	}
</style>
<body>
	<?php

		include '../Controlador.php';

		$ctrl = new Controlador();
		
		if(isset($_GET['cod'])){
			$ctrl->eliminar($_GET['cod']);
		}
	?>
	<h1>Listado de Estudiante</h1>
	<div>
		<a href="create.php">Crear </a>
	</div>

	<div>
		<table>
			<tr>
				<th>
					Codigo
				</th>
				<th>
					Nombre
				</th>
				<th>
					Genero
				</th>
				<th>
					Dirección
				</th>
				<th>
					Fecha de Nacimiento
				</th>
				<th>
					Acciones
				</th>
			</tr>
			<?php
				$datos = $ctrl->listar();

				if(is_string($datos)){
				echo $datos;
			}else{

				while($dato = $datos->fetch(PDO::FETCH_OBJ)){
				?>
					<tr>
						<td>
							<?php echo $dato->cod; ?>
						</td>
						<td>
							<?php echo $dato->nom; ?>
						</td>
						<td>
							<?php echo $dato->gen; ?>
						</td>
						<td>
							<?php echo $dato->dir; ?>
						</td>
						<td>
							<?php echo $dato->nam; ?>
						</td>
						<td>
							<a href="edit.php?cod=<?php echo $dato->cod; ?>">Editar</a>
							<a href="index.php?cod=<?php echo $dato->cod; ?>">Eliminar</a>
						</td>
					</tr>
				<?php 
				}
				}
				 ?>
		</table>
	</div>
	<div>
		<a href="../index.php">Home</a>
	</div>
</body>
</html>


