<?php 
class dao_usuario extends CI_Model{
    
    public function cadastrarUsuario(){
        $senha_cript = md5($this->input->post('senhaCad'));
        date_default_timezone_set('America/Sao_Paulo');
        $dtCadastro = date('Y-m-d H');
        
        $campos = array(
        'idPerfilUsuario' => 1,
        'nome'            => $this->input->post('nomeCad'),
        'email'           => $this->input->post('emailCad'),
        'senha'           => $senha_cript,
        'dtCadastro'      => $dtCadastro
        );
        
        $insert = $this->db->insert('usuario',$campos);
        return $insert;
    }
    
    public function login($email, $senha){
        $senha_cript = md5($senha);
        
        $this->db->select('idUsuario, nome, email');
        $this->db->from('usuario');
        $this->db->where('email', $email);
        $this->db->where('senha', $senha_cript);
        $result_login = $this->db->get();
        
        return $result_login;
                
        /*$dados = array(
        'id_usuario'   => $valores->idUsuario,
        'nome_usuario' => $valores->nome,
        'e_mail'       => $valores->email
        );
        
        return $dados;*/
        
        /*Procura email se existe*/
        /*$this->db->select('idUsuario, nome, email');
        $this->db->from('usuario');
        $this->db->where('email', $email);
        $result = $this->db->get();
        
        if($result->num_rows() == 1){
            /*Busca o email e a senha
            $this->db->select('idUsuario, nome, email');
            $this->db->from('usuario');
            $this->db->where('email', $email);
            $this->db->where('senha', $senha_cript);
            $result = $this->db->get();
            
            if($result->num_rows() == 1){
                $valores = $result->row();
                
                $dados = array(
                'id_usuario'   => $valores->idUsuario,
                'nome_usuario' => $valores->nome,
                'e_mail'       => $valores->email
                );
                
                return $dados;
            }else{
                return 'senha_incorreta';
            }
            
        } else {
            return 'email_incorreto';
        }*/
        
    }
    
}