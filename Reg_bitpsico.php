<?php 
session_start();
if($_SESSION[access]==true){
$rolini = $_SESSION['rol'];
$Id_alumn= $_GET['Usu_id'];
echo "<!DOCTYPE html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'/> 
<title>Colegio México Roma</title>
<link rel='icon' type='image/png' href='img/favicon.ico' />
<script language='JavaScript'>
     function conMayusculas(field) {
     field.value = field.value.toUpperCase() }
</script> 
</head>
<body>
<font face='Arial, Helvetica, sans-serif'>
<div align='center'>
<center><img title='' alt=''width='969' height='95' src='img/Cabezera.png' /></center>
</div>
<div align='center'>";

include "conexion1.php";
$result=mysql_query("SELECT * FROM REGUSU WHERE Usu_clave='$Id_alumn'",$conexion);
      while($row=mysql_fetch_row($result)){
                 $nombre=$row[2].' '. $row[3].' '. $row[4];
                 $nombre=utf8_encode("$nombre");
                 $nivel=$row[37];
                 $periodo=$row[35];
                 $salon=$row[38];+
                 $nompadre=$row[20];
                 $nommadre=$row[27];
                 $telpad=$row[25];
                 $telmad=$row[32];
                 $corrpad=$row[26];
                 $coormad=$row[33];
                 $telcasa=$row[16];
                 $foto=$row[41];
                 $curp=$row[7];
                 
      } 
$result=mysql_query("SELECT * FROM REGINSC WHERE Reginsc_matri='$Id_alumn' and Reginsc_periodo='$periodo'",$conexion);
      while($row=mysql_fetch_row($result)){
       $grupo=$row[6];
      }         
$result=mysql_query("SELECT * FROM CATGRU WHERE gru_catgru='$grupo' and per_catgru='$periodo'",$conexion);
      while($row=mysql_fetch_row($result)){
       $corrtutor=$row[7];
      }         
            
     

echo "
<h2> Registro de Bienestar</h2>
<form method='post' name='form1' action='Gua_regenfe.php'>
<input name='matricula' type='hidden' value='$Id_alumn'>
<input name='tutor' type='hidden' value='$corrtutor'>
<input name='alumno' type='hidden' value='$nombre'>
<input name='grupo' type='hidden' value='$grupo'>
<table border='1' width='969' bgcolor='#ffffff' height='298'>
<tbody>
<tr>
<td width='50'><img src='foto/$foto' width='135' height='160'></td>
<td width='910'><FONT COLOR='#000000'>
<p>&nbsp;&nbsp;&nbsp;&nbspMatricula:<input style='width:70px; height: 20px' size='1' type='text' name='Clamat' value='$Id_alumn' readonly='readonly' />&nbsp;&nbsp<input style='width: 350px; height: 20px' size='1' type='text' name='Nombre' readonly='readonly' value='$nombre' />&nbsp;&nbsp;&nbsp;&nbsp
<p>&nbsp;&nbsp;&nbsp;&nbspPeriodo: <input style='width: 80px; height: 22px' size='1' type='text' name='periodo'  value='$periodo' readonly='readonly'>
&nbsp;&nbsp;&nbsp;&nbspNivel: <input style='width: 40px; height: 22px' size='1' type='text' name='Nivel' value='$nivel' readonly='readonly'>
&nbsp;&nbsp;&nbsp;&nbspSalón : <input style='width: 40px; height: 22px' size='1' type='text' name='Salon' value='$salon' readonly='readonly'>
&nbsp;&nbsp;&nbsp;&nbspTeléfono de casa: <input style='width: 85px; height: 20px' type='text' name='Salon' value='$telcasa' readonly='readonly' /></p>

<p>&nbsp;&nbsp;&nbsp;&nbspMadre: <input style='width: 290px; height: 20px' type='text' value='$nommadre' name='nommad' /> 
&nbsp;&nbspCelular: <input style='width: 80px; height: 20px' type='text' value='$telmad' name='telmad' />&nbsp;&nbsp;&nbsp;&nbsp$coormad</p>
<p>&nbsp;&nbsp;&nbsp;&nbspPadre: <input style='width: 290px; height: 20px' type='text' value='$nompadre' name='nompadre' />
&nbsp;&nbspCelular: <input style='width: 80px; height: 20px' type='text' value='$telpad' name='telpadre' />&nbsp;&nbsp;&nbsp;&nbsp$corrpad</p>

</td>
</tr>

<tr>
<td colspan='2'>

<br>&nbsp;&nbsp;&nbsp;&nbspMotivo del Servicio:<select name='motivo' required>
  <option value=''>Seleccionar...</option>     
  <option value='CON'>Conducta / convivencia</option> 
  <option value='EMO'>Emocional</option>
  <option value='SIT'>Situación familiar</option>
  <option value='OTR'>Otro (especificar)</option>
</select>
&nbsp;&nbsp;&nbsp;&nbspDocente que reporta: <input style='width: 390px; height: 20px' type='text' name='entramedi' />
<p>&nbsp;&nbsp;&nbsp;&nbspDescripción:</p>
&nbsp;&nbsp;&nbsp;&nbsp<textarea rows='3' cols='120' name='signos' required></textarea>
<p>&nbsp;&nbsp;&nbsp;&nbsp Tratamiento: </p>
&nbsp;&nbsp;&nbsp;&nbsp<textarea rows='3' cols='120' name='trata' required></textarea>

&nbsp;&nbsp;&nbsp;&nbspRequiere atención Médica: <input type='radio' name='asimed' value='N' checked>NO <input type='radio' name='asimed' value='S'>SI<br>
&nbsp;&nbsp;&nbsp;&nbspContinuar en:<select name='continua' required>
  <option value=''></option>     
  <option value='CLS'>Clases</option> 
  <option value='CSA'>Mandar a Casa</option>
  <option value='HSP'>Se canaliza a Hospital</option>
</select>
&nbsp;&nbsp;&nbsp;&nbspSe contato con padres: <input type='radio' name='contapadre' value='N' checked>NO <input type='radio' name='conta' value='S'>SI
&nbsp;&nbsp;&nbsp;&nbspAcceso con alta médica: <input type='radio' name='acceso' value='N' checked>NO <input type='radio' name='acceso' value='S'>SI<br>
<p>&nbsp;&nbsp;&nbsp;&nbspObservaciones: </p>
&nbsp;&nbsp;&nbsp;&nbsp<textarea rows='3' cols ='120' name='observa' required>  </textarea>
<center>&nbsp;&nbsp;&nbsp;&nbspSe envia correo a los pápas: <input type='radio' name='correo' value='N' checked>NO <input type='radio' name='correo' value='S'>SI</center>

<table border='0' width='978' height='30' bgcolor='#003883' align='center'>
<tr><td align='right'><input style='width:220px;height:27px;background-color: #006699;color: #FFFFFF;font-weight: bold;' id='Submit' value='Guardar' align='left' type='submit' name='Submit' /></td>
</tr>
</table>         
</div>";



echo "</td>
</tr>
</tbody>
</div>
</table>
<br>";


if ($rolini == 'OP1'){
echo "<table border='0' width='969' height='30' bgcolor='#003883' align='center'>
<tr><td align='right'>
<form name='menu' action='menu_op1.php' method='post'>
<INPUT value='Men&uacute; principal' type='submit' name=menu></td></tr></table></form>";
}

if ($rolini == 'ADMIN'){
echo "<table border='0' width='969' height='25' bgcolor='#003883' align='center'>
<tr><td align='right'>
<form name='menu' action='menu_adm.php' method='post'>
<INPUT value='Men&uacute; principal' type='submit' name=menu></td>
</tr></table></form>";
}


echo "<table border='0' width='900' bgcolor='#ffffff' align='center' height='30'>
<tbody>
<tr>
<td align='center'><font size='1'>© 2018 &nbsp;Diseño y creacion de Ing. Gilberto Sámano Díaz <a href='https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=gsamanod@gmail.com' target='_blank'>gsamanod@gmail.com</a>. </font></td></tr></tbody></table></font></div>";

}

include "cerrar_conexion.php";
?>


</body>
</html>