<?php 
    session_start();
    require('app/app.php');

    $view_bag = ['title' => 'Login', 'heading' => 'Login page'];

    if(is_authenticated()){
        redirect('admin/index.php');
        
    }

    if(is_post()){
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = sanitize($_POST['password']);

        // compare with data store 
        if(authenticate_user($email, $password)){
            $_SESSION['email'] = $email;
            redirect('admin/index.php');
            die();
        } else {
            $status ="User not found";
        } 

        if($email == false){
            $status = 'Please enter a valid email address';
        }
    }
    

    view('login');

?>