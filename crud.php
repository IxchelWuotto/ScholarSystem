<?php
require_once "usuariosModelo.php";
 $usuarioModel = new usuariosModelo();
if ($_POST['operacion']==1){//LA OPCION DE  CREAR GRUPOS
    $id_gpo = $usuarioModel->crear_grupo($_POST['id_materia'],$_POST['id_profesor'],$_POST['id_periodo'],$_POST['nombre_gpo']);
	$reg_horario = $usuarioModel->registrar_horario($id_gpo,$_POST['id_salon'],$_POST['dia1'],$_POST['horainicio1'],$_POST['horafin1']);
	//si existe un dia 2 o 3
	if (isset($_POST["dia2"])){ $usuarioModel->registrar_horario($id_gpo,$_POST['id_salon'],$_POST['dia2'],$_POST['horainicio2'],$_POST['horafin2']);}
	if (isset($_POST["dia3"])){$usuarioModel->registrar_horario($id_gpo,$_POST['id_salon'],$_POST['dia3'],$_POST['horainicio3'],$_POST['horafin3']);}
	echo $reg_horario;
	echo "<center><a href='?p=crear_grupos' class='btn btn-success btn-lg active' role='button'>Registrar otro Grupo</a></center>";
}else{
	if ($_POST['operacion']==2){//LA OPCION DE DAR DE ALTA PROFESORES
   		$a_users = $usuarioModel->alta_profesor($_POST['id_profe'],$_POST['grado'],$_POST['nombre'],$_POST['apellido_pat'],$_POST['apellido_mat'],$_POST['contraseña']);
		echo $a_users;
		echo "<center><a href='?p=alta_profesores' class='btn btn-success btn-lg active' role='button'>Registrar otro Profesor</a></center>";
	}else{//fin del if op =2
			if ($_POST['operacion']==3){//LA OPCION DE DAR DE ALTA SALONES
				$a_users = $usuarioModel->alta_salon($_POST['id_salon'],$_POST['nombre']);
				echo $a_users;
				echo "<center><a href='?p=alta_salones' class='btn btn-success btn-lg active' role='button'>Registrar otro Salon</a></center>";
			}else{//fin del if op =3
				if ($_POST['operacion']==4){//LA OPCION DE DAR DE ALTA MATERIAS
					$a_users = $usuarioModel->alta_materia($_POST['id_materia'],$_POST['nombre']);
					echo $a_users;
					echo "<center><a href='?p=alta_materias' class='btn btn-success btn-lg active' role='button'>Registrar otra Materia</a></center>";
				}else{//fin del if op =4
					if ($_POST['operacion']==5){//LA OPCION DE DAR DE ALTA PERIODOS
					$a_users = $usuarioModel->alta_periodo($_POST['periodo']);
					echo $a_users;
					echo "<center><a href='?p=alta_periodos' class='btn btn-success btn-lg active' role='button'>Registrar otro Periodo</a></center>";
					}else{
						if ($_POST['operacion']==6){//LA OPCION DE DAR DE ALTA ALUMNOS
   						$a_users = $usuarioModel->alta_alumno($_POST['matricula'],$_POST['nombre'],$_POST['apellido_pat'],$_POST['apellido_mat'],$_POST['contraseña']);
						echo $a_users;
						echo "<center><a href='?p=alta_alumnos' class='btn btn-success btn-lg active' role='button'>Registrar otro Alumno</a></center>";
						}else{
							if ($_GET['operacion']==7){//INSCRIBIR ALUMNO A ALGUN GRUPO
								$a_users = $usuarioModel->verificar_no_inscrito($_SESSION['cuenta']);
								$x=0;
								foreach ($a_users as $row){
									if (($row["id_gpo"])==($_GET['id_gpo'])){ $x=1;}
								}
								if ($x==0){
								$a_users = $usuarioModel->inscribir_grupo($_SESSION['cuenta'],$_GET['id_gpo']);
								echo $a_users;
								}else{echo "<br/><p><b><strong><center>USTED YA SE ENCUENTRA REGISTRADO A ESTE GRUPO, NO PUEDE VOLVER A INSCRIBIRSE.</center></strong></b></p>";}
								echo "<center><a href='?p=inscribir_alumno_grupos' class='btn btn-success btn-lg active' role='button'>Inscribir otra Materia</a></center>";


							}else{
								if ($_GET['operacion']==8){ //ALTA DE ASISTENCIAS de ALUMNOS
									//echo $_POST['fecha_de_asistencia'];
									//echo "bla".$_POST['id_grupo'];
									//ASISTIO Y NUMERO DE CUENTA
									//verificar que aun no se haya pasado lista
									$id_pase_de_lista = $usuarioModel->verificar_aun_no_se_pase_lista($_POST['id_grupo'],$_POST['fecha_de_asistencia']);
										

									if (($id_pase_de_lista['id_pase_lista'])==NULL){
										$paselista= $usuarioModel-> alta_pase_de_lista($_POST['id_grupo'],$_POST['fecha_de_asistencia']);
										$alumnos_grupos = $usuarioModel-> get_alumnos_grupos_por_periodo_actualizado($_POST['id_grupo'],$_POST['id_periodo']);
										foreach ($alumnos_grupos as $row){
											//echo $row["matricula"];
											//echo $_POST[$row["matricula"]];
											$a_users=$usuarioModel-> alta_asistencia_alumno($_POST['id_grupo'], $row["matricula"],$_POST[$row["matricula"]],$_POST['fecha_de_asistencia']);
										}echo $a_users;

									}else{echo "<br/><p><b><strong><center>USTED YA PASO LISTA PARA ESTA FECHA Y ESTE GRUPO,POR REGLAMENTO NO PUEDE VOLVER A PASAR LISTA</center></strong></b></p>";}	
										echo "<center><a href='?p=asistencia_por_grupo' class='btn btn-success btn-lg active' role='button'>Registrar asistencia a otro grupo </a></center>";
								}else{
									if ($_POST['operacion']==9){ //ALTA DE CALIFICACIONES ORDINARIAS
										
										if ($_POST['calificacion_registrada']==NULL){
											$a_users = $usuarioModel->alta_calificaciones($_POST['id_materia'],$_POST['id_periodo'],$_POST['matricula'],$_POST['calificacion'],$_POST['id_gpo']);
											echo $a_users;
											
										}else{
											
												$a_users = $usuarioModel->actualizar_calificaciones($_POST['matricula'],$_POST['calificacion'],$_POST['id_gpo']);
												echo $a_users;

											}echo "<center><a href='?p=registro_cal' class='btn btn-success btn-lg active' role='button'>Registrar otra calificacion ordinaria </a></center>";
											
									}else{
											if ($_POST['operacion']==10){ //ALTA DE CALIFICACIONES EXTRA ORDINARIOS
													if ($_POST['calificacion_registrada']==NULL){
														$a_users = $usuarioModel->alta_calificaciones($_POST['id_materia'],$_POST['id_periodo'],$_POST['matricula'],"ext",$_POST['calificacion'],$_POST['id_gpo']);
														echo $a_users;
											
													}else{
															$a_users = $usuarioModel->actualizar_calificaciones($_POST['matricula'],"ext",$_POST['calificacion'],$_POST['id_gpo']);
															echo $a_users;

														}echo "<center><a href='?p=registro_cal_extraordinarias' class='btn btn-success btn-lg active' role='button'>Registrar otra calificacion extraordinaria </a></center>";
											

												}else{
														if ($_POST['operacion']==11){ //ALTA DE CALIFICACIONES TITULO
															if ($_POST['calificacion_registrada']==NULL){
															$a_users = $usuarioModel->alta_calificaciones($_POST['id_materia'],$_POST['id_periodo'],$_POST['matricula'],"tit",$_POST['calificacion'],$_POST['id_gpo']);
															echo $a_users;
											
														}else{
															$a_users = $usuarioModel->actualizar_calificaciones($_POST['matricula'],"tit",$_POST['calificacion'],$_POST['id_gpo']);
															echo $a_users;

														}echo "<center><a href='?p=registro_cal_titulo' class='btn btn-success btn-lg active' role='button'>Registrar otra calificacion de titulo a suficiencia </a></center>";

														}
												}
									}
								}
							}

						}
					}
				}
				
			}//fin del else de la llave de op =3

		}//fin del else de la llave de op =2

	}//fin del else de la primer llave de op =1

?>