<?php

require_once 'components/header.php';

?>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<script type="text/javascript" src="views/js/home.js"></script>

<?php if($_SESSION['rol'] == 'ADMIN'){ ?>
<div class="container">
  <div class="row">
    <div class="col">
		<button class="btn btn-success mt-4" id="downloadReportPQRAdmin">Descargar reporte</button>
			<table class="table table-dark table-hover table-bordered mt-4" id="tableDataPQRAdmin">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Tipo</th>
					<th scope="col">Asunto</th>
					<th scope="col">Usuario</th>
					<th scope="col">Estado</th>
					<th scope="col">F de creación</th>
					<th scope="col">F limite</th>
					<th scope="col">Acciones</th>
				</tr>
			</thead>
			<tbody id="tablePQRAdmin">
				<td colspan='9'><center> No hay PQR </center></td>
			</tbody>
			</table>
    </div>
  </div>
</div>
<?php }?>

<?php if($_SESSION['rol'] == 'USER'){ ?>

<div class="container">
  <div class="row">
    <div class="col">
		<button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
			Crear PQR
		</button>
		<button class="btn btn-success mt-4" id="downloadReportPQRUser">Descargar reporte</button>
			<table class="table table-dark table-hover table-bordered mt-4" id="tableDataPQRUser">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Tipo</th>
					<th scope="col">Asunto</th>
					<th scope="col">Usuario</th>
					<th scope="col">Estado</th>
					<th scope="col">F de creación</th>
					<th scope="col">F limite</th>
					<th scope="col">Acciones</th>
				</tr>
			</thead>
			<tbody id="tablePQRUserId">
				<td colspan='7'><center> No hay PQR </center></td>
			</tbody>
			</table>
    </div>
  </div>
</div>
<?php }?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear PQR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
			<form method="POST" id="createPQRForm">
			<div class="row">
				<div class="col">
				<select class="form-select" name="type" aria-label="Default select example">
					<option selected disabled> Tipo </option>
					<option value="Petición">Petición</option>
					<option value="Queja">Queja</option>
					<option value="Reclamo">Reclamo</option>
				</select>
				</div>
				<div class="col">
					<input type="text" class="form-control" placeholder="Usuario" disabled value="<?= $_SESSION['userName'] ?>" aria-label="Last name">
				</div>
			</div>
				<div class="mb-3">
				<textarea class="form-control mt-2" name="subject" placeholder="Asunto" id="floatingTextarea"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
      </div>
    </div>
  </div>
</div>