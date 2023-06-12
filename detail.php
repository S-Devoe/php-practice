<?php 

    require('app/app.php');
     $datum = new FileDataProvider(CONFIG['data_file']);

   if (!isset($_GET['term'])) {
        redirect('index.php');
    }

    $data = $datum ->get_term($_GET['term']);

    if($data == false){
        view('not_found', '');
        die();

    }

    

    $view_bag = ['title' => "Detail for " . $data -> term ];

    view('detail', $data);

?>