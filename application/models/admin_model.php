<?php
    class admin_model extends CI_Model{
        public function __construct()
        {
            $this->load->database();
        }        
        public function addWallpaper($wallpaper_name){
            $wallpaper=array(
                'name'=>$this->input->post('name'),
                'category'=>$this->input->post('category'),
                'device'=>$this->input->post('device'),
                'filename'=>$wallpaper_name
            );
            $this->db->insert('wallpapers',$wallpaper);
        }
        public function login($username,$password){
            $this->db->where('username',$username);
            $this->db->where('password',$password);
            $result=$this->db->get('admins');
            if($result->num_rows()==1){
                return $result->row(0)->id;
            }else{
                return FALSE;
            }
        }
    }

?>