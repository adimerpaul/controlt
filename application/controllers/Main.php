<?php
class Main extends CI_Controller{
function index(){
    if ($_SESSION['tipo']==""){
        header("Location: ".base_url());
    }
    $this->load->view('templates/header');
    $this->load->view('main');
    $this->load->view('templates/footer');
}
}
