<?php
session_start();
require('../app/app.php');

$data = new FileDataProvider(CONFIG['data_file']);

ensure_user_is_authenticated();

$view_bag = [
    'title' => 'Delete Term',
    'heading' => 'Delete Term',
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


    view('admin/delete', $term);

}

if(is_post()){
    $id = sanitize($_POST['id']);
    

    if(empty($id) ){
        echo 'Fill all fields';
    } else{
        Data::delete_term($id);
        redirect('index.php');
    }
}





?>