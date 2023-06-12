<?php 

    require('app/app.php');

    $data = new FileDataProvider(CONFIG['data_file']);

    $view_bag = ['title' => 'Glossary', 'heading' => 'Table'];

    if(isset($_GET["search"])){
        $items = $data->search_terms($_GET["search"]);
        $view_bag['heading'] ='Seach results for ' . $_GET['search'];

    } else {
        $items = $data->get_terms();
    }

    view('index', $items);

?>