<?php
  require_once('AccesoDatos.php');
class turno
{

  public $id_turno;
  public $uCorreo;
  public $nomDoctor;
  public $especialidad;
  public $fecha;
  public $horario;  
  public $estado;
  
  
   public static function TraerTurnos()
   {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * from turnos");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "turno"); 

   }

  public function GuardarTurno()
   {
 
    $var=medico::TraerUnTurno($this->id_turno);
    if(empty($var)) //empty si esta vacia la variable
      {
               $this->InsertarTurno();
      }
      else {
         $this->Modificarturno();
      }

   }

   public static function TraerUnTurno($id)
   {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM turnos WHERE id_turno =:id");
            $consulta->bindValue(':id',$id, PDO::PARAM_INT);          
            $consulta->execute();           
             $usuarioBuscado= $consulta->fetchObject('turno');
             return $usuarioBuscado; 
   }

  public function InsertarTurno()
     {
                $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
                $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO turnos (uCorreo,nomDoctor,especialidad,fecha,horario,estado)values(:uCorreo,:nomDoctor,:especialidad,:fecha,:horario,:estado)");
                $consulta->bindValue(':uCorreo',$this->uCorreo, PDO::PARAM_STR);
                $consulta->bindValue(':nomDoctor', $this->nomDoctor, PDO::PARAM_STR);
                $consulta->bindValue(':especialidad', $this->especialidad, PDO::PARAM_STR);
                $consulta->bindValue(':fecha', $this->fecha, PDO::PARAM_STR);
                $consulta->bindValue(':horario', $this->horario, PDO::PARAM_INT);                
                $consulta->bindValue(':estado', $this->estado, PDO::PARAM_STR);
     

                $consulta->execute();       
                return $objetoAccesoDato->RetornarUltimoIdInsertado();
     }
   
  public function ModificarTurno()
  {
    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
    
    $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE turnos SET uCorreo=:uCorreo,nomDoctor=:nomDoctor,especialidad=:especialidad,fecha=:fecha,horario=:horario,estado=:estado WHERE id_turno=:id_turno");
                $consulta->bindValue(':id_turno',$this->id_turno, PDO::PARAM_INT);
                $consulta->bindValue(':uCorreo',$this->uCorreo, PDO::PARAM_STR);
                $consulta->bindValue(':nomDoctor', $this->nomDoctor, PDO::PARAM_STR);
                $consulta->bindValue(':especialidad', $this->especialidad, PDO::PARAM_STR);
                $consulta->bindValue(':fecha', $this->fecha, PDO::PARAM_STR);
                $consulta->bindValue(':horario', $this->horario, PDO::PARAM_INT);                
                $consulta->bindValue(':estado', $this->estado, PDO::PARAM_STR);
     
    
    return $consulta->execute();
  }


   
     public static function eliminarTurno($id)
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM turnos where id_turnos =:id");
    $consulta->bindValue(':id', $id, PDO::PARAM_STR);
    $consulta->execute();
    //$provBuscado= $consulta->fetchObject('voto');
   // return $provBuscado;
     }



}

?>