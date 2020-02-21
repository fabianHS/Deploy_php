<?php
$nombre= htmlspecialchars($_GET['name']?? null) or die("Falta parametro");
$names = Array('Piedra','Papel','Tijera');
$humano= $_POST['humano'] ?? null;
$mensaje = "Elige una opcion y pincha en Jugar ";

function check($humano,$pc)
{
  if(($humano == 'Tijera'&& $pc == 'Tijera')||($humano == 'Papel'&& $pc == 'Papel')||($humano == 'Piedra' && $pc == 'Piedra')){
        return "Empate";
  }elseif(($humano == 'Piedra'&& $pc == 'Tijera')||($humano == 'Tijera'&& $pc == 'Papel')||($humano == 'Papel'&& $pc == 'Piedra')){
        return "Tú Ganas";
  }elseif(($pc == 'Piedra' && $humano == 'Tijera')||($pc == 'Tijera' && $humano == 'Papel')||($pc == 'Papel'&& $humano == 'Piedra')){
    return "Pierdes";
  }
}

if ($humano != 'Text'){
  $numero= rand(0,2);
  $pc= $names[$numero];
  $resultado = check($humano,$pc);
  if ($humano != null){
    $mensaje= 'Tu jugada = '.$humano.'; Ordenador = '.$pc.'; Resultado: '.$resultado;
  }
}else{
  for($c=0;$c<3;$c++) {
    for($h=0;$h<3;$h++) {
      $r = check($names[$h],$names[$c]);
      if ($c==0 && $h == 0) {
        $mensaje ="Humano = $names[$h] Ordenador = $names[$c] Result = $r\n";
      }else{
        $mensaje ="{$mensaje}Humano = $names[$h] Ordenador = $names[$c] Result = $r\n";
      }

    }
  }
}
 ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Piedra, Papel y Tijera</h1>
    <p>Bienvenido <?php echo $nombre; ?></p>
    <form method="post" action="game.php?name=<?=$nombre;?>">
        <select name="humano">
          <option value="Piedra">Piedra</option>
          <option value="Papel">Papel</option>
          <option value="Tijera">Tijera</option>
          <option value="Text">Text</option>
        </select>

    <a><button type="submit" name="button" >Jugar</button></a>
    <a href="index.php"><button type="button" name="button">Salir</button></a>
  </form>
    <p>
    <textarea name="message" rows="10" cols="70"><?=$mensaje; ?>
    </textarea>
    </p>
  </body>
</html>
