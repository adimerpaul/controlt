<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	function login(){
	    $user=$_POST['user'];
        $password=$_POST['password'];
        $query=$this->db->query("SELECT * FROM user WHERE user='$user' AND password='$password'");
        if ($query->num_rows()){
            $row=$query->row();
            $_SESSION['user']=$row->user;
            $_SESSION['iduser']=$row->iduser;
            $_SESSION['tipo']=$row->tipo;
            header("Location: ".base_url()."Main");
        }else{
            header("Location: ".base_url());
        }
    }
    function logout(){
	    session_destroy();
        header("Location: ".base_url());
    }
}
