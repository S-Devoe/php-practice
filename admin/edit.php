<?php
session_start();
require('../app/app.php');

ensure_user_is_authenticated();

$view_bag = [
    'title' => 'Edit Term',
    'heading' => 'Edit Term',
    ];

if(is_get()){
    $key = sanitize($_GET['key']);

    if(empty($key)){
        view('not_found','');
        die();
    }

    $term = Data::get_term($key);

    if($term === false){
        view('not_found','');
        die();
    }


    view('admin/edit', $term);

}

if(is_post()){
    $new_term = sanitize($_POST['term']);
    $definition = sanitize($_POST['definition']);
    $id = sanitize($_POST['id']);

    if(empty($new_term) || empty($definition) || empty($id) ){
        echo 'Fill all fields';
    } else{
        Data::update_term($id,$new_term, $definition);
        redirect('index.php');
    }
}





?>