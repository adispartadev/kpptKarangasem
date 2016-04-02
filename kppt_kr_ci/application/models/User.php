<?php

/**
 * Created by PhpStorm.
 * User: spartan
 * Date: 24/02/16
 * Time: 13:05
 */
class User extends CI_Model
{
    public function login($username, $password){
        $this->db->from('pengguna');
        $this->db->where('username', $username);
        $this->db->where('passwd', MD5($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function update_login_time($id_pengguna){
        $data = array(
            'last_login' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_pengguna', $id_pengguna);
        return $this->db->update('pengguna', $data);
    }

    public function checkPassword($id_pengguna, $password){
        $this->db->from('pengguna');
        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->where('passwd', $password);
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }

    public function register(){
        $data = array(
            'username' => 'admin',
            'passwd' => md5('admin'),
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            'id_jabatan' => 4
        );
        $this->db->insert('pengguna', $data);
    }
}
