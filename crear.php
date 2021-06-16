<?php

//verifica si se envio el formulario
if (isset($_POST['submit'])) {
  
  //incluye archivo de conexion a base de datos
  $config = include 'config.php';

  //try/catch sirve para capturar errores que pueden ocurrir
  try {
    //inicia conexion a base de datos
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);


    $consultaSQL = "INSERT INTO usuarios (nya, contraseña, tipo_usuario) values ('". $_POST['nya']."', '". $_POST['contraseña']."', '". $_POST['tipo_usuario']."')";
    
    $sentencia = $conexion->prepare($consultaSQL);
    $sentencia->execute();

    //para mostrar mensaje
    $mensaje = 'Se agrego correctamente el usuario';

  } catch(PDOException $error) {
    
    $mensaje = 'Error '.$error->getMessage();
    
  }
}
?>
<?php include "template/head.php"; ?>

<?php
if (isset($mensaje)) {
  ?>
  <div class="container mt-3">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-primary" role="alert">
          <?php echo $mensaje; ?>
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>


<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Crea un usuario</h2>
      <hr>
      <form method="post" >
        <div class="form-group">
          <label for="nombre">Nombre y Apellido</label>
          <input type="text" name="nya" id="nombre" class="form-control">
        </div>
        
        <div class="form-group">
          <label for="email">Contraseña</label>
          <input type="password" name="contraseña" id="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Tipo de usuario</label>
            <select class="form-select" aria-label="Default select example" name="tipo_usuario">

          <option value="ADMINISTRADOR">Administrador</option>
          <option value="PROPIETARIO">Propietario</option>
          
        </select>
        </div>
        


        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-primary" value="Enviar">
          
        </div>
      </form>
    </div>
  </div>
</div>

<?php include "template/footer.php"; ?>