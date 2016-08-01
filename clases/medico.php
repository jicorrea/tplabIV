<?php
class medico
{

  public $correo;
  public $nomDoctor;
  public $especialidad;
  public $telefono;
  public $dia;
  public $estado;
  
  
   public static function TraerMedicos()
   {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * from medicos");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "medico"); 

   }

  public function GuardarMedico()
   {
 
    $var=medico::TraerUnMedico($this->correo);
    if(empty($var)) //empty si esta vacia la variable
      {
               $this->InsertarMedico();
      }
      else {
         $this->ModificarMedico();
      }

   }

   public static function TraerUnMedico($correo)
   {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM medicos WHERE correo =:correo");
            $consulta->bindValue(':correo',$correo, PDO::PARAM_STR);          
            $consulta->execute();           
             $usuarioBuscado= $consulta->fetchObject('medico');
             return $usuarioBuscado; 
   }

  public function InsertarMedico()
     {
                $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
                $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO medicos (correo,nomDoctor,especialidad,telefono,dia,estado)values(:correo,:nomDoctor,:especialidad,:telefono,:dia,:estado)");
                $consulta->bindValue(':correo',$this->correo, PDO::PARAM_STR);
                $consulta->bindValue(':nomDoctor', $this->nomDoctor, PDO::PARAM_STR);
                $consulta->bindValue(':especialidad', $this->especialidad, PDO::PARAM_STR);
                $consulta->bindValue(':telefono', $this->telefono, PDO::PARAM_STR);
                $consulta->bindValue(':dia', $this->dia, PDO::PARAM_STR);                
                $consulta->bindValue(':estado', $this->estado, PDO::PARAM_STR);
     

                $consulta->execute();       
                return $objetoAccesoDato->RetornarUltimoIdInsertado();
     }
   
  public function ModificarMedico()
  {
    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
    
    $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE medicos SET correo=:correo,especialidad=:especialidad,dia=:dia,estado=:estado WHERE nomDoctor=:nomDoctor");
    
                $consulta->bindValue(':correo',$this->correo, PDO::PARAM_STR);
                $consulta->bindValue(':nomDoctor', $this->nomDoctor, PDO::PARAM_STR);
                $consulta->bindValue(':especialidad', $this->especialidad, PDO::PARAM_STR);
                $consulta->bindValue(':telefono', $this->telefono, PDO::PARAM_STR);
                $consulta->bindValue(':dia', $this->dia, PDO::PARAM_STR);                
                $consulta->bindValue(':estado', $this->estado, PDO::PARAM_STR);
    
    return $consulta->execute();
  }


   
     public static function eliminarMedico($id)
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM medicos where correo =:id");
    $consulta->bindValue(':id', $id, PDO::PARAM_STR);
    $consulta->execute();
    //$provBuscado= $consulta->fetchObject('voto');
   // return $provBuscado;
     }



}

?>