//Nombre: Victor Raul Alcantara Sanchez
//Matricula: 2023-1146
<?php 
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
$matricula = isset($_POST['matricula']) ? trim ($_POST['matricula']) : '';
$nombre = isset($_POST['nombre']) ? trim ($_POST['nombre']) : '';
$apellido = isset($_POST['apellido']) ? trim ($_POST['apellido']) : '';
$curso = isset($_POST['curso']) ? trim ($_POST['curso']) : '';
$motivo = isset($_POST['motivo']) ? trim ($_POST['motivo']) : '';

if ($matricula !== '' && $nombre !=='' && $apellido !=='' && $curso !=='' && $motivo !==''){
    date_default_timezone_set('America/Santo_Domingo');
    $fecha = date('Y-m-d');
    $hora = date('H:i:s');

$registro = array(
    'fecha' => $fecha,
    'hora' => $hora,
    'matricula' => $matricula,
    'nombre' => $nombre,
    'apellido' => $apellido,
    'curso' => $curso,
    'motivo' => $motivo
);

if (!isset($_SESSION['tardanzas'])){
    $_SESSION['tardanzas'] = array();
}

$_SESSION['tardanzas'][] = $registro;
header('Location: index.php');
exit;
}else{
    $error = 'Por favor, complete todos los campos.';
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro De Tardanzas</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
 <div class="container mt-5">
 <h1 class="text-center mb-4">Registrar Nueva Tardanza</h1>

        <?php if(isset($error)): ?>
            <div class="alert alert-danger text-center"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form method="post" action="registro.php">
    <div class="form-group">
    <label for="matricula">Matricula:</label>
    <input type="text" id="matricula" name="matricula" required>
    </div>
    <div class="form-group">
    <label for="nombre">Nombre::</label>
    <input type="text" id="nombre" name="nombre" required>
    </div>
    <div class="form-group">
    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" required>
    </div>
    <div class="form-group">
    <label for="curso">Curso:</label>
    <input type="text" id="curso" name="curso" required>
    </div>
    <div class="form-group">
    <label for="motivo">Motivo:</label>
    <textarea id="motivo" name="motivo"  rows "4" required></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="submit-button">Registrar Tardanza</button>
        <a href="index.php" class="button">Volver</a>
    </div>
</form>
</div>
</body>
</html>
