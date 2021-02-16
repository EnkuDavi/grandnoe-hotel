<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
        check_already_login();
		$this->load->view('login');
    }
    
    public function proses()
    {
        $post = $this->input->post(NULL, TRUE);
        if(isset($_POST['login']))
        {
            $this->load->model('user_model');
            $query = $this->user_model->login($post);
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <body></body>
            <?php
            if($query->num_rows() > 0)
            {
                $row = $query->row();
                $params = array(
                    "user_id" => $row->user_id,
                    "level" => $row->level,
                    "username" => $row->username
                );
                $this->session->set_userdata($params);
                ?>
                <script>
                    Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: 'Login Berhasil!'
                    }).then((result) => {
                        window.location ='<?= site_url('dashboard');?>';
                    })
                </script>
                <?php
            }else{
                ?>
                <script>
                    Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Login Gagal! Username atau Password salah!'
                    }).then((result) => {
                        window.location ='<?= site_url('login');?>';
                    })
                </script>
                <?php
            }
        }
    }

    public function logout()
    {
        $params = array('user_id', 'level');
        $this->session->unset_userdata($params);
        redirect('login');
    }
}
