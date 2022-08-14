<?php

include "../complementos/conexion.php";

if (!empty($_POST)) {
	$alert = '';
	if (empty(empty($_POST['iddocente']) || empty($_POST['roldocente']) || empty($_POST['especialidad']) || $_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['tipoide']) || empty($_POST['numdoc']) || empty($_POST['sexo']) || empty($_POST['celular']) || empty($_POST['correo']) || empty($_POST['pass'])) {
		$alert = '<p class="msg_error">Todos los campos son obligatorios</p>';
	} else {

		$iddocente = $_POST['iddocente'];
		$roldocente = $_POST['roldocente'];
		$especialidad = $_POST['especialidad'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$tipoide = $_POST['tipoide'];
		$numdoc = $_POST['numdoc'];
		$sexo = $_POST['sexo'];
		$celular = $_POST['celular'];
		$correo = $_POST['correo'];
		$pass = ($_POST['pass']);

		if ($_POST['pass'] != $_POST['confpass']) {

			$alert = '<p class="msg_error">La contraseña no coincide</p>';
		} else {

			if ($_POST['correo'] != $_POST['confcorreo']) {

				$alert = '<p class="msg_error">El correo no coincide</p>';
			} else {

				$query = mysqli_query(conexion(), "SELECT * FROM persona where correo = '$correo'");
				$result = mysqli_fetch_array($query);
				if ($result > 0) {
					$alert = '<p class="msg_error">Correo o usuario ya existe</p>';
				} else {



					$query_insert_persona = mysqli_query(conexion(), "INSERT INTO persona(nombre,apellido,tipoide,numdoc,celular,correo,pass,sexo,idrol)
							 VALUES ('$nombre','$apellido','$tipoide','$numdoc','$celular','$correo','$pass','$sexo',2)");

					$query_id_persona = mysqli_query(conexion(), "SELECT MAX(idpersona) AS id FROM persona");
					$result3 = mysqli_fetch_array($query_id_persona);

					$query_insert_docente = mysqli_query(conexion(), "INSERT INTO docente(iddocente,especialidad,idroldoc,idpersona) VALUES ($iddocente,'$especialidad','$roldocente',$result3[0])");

					if ($query_insert_docente) {

						$alert = '<p class="msg_error">Usuario creado correctamente</p>';
					} else {

						$alert = '<p class="msg_error">Error al crear el usuario</p>';
					}
				}
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registro de Docente</title>
	<link rel='stylesheet' type='text/css' media='screen' href='main.css'>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
	<script src='main.js'></script>
</head>

<body>

	<div class="form_registro">
		<hr>


		<form action="" method="post">

			<div class="container border border-success bg-success p-2 text-dark bg-opacity-50 mx-auto" style="width: 850px;">
				<center>

					<h3>REGISTRO DE DOCENTE</h3>
				</center>
				<br>

				<div class="row mb-3">
					<label for="iddocente" class="col-sm-2 col-form-label">Código Docente:</label>
					<div class="col-md-auto">
						<input type="number" class="form-control" id="iddocente" name="iddocente">
						<br>
					</div>
				</div>





				<div class="row mb-3">
					<label for="roldocente" class="col-sm-2 col-form-label">Rol:</label>
					<div class="col-sm-auto">

						<select class="form-select" aria-label="Default select example" id="roldocente" name="roldocente">
							<option selected>seleccióne</option>
							<option value="1">Jurado</option>
							<option value="2">Asesor</option>

						</select>

						<br>
					</div>

				</div>


				<div class="row mb-3">
					<label for="especialidad" class="col-sm-2 col-form-label">Especialidad:</label>
					<div class="col-sm-auto">
						<input type="text" class="form-control" id="especialidad" name="especialidad">
						<br>

					</div>

				</div>


				<div class="row mb-3">
					<label for="nombre" class="col-sm-2 col-form-label">Nombres:</label>
					<div class="col-sm-auto">
						<input type="text" class="form-control is-invalid" id="nombre" name="nombre" aria-describedby="validationnombre" required>
						<div id="validationnombre" class="invalid-feedback">
							Nombres completos

						</div>
						<br>
					</div>
				</div>

				<div class="row mb-3">
					<label for="apellido" class="col-sm-2 col-form-label">Apellido</label>
					<div class="col-sm-auto">
						<input type="text" class="form-control is-invalid" id="apellido" name="apellido" aria-describedby="validationape" required>

						<div id="validatioape" class="invalid-feedback">
							Apellidos completos

						</div>
						<br>
					</div>

				</div>



				<div class="row">
					<div class="col">
						<label for="tipoide" class="form-label">Tipo de documento:</label>
						<select class="form-select" aria-label="Default select example" id="tipoide" name="tipoide">
							<option selected>seleccióne</option>
							<option value="CC">CC</option>
							<option value="TI">TI</option>
							<option value="CE">CE</option>
							<option value="NIP">NIP</option>
							<option value="NIT">NIT</option>
							<option value="PAP">PAP</option>

						</select>
					</div>


					<div class="col">
						<label for="numdoc" class="form-label">Número:</label>
						<input type="numer" class="form-control" placeholder="Número de identificación" aria-label="inputtipoIDA" id="numdoc" name="numdoc">
					</div>
				</div>
				<br>

				<fieldset class="row mb-3">
					<legend class="col-form-label col-sm-auto pt-0" id="sexo">Sexo</legend>
					<div class="col-sm-10">
						<div class="form-check">
							<input class="form-check-input" type="radio" name="sexo" id="sexo" value="M" checked>
							<label class="form-check-label" for="sexo">
								Masculino
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="sexo" id="sexo" value="F">
							<label class="form-check-label" for="sexo">
								Femenino
							</label>
						</div>

					</div>
				</fieldset>

				<div class="row mb-3">
					<label for="celular" class=" col-sm-2 col-form-label">Celular:</label>
					<div class="col-sm-auto">
						<input type="tel" class="form-control" id="celular" name="celular">
						<br>
					</div>
				</div>

				<div class="row mb-3 ">
					<label for="correo" class="col-sm-2 col-form-label">Email:</label>
					<div class="col-sm-auto">
						<input type="email" class="form-control  is-invalid" id="correo" name="correo" aria-describedby="validationcorreo" required>
						<div id="validationcorreo" class="invalid-feedback">
							Proporcióne correo válido

						</div>
					</div>
				</div>
				<br>
				<div class=" row mb-3 ">
					<label for="confcorreo" class=" col-sm-2 col-form-label">Confirmación Email:</label>
					<div class="col-sm-auto">
						<input type="email" class="form-control" id="confcorreo" name="confcorreo">
					</div>
				</div>

				<div class=" row mb-3">
					<label for="pass" class=" col-sm-2 col-form-label">Contraseña:</label>
					<div class="col-sm-auto">
						<input type="password" class="form-control" id="pass" name="pass">
					</div>
				</div>
				<br>

				<div class=" row mb-3 ">
					<label for="confpass" class=" col-sm-2 col-form-label"> Confirmación Contraseña: </label>
					<div class="col-sm-auto">
						<input type="password" class="form-control" id="confpass" name="confpass">
					</div>

					<br>
				</div>
				<div class="alert">
					<?php
					echo isset($alert) ? $alert : '';
					?>
				</div>

				<input class="btn btn-secondary" type="submit" value="Registrarme">
				<button type="button" class="btn btn-secondary">Volver</button>


			</div>

	</div>
	</form>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	</div>

</body>

</html>