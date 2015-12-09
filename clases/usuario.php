<?php
class usuario
{

  public $correo;
  public $contrasena;
  public $apellido;
  public $nombre;
  public $telefono;
  public $provincia;
  public $localidad;
  public $direccion;
  public $foto;
  
   public static function TraerUsuarios()
   {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM usuarios");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario"); 

   }
  public function InsertarUsuario()
     {
                $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
                $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO usuarios (correo,contraseña,apellido,nombre,telefono,provincia,localidad,direccion,foto)values(:correo, :contraseña, :apellido, :nombre, :telefono, :provincia, :localidad, :provincia, :foto)");
                $consulta->bindValue(':correo',$this->correo, PDO::PARAM_STR);
                $consulta->bindValue(':contrasena', $this->contrasena, PDO::PARAM_STR);
                $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
                $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
                $consulta->bindValue(':telefono', $this->telefono, PDO::PARAM_INT);
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
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * from usuarios where correo= :correo && contrasena =:contrasena");
    $consulta->bindValue(':correo', $correo, PDO::PARAM_STR);
        $consulta->bindValue(':contrasena', $contrasena, PDO::PARAM_STR);
    $consulta->execute();
    $usuarioBuscado= $consulta->fetchObject('usuario');
    return $usuarioBuscado;
     }
   
     public static function eliminarUsuario($correo)
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("DELETE from usuarios where correo= :correo");
    $consulta->bindValue(':correo', $correo, PDO::PARAM_STR);
    $consulta->execute();
    //$provBuscado= $consulta->fetchObject('voto');
   // return $provBuscado;
     }

   public function ModificarUsuario()
   {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE usuarios set contrasena= :contrasena, telefono = :telefono, provincia= :provincia, localidad= :localidad, direccion= :direccion, foto= :foto WHERE correo= :correo");
      $consulta->bindValue(':correo',$this->correo, PDO::PARAM_STR);
      $consulta->bindValue(':contasena',$this->contasena, PDO::PARAM_STR);
      $consulta->bindValue(':telefono',$this->telefono, PDO::PARAM_INT);      
      $consulta->bindValue(':provincia',$this->provincia, PDO::PARAM_STR);
                                $consulta->bindValue(':localidad', $this->localidad, PDO::PARAM_STR);
                                $consulta->bindValue(':direccion', $this->direccion, PDO::PARAM_STR);      
      $consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
      return $consulta->execute();
   }

}

?>