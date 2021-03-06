<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clinica Especializada</title>

    <link rel="shortcut icon" href="img/mifavicon.png"> 
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap-css/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="bootstrap-css/css/full-width-pics.css" rel="stylesheet">
    <link href="css/ingreso.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"  type="text/css" />
    <link rel="stylesheet" href="css/default.css" type="text/css" media="screen" />
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

    <script type="text/javascript" src="js/funcionesAjax.js"></script>
    <script type="text/javascript" src="js/funcionesLogin.js"></script>
    <script type="text/javascript" src="js/funcionesABM.js"></script>
    <script type="text/javascript" src="js/funcionesMapa.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
    <script type="text/javascript" src="js/moduloGeolocalizacion.js"></script>
    <script type="text/javascript" src="js/geolocalizacionCommon.js"></script>
        
    <style>
           #galeria {
               /*margin:0 auto 0 auto;*/
               width:2px;
               height:2px;
               -webkit-box-shadow: 0px 1px 5px 0px #4a4a4a;
               -moz-box-shadow: 0px 1px 5px 0px #4a4a4a;
               box-shadow: 0px 1px 5px 0px #4a4a4a;
           }
   
    </style>

    <script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>

    <script type="text/javascript">
    var a=jQuery.noConflict();
    a(window).load(function() {
        a('#slider').nivoSlider();
    });
    </script>

</head>

<body class="fondo">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                </button>

                <a class="navbar-brand" href="<?php echo $_SERVER['PHP_SELF']; ?>">Clinica Medica</a>

            </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
                <ul class="nav navbar-nav">
                
                    <li>
                        <a href="#" onclick="MostarLogin()" class="glyphicon glyphicon-user" id="icon"></a>
                    </li>

                    <li>
                        <a href="#" onclick="MostarEspecialidades()">Especialidades</a>
                    </li>

                    <li>
                        <a href="#" onclick="MostarConsulta()">Contacto</a>
                    </li>

                    <li>
                        <a href="php/rss.php"> <img class="glyphicon glyphicon-user" style="margin-bottom:-3px;" alt="RSS" src="img/_rss.png"></a>       
                    </li>

                    <div id="botonesUsuario" class="nav navbar-nav"></div>

                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Full Width Image Header with Logo -->
    <!-- Image backgrounds are set within the full-width-pics.css file. -->

    <header class="image-bg-fluid-height">
    
        <div id="fotoUser">
        
        </div>
        <!--img class="img-responsive img-right imagenNO"  id="foto" src="http://placehold.it/100x100&text=Foto" alt=""-->
    </header>


    <!-- Content Section -->
    <section>

        <div class="container">

            <div class="row" id="contenedor">

                <div  id="principal">

                    <div id="galeria">

                        <div id="slider" class="nivoSlider">
                        
                        <?php
                            $directory="img2";
                            $dirint = dir($directory);
                            //  $i=0;
                            while (($archivo = $dirint->read()) !== false)
                            {
                                if (preg_match('/'.'gif'.'/i', $archivo) || preg_match('/'.'jpg'.'/i', $archivo) || preg_match('/'.'png'.'/i', $archivo)){

                                    echo '<img src="'.$directory."/".$archivo.'">'."\n";
                                }
                            }
                            $dirint->close();
                        ?>

                        </div>

                    </div>

                    <!--                    <h1 class="section-heading">Section Heading</h1>
                    <p class="lead section-lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <p class="section-paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, suscipit, rerum quos facilis repellat architecto commodi officia atque nemo facere eum non illo voluptatem quae delectus odit vel itaque amet.</p>      -->

                </div> 
                <!--FIN principal-->
            </div>

        </div>

    </section>

    <!-- Fixed Height Image Aside -->
    <!-- Image backgrounds are set within the full-width-pics.css file. -->
  

    <!-- Footer -->

    <footer class="navbar-fixed-bottom">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <p>Copyright &copy; Clinica&Clinica 2015</p>

                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </footer>

    <!-- jQuery -->
 
    <script src="bootstrap-css/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap-css/js/bootstrap.min.js"></script>

</body>

</html>
