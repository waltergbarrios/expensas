<?php

$config = include 'config.php';

try {
  $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
  $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

  $consultaSQL = "SELECT * FROM usuarios";

  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

  $usuarios = $sentencia->fetchAll();

} catch(PDOException $error) {
  $error= $error->getMessage();
}
?>
<?php include "template/head.php"; ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="crear.php"  class="btn btn-primary mt-4">Crear usuario</a>
      <hr>
    </div>
  </div>

  <div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-3">Lista de usuarios</h2>
      <table class="table">
        <thead>
          <tr>
            
            <th>Nombre y Apellido</th>
            <th>Tipo Usuario</th>
            <th>DNI</th>
           
          </tr>
        </thead>
        <tbody>
          <?php
          if ($usuarios && $sentencia->rowCount() > 0) {
            foreach ($usuarios as $fila) {
              ?>
              <tr>
                <td><?php echo $fila["nya"]; ?></td>
                <td><?php echo $fila["tipo_usuario"]; ?></td>
                <td><?php echo $fila["dni"]; ?></td>
              </tr>
              <?php
            }
          }

          else
          {
            echo 'no hay datos';
          }
          ?>
        <tbody>
      </table>
    </div>
  </div>
</div>
</div>

<?php include "template/footer.php"; ?>