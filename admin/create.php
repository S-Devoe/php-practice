<?php
session_start();
require('../app/app.php');

ensure_user_is_authenticated();


if(is_post()){
    $term = sanitize($_POST['term']);
    $definition = sanitize($_POST['definition']);

    if(empty($term) || empty($definition)){
        echo 'Fill all fields';
    } else{
        Data::add_term($term, $definition);
        redirect('index.php');
    }
}

$view_bag = [
    'title' => 'Create Term',
    'heading' => 'Create Term',
    ];

view('admin/create', Data::get_terms());

?>