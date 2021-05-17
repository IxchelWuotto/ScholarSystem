<?php 
require_once "modelo.php";
class usuariosModelo extends Modelo
{    
    public function __construct()
    {
        parent::__construct();
    }

    public function get_alumno($No_Cuenta)
    {
        $result = $this->_db->query("SELECT * FROM alumno WHERE matricula='{$No_Cuenta}'");
        
        $users = $result->fetch_array(MYSQLI_ASSOC);
        
        return $users;
    }
	

   public function get_grupos($id_periodo)
    {
        $result = $this->_db->query("SELECT * FROM grupo WHERE id_periodo='{$id_periodo}'");
        
        $users = $result->fetch_all(MYSQLI_ASSOC);
        
        return $users;
    }

    public function get_alumnos_grupos($id_grupo)
    {
        $result = $this->_db->query("SELECT alumno.matricula, alumno.nombre, alumno.ap_paterno, alumno.ap_materno
FROM alu_gpo,alumno,grupo,periodo WHERE grupo.id_materia='{$id_grupo}' AND alumno.matricula=alu_gpo.matricula AND grupo.id_periodo=periodo.id_periodo group by alumno.matricula;");
        
        $users = $result->fetch_all(MYSQLI_ASSOC);
        
        return $users;
    }

    public function get_alumnos_grupos_por_periodo($id_materia,$id_periodo)
    {
        $result = $this->_db->query("SELECT alumno.matricula, alumno.nombre, alumno.ap_paterno, alumno.ap_materno
FROM alu_gpo,alumno,grupo,periodo WHERE grupo.id_materia='{$id_materia}' AND grupo.id_periodo='{$id_periodo}' AND alumno.matricula=alu_gpo.matricula AND grupo.id_periodo=periodo.id_periodo group by alumno.matricula;");
        
        $users = $result->fetch_all(MYSQLI_ASSOC);
        
        return $users;
    }

         public function get_tira_de_materias($matricula,$id_periodo)
    {
        $result = $this->_db->query("SELECT periodo.periodo, grupo.nombre_gpo FROM periodo,grupo,alu_gpo WHERE grupo.id_periodo=periodo.id_periodo AND grupo.id_periodo='{$id_periodo}' AND alu_gpo.matricula='{$matricula}' AND alu_gpo.id_gpo=grupo.id_gpo");
        $users = $result->fetch_all(MYSQLI_ASSOC);
        return $users;
    }


//ESTE SI ES EL QUE BUSCA POR PERIODO
    public function get_alumnos_grupos_por_periodo_actualizado($id_grupo,$id_periodo)
    {
        $result = $this->_db->query("SELECT alumno.matricula, alumno.nombre, alumno.ap_paterno, alumno.ap_materno
FROM alu_gpo,alumno,grupo,periodo WHERE alu_gpo.id_gpo='{$id_grupo}' AND grupo.id_periodo='{$id_periodo}' AND alumno.matricula=alu_gpo.matricula AND grupo.id_periodo=periodo.id_periodo group by alumno.matricula;");
        
        $users = $result->fetch_all(MYSQLI_ASSOC);
        
        return $users;
    }

    public function get_grupos_profesor($id_profesor)
    {
        $result = $this->_db->query("SELECT * FROM grupo WHERE id_profesor='{$id_profesor}'");
        
        $users = $result->fetch_all(MYSQLI_ASSOC);
        
        return $users;
    }


    public function get_grupos_profesor_por_periodo($id_profesor,$id_periodo)
    {
        $result = $this->_db->query("SELECT * FROM grupo WHERE id_profesor='{$id_profesor}' AND id_periodo='{$id_periodo}' GROUP BY id_gpo ");
        
        $users = $result->fetch_all(MYSQLI_ASSOC);
        
        return $users;
    }

    public function get_grupos_profesor_por_periodo_por_materia($id_profesor,$id_periodo,$id_materia)
    {
    if( ($id_profesor == "A000") || ($id_periodo=="6") || ($id_materia="L00000") ){//quiere todos
        if ($id_profesor == "A000"){//quiere todos los profes
            $result = $this->_db->query("SELECT * FROM grupo WHERE id_materia='{$id_materia}' AND id_periodo='{$id_periodo}' GROUP BY id_gpo ");
           }else{
                if ($id_periodo=="6"){//quiere todos los periodos
                $result = $this->_db->query("SELECT * FROM grupo WHERE id_materia='{$id_materia}' AND id_profesor='{$id_profesor}' GROUP BY id_gpo ");          
                }else{
                    if ($id_materia="L00000") {//quiere todas las materias
                        $result = $this->_db->query("SELECT * FROM grupo WHERE id_profesor='{$id_profesor}' AND id_periodo='{$id_periodo}' GROUP BY id_gpo ");
                    }
                     }
            }
    
        }else{//sintaxis normal , no escogio TODOS en algun campo
        $result = $this->_db->query("SELECT * FROM grupo WHERE id_materia='{$id_materia}' AND id_profesor='{$id_profesor}' AND id_periodo='{$id_periodo}' GROUP BY id_gpo ");
        }
        
        $users = $result->fetch_all(MYSQLI_ASSOC);
        
        return $users;
    }



    public function get_idgpo_por_periodo_y_materia($id_periodo,$id_materia)
    {
        $result = $this->_db->query("SELECT * FROM grupo WHERE id_periodo='{$id_periodo}' AND id_materia='{$id_materia}' ");
        
        $users = $result->fetch_array(MYSQLI_ASSOC);
        
        return $users;
    }


   public function get_materia($id_materia)
    {
        $result = $this->_db->query("SELECT * FROM materia WHERE id_materia='{$id_materia}'");
        
        $users = $result->fetch_array(MYSQLI_ASSOC);
        
        return $users;
    }


     public function get_profesor($id_profe)
    {
        $result = $this->_db->query("SELECT * FROM profesor WHERE id_profe='{$id_profe}'");
        $users = $result->fetch_array(MYSQLI_ASSOC);
        return $users;
    }

     public function get_horario($id_gpo)
    {
        $result = $this->_db->query("SELECT * FROM horario WHERE id_gpo='{$id_gpo}'");
        $users = $result->fetch_all(MYSQLI_ASSOC);
        return $users;
    }

         public function get_periodo($id_periodo)
    {
        $result = $this->_db->query("SELECT periodo FROM periodo WHERE id_periodo='{$id_periodo}'");
        $users = $result->fetch_array(MYSQLI_ASSOC);
        return $users;
    }

           public function get_total_asistencias_de_un_grupo($id_grupo)
    {
        $result = $this->_db->query("SELECT count(*) AS total_asistencia_grupo from pase_de_lista WHERE id_gpo='{$id_grupo}'");
        $users = $result->fetch_array(MYSQLI_ASSOC);
        return $users;
    }

          public function get_total_asistencias_de_un_alumno_en_un_grupo($id_grupo,$matricula)
    {

        $result = $this->_db->query("SELECT count(*) AS total_asistencia_alumno from asistencia_alumno WHERE id_gpo='{$id_grupo}' AND matricula='{$matricula}' AND asistencia=1 ");
        $users = $result->fetch_array(MYSQLI_ASSOC);
        return $users;
    }

       public function get_porcentaje_de_asistencia_alumno($totalalumno,$totalgrupo)
    {
        if ($totalgrupo!= 0){
        $resultado = ($totalalumno*100)/$totalgrupo;
        }else{ $totalgrupo=1;}
        return $resultado;
    }

        public function get_calificacion($matricula,$id_gpo)
    {

        $result = $this->_db->query("SELECT calificacion from calificaciones WHERE matricula='{$matricula}'  AND  id_gpo='{$id_gpo}' ");
        $users = $result->fetch_array(MYSQLI_ASSOC);
        return $users;
    }

        public function get_calificaciones_periodo_alumno($id_periodo)
    {

        $result = $this->_db->query("SELECT alumno.matricula, alumno.nombre, alumno.ap_paterno, alumno.ap_materno,  AVG(calificacion) as promedio FROM alumno,calificaciones WHERE calificacion!='N/P' AND alumno.matricula=calificaciones.matricula AND calificaciones.id_periodo='{$id_periodo}' GROUP BY alumno.matricula ");
        $users = $result->fetch_all(MYSQLI_ASSOC);
        return $users;
    }

        public function get_promedio_calificaciones_por_alumno_y_periodo($matricula,$id_periodo)
    {

        $result = $this->_db->query("SELECT periodo.periodo, AVG(calificacion) as promedio FROM alumno,calificaciones,periodo WHERE calificacion!='N/P' AND alumno.matricula=calificaciones.matricula AND calificaciones.id_periodo='{$id_periodo}' AND calificaciones.matricula='{$matricula}' AND calificaciones.id_periodo=periodo.id_periodo ");
        $users = $result->fetch_all(MYSQLI_ASSOC);
        return $users;
    }

            public function get_promedio_calificacion_por_alumno($matricula)
    {

        $result = $this->_db->query("SELECT periodo.periodo, AVG(calificacion) as promedio FROM alumno,calificaciones,periodo WHERE calificacion!='N/P' AND alumno.matricula=calificaciones.matricula AND calificaciones.matricula='{$matricula}' AND calificaciones.id_periodo=periodo.id_periodo GROUP BY periodo.id_periodo ");
        $users = $result->fetch_all(MYSQLI_ASSOC);
        return $users;
    }


       public function get_calificaciones_periodo_profesor($id_periodo)
    {

        $result = $this->_db->query("SELECT profesor.id_profe, profesor.nombre, profesor.apellido_pat, profesor.apellido_mat, AVG(calificacion) as promedio FROM profesor,calificaciones,grupo WHERE calificaciones.id_gpo=grupo.id_gpo AND grupo.id_profesor=profesor.id_profe AND calificaciones.id_periodo='{$id_periodo}' AND calificacion!='N/P' GROUP BY grupo.id_gpo");
        $users = $result->fetch_all(MYSQLI_ASSOC);
        return $users;
    }

        public function get_historico_calificaciones_profesor($id_profesor)
    {
        $result = $this->_db->query("SELECT grupo.nombre_gpo, periodo.periodo, AVG(calificacion) as calificacion FROM grupo,periodo,calificaciones WHERE grupo.id_periodo=periodo.id_periodo AND grupo.id_profesor='{$id_profesor}' AND periodo.id_periodo=calificaciones.id_periodo AND calificaciones.id_periodo=periodo.id_periodo AND calificacion!='N/P' GROUP BY grupo.id_gpo ");
        $users = $result->fetch_all(MYSQLI_ASSOC);
        return $users;
    }


        public function get_reporte_kardex($matricula)
    {
        $result = $this->_db->query("SELECT periodo.periodo, materia.nom_mat, calificaciones.calificacion FROM periodo,materia,calificaciones WHERE calificaciones.matricula='{$matricula}' AND periodo.id_periodo=calificaciones.id_periodo AND materia.id_materia=calificaciones.id_materia; ");
        $users = $result->fetch_all(MYSQLI_ASSOC);
        return $users;
    }

	    public function crear_grupo($id_materia ,$id_profesor,$id_periodo,$nombre_gpo)
    {
		//INSERTA LOS DATOS DEL ALUMNO EN LA TABLA ALUMNO
		$result = $this->_db->query("INSERT INTO grupo (id_materia , id_profesor , id_periodo, nombre_gpo ) VALUES ('{$id_materia}','{$id_profesor}','{$id_periodo}','{$nombre_gpo}')"); //funciona
		$result= $this->_db->query("SELECT @@identity AS id_gpo");
		$id= $result->fetch_row();
 		$msj=trim($id[0]);
 		return $msj; //AQUI ME REGRESA EL ULTIMO ID INGRESADO
    }
    	 
	 public function registrar_horario($id_gpo,$id_salon,$dia,$horainicio1,$horafin1)
    {
		//INSERTA LOS DATOS DEL ALUMNO EN LA TABLA ALUMNO
		$result = $this->_db->query("INSERT INTO horario (id_gpo,id_salon,dia,hra_ini,hra_fin) VALUES ('{$id_gpo}','{$id_salon}','{$dia}','{$horainicio1}','{$horafin1}')"); //funciona
		$msj=  "<br/><p><b><strong><center>GRUPO REGISTRADO EN GRUPO CORRECTAMENTE</center></strong></b></p>";
        return $msj;
    }

	  public function alta_profesor($id_profe,$grado,$Nombre,$Apellido_Pat,$Apellido_Mat,$Password)
    {
		//INSERTA LOS DATOS DEL ALUMNO EN LA TABLA ALUMNO
		$result = $this->_db->query("INSERT INTO profesor (id_profe,grado,nombre,apellido_pat,apellido_mat,password ) VALUES ('{$id_profe}','{$grado}','{$Nombre}','{$Apellido_Pat}','{$Apellido_Mat}','{$Password}')"); //funciona
		$msj=  "<br/><p><b><strong><center>PROFESOR REGISTRADO CORRECTAMENTE</center></strong></b></p>";
        return $msj;
    }

	  public function alta_salon($id_salon,$ubicacion_salon)
    {
		//INSERTA LOS DATOS DEL ALUMNO EN LA TABLA ALUMNO
		$result = $this->_db->query("INSERT INTO salon (id_salon,ubicacion_salon) VALUES ('{$id_salon}','{$ubicacion_salon}')"); //funciona
		$msj=  "<br/><p><b><strong><center>SALON REGISTRADO CORRECTAMENTE</center></strong></b></p>";
        return $msj;
    }

    public function alta_materia($id_materia,$nom_mat)
    {
		//INSERTA LOS DATOS DEL ALUMNO EN LA TABLA ALUMNO
		$result = $this->_db->query("INSERT INTO materia (id_materia,nom_mat) VALUES ('{$id_materia}','{$nom_mat}')"); //funciona
		$msj=  "<br/><p><b><strong><center>MATERIA REGISTRADA CORRECTAMENTE</center></strong></b></p>";
        return $msj;
    }

      public function alta_periodo($periodo)
    {
		//INSERTA LOS DATOS DEL ALUMNO EN LA TABLA ALUMNO
		$result = $this->_db->query("INSERT INTO periodo (periodo) VALUES ('{$periodo}')"); //funciona
		$msj=  "<br/><p><b><strong><center>PERIODO REGISTRADO CORRECTAMENTE</center></strong></b></p>";
        return $msj;
    }

	  public function alta_alumno($matricula,$Nombre,$Apellido_Pat,$Apellido_Mat,$Password)
    {
		//INSERTA LOS DATOS DEL ALUMNO EN LA TABLA ALUMNO
		$result = $this->_db->query("INSERT INTO alumno (matricula,nombre,ap_paterno,ap_materno,password ) VALUES ('{$matricula}','{$Nombre}','{$Apellido_Pat}','{$Apellido_Mat}','{$Password}')"); //funciona
		$msj=  "<br/><p><b><strong><center>ALUMNO REGISTRADO CORRECTAMENTE</center></strong></b></p>";
        return $msj;
    }

     public function alta_asistencia_alumno($id_grupo,$matricula,$asistencia,$fecha)
    {
        //INSERTA LOS DATOS DEL ALUMNO EN LA TABLA ALUMNO
        $result = $this->_db->query("INSERT INTO asistencia_alumno (id_gpo,matricula,asistencia,fecha ) VALUES ('{$id_grupo}','{$matricula}','{$asistencia}','{$fecha}')"); //funciona
        $msj=  "<br/><p><b><strong><center>ASISTENCIA REGISTRADA CORRECTAMENTE</center></strong></b></p>";
        return $msj;
    }

      public function alta_pase_de_lista($id_grupo,$fecha)
    {
        //INSERTA LOS DATOS DEL ALUMNO EN LA TABLA ALUMNO
        $result = $this->_db->query("INSERT INTO pase_de_lista (id_gpo,fecha ) VALUES ('{$id_grupo}','{$fecha}')"); //funciona
        $msj=  "<br/><p><b><strong><center>ASISTENCIA REGISTRADA CORRECTAMENTE</center></strong></b></p>";
        return $msj;
    }


    public function alta_calificaciones($id_materia,$id_periodo,$matricula,$calificacion,$id_gpo)
    {

        //INSERTA LOS DATOS DEL ALUMNO EN LA TABLA ALUMNO
        $result = $this->_db->query("INSERT INTO calificaciones (id_materia,id_periodo,matricula,calificacion,id_gpo) VALUES ('{$id_materia}','{$id_periodo}','{$matricula}','{$calificacion}','{$id_gpo}')"); //funciona
        $msj=  "<br/><p><b><strong><center>CALIFICACION REGISTRADA CORRECTAMENTE</center></strong></b></p>";
        return $msj;
    }

   public function actualizar_calificaciones($matricula,$calificacion,$id_gpo)
    {

        //INSERTA LOS DATOS DEL ALUMNO EN LA TABLA ALUMNO
        $result = $this->_db->query("UPDATE calificaciones SET calificacion='{$calificacion}' WHERE matricula='{$matricula}' AND  id_gpo='{$id_gpo}' "); //funciona
        $msj=  "<br/><p><b><strong><center>CALIFICACION ACTUALIZADA CORRECTAMENTE</center></strong></b></p>";
        return $msj;
    }




     public function verificar_no_inscrito($matricula)
    {
		$result = $this->_db->query("SELECT id_gpo FROM alu_gpo WHERE matricula='{$matricula}'");
        $users = $result->fetch_all(MYSQLI_ASSOC);
        return $users;
    }

         public function verificar_aun_no_se_pase_lista($id_gpo,$fecha)
    {
        $result = $this->_db->query("SELECT id_pase_lista FROM pase_de_lista WHERE id_gpo='{$id_gpo}' AND fecha='{$fecha}'");
        $users = $result->fetch_array(MYSQLI_ASSOC);
        return $users;
    }

    	  public function inscribir_grupo($matricula,$id_gpo)
    {
		//INSERTA LOS DATOS DEL ALUMNO EN LA TABLA ALUMNO
		$result = $this->_db->query("INSERT INTO alu_gpo (matricula,id_gpo ) VALUES ('{$matricula}','{$id_gpo}')"); //funciona
		$msj=  "<br/><p><b><strong><center>ALUMNO INSCRITO AL GRUPO CORRECTAMENTE</center></strong></b></p>";
        return $msj;
    }

	
	
}
  ?> 