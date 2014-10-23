<?php 
class Blog extends CI_controller{

	public function __construct()
	{
            parent::__construct();//should call
            // echo "contructor called </br>";
        }

        public function index(){
		// echo "welcome";
        	$data['name'] = "john";
		//load view and pass data 
        	$this->load->view('blog/index',$data);
        }
        public function show_param($param1,$param2){
        	echo 'param 1 -> ' .$param1.' and Param2 -> '.$param2;
		//handle errors - with default param
		// chnage to show_param($param1='',$param2='')

        }
        public function show_segment(){

        	echo $this->uri->segment(1).'/';
        	echo $this->uri->segment(2).'/';
        	echo $this->uri->segment(3).'/';
        	echo $this->uri->segment(4);
        	echo '<br>';
        	echo "Total ".$this->uri->total_segments().' Segments';

        }
        public function call_model(){
		//loads model
        	$this->load->model('blog_model');
        	echo $this->blog_model->insert();

        }
        public function load_library(){
        	$prefs = array (
        		'show_next_prev'  => TRUE,
        		'next_prev_url'   => 'your function url'
        		);
        	$this->load->library('calendar', $prefs);
        	echo $this->calendar->generate();

		// load custom library
        	$this->load->library('time');
        	echo "Now time is : ";
        	echo $this->time->now();
        }
        public function form(){
        	$this->load->helper('form');
        	$this->load->view('blog/form');


        } 
        public function form_action(){
        	$this->load->library('form_validation');
        	$this->form_validation->set_rules('username', 'Username', 'required|valid_email');
        	$this->form_validation->set_rules('password', 'Password', 'required');
        	if ($this->form_validation->run() == FALSE)
        	{
        			$this->load->view('blog/form');
        	}
        	else
        	{
        		echo "username : ".$this->input->post('username');
        		echo "<br>";
        		echo "password : ".$this->input->post('password');
        	}
        	

        }

        public function upload(){

        	$config['upload_path'] = 'uploads/';
        	$config['allowed_types'] = 'gif|jpg|png';
        	//$config['max_size']	= '100';
        	//$config['max_width'] = '1024';
        	//	$config['max_height'] = '768';

        	$this->load->library('upload', $config);
			// Alternately you ca set preferences by calling the initialize function. Useful if you auto-load the class:
        	//$this->upload->initialize($config);

        	$file = $this->upload->do_upload('file');
        	var_dump($file);
        	echo $this->upload->display_errors();
        	var_dump($this->upload->data());
        }



    }
    ?>