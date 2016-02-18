<?php
header('Content-type: text/xml; charset="iso-8859-1"', true);
echo '<?xml version="1.0" encoding="iso-8859-1"?>';
//Aquí la conexión o archvio de conexión a la base de datos 
//Hacemos la consulta y la ordenamos por post para mostrar siempre el último
  include_once('../clases/noticia.php');
   include_once('../clases/AccesoDatos.php');


$resultado=noticia::TraerNoticias();

//"Cortaremos" el artículo en 300 caracteres para nuestra descripción
//$descripcion=substr($row[noticia],0,300)."...";

// Y generamos nuestro documento
echo '<rss version="2.0">';
echo '<channel>
      <title>Clinica de Especialidades</title>
      <link>http:/correajuan.tuars.com/</link>
      <language>es-CL</language>
      <description>Novedades</description>
      <generator>Randy Espiritu</generator>';
      
   foreach ($resultado as $p){    
      echo '<item>
         <title>'.$p->titulo.'</title>
         <link>http://www.atid.edu.mx/comunidad/news.php?id='.$p->id_noticia.'</link>
         <pubDate>'.$p->fecha.'</pubDate>
         <category>'.$p->categoria.'</category>
         <description><![CDATA['.$p->noticia.']]></description>
      </item>';
      }
   echo'    
   </channel>
</rss>';
?>


