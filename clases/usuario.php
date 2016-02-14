<?php
class usuario
{

  public $correo;
  public $contrasena;
  public $apellido;
  public $nombre;
  public $telefono;
  public $obra_soc;
  public $provincia;
  public $localidad;
  public $direccion;
  public $foto;
  
   public static function TraerUsuarios()
   {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerUsuarios()");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario"); 

   }
  public function GuardarUsuario()
   {
    $var=usuario::TraerUnUsuario($this->correo);
    if(empty($var)) //empty si esta vacia la variable
      {
               $this->InsertarUsuario();
      }
      else {
         $this->ModificarUsuario();
      }

   }
   public static function TraerUnUsuario($correo)
   {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerUnUsuario(:correo)");
            $consulta->bindValue(':correo',$correo, PDO::PARAM_STR);            
            $consulta->execute();           
             $usuarioBuscado= $consulta->fetchObject('usuario');
             return $usuarioBuscado; 
   }

  public function InsertarUsuario()
     {
                $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
                $consulta =$objetoAccesoDato->RetornarConsulta("CALL InsertarUsuario(:correo, :contrasena, :apellido, :nombre, :telefono, :obra_soc, :provincia, :localidad, :direccion, :foto)");
                $consulta->bindValue(':correo',$this->correo, PDO::PARAM_STR);
                $consulta->bindValue(':contrasena', $this->contrasena, PDO::PARAM_STR);
                $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
                $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
                $consulta->bindValue(':telefono', $this->telefono, PDO::PARAM_INT);
                $consulta->bindValue(':obra_soc', $this->obra_soc, PDO::PARAM_STR);
                                $consulta->bindValue(':provincia', $this->provincia, PDO::PARAM_STR);
                                $consulta->bindValue(':localidad', $this->localidad, PDO::PARAM_STR);
                                $consulta->bindValue(':direccion', $this->direccion, PDO::PARAM_STR);
                $consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);

                $consulta->execute();       
                return $objetoAccesoDato->RetornarUltimoIdInsertado();
     }
   
     public static function validarUsuario($correo,$contrasena)
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("CALL validarUsuario(:correo, :contrasena)");
    $consulta->bindValue(':correo', $correo, PDO::PARAM_STR);
        $consulta->bindValue(':contrasena', $contrasena, PDO::PARAM_STR);
    $consulta->execute();
    $usuarioBuscado= $consulta->fetchObject('usuario');
    return $usuarioBuscado;
     }
   
     public static function eliminarUsuario($correo)
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("CALL eliminarUsuario(:correo)");
    $consulta->bindValue(':correo', $correo, PDO::PARAM_STR);
    $consulta->execute();
    //$provBuscado= $consulta->fetchObject('voto');
   // return $provBuscado;
     }

   public function ModificarUsuario()
   {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta =$objetoAccesoDato->RetornarConsulta("CALL ModificarUsuario(:correo,:contrasena,:telefono,:obra_soc,:apellido,:nombre,:provincia,:localidad,:direccion,:foto)");
      $consulta->bindValue(':correo',$this->correo, PDO::PARAM_STR);
      $consulta->bindValue(':contrasena',$this->contrasena, PDO::PARAM_STR);
      $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
      $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
      $consulta->bindValue(':telefono',$this->telefono, PDO::PARAM_INT); 
      $consulta->bindValue(':obra_soc', $this->obra_soc, PDO::PARAM_STR);     
                                $consulta->bindValue(':provincia',$this->provincia, PDO::PARAM_STR);
                                $consulta->bindValue(':localidad', $this->localidad, PDO::PARAM_STR);
                                $consulta->bindValue(':direccion', $this->direccion, PDO::PARAM_STR);      
      $consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
      return $consulta->execute();
   }

}

?>