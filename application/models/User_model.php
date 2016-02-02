<?php
class User_model extends CI_Model{
    public function validate_login()
    {
        $email = $this->input->post('email');
        $password = sha1($this->input->post('password'));

        $query = $this->db->get_where('users', array('email' => $email, 'password' => $password));
        if ($query->num_rows() == 1) 
        {
            return TRUE;
        }
        return FALSE;
    }

    public function get_user_by_email($email)
    {
        $q = $this->db->get_where('users', array('email' => $email));
        return $q->row_array();
    }

    public function get_user_info($id)
    {
        $q = $this->db->get_where('users', array('user_id' => $id));
        return $q->row_array();
    }

    public function add_admin()
    {
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $email = $this->input->post('email');
        $password = sha1($this->input->post('password'));
        $reg_date = date('Y-m-d');
        $data = array(
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        'password' => $password,
        'reg_date' => $reg_date,
        'role' => 1
        );
        if ($this->db->insert('users', $data))
        {
            return TRUE;
        }
        return FALSE;
    }

    public function add_teacher()
    {
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $password = sha1($this->input->post('password'));
        $reg_date = date('Y-m-d');
        $data = array(
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        'password' => $password,
        'reg_date' => $reg_date,
        'role' => 2
        );
        if ($this->db->insert('users', $data))
        {
            $last_id = $this->db->insert_id();
            $data2 = array('user_id' => $last_id, 'phone' => $phone);
            if ($this->db->insert('teachers', $data2)) {
                return TRUE;
            }
        }
        return FALSE;
    }

    public function update_admin($id)
    {
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $email = $this->input->post('email');

        $data = array(
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email
        );

        $password = $this->input->post('new_password');
        if (!empty($password)) {
            $data['password'] = sha1($password);
        }

        $this->db->where('user_id', $id);
        if ($this->db->update('users', $data)) {
            return TRUE;
        }
        return FALSE;
    }

    public function update_teacher($id)
    {
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');

        $data = array(
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email
        );

        $password = $this->input->post('new_password');
        if (!empty($password)) {
            $data['password'] = sha1($password);
        }

        $data2 = array('phone' => $phone);

        $this->db->where('user_id', $id);
        $this->db->update('teachers', $data2);
        $this->db->where('user_id', $id);
        if ($this->db->update('users', $data)) {
            return TRUE;
        }
        return FALSE;
    }

    public function get_all_admins()
    {
       // $q = $this->db->get_where('users', array('role' => 1));
        //return $q->result_array();
         $this->db->where('role',1);
        $this->db->where('date_delete !=','NULL');
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function get_all_teachers()
    {
        //$this->db->join('teachers', 'users.user_id = teachers.user_id');
        //$q = $this->db->get_where('users', array('role' => 2));
        //return $q->result_array();
        $this->db->select('*');
        $this->db->from('teachers');
        $this->db->join('users', 'teachers.user_id = users.user_id');
        $this->db->where('users.role',2);
        $this->db->where('teachers.date_delete !=','NULL');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function delete_admin($id)
    {
       // if($this->db->delete('users', array('user_id' => $id)))
       // {
        //    return TRUE;
       // }
       // return FALSE;
        $data=array(
            'date_delete'=>'NULL'
            );
        $this->db->where('user_id',$id);
        if($this->db->update('users', $data))
        {
            return TRUE;
        }
        return FALSE;
    }

    public function delete_teacher($id)
    {   
        //$this->db->delete('teachers', array('user_id' => $id));
       // if($this->db->delete('users', array('user_id' => $id)))
       // {
        //    return TRUE;
       // }
       // return FALSE;
         $data1=array(
            'users.date_delete'=>'NULL'
            );
        $data2=array(
            'teachers.date_delete'=>'NULL'
            );
        $this->db->where('user_id',$id);
        $this->db->update('teachers',$data2);
        $this->db->where('user_id',$id);
        if($this->db->update('users',$data1))
        {
            return TRUE;
        }
        return FALSE;
    }

    public function check_user_exist($id)
    {
        $q = $this->db->get_where('users', array('user_id' => $id));
        if ($q->num_rows() == 1) 
        {
            return TRUE;
        }
        return FALSE;
    }

    public function get_admin_info($id)
    {
        $q = $this->db->get_where('users', array('user_id' => $id));
        return $q->row_array();
    }

    public function get_teacher_info($id)
    {   
        $this->db->join('teachers', 'users.user_id = teachers.user_id');
        $q = $this->db->get_where('users', array('users.user_id' => $id));
        return $q->row_array();
    }
}
