<?php /**
* 
*/
class page extends Frontend_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('page_m');
	}

	public function index()
	{
		$this->data['page'] = $this->page_m->get_by(array('slug' => (string) $this->uri->segment(1),TRUE));
		echo "<pre>" . $this->db->last_query(). "</pre>";
		var_dump($this->data['page']);

		$this->load->view('_main_layout', $this->data);
	}
} 