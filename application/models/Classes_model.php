<?php
class Classes_model extends CI_Model{
	public function get_n_class_classes()
	{
		$query=$this->db->get('n_class_classes');
		return $query->result_array();
	}
	public function get_leader_teacher()
	{
		$this->db->select('*');
		$this->db->from('teachers');
		$this->db->join('users', 'teachers.user_id = users.user_id');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_n_year()
	{
		$query=$this->db->get('n_years');
		return $query->result_array();
	}
	public function get_n_class()
	{
		$query=$this->db->get('n_class');
		return $query->result_array();
	}
	public function insert_new_class()
	{
		$class=$this->input->post('class');
		$cclass=$this->input->post('classs');
		$school_year=$this->input->post('school_year');
		$leader_teacher=$this->input->post('leader_teacher');
		$data= array(
			'class'=> $class+1,
			'cclass'=> $cclass+1  ,
			'school_year'=> $school_year+1 ,
			'leader_teacher'=> $leader_teacher+1
		);
		$this->db->insert('classes',$data);
		$last_id = $this->db->insert_id();
    	
    	//echo $last_id;
    	$_SESSION['last_id']=$last_id;
	}
	public function insert_new_students()
	{
		for($i=0;$i<$_SESSION['num'];$i++)
		{
			$data=array(
				'class_id'=>$_SESSION['last_id'],
				'first_name'=>$this->input->post("first_name[$i]"),
				'last_name'=>$this->input->post("last_name[$i]"),
				'number'=>$this->input->post("number_in_class[$i]")
			);
			$this->db->insert('students',$data);
		}
	}
	public function show_classes()
	{
	$this->db->select('*');
		$this->db->from('classes');
		$this->db->join('n_class', 'classes.class = n_class.n_class');
		$this->db->join('n_years', 'classes.school_year = n_years.year_id');
		$this->db->join('n_class_classes', 'classes.cclass = n_class_classes.class_class_id');
		$this->db->where('classes.date_delete !=', 'NULL');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function delete_class($class_id)
	{
		$data = array(
			'date_delete'=>'NULL'
			);
		$this->db->where('class_id', $class_id);
		$this->db->update('classes', $data); 
	}

	public function get_teach_classes($teacher_id)
	{
		$this->db->select('n_subject.subject_type, classes.class, n_class_classes.class_class, 
			class_teacher.class_teacher_id, classes.class_id, n_subject.subject_id');
		$this->db->from('class_teacher');
		$this->db->join('classes', 'class_teacher.class_id = classes.class_id');
		$this->db->join('n_subject', 'class_teacher.n_subject_id = n_subject.subject_id');
		$this->db->join('n_class_classes', 'classes.cclass = n_class_classes.class_class_id');
		//TODO - add school year restriction
		$this->db->where('teacher_user_id', $teacher_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function show_students_info($class_id)
	{
		$this->db->select('*');
		$this->db->from('students');
		$this->db->join('classes','students.class_id=classes.class_id');
		$this->db->where('students.class_id', $class_id);
		$this->db->where('students.date_delete !=', 'NULL');
		$query=$this->db->get();
		return $query->result_array();
	}

	public function single_student_info($student_id)
	{
		$this->db->select('*');
		$this->db->from('classes');
		$this->db->join('students', 'classes.class_id = students.class_id');
		$this->db->join('teachers', 'classes.leader_teacher = teachers.teacher_id');
		$this->db->join('n_class', 'classes.class = n_class.n_class');
		$this->db->join('n_class_classes', 'classes.cclass = n_class_classes.class_class_id');
		$this->db->where ('student_id',$student_id);
		$query=$this->db->get();
		return $query->row_array();
	}
	public function delete_student($student_id)
	{
		$data = array(
			'date_delete'=>'NULL'
			);
		$this->db->where('student_id', $student_id);
		$this->db->update('students', $data); 
	}
	public function update_student()
	{
		$data = array(
               'first_name' => $this->input->post('first_name'),
               'last_name' => $this->input->post('last_name'),
               'number' => $this->input->post('number') 
            );

	$this->db->where('student_id', $this->input->post('id_of_student'));
	$this->db->update('students', $data); 
	}
	public function show_student_behaviour($student_id)
	{
		$this->db->select('*');
		$this->db->from('grades_behaviour');
		$this->db->join('n_behaviour', 'grades_behaviour.behaviour_id = n_behaviour.behaviour_id');
		$this->db->join('students', 'grades_behaviour.student_id = students.student_id');
		$this->db->where('students.student_id', $student_id);
		$query = $this->db->get();
		return $query->result_array();

	}
	public function behaviour_info($behaviour_id)
	{
		$this->db->select('*');
		$this->db->from('grades_behaviour');
		$this->db->join('n_behaviour', 'grades_behaviour.behaviour_id = n_behaviour.behaviour_id');
		$this->db->join('students', 'grades_behaviour.student_id = students.student_id');
		$this->db->where('grade_behaviour_id', $behaviour_id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function update_behaviour()
	{
		$data=array(
			'grade'=> $this->input->post('grade'),
			'note'=> $this->input->post('note')
			);
		$this->db->where('grade_behaviour_id',$this->input->post('behaviour_id'));
		$this->db->update('grades_behaviour',$data);
	}
	public function add_new_behaviour_name()
	{
		$data=array(
			'behaviour'=>$this->input->post('behaviour')
			);
		$this->db->insert('n_behaviour',$data);
	}
}


?>
