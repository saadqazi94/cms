<?php 
class page_m extends MY_Model
{
	protected $_table_name = 'pages';
	
	protected $_order_by = 'order';
	
	public $rules = array(

		'parent_id' => array(
			'field' => 'parent_id', 
			'label' => 'Parent', 
			'rules' => 'trim|intval'
			),
		'template' => array(
			'field' => 'template', 
			'label' => 'Template', 
			'rules' => 'required|trim'
			),

		'title' => array(
			'field' => 'title', 
			'label' => 'Title', 
			'rules' => 'required|trim|max_length[100]'
			),

		'slug' => array(
			'field' => 'slug', 
			'label' => 'Slug', 
			'rules' => 'required|trim|max_length[100]|url_title|callback__unique_slug'
			),
		'body' => array(
			'field' => 'body', 
			'label' => 'Body', 
			'rules' => 'required|trim'
			),
		);

	public function get_new(){
		$page = new stdClass();
		$page->title = '';
		$page->slug = '';
		$page->body = '';
		$page->parent_id = 0;

		return $page;
	}

	public function delete ($id)
	{
		// Delete a page
		parent::delete($id);
		
		// Reset parent ID for its children
		$this->db->set(array(
			'parent_id' => 0
		))->where('parent_id', $id)->update($this->_table_name);
	}

	public function get_with_parent ($id = NULL, $single = FALSE)
	{
		$this->db->select('pages.*, p.slug as parent_slug, p.title as parent_title');
		$this->db->join('pages as p', 'pages.parent_id=p.id', 'left');
		return parent::get($id, $single);
	}

		public function get_no_parents ()
	{
		// Fetch pages without parents
		$this->db->select('id, title');
		$this->db->where('parent_id', 0);
		$pages = parent::get();
		
		// Return key => value pair array
		$array = array(
			0 => 'No parent'
		);
		if (count($pages)) {
			foreach ($pages as $page) {
				$array[$page->id] = $page->title;
			}
		}
		
		return $array;
	}

	public function get_nested ()
	{
		$this->db->order_by($this->_order_by);
		$pages = $this->db->get('pages')->result_array();
		
		$array = array();
		foreach ($pages as $page) {
			if (! $page['parent_id']) {
				// This page has no parent
				$array[$page['id']] = $page;
			}
			else {
				// This is a child page
				$array[$page['parent_id']]['children'][] = $page;
			}
		}
		return $array;
	}
}