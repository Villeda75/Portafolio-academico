<?php 
$menu = array(
               "0" => array (
                               "title" => 'Inicio',
                               "page"  => 'index', 
                               "url"   => "main.php"
                                       ),
               "1" => array (
                               "title" => 'Expedientes',
                               "page"  => 'expedientes',
                               "url"   => "expedientes.php"            
                                       ),                                      
               "2" => array (
                               "title" => 'Patrocinadores',
                               "page"  => 'patrocinadores',
                               "url"   => "patrocinadores.php"           
                                       ),
               "3" => array (
                               "title" => 'Asociados',
                               "page"  => 'asociados',
                               "url"   => "asociados.php"               
                                       ),   
               "4" => array (
                               "title" => 'Usuarios',
                               "page"  => 'usuarios',
                               "url"   => "users.php"              
                                       ),                    
               "5" => array (
                               "title" => 'Cerrar sesión',
                               "page"  => 'logout',
                               "url"   => "../index.php"             
                                       )
);
 
echo "<nav class='main-nav float-right d-none d-lg-block'> <ul>";

for ($i = 0; $i < count($menu); $i++)
{
	echo "<li><a href=".$menu[$i]['url'] .">".$menu[$i]['title'] ."</a></li>";
}

echo "<li><a> Usuario: ".$_COOKIE["usuario"]."</a></li>";
echo "</ul> </nav>";

?>