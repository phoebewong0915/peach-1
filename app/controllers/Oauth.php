<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Hauth Controller Class
 */
class Oauth extends CI_Controller {

  /**
   * {@inheritdoc}
   */
  public function __construct()
  {
    parent::__construct();

    $this->load->helper();
    $this->load->library('hybridauth');
	$this->load->model('Guest_Model');
  }

  /**
   * {@inheritdoc}
   */
  public function index()
  {
    // Build a list of enabled providers.
    
	/*
	$providers = array();
    foreach ($this->hybridauth->HA->getProviders() as $provider_id => $params)
    {
      $providers[] = anchor("oauth/window/{$provider_id}", '<i class="fa fa-'.$provider_id.'"></i> &nbsp; Login with'.$provider_id, array('class' => $provider_id));
    }

    $this->load->view('hauth/login_widget', array(
      'providers' => $providers,
    ));
	*/
	
  }

  /**
   * Try to authenticate the user with a given provider
   *
   * @param string $provider_id Define provider to login
   */
  function window($provider_id)
  {
    $params = array(
      'hauth_return_to' => site_url("oauth/window/{$provider_id}"),
    );
    if (isset($_REQUEST['openid_identifier']))
    {
      $params['openid_identifier'] = $_REQUEST['openid_identifier'];
    }
    try
    {
      $adapter = $this->hybridauth->HA->authenticate($provider_id, $params);
      $profile = get_object_vars($adapter->getUserProfile());	// It killing me, need to convert object to array

	  $data = array(	'identifier' => $profile['identifier'],
						'webSiteURL' => $profile['webSiteURL'],
						'profileURL' => $profile['profileURL'],
						'photoURL' => $profile['photoURL'],
						'displayName' => $profile['displayName'],
						'description' => $profile['description'],
						'firstName'	=> $profile['firstName'],
						'lastName' => $profile['lastName'],
						'gender' => $profile['gender'],
						'language' => $profile['language'],
						'age' => $profile['age'],
						'birthDay' => $profile['birthDay'],
						'birthMonth' => $profile['birthMonth'],
						'birthYear'	=> $profile['birthYear'],
						'email'	=> $profile['email'],
						'emailVerified'	=> $profile['emailVerified'],
						'phone'	=> $profile['phone'],
						'address' => $profile['address'],
						'country' => $profile['country'],
						'region' => $profile['region'],
						'city' => $profile['city'],
						'zip' => $profile['zip'],
						'job_title'	=> $profile['job_title'],
						'organization_name'	=> $profile['organization_name'],
						'provider' => $provider_id,
						'mac' => $this->session->userdata('mac'),
						'last_updated' => NOW()
					);
					
	  if(count($this->Guest_Model->check_guest_unique($profile['identifier'])) <= 0)
	  {			
		if(!$this->Guest_Model->create_guests($data))
		{
			log_message('error', 'DB Error');
		}
		else{
			redirect('guest/do_wifi_login/'.$provider_id);
		}
	  }
	  else
	  {
		if(!$this->Guest_Model->update_guests($data))
		{
			log_message('error', 'DB Error');
		}
		else{
			redirect('guest/do_wifi_login/'.$provider_id);
		}
	  }
    }
    catch (Exception $e)
    {
      show_error($e->getMessage());
    }
  }

  /**
   * Handle the OpenID and OAuth endpoint
   */
  public function endpoint()
  {
    $this->hybridauth->process();
  }

}
