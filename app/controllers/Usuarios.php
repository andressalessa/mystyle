<?php
class Usuarios extends CI_Controller{
    
    public function cadastrarUsuario(){
                
        /*$this->form_validation->set_rules('nomeCad', 'Nome Completo', 'trim|required|max_lenght[50]|min_lenght[2]|xss_clean');
        $this->form_validation->set_rules('emailCad', 'E-mail', 'trim|required|max_lenght[80]|min_lenght[5]|xss_clean|valid_email');
        $this->form_validation->set_rules('senhaCad', 'Senha', 'trim|required|max_lenght[8]|min_lenght[1]|xss_clean');*/
        
        /*if($this->form_validation->run() == FALSE){
            $data['main_content'] = 'main';
            $this->load->view('layouts/main', $data);
        }else{
            if($this->dao_usuario->cadastrarUsuario()){
                $this->session->set_flashdata('cadastrado','Cadastrado com sucesso!');
                redirect('layouts/main');
            }
        }*/
        /*VER ESSA TITICA*/
        if($this->dao_usuario->cadastrarUsuario()){
            $this->session->set_flashdata('cadastrado','Cadastrado com sucesso!');
            $data['main_content'] = 'home';
            $this->load->view('layouts/home', $data);
        }
    }
    
    public function login(){
        /*Pega do formulario*/                
        $email = $this->input->post('emailLogin');
        $senha = $this->input->post('senhaLogin');
        
        /*Pega o resultado do select*/
        $result_login = $this->dao_usuario->login($email, $senha);
        
        if($result_login->num_rows() > 0){
            
            foreach($result_login->result() as $linha ){
                $dados_usuario = array(
                    'idUsuario'   => $linha->idUsuario,
                    'nomeUsuario' => $linha->nome,
                    'email'       => $linha->email,
                    'logged_in'   => true
                );
                $this->session->set_userdata($dados_usuario);
            }
            redirect('main');
        }else{
            echo 'sem resultado';
        }
        
    }
    
    public function logout(){
         //Unset dados usuario
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('idUsuario');
        $this->session->unset_userdata('nomeUsuario');
        $this->session->unset_userdata('email');
        $this->session->sess_destroy();
        
         //Enviar msg
        $this->session->set_flashdata('logged_out', 'Sessão encerrada.');
        redirect('main/index');
    }
    
}
