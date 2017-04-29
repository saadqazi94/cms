<?php 




class user_m extends MY_Model
{
	protected $_table_name = 'users';
	
	protected $_order_by = 'name';
	
	public $rules = array(

		'email' => array(
			'field' => 'email', 
			'label' => 'Email', 
			'rules' => 'required|trim|valid_email'
			),

		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'required|trim'
			)
		);
		public $rules_admin = array(


				'name' => array(
					'field' => 'name', 
					'label' => 'Name', 
					'rules' => 'required|trim'
					),

				'email' => array(
					'field' => 'email', 
					'label' => 'Email', 
					'rules' => 'required|trim|valid_email|callback__unique_email'
					),

				'password' => array(
					'field' => 'password', 
					'label' => 'Password', 
					'rules' => 'trim|matches[password_confirm]'
					),

				'password_confirm' => array(
					'field' => 'password_confirm', 
					'label' => 'Confirm Password', 
					'rules' => 'trim|matches[password]'
					)
				);

	protected $_timestamps = FALSE;


	function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		$user = $this->get_by(array(
			'email' => $this->input->post('email'),
			'password' =>$this->hash($this->input->post('password')),
			),TRUE);
		
		if(count($user))
		{
			$data = array(
				'name' => $user->name,
				'email' => $user->email,
				'id' => $user->id,
				'loggedin' => TRUE,
				);

			$this->session->set_userdata($data);
		}
	}
	public function loggedin()
	{
		return (bool) $this->session->userdata('loggedin');
	}
	public function logout()
	{
		 $this->session->sess_destroy();
	}

	public function get_new(){
		$user = new stdClass();
		$user->name = '';
		$user->email = '';
		$user->password = '';
		return $user;
	}


	public function hash ($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}
	
}