//Nombre: Victor Raul Alcantara Sanchez
//Matricula: 2023-1146

<?php
session_start();

if(!isset($_SESSION['tardanzas'])){
    $_SESSION['tardanzas'] = array();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro De Tardanzas</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Registro De tardanzas</h1>
    <div class="botones">
        <a href="registro.php" class="button">Registrar Nueva Tardanza</a>
    </div>

    <?php if(count($_SESSION['tardanzas']) > 0): ?>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Matricula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Curso</th>
                <th>Motivo</th>
            </tr>
        </thead>
            <tbody>
            <?php foreach($_SESSION['tardanzas'] as $tardanza): ?>
            <tr>
                <td><?php echo htmlspecialchars($tardanza['fecha']); ?></td>
                <td><?php echo htmlspecialchars($tardanza['hora']); ?></td>
                <td><?php echo htmlspecialchars($tardanza['matricula']); ?></td>
                <td><?php echo htmlspecialchars($tardanza['nombre']); ?></td>
                <td><?php echo htmlspecialchars($tardanza['apellido']); ?></td>
                <td><?php echo htmlspecialchars($tardanza['curso']); ?></td>
                <td><?php echo htmlspecialchars($tardanza['motivo']); ?></td>
            </tr>
        <?php endforeach; ?>
            </tbody>
    </table>
<?php else: ?>
    <p class="alert"> No Hay Tardanzas Registradas. </p>
<?php endif; ?>
</body>
</html>