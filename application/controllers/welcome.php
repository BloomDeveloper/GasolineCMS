<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
			
		$this->load->spark('twiggy/0.8.5');
		$this->twiggy->theme('theme2');
	
		
		$this->twiggy->register_function('phpversion');
		$this->twiggy->title('Gasoline CMS');
		$user1 = array('nome'=>'davide','cognome'=>'dalla mora');
		$user2 = array('nome'=>'eloisa','cognome'=>'artale');
		$boxes = array($user1,$user2);
		$this->twiggy->set('boxes',$boxes);
		$this->twiggy->title()->prepend('Home');
		
		$this->twiggy->template('welcome')->display();
		
		
		
		//$this->load->view('welcome_message');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */