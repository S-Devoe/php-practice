<?php
 $title = "Scope";

 $guitars = [
    ['name' => 'Vale', 'manufacturer' => 'PRS'], 
    ['name' => 'Explorer', 'manufacturer' => 'Gibson'],
    ['name' => 'Strat', 'manufacturer' => 'Fender' ]
    ];


 function pluck($arr, $key) {
    $result = array_map(function($item) use ($key) {
        return $item[$key];
    }, $arr);

    return $result;
 };

 function return_name($arr){
    return $arr['name'];
 };

 $guitar_name = pluck($guitars, 'name');

 function output($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
 };

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title ?>
    </title>
</head>
<body>

<table>
    <?php 
 output($guitar_name);
    ?>
</table>
    
</body>
</html>