<?php

/**
* 
*/
class Doi_model extends CI_Model
{
	
	public function get_all_doi()
	{
		$this->db->select('*');
		$this->db->from('doi_categories');
		$this->db->join('n_subject', 'n_subject.subject_id = doi_categories.n_subject_id');
		$this->db->join('n_class', 'n_class.n_class = doi_categories.class');
		$q= $this->db->get();
		return $q->result_array();
	}

	public function get_n_class()
	{
		$query=$this->db->get('n_class');
		
		return $query->result_array();
	}
	public function get_n_subject()
	{
		$query=$this->db->get('n_subject');
		return $query->result_array();
	}
	public function single_doi($doi_id)
	{
		$q=$this->db->where('doi_id',$doi_id);
		$this->db->select('*');
	$this->db->from('doi_categories');
		$this->db->join('n_subject', 'n_subject.subject_id = doi_categories.n_subject_id');
		$this->db->join('n_class', 'n_class.n_class = doi_categories.class');

	$q= $this->db->get();
		return $q->row_array();

	}


	public function insert_doi()
	{	$subject=$this->input->post('subject');	
		$class=$this->input->post('class');	
	$data = array(
       	'profile_short' => $this->input->post('profile_short'),
       'profile' => $this->input->post('profile'),
       'criteria' =>$this->input->post('criteria'),
       'class' => $class+1,
       'n_subject_id' => $subject+1
        );
        
     
		$this->db->insert('doi_categories', $data);
	 	
	 }

	 public function update_doi()
    {	$class=$this->input->post('class');
    	$subject=$this->input->post('subject');
        $data = array(
       	'profile_short' => $this->input->post('profile_short'),
       'profile' => $this->input->post('profile'),
       'criteria' =>$this->input->post('criteria'),
       'class' => $class,
       'n_subject_id' => $subject
        );
        $this->db->where('doi_id', $this->input->post('id_of_doi'));
        $this->db->update('doi_categories', $data);
             
    }
    public function delete_doi($id) 
    {
    		$this->db->where('doi_id', $id);
    		$this->db->delete('doi_categories');
	}

	public function get_all_class_doi($class_year, $subject_id)
	{
		$this->db->select('profile_short, profile, criteria, doi_id');
		$this->db->from('doi_categories');
		$this->db->where('n_subject_id', $subject_id);
		$this->db->where('class', $class_year);
		$this->db->order_by('doi_id');
		$q = $this->db->get();

		return $q->result_array();
	}
}


?>
