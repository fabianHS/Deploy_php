
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post">
      <p>Nombre de Usuario: <input type="text" name="nombre" value="">
      </p>
      <p>Contraseña: <input type="password" name="pass" value="">
      </p>
      <input type="hidden" value="1" name="numero">

      <button type="submit">Enviar</button>
    </form>
    <?php
    $numero = htmlspecialchars($_POST['numero'] ?? null);
    if ($numero == 1){
      $nombre= htmlspecialchars($_POST['nombre'] ?? null);
      $pass = htmlspecialchars($_POST['pass'] ?? null);
      if ($nombre != null && $pass != null){
            $salt = 'XyZzy12*_';
            $stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';
            $md5 = hash('md5',$salt.$pass);

            if ($stored_hash == $md5){
              header("Location: game.php?name=".urlencode($_POST['nombre']));
            }else{
              echo "MAL, contraseña no correcto.";
            }

      }else{
          echo "<p>Se requiere nombre de usuario y clave para accede</p>";
      }
    }else{
      $nombre= null;
      $pass = null;
    }
    ?>
  </body>
</html>
