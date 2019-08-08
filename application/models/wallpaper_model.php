<?php
    class Wallpaper_model extends CI_Model{
        public function __construct()
        {
            $this->load->database();
        }
        public function loadWallpapers($limit,$offset){
            $this->db->order_by('created_at','DESC');
            $this->db->limit($limit,$offset);
            $query=$this->db->get('wallpapers');
            return $query->result_array();
        }
        public function filterWallpapers($category,$limit,$offset){
            $this->db->order_by('likes','DESC');
            $this->db->limit($limit,$offset);
            $query=$this->db->get_where('wallpapers',array('category'=>$category));
            return $query->result_array();
        }
        public function search($name,$limit,$offset){
//            $query=$this->db->get_where('wallpapers',array('name'=>$query));
//            $this->db->limit($limit,$offset);
            $query=$this->db->query('SELECT * FROM wallpapers WHERE name LIKE "%'.$name.'%" LIMIT '.$limit.' OFFSET '.$offset);
            return $query->result_array();
        }
        public function search_count($name){
            $query=$this->db->query('SELECT * FROM wallpapers WHERE name LIKE "%'.$name.'%"');
            return $query->num_rows();
        }
        public function count_rows($dbRow,$value){
           $query=$this->db->get_where('wallpapers',array($dbRow=>$value));
            return $query->num_rows();
        }
        public function get_likes($id){
            $wallpaper=$this->db->get_where('wallpapers',array('id'=>$id));
            return $wallpaper->row_array()['likes'];
        }
        public function get_filename($id){
            $wallpaper=$this->db->get_where('wallpapers',array('id'=>$id));
            return $wallpaper->row_array()['filename'];
        }
         public function get_downloads($filename){
            $wallpaper=$this->db->get_where('wallpapers',array('filename'=>$filename));
            return $wallpaper->row_array()['downloads'];
        }
        public function like($id){
            $likes=(int)$this->get_likes($id);
            $likes++;
            $this->db->where('id',$id);
            $query=$this->db->update('wallpapers',array('likes'=>$likes));
        }
        public function update_download_count($filename){
            $downloads=$this->get_downloads($filename);
            $downloads++;
            $this->db->where('filename',$filename);
            $this->db->update('wallpapers',array('downloads'=>$downloads));
        }
    }
?>