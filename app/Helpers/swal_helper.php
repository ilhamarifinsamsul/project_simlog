<?php 

function set_swal($icon, $title, $text){
    session()->setFlashdata('swal_icon', $icon);
    session()->setFlashdata('swal_title', $title);
    session()->setFlashdata('swal_text', $text);

}
