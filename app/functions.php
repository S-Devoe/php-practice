<?php 

    function redirect($url){
        header("Location: $url");
        die();
    };

    function view($name, $model = '') {
        global $view_bag;
        require(APP_PATH . 'views/layout.view.php');
    };

    function is_post(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            return true;
        }
    }

     function is_get(){
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            return true;
        }
    }

    function sanitize($value){
        $temp = filter_var(trim($value), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if($temp === false){
            return '';
        }

        return $temp;
    }

    function authenticate_user($email, $password){
        if($email === USER_NAME && $password === PASSWORD){
            return true;
        }
    }

    function is_authenticated(){
        return isset($_SESSION['email']);
    }

    function ensure_user_is_authenticated (){
        if(!is_authenticated()){
            redirect('../login.php');
            die();
        }
    }
?>