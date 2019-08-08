<?php 
    class Admins extends CI_Controller{
        public function addAdmin(){
            
        }
        public function editAdmin(){

        }
        public function removeAdmin(){

        }
        public function login(){
            $data['title']="Login";
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required');
            if($this->form_validation->run()===FALSE){
                $this->load->view('templates/header',$data);
                $this->load->view('admin/login');
                $this->load->view('templates/footer');
            }else{
                $username=$this->input->post('username');
                $password=$this->input->post('password');
                $user_id=$this->admin_model->login($username,$password);
                if($user_id){
                    $admin_data=array(
                        'username'=>$username,
                        'user_id'=>$user_id,
                        'logged_in'=>true
                    );
                    $this->session->set_userdata($admin_data);
                    $this->session->set_flashdata('admin_loggedin','You are now logged in');
                    redirect('wallpapers');
                }else{
                    
                }
            }
        }
        public function logout(){
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('logged_in');
            $this->session->set_flashdata('user_log_out','You are now logged out!');

            redirect('admins/login');
        }
        public function addWallpapers(){
            if(!$this->session->userdata('logged_in')){
                redirect('admins/login');
            }
            $data['title']="Add wallpaper";
            $this->load->view('templates/header',$data);
            $this->load->view('Admin/addWallpaper');
            $this->load->view('templates/footer');
        }
        public function insertWallpaper(){
            if(!$this->session->userdata('logged_in')){
                redirect('admins/login');
            }
            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('category','Category','required');
            $this->form_validation->set_rules('device','Device','required');

            if($this->form_validation->run()===FALSE){
                $title="Upload Wallpaper";
                $this->load->view('templates/header',$title);
                $this->load->view('Admin/addWallpaper');
                $this->load->view('templates/footer');
            }else{
                //Upload Image
                $config['upload_path']='./assets/images';
                $config['allowed_types']='jpg|png|gif|jpeg';
                $config['max_size']='15048000';
                // $config['max_width']='15000';
                // $config['max_height']='15000';

                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('userfile')){
                    $errors=array('error'=>$this->upload ->display_errors());
                    $wallpaper_name='noimage.jpg';
                }else{
                    $data=array('upload_data'=>$this->upload->data());
                    $wallpaper_name=$_FILES['userfile']['name'];
                }
                $this->admin_model->addWallpaper($wallpaper_name);
                redirect('Wallpapers/view');
            }
        }

    }
?>