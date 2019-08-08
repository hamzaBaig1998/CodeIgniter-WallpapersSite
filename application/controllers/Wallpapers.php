<?php
    class Wallpapers extends CI_Controller{
        public function view($offset=0){
            $data['title']="WallpaperSite";
            //Pagination
            $config['base_url'] = base_url().'/wallpapers/view';
            $config['total_rows'] = $this->db->count_all('wallpapers');
            $config['per_page'] = 9;
            $config['uri_segment']=3;
            $config['attributes']=array('class'=>'pagination');

            $this->pagination->initialize($config);
            
            $data['wallpapers']=$this->wallpaper_model->loadWallpapers($config['per_page'],$offset);
            $this->viewWallpapers($data);
        }
        public function viewWallpapers($data){
            $data['title']="WallpaperSite";
            $this->load->view('templates/header',$data);
            $this->load->view('Wallpaper/view');
            $this->load->view('templates/footer');
        }
        public function download($id){
            $data['title']="Download";
            $filename=$this->wallpaper_model->get_filename($id);
            $this->wallpaper_model->update_download_count($filename);
            force_download(APPPATH.'../assets/images/'.$filename,NULL);
            $this->viewWallpapers($data);
        }
        public function filter($category,$offset=0){
            $config['base_url'] = base_url().'/wallpapers/filter/'.$category;
            $config['total_rows'] = $this->wallpaper_model->count_rows('category',$category);
            $config['per_page'] = 9;
            $config['uri_segment']=4;
            $config['attributes']=array('class'=>'pagination');


            $this->pagination->initialize($config);
            
            $data['title']="WallpaperSite";
            $data['wallpapers']=$this->wallpaper_model->filterWallpapers($category,$config['per_page'],$offset);
            $this->viewWallpapers($data);
        }
        public function search($offset=0){
            $query=$this->input->post('query');
            
            $config['base_url'] = base_url().'/wallpapers/search/';
            $config['total_rows'] = $this->wallpaper_model->search_count($query);
            $config['per_page'] = 6;
            $config['uri_segment']=3;
            $config['attributes']=array('class'=>'pagination');


            $this->pagination->initialize($config);
            
            $result['wallpapers']=$this->wallpaper_model->search($query,$config['per_page'],$offset);
            $this->viewWallpapers($result);
           
        }
        public function like($id){
            $query=$this->wallpaper_model->like($id);
            redirect('wallpapers/view');
        }
    }
?>