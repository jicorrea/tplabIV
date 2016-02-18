<?php
class noticia
{

  public $id_noticia;
  public $autor;
  public $titulo;
  public $categoria;
  public $fecha;
  public $noticia;
  
  
   public static function TraerNoticias()
   {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * from noticias");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "noticia"); 

   }
  public function GuardarNoticia()
   {
 
    if($this->id_noticia != 0) //empty si esta vacia la variable
      {
               $this->InsertarNoticia();
      }
      else {
         $this->ModificarNoticia();
      }

   }
   public static function TraerUnaNoticia($id)
   {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * from noticias where id_noticia =: id");
            $consulta->bindValue(':id',$id, PDO::PARAM_INT);            
            $consulta->execute();           
             $usuarioBuscado= $consulta->fetchObject('noticia');
             return $usuarioBuscado; 
   }

  public function InsertarNoticia()
     {
                $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
                $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO noticias (:id_noticia,:autor,:titulo,:categoria,:fecha,:noticia)");
                $consulta->bindValue(':id_noticia',$this->id_noticia, PDO::PARAM_INT);
                $consulta->bindValue(':autor', $this->autor, PDO::PARAM_STR);
                $consulta->bindValue(':titulo', $this->titulo, PDO::PARAM_STR);
                $consulta->bindValue(':categoria', $this->categoria, PDO::PARAM_STR);
                $consulta->bindValue(':fecha', $this->fecha, PDO::PARAM_STR);                
                $consulta->bindValue(':noticia', $this->noticia, PDO::PARAM_INT);
     

                $consulta->execute();       
                return $objetoAccesoDato->RetornarUltimoIdInsertado();
     }
   
   
     public static function eliminarNoticia($id)
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM noticias where id_noticia =: id");
    $consulta->bindValue(':id', $id, PDO::PARAM_INT);
    $consulta->execute();
    //$provBuscado= $consulta->fetchObject('voto');
   // return $provBuscado;
     }



}

?>