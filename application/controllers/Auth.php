<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends CI_Controller
{
	public function session($provider)
	{
		$this->load->helper('url_helper');

		$this->load->spark('oauth2/0.3.1');

		// Create an consumer from the config
		/*
		$consumer = $this->oauth->consumer(array(
				'key' => 'KpdzuODDkL9Wd0F076x2jw',
				'secret' => 'JtjDQSHJh8YyXPeumZPPBqGvDLmurqxg1MkayNiSw'
		));
		
		 $google_consumer=array(
		 		'key' => '889399054895.apps.googleusercontent.com',
		 		'secret' => 'K3FmkqoTyt6mfF8zUISTkZ9d'
		 );
		*/
		$provider = $this->oauth2->provider($provider, array(
				'id' => '889399054895.apps.googleusercontent.com',
				'secret' => 'K3FmkqoTyt6mfF8zUISTkZ9d',
		));
		$code = $this->input->get('code');
				   
		if ( ! $code)
		{
			// By sending no options it'll come back here
			$provider->authorize();
		}
		else
		{
			// Howzit?
			try
			{
				var_dump($this->session->all_userdata());
				$token = $this->session->userdata("TOKEN");
				var_dump($token);
				if (empty($token)){
				echo "provider";
					$token = $provider->access($code);
				}
				$this->session->set_userdata("TOKEN",$token);
				var_dump($token);
				$user = $provider->get_user_info($token);
				
				// Here you should use this information to A) look for a user B) help a new user sign up with existing data.
				// If you store it all in a cookie and redirect to a registration page this is crazy-simple.
				echo "<pre>Tokens: ";
				var_dump($token);

				echo "\n\nUser Info: ";
				var_dump($user);
			}

			catch (OAuth2_Exception $e)
			{
				show_error('That didnt work: '.$e);
			}

		}
	}
}
