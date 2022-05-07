<?php
$skin = $this->db->get_where('settings', array("type" => 'skin'))->row()->description;
if($skin == 1){ //white
    $color_pri = 'rgb(0,0,0,.5)';
    $color_sec = 'grey';
    $color_bg = '#fff';
}
if($skin == 2){ //aog red color
    $color_pri = '#ed1d23';
    $color_sec = '#fff';
    $color_bg = '#ed1d23';
}
if($skin == 3){ //blue
    $color_pri = '#0456a8';
    $color_sec = '#fff';
    $color_bg = '#0456a8';
}
if($skin == 4){ //green
    $color_pri = '#73bf44';
    $color_sec = '#fff';
    $color_bg = '#73bf44';
}
?>