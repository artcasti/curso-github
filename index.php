<?php header('Content-Type: text/html; charset=utf-8'); 
                include("admin/conexion.php");
                include("admin/functions.php");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Prueba </title>
    <link rel="shortcut icon" href="img/favicon.ico">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/fonts.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="js/unslider-min.js"></script> 
<link rel="stylesheet" href="css/unslider.css">
<script type="text/javascript" src="js/cycle.js"></script>
    <link rel="stylesheet" href="css/lightbox.css">



<!--[if IE]>
    <link rel="stylesheet" href="css/ie_estilos.css">
<![endif]-->
<script>
$(document).ready(function() {
    $('.slideshow').cycle({
		fx: 'fade',
        delay: 6000// choose your transition type, ex: fade, scrollUp, shuffle, etc...
	});
});
                </script>  
</head>
<body>

<div class="wrapper">

<div class="header2">
    <div class="barrasuperior">
        <div class="logo2"><img src="img/logo.jpg" alt="logo" class="logo2"></div>
        <div class="celular2">
<?php include('inc/redes.inc');?>
        </div>
    </div>
<?php include('inc/menu.inc');?>
</div>  
   

<div class="main_header">
    <div class="header_left">
<!--        <img src="img/logo.jpg" alt="logo" >-->
<!--
        <div class="main_menu_box">
            <ul class="main_menu">
                <li class="main_menu_item"><a href="nuestroestudio.php" class="main_menu_link">Nuestro Estudio</a></li>
                <li class="main_menu_item"><a href="servicios.php" class="main_menu_link">Servicios</a></li>
                <li class="main_menu_item"><a href="obras.php" class="main_menu_link">Obras</a></li>
                <li class="main_menu_item"><a href="proyectos.php" class="main_menu_link">Proyectos</a></li>
                <li class="main_menu_item"><a href="info.php" class="main_menu_link">Info</a></li>
                <li class="main_menu_item"><a href="contacto.php" class="main_menu_link">Contacto</a></li>
            </ul>
        </div>
-->
    </div>
    <div class="header_right bg_imagen">
<div class="slideshow">     
     <?php 

require_once("admin/class/filereader.php");

$path = "banner/";

$dir = new filereader($path);


$lista = $dir->LeerDirectorio();

for($i=0;$i<count($lista);$i++){ ?>
      <img src="<?php echo $path.$lista[$i];?>" class="efecto_banner1" id="img_<?php echo $i+1;?>">
<?php } ?>
</div>
       <div class="col_transparente"></div>
       <div class="col_transparente2"></div>         

    </div>
</div>   <!-- Main Header-->     
      

                <?php 


                $path="admin/galery/";

                $categoria = '4';

                $res1=listar_articulos_publicados($categoria);
                $flag=0;//para armar el contenedor si hay algo
                while ($row = mysql_fetch_row($res1)){
                    if($row[10]=='1'){
                        if ($flag==0)
                        { ?>
                            <div class="contenedor2">
                            <p class="titulo__obras">Proyectos</p>
                            </div>

                            <div class="contenedor_articulos">            
                        <?php }
                ?>       
            <div class="articulo__columna">
            <a href="detalle.php?idservicio=<?php echo $row[0]; ?>">
            <div class="articulo__img" style="background:url('<?php echo $path.$row[6];?>');     background-size:cover; 
            background-repeat: no-repeat; background-position:center bottom;"></div></a>
            <div class="articulo__descripcion">
            <h2 class="articulo__titulo"><?php echo mayus($row[1]);?></h2>

            </div>
            </div>   
                <?php }}
                        if ($flag!=0)//cierre del div de contenedor de articulos
                        { ?>
                            </div>
                        <?php }
                ?>       
                
                        
<div class="contenedor2">
   <p class="titulo__obras">Obras</p>
</div>

<div class="contenedor_articulos">

                <?php 


                $path="admin/galery/";

                $categoria = '1';

                $res1=listar_articulos_publicados($categoria);

                while ($row = mysql_fetch_row($res1)){
                    if($row[10]=='1'){
                ?>           
                                 
            <div class="articulo__columna">
            <a href="detalle.php?idservicio=<?php echo $row[0]; ?>">
            <div class="articulo__img" style="background:url('<?php echo $path.$row[6];?>');     background-size:cover; 
            background-repeat: no-repeat; background-position:center bottom;"></div></a>
            <div class="articulo__descripcion">
            <h2 class="articulo__titulo"><?php echo mayus($row[1]);?></h2>

            </div>
            </div>
    
                    <?php } };?>
           
	
<span class="boton-top icon-home"></span>
</div>         

     
       
        <?php include("inc/footer2.inc");?>

</div>
<script>
$('.boton-top').click(function(){
    $('body,html').animate({scrollTop : 0}, 500);
    return false;
});
    
$(window).scroll(function(){
    if ($(this).scrollTop() > 0) {
        $('.boton-top').fadeIn();
    } else {
        $('.boton-top').fadeOut();
    }
});    
    

    
</script>    
<script type="text/javascript" src="js/menu.js"></script>
</body>
</html>