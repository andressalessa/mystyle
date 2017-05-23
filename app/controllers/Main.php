<?php
class Main extends CI_Controller{
    public function index(){
        if($this->session->userdata('logged_in')){
            $menu = $this->input->get('menu');
            $elem = $this->input->get('elem');
            
            if(($menu == NULL || $menu == 'criar_estilo') && $elem == NULL){
                $data['estrutura_content'] = 'estilos/criar_estilo';
                $this->load->view('layouts/estrutura',$data);
            }
            
            if($menu == 'meus_estilos'){
                redirect('estilos/visualizarMeusEstilos');
            }
            
            if($elem == 'button'){
                $data['estrutura_content'] = 'estilos/elem_button';
                $this->load->view('layouts/estrutura',$data);
            }
            
        }else{
            $data['login'] = 'usuarios/login';
            $data['cad_usuario'] = 'usuarios/cad_usuario';
            $data['main_content'] = 'home';
            $this->load->view('layouts/home',$data);
        }
        
    }
    
    public function vetorButton(){
        $desc_prop_box1 = array(
            'size' => 'Size',
            'font' => 'Font',
            'border' => 'Border',
            'colors' => 'Colors',
            'shadow_light' => 'Shadow/Light'
        );
        
        /*'width' => 'width',
            'height' => 'height',
            'font_size' => 'font-size',
            'font_family' => 'font-familly',
            'font_style' => 'font-style',
            'font_weigth' => 'font-weight',
            'border_radius' => 'border_radius',
            'border_width' => 'border_width',
            'border_style' => 'border_style'*/
        
        echo $desc_prop_box1;
    }
    
}