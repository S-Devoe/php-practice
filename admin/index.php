<?php
session_start();
require('../app/app.php');

$data = new FileDataProvider(CONFIG['data_file']);

ensure_user_is_authenticated();

  $view_bag = [
    'title' => '',
    'heading' => '',
    ];

view('admin/index', $data->get_terms());

?>