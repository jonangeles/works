<?php
        require_once ("otros/nombre.php");
        require_once ("otros/usuario.php");
        require_once ("otros/id.php");
        require_once ("otros/correo.php");
        require_once ("otros/contraseña.php");
        require_once ("otros/guerrero.php");
        require_once ("otros/clerigo.php");
        require_once ("otros/mago.php");
        require_once ("otros/ficha.php");
        require_once ("otros/experiencia.php");
        require_once ("otros/dotes.php");
        require_once ("otros/armas.php");
        require_once ("otros/protecciones.php");
        require_once ("otros/pertenencias.php");
        require_once ("otros/habilidades.php");
        require_once ("otros/idiomas.php");
        require_once ("otros/conjuros.php");
        require_once ("otros/armado.php");
        require_once ("otros/protegido.php");
        require_once ("otros/posee.php");
        require_once ("otros/dotado.php");
        require_once ("otros/posee_idioma.php");
        require_once ("otros/habilitado.php");
class Base
{
    public static function ejecutarConsulta()
    {
        $conexion = new PDO("mysql:host=localhost; dbname=rol_interactivo", "root", "");
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion->exec("SET CHARACTER SET utf8");

        return $conexion;
    }

        //con esta funcion insertamos un usuario nuevo
        public static function Insertar($usuario, $email, $password){
            $sql="select correo from usuarios where correo='".$email."'";
            $conexion = self::ejecutarConsulta();
            $resultado = $conexion->prepare($sql);
            $resultado->execute(array());
            $arra_Email = array();
            while ($fila = $resultado->fetch()) {
                $arra_Email[] = new correo($fila);
            }
    
            $resultado->closeCursor();

            $sql="select usuario from usuarios where usuario='".$usuario."'";
            $conexion = self::ejecutarConsulta();
            $resultado = $conexion->prepare($sql);
            $resultado->execute(array());
            $arra_Usuario = array();
            while ($fila = $resultado->fetch()) {
                $arra_Usuario[] = new nombre($fila);
            }
            
            $resultado->closeCursor();

           if (count($arra_Email)==0 && count($arra_Usuario)==0) {
            $sql="insert into  usuarios values (null,:usuario,'usuario',:email,:password,'0');";
             $conexion=self::ejecutarConsulta();
             $resultado=$conexion->prepare($sql);
             $resultado->execute(array(":usuario"=>$usuario,":email"=>$email,":password"=>$password));
             $resultado->closeCursor();
             echo("el usuario ha sido creado con exito si desea <a href='inicio_sesion.php'>iniciar sesion</a> vaya a iniciar sesion.");
           }else{
               echo("El usuario que está intentando crear ha sido creado con anterioridad, por favor cree <a href='registro.php'>otro distinto</a>.");
           }
        }
        public static function iniciar_sesion($usuario,$password){
            $sql="select * from usuarios where usuario=:usu and contraseña=:contra";
            $conexion = self::ejecutarConsulta();
            $resultado = $conexion->prepare($sql);
            $resultado->execute(array(":usu"=>$usuario,"contra"=>$password));
            $arra_Proveedores = array();
            while ($fila = $resultado->fetch()) {
                $arra_Proveedores[] = new id($fila);
            }
    
            $resultado->closeCursor();
                return ($arra_Proveedores);
            
        }
        public static function email($email){
            $sql="select correo from usuarios where correo='".$email."'";
            $conexion = self::ejecutarConsulta();
            $resultado = $conexion->prepare($sql);
            $resultado->execute(array());
            $arra_Proveedores = array();
            while ($fila = $resultado->fetch()) {
                $arra_Proveedores[] = new correo($fila);
            }
    
            $resultado->closeCursor();
            return ($arra_Proveedores);
        }
        public static function cambiarDatos($usuario,$contraseña,$correo){
            $sql="update usuarios set usuario='".$usuario."', contraseña='".$contraseña."' where correo='".$correo."'";
            $conexion=self::ejecutarConsulta();
            $resultado=$conexion->prepare($sql);
            $resultado->execute(array());
            $resultado->closeCursor();
        }

        public static function usuario($id){
            $sql="select * from usuarios where id='".$id."'";
            $conexion = self::ejecutarConsulta();
            $resultado = $conexion->prepare($sql);
            $resultado->execute(array());
            $arra_Proveedores = array();
            while ($fila = $resultado->fetch()) {
                $arra_Proveedores[] = new usuario($fila);
            }
    
            $resultado->closeCursor();
            return ($arra_Proveedores);
        }

        public static function Contador($id){
            $sql="select count(*) as 'contador' from personajes where id_usuario='".$id."' and borrado=0";
            $conexion=self::ejecutarConsulta();
            
            $resultado=$conexion->prepare($sql);
            $resultado->execute(array());
            $contador=0;
            while ($fila=$resultado->fetch()){
            $contador=$fila;
            }
            
            $resultado->closeCursor();

            return ($contador);
            }

            public static function modificar_usuario($id,$usuario,$email,$password){
                $sql="update usuarios set usuario=:usuario,correo=:email,contraseña=:password where id=:id;";
             $conexion=self::ejecutarConsulta();
             $resultado=$conexion->prepare($sql);
             $resultado->execute(array(":id"=>$id,":usuario"=>$usuario,":email"=>$email,":password"=>$password));
             $resultado->closeCursor();
            }
            public static function clase($clase, $nivel){
                $sql="select* from ".$clase." where nivel='".$nivel."'";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array());
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new $clase($fila);
                }
        
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }
            public static function experiencia($nivel){
                $sql="select * from experiencia where nivel='".$nivel."'";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array());
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new experiencia($fila);
                }
        
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }
            public static function insertarPj($nombreUsu, $clase,$nivel,$nombre,$raza,$edad,$sexo,$exp,$dinero,$descripcion,$fuerza,
            $destreza,$constitucion,$inteligencia,$sabiduria,$carisma,$fortaleza,$reflejos,$voluntad,$pg,$velocidad,$at_base,$iniciativa,$ca){
                $sql="select * from usuarios where usuario=:usu";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":usu"=>$nombreUsu));
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new id($fila);
                }
               
                $resultado->closeCursor();
                foreach ($arra_Proveedores as $o) {
                    $id=$o->getId();    
                }
try {
    
    $sql="insert into  personajes values (null,:id_usuario,'0',:clase,:nivel,:nombre,:raza,:edad,:sexo,:experiencia,:dinero,:descripcion,:fuerza,:destreza,:constitucion,
    :inteligencia,:sabiduria,:carisma,:fortaleza,:reflejos,:voluntad,:vida,:velocidad,:at_base,:iniciativa,:ca);";
    $conexion=self::ejecutarConsulta();
    $resultado=$conexion->prepare($sql);
    $resultado->execute(array(":id_usuario"=>$id,":clase"=>$clase,":nivel"=>$nivel,":nombre"=>$nombre,":raza"=>$raza,":edad"=>$edad,":sexo"=>$sexo,":experiencia"=>$exp,
    ":dinero"=>$dinero,":descripcion"=>$descripcion,":fuerza"=>$fuerza,":destreza"=>$destreza,":constitucion"=>$constitucion,":inteligencia"=>$inteligencia,":sabiduria"=>$sabiduria,
    ":carisma"=>$carisma,":fortaleza"=>$fortaleza,":reflejos"=>$reflejos,":voluntad"=>$voluntad,":vida"=>$pg,":velocidad"=>$velocidad,":at_base"=>$at_base,":iniciativa"=>$iniciativa,
   "ca"=>$ca));
    $resultado->closeCursor();
    return true;
} catch (PDOExcreption $e) {
    return false;
}
            }
            public static function comprobarInsertPj($nombre){
                $sql="select id from usuarios where usuario=:usu";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":usu"=>$nombre));
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new id($fila);
                }
                $resultado->closeCursor();
                foreach ($arra_Proveedores as $o) {
                    $id=$o->getId();    
                }
                $sql="select * from personajes where id_usuario=:usu";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":usu"=>$id));
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new id($fila);
                }
                $resultado->closeCursor();
            
            }
            public static function selectPj($id){
                $sql="select * from personajes where id_usuario=:usu and borrado=0";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":usu"=>$id));
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new ficha($fila);
                }
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }
            public static function borrarPj($id){
                $sql="update personajes set borrado='1'where id=:id;";
                $conexion=self::ejecutarConsulta();
                $resultado=$conexion->prepare($sql);
                $resultado->execute(array(":id"=>$id));
                $resultado->closeCursor();
            }
            public static function añadirTiempo ($tiempo,$id){
                $sql="select * from usuarios where id='".$id."'";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array());
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new usuario($fila);
                }
        
                foreach ($arra_Proveedores as $o) {
                    $tiempoUsu=$o->getTiempo();
                }
                $resultado->closeCursor(); 
                $tiempoTotal = $tiempoUsu + $tiempo;

                $sql="update usuarios set tiempo=:tiempo where id=:id;";
                $conexion=self::ejecutarConsulta();
                $resultado=$conexion->prepare($sql);
                $resultado->execute(array(":id"=>$id,":tiempo"=>$tiempoTotal));
                $resultado->closeCursor();
            }
            public static function selectDotes(){
                $sql="select * from dotes";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array());
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new dotes($fila);
                }
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }
            public static function selectArmas(){
                $sql="select * from armas";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array());
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new armas($fila);
                }
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }
            public static function selectExperiencia(){
                $sql="select * from experiencia";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array());
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new experiencia($fila);
                }
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }

            public static function selectProtecciones(){
                $sql="select * from protecciones";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array());
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new protecciones($fila);
                }
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }
            public static function selectPertenencias(){
                $sql="select * from pertenencias";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array());
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new pertenencias($fila);
                }
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }
            public static function selectHabilidadesPorClase($clase){
                $sql="select * from habilidades where clase=:clase or clase=''";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":clase"=>$clase));
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new habilidades($fila);
                }
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }
            public static function selectIdiomas(){
                $sql="select * from idiomas;";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array());
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new idiomas($fila);
                }
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }
            public static function selectConjuros($nivel,$tipo){
                $sql="select * from conjuros where nivel <=:nivel and clase=:tipo;";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":nivel"=>$nivel,":tipo"=>$tipo));
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new conjuros($fila);
                }
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }
            public static function selectHabilidades($nombre){
                $sql="select * from habilidades where nombre=:nombre";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":nombre"=>$nombre));
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new habilidades($fila);
                }
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }
            public static function comprobarNombre($nombre){
                $sql="select * from personajes where nombre=:nombre";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":nombre"=>$nombre));
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new ficha($fila);
                }
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }
            public static function selectPjPorNombre($nombre,$id_usuario){
                $sql="select * from personajes where nombre=:nombre and id_usuario=:id";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":nombre"=>$nombre,":id"=>$id_usuario));
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new ficha($fila);
                }
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }
            public static function insertarArmas($id_personaje,$id_arma,$municion){
              try {
                $sql="insert into  armado values (:id_personaje,:id_arma,:municion);";
                $conexion=self::ejecutarConsulta();
                $resultado=$conexion->prepare($sql);
                $resultado->execute(array(":id_personaje"=>$id_personaje,":id_arma"=>$id_arma,":municion"=>$municion));
                $resultado->closeCursor();
                return true;
              } catch (PDOExcreption $e) {
                  return false;
              }
            }
            public static function insertarProtecciones($id_personaje,$id_armadura){
                try {
                  $sql="insert into  protegido values (:id_personaje,:id_armadura);";
                  $conexion=self::ejecutarConsulta();
                  $resultado=$conexion->prepare($sql);
                  $resultado->execute(array(":id_personaje"=>$id_personaje,":id_armadura"=>$id_armadura));
                  $resultado->closeCursor();
                  return true;
                } catch (PDOExcreption $e) {
                    return false;
                }
              }
              public static function insertarPertenencias($id_personaje,$id_pertenencia,$cantidad){
                try {
                  $sql="insert into  posee values (:id_personaje,:id_pertenencia,:cantidad);";
                  $conexion=self::ejecutarConsulta();
                  $resultado=$conexion->prepare($sql);
                  $resultado->execute(array(":id_personaje"=>$id_personaje,":id_pertenencia"=>$id_pertenencia,":cantidad"=>$cantidad));
                  $resultado->closeCursor();
                  return true;
                } catch (PDOExcreption $e) {
                    return false;
                }
              }
              public static function insertarDotes($id_personaje,$id_dote){
                try {
                  $sql="insert into  dotado values (:id_personaje,:id_dote);";
                  $conexion=self::ejecutarConsulta();
                  $resultado=$conexion->prepare($sql);
                  $resultado->execute(array(":id_personaje"=>$id_personaje,":id_dote"=>$id_dote));
                  $resultado->closeCursor();
                  return true;
                } catch (PDOExcreption $e) {
                    return false;
                }
              }
              public static function insertarIdiomas($id_personaje,$id_idioma){
                try {
                  $sql="insert into  posee_idioma values (:id_personaje,:id_idioma);";
                  $conexion=self::ejecutarConsulta();
                  $resultado=$conexion->prepare($sql);
                  $resultado->execute(array(":id_personaje"=>$id_personaje,":id_idioma"=>$id_idioma));
                  $resultado->closeCursor();
                  return true;
                } catch (PDOExcreption $e) {
                    return false;
                }
              }
              public static function insertarHabilidades($id_personaje,$id_habilidad,$rango){
                try {
                  $sql="insert into  habilitado values (:id_personaje,:id_habilidad,:rango);";
                  $conexion=self::ejecutarConsulta();
                  $resultado=$conexion->prepare($sql);
                  $resultado->execute(array(":id_personaje"=>$id_personaje,":id_habilidad"=>$id_habilidad,":rango"=>$rango));
                  $resultado->closeCursor();
                  return true;
                } catch (PDOExcreption $e) {
                    return false;
                }
              }
              public static function buscarBorrados($nombre){

                if ($nombre!="") {
                    $sql="select * from usuarios where usuario=:nombre;";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":nombre"=>$nombre));
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new id($fila);
                }
                $resultado->closeCursor();

                foreach ($arra_Proveedores as $o) {
                    $id=$o->getId();    
                }
                $sql="select * from personajes where id_usuario=:id;";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":id"=>$id));
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new ficha($fila);
                }
                $resultado->closeCursor();
                return ($arra_Proveedores);
                }else{
                    $sql="select * from personajes where borrado='1';";
                    $conexion = self::ejecutarConsulta();
                    $resultado = $conexion->prepare($sql);
                    $resultado->execute(array());
                    $arra_Proveedores = array();
                    while ($fila = $resultado->fetch()) {
                        $arra_Proveedores[] = new ficha($fila);
                    }
                    $resultado->closeCursor();
                    return ($arra_Proveedores);
                }
            }
            public static function eliminarPj($id){
                try {
                  $sql="delete from personajes where id=:id";
                  $conexion=self::ejecutarConsulta();
                  $resultado=$conexion->prepare($sql);
                  $resultado->execute(array(":id"=>$id));
                  $resultado->closeCursor();
                  return true;
                } catch (PDOExcreption $e) {
                    return false;
                }
              }
              public static function salvarPj($id){
                try {
                  $sql="update personajes set borrado='0' where id=:id";
                  $conexion=self::ejecutarConsulta();
                  $resultado=$conexion->prepare($sql);
                  $resultado->execute(array(":id"=>$id));
                  $resultado->closeCursor();
                  return true;
                } catch (PDOExcreption $e) {
                    return false;
                }
              }
              public static function selectPjPorId($id){
                $sql="select * from personajes where id=:id";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":id"=>$id));
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new ficha($fila);
                }
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }
            public static function selectArmados($id_personaje){
                $sql="select * from armado where id_personaje=:id";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":id"=>$id_personaje));
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new armado($fila);
                }
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }
            public static function selectArmasPorId($id){
                $sql="select * from armas where id=:id";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":id"=>$id));
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new armas($fila);
                }
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }
            public static function selectProtegido($id_personaje){
                $sql="select * from protegido where id_personaje=:id";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":id"=>$id_personaje));
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new protegido($fila);
                }
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }
            public static function selectProteccionPorId($id){
                $sql="select * from protecciones where id=:id";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":id"=>$id));
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new protecciones($fila);
                }
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }
            public static function selectPosee($id_personaje){
                $sql="select * from posee where id_personaje=:id";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":id"=>$id_personaje));
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new posee($fila);
                }
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }
            public static function selectPertenenciasPorId($id){
                $sql="select * from pertenencias where id=:id";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":id"=>$id));
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new pertenencias($fila);
                }
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }
            public static function selectDotado($id_personaje){
                $sql="select * from dotado where id_personaje=:id";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":id"=>$id_personaje));
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new dotado($fila);
                }
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }
            public static function selectDotesPorId($id){
                $sql="select * from dotes where id=:id";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":id"=>$id));
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new dotes($fila);
                }
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }
            public static function selectPosee_idioma($id_personaje){
                $sql="select * from posee_idioma where id_personaje=:id";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":id"=>$id_personaje));
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new posee_idioma($fila);
                }
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }
            public static function selectIdiomasPorId($id){
                $sql="select * from idiomas where id=:id";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":id"=>$id));
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new idiomas($fila);
                }
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }
            public static function selectHabilitado($id_personaje){
                $sql="select * from habilitado where id_personaje=:id";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":id"=>$id_personaje));
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new habilitado($fila);
                }
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }
            public static function selectHabilidadesPorId($id){
                $sql="select * from habilidades where id=:id";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":id"=>$id));
                $arra_Proveedores = array();
                while ($fila = $resultado->fetch()) {
                    $arra_Proveedores[] = new habilidades($fila);
                }
                $resultado->closeCursor();
                return ($arra_Proveedores);
            }
            public static function modificarPj($id, $clase,$nivel,$nombre,$raza,$edad,$sexo,$exp,$dinero,$descripcion,$fuerza,
            $destreza,$constitucion,$inteligencia,$sabiduria,$carisma,$fortaleza,$reflejos,$voluntad,$pg,$velocidad,$at_base,$iniciativa,$ca){
                try {
                    $sql="update personajes set clase=:clase,nivel=:nivel,nombre=:nombre,raza=:raza,edad=:edad,sexo=:sexo,experiencia=:exp,dinero=:dinero,descripcion=:descripcion,
                    fuerza=:fuerza,destreza=:destreza,constitucion=:constitucion,inteligencia=:inteligencia,sabiduria=:sabiduria,carisma=:carisma,fortaleza=:fortaleza,reflejos=:reflejos,
                    voluntad=:voluntad,vida=:pg,velocidad=:velocidad,at_base=:at_base,iniciativa=:iniciativa,ca=:ca  where id=:id";
                    $conexion=self::ejecutarConsulta();
                    $resultado=$conexion->prepare($sql);
                    $resultado->execute(array(":clase"=>$clase,":nivel"=>$nivel,":nombre"=>$nombre,":raza"=>$raza,":edad"=>$edad,":sexo"=>$sexo,":exp"=>$exp,
                    ":dinero"=>$dinero,":descripcion"=>$descripcion,":fuerza"=>$fuerza,":destreza"=>$destreza,":constitucion"=>$constitucion,":inteligencia"=>$inteligencia,":sabiduria"=>$sabiduria,
                    ":carisma"=>$carisma,":fortaleza"=>$fortaleza,":reflejos"=>$reflejos,":voluntad"=>$voluntad,":pg"=>$pg,":velocidad"=>$velocidad,":at_base"=>$at_base,":iniciativa"=>$iniciativa,
                   ":ca"=>$ca,":id"=>$id));
                    $resultado->closeCursor();
                    return true;
                  } catch (PDOExcreption $e) {
                      return false;
                  }
            }
            public static function deleteArmas($id_personaje){
                $sql="delete from armado where id_personaje=:id_personaje";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":id_personaje"=>$id_personaje));
                $resultado->closeCursor();
            }

              public static function deleteProtecciones($id_personaje){
                $sql="delete from protegido where id_personaje=:id_personaje";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":id_personaje"=>$id_personaje));
                $resultado->closeCursor();
            }
              public static function deletePertenencias($id_personaje){
                $sql="delete from posee where id_personaje=:id_personaje";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":id_personaje"=>$id_personaje));
                $resultado->closeCursor();
            }
              public static function deleteDotes($id_personaje){
                $sql="delete from dotado where id_personaje=:id_personaje";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":id_personaje"=>$id_personaje));
                $resultado->closeCursor();
            }
            public static function deleteIdiomas($id_personaje){
                $sql="delete from posee_idioma where id_personaje=:id_personaje";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":id_personaje"=>$id_personaje));
                $resultado->closeCursor();
            }
            public static function deleteHabilidades($id_personaje){
                $sql="delete from habilitado where id_personaje=:id_personaje";
                $conexion = self::ejecutarConsulta();
                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":id_personaje"=>$id_personaje));
                $resultado->closeCursor();
            }
}//Fin de clase