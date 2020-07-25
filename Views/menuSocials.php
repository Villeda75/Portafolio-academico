<?php 
$menu = array(
               "0" => array (
                               "social" => 'twitter',
                               "class"  => "fa fa-twitter", 
                               "url"   => "http://www.jovesolideselsalvador.org.sv/"
                                       ),
               "1" => array (
                               "social" => 'instagram',
                               "class"  => "fa fa-instagram",
                               "url"   => "https://instagram.com/jovesolides?igshid=vgbw9vvkn45h"            
                                       ),                                      
                   
               "2" => array (
                               "social" => 'facebook',
                               "class"  => "fa fa-facebook",
                               "url"   => "https://www.facebook.com/jovesolides.elsalvador"             
                                       )
);
 
echo "<div class='social-links'>";

for ($i = 0; $i < count($menu); $i++)
{
        echo "<a href=".$menu[$i]['url'] ." class=".$menu[$i]['social'] ."><i class='fa ".$menu[$i]['class']."'></i></a>";
}

echo "</div>";
?>