<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>FLOR</title>
 <link rel="shortcut icon" href="" />
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="css/style.css"  >
<img src="imagen/FLOR.jpg" title="FLOR CHOCCELAHUA HUACHO" height="100" 
style="width:100Px; margin-top: 5px;top:20Px;left:10px;background-image; 
position:absolute;Border-radius:1500px;box-shadow:0 0 100px 40px pink" >
<style>
body {
        background-image: url("FLOR.jpg");
} 
 </style>
</head>
<style type="text/css">
</style></head>
<body>
        <header>
           <center><br><br> 
		   <TABLE BORDER=5>
            	<TR><TD>
					<h2><font color="BLACK"><b> ADMINISTRACIÓN DE ALQUILER DE HABITACIÓN</b></font></h2>
				</TD></TR>
        	</TABLE>
		<fieldset style="width:810px; margin-top: 5px;top:2px; ALIGN="justify"">
	<body>
<FIELDSET>
<LEGEND><font color="PINK"><b>*******************************************************************</font></LEGEND>
		<div class="row">
			<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
					<b><font color="BLACK">Buscar Cliente: </font></b><input type="text" name="filter" value=""  id="filter" size="60"  placeholder="Buscar Cliente..." autocomplete="off" />
					<input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-info "/>
					<a data-toggle="modal" class="btn btn-primary" data-target="#nuevo_nota">Nuevo</a><br><br>
					</form>
			</div>
</FIELDSET>
</form>
</body>
<fieldset>
 <table border='3' cellpadding='0' cellspacing='10' width='900' bgcolor='ORANGE' style="color:BLUE">
 <tr>
 <td width='25' style="font-weight: bold; "><h4><font color="BLACK"><b><center>N°</center></td>
 <td width='160' style="font-weight: bold"><font color="BLACK"><b><center>CLIENTE</center></td>
 <td width='30' style="font-weight: bold"><font color="BLACK"><b><center>DIAS</center></td>
  <td width='30' style="font-weight: bold"><font color="BLACK"><b><center>T.HABITACIÓN</center></td>
  <td width='90' style="font-weight: bold"><font color="BLACK"><b><center>COSTO X DIA</center></td>
  <td width='75' style="font-weight: bold"><font color="BLACK"><b><center>IMPORTE</center></td>
 <td width='170' style="font-weight: bold"><font color="BLACK"><b><center>ACCIONES</center></td>
</tr>
<?php
			$mysqli = new mysqli("localhost","root","","Sis_hostal");		
			if ($mysqli->connect_errno) {
			    echo "Fallo al conectar a MySQL: (".$mysqli->connect_errno.") " . $mysqli->connect_error;
			    exit();
			}
			$consulta= "SELECT * FROM Hostal";
			if ($resultado = $mysqli->query($consulta)) 
			{
				while ($fila = $resultado->fetch_row()) 
				{				
					echo "<tr>";
					echo "<td><center>$fila[0]</td><td><center>$fila[1]</center></td><td><center>$fila[2]</center></td><td><center>$fila[3]</center></td><td><center>$fila[4]</center></td>
					<td><center>$fila[5]</center></td>";	
					echo"<td>";						
				    echo "<br><center><a data-toggle='modal' data-target='#editnota' data-id='".$fila[0] ."'data-cliente='" .$fila[1] ."'
				    data-dias='" .$fila[2] ."'data-t_habitacion='".$fila[3] ."'data-costo='".$fila[4] ."'data-importe='".$fila[5] ."'class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Modificar</a>&nbsp";			
					echo "<a class='btn btn-danger' href='elimina.php?id=" .$fila[0] ."'><span class='glyphicon glyphicon-remove'></span>Eliminar</a><br><br>";		
					echo "</td>";
					echo "</tr>";
									}
				$resultado->close();
			}
		$mysqli->close();			
?>
	        </table>
		</div> 
		<div class="modal" id="nuevo_nota" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <CENTER><h4>NUEVO REGISTRO DE ALQUILER</h4> </CENTER>                      
                    </div>
                    <div class="modal-body">
                       <form action="insertar.php" method="GET">   
						
						CLIENTE : <input type="text" name="cliente" Placeholder="INGRESE APELLIDOS Y NOMBRES" Size="30" Class="Form-Input" Required/>   &nbsp  &nbsp  &nbsp  &nbsp  &nbsp<br> 
						DIAS : <input type="text" name="dias" Placeholder="INGRESE CANTIDAD DE DIAS.." Size="25" Class="Form-Input" Required/>   &nbsp &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp &nbsp<br>
						T.HABITACION :  <input type="text" name="t_habitacion" Placeholder="INGRESE T.HABITACION.." Size="25" Class="Form-Input" Required/> &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp &nbsp<br>
						COSTO X DIA :  <input type="text" name="costo" Placeholder="INGRESE EL COSTO POR DIA.." Size="25" Class="Form-Input" Required/> &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp &nbsp<br>
						
						<center><input type="submit" class="btn btn-success" value="REGISTRAR"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
							 <button type="button" class="btn btn-warning" data-dismiss="modal">CANCELAR</button>
							 </center>
                       </form>
                    </div>
                </div>
            </div>
        </div> 
        <div class="modal" id="editnota" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>MODIFICAR EL REGISTRO</h4>
                    </div>
                    <div class="modal-body">   

                       <form action="actualiza.php" method="POST">  

                        <input id="id" name="id" type="hidden" ></input> 
                        CLIENTE:<input id="cliente"  name="cliente"  type="text" Size="40" Class="Form-Input" Required/> &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp<br> 
						DIAS:  <input        id="dias"  name="dias" type="text" Size="20" Class="Form-Input" Required/>  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp &nbsp<br>
						T.HABITACION :  <input            id="t_habitacion"  name="t_habitacion"  type="text"  Size="20" Class="Form-Input" Required/> &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp &nbsp<br>
						COSTO POR DIA :  <input            id="costo"  name="costo"  type="text"  Size="20" Class="Form-Input" Required/> &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp &nbsp<br>
							                    

                      	<center>
                      	<input type="submit" class="btn btn-success" value="REGISTRAR"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
						<button type="button" class="btn btn-warning" data-dismiss="modal">CANCELAR</button>
						</center>

                      </form>

                    </div>
                </div>
            </div>
        </div> 



	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>	
	<script>			 
		  $('#editnota').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) 
		  var recipient0 = button.data('id')
		  var recipient1 = button.data('cliente')
		  var recipient2 = button.data('dias')
		  var recipient3 = button.data('t_habitacion')
		  var recipient4 = button.data('costo')
		  var recipient5 = button.data('importe')
		  var modal = $(this)		 
		  modal.find('.modal-body #id').val(recipient0)
		  modal.find('.modal-body #cliente').val(recipient1)
		  modal.find('.modal-body #dias').val(recipient2)
		  modal.find('.modal-body #t_habitacion').val(recipient3)
		  modal.find('.modal-body #costo').val(recipient4)
		  modal.find('.modal-body #importe').val(recipient5)		 
		});
		
	</script>


 </fieldset>

	<DIV style="margin-top: 45px;top:85Px;left:2px; position:absolute;" > 
	<p align="left"><font SIZE=3 COLOR=BLACK face="Bodoni MT" > &nbsp &nbsp FLOR HUACHO </font></p>
	
	</DIV>
<center>
	<DIV style="margin-top: 15px;top:15Px;left:1410px; position:absolute;Border-radius:1500px;box-shadow:0 0 100px 50px white" > 
	<FONT SIZE=3 COLOR=yellow face="Bodoni MT">
	<b>
	<script type="text/javascript"> function startTime(){ today=new Date(); h=today.getHours(); m=today.getMinutes(); s=today.getSeconds(); m=checkTime(m); s=checkTime(s); document.getElementById('reloj').innerHTML=h+":"+m+":"+s; t=setTimeout('startTime()',500);} function checkTime(i) {if (i<10) {i="0" + i;}return i;} window.onload=function(){startTime();} </script> <div id="reloj"></div>
	</b>
	</center>
	</DIV>


</fieldset>
</center>
</html>




