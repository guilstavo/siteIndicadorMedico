<?php
class Auth_Controller extends CI_Controller{
    function __construct(){
        parent::__construct();
        if (!$this->session->userdata("usuario_logado")){
            redirect('login');
        }
    }
}
?>