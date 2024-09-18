<?php
  $name = @$_REQUEST['name'];
  $lastName = @$_REQUEST['lastname'];
  $phone = @$_REQUEST['phone'];
  $email = @$_REQUEST['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Usuario</title>
</head>
<body>
<form action="/Workshop2/utils/save.php" method="POST">
  <div class="form-group">
    <label for="">Nombre</label>
    <input type="text" class="form-control" name="name" id="" value="<?php echo $name; ?>" placeholder="Tu nombre">
  </div>
  <div class="form-group">
    <label for="">Apellido</label>
    <input type="text" class="form-control" name="lastname" id="" value="<?php echo $lastName; ?>" placeholder="Tu apellido">
  </div>
  <div class="form-group">
    <label for="">Teléfono</label>
    <input type="tel" class="form-control" name="phone" id="" value="<?php echo $phone; ?>" placeholder="Tu teléfono">
  </div>
  <div class="form-group">
    <label for="">Correo</label>
    <input type="email" class="form-control" name="email" id="" value="<?php echo $email; ?>" placeholder="Tu correo electrónico">
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
</body>
</html>