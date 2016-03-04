<?php
class imagen
{

  public $id;
  public $titulo;
  public $descr;
  public $imagen;
  public $dia;

  
  
   public static function TraerImagenes()
   {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * from imagenes");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "imagen"); 

   }

  public function GuardarImagen()
   {
 
    $var=usuario::TraerUnMedico($this->correo);
    if(empty($var)) //empty si esta vacia la variable
      {
               $this->InsertarImagen();
      }
      else {
         $this->ModificarImagen();
      }

   }

   public static function TraerUnaImagen($id)
   {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM imagenes WHERE id =:id");
            $consulta->bindValue(':id',$id, PDO::PARAM_INT);          
            $consulta->execute();           
             $usuarioBuscado= $consulta->fetchObject('imagen');
             return $usuarioBuscado; 
   }

  public function InsertarImagen()
     {
                $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
                $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO imagenes (id,titulo,descr,imagen,dia)values(:id,:titulo,:descr,:imagen,:dia)");
                $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
                $consulta->bindValue(':titulo', $this->titulo, PDO::PARAM_STR);
                $consulta->bindValue(':descr', $this->descr, PDO::PARAM_STR);
                $consulta->bindValue(':imagen', $this->imagen, PDO::PARAM_STR);
                $consulta->bindValue(':dia', $this->dia, PDO::PARAM_STR);                

     

                $consulta->execute();       
                return $objetoAccesoDato->RetornarUltimoIdInsertado();
     }
   
   
     public static function eliminarImagen($id)
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM imagenes where id =:id");
    $consulta->bindValue(':id', $id, PDO::PARAM_STR);
    $consulta->execute();
    //$provBuscado= $consulta->fetchObject('voto');
   // return $provBuscado;
     }

   public function ModificarImagen()
   {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE imagenes SET titulo =:titulo, descr =:descr, imagen =:imagen, dia =:dia WHERE id =:id");
                $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
                $consulta->bindValue(':titulo', $this->titulo, PDO::PARAM_STR);
                $consulta->bindValue(':descr', $this->descr, PDO::PARAM_STR);
                $consulta->bindValue(':imagen', $this->imagen, PDO::PARAM_STR);
                $consulta->bindValue(':dia', $this->dia, PDO::PARAM_STR); 
      return $consulta->execute();
   }

}

?>