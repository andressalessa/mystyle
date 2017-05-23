<?php
class Estilos extends CI_Controller{
    
    public function criarEstilo(){
        date_default_timezone_set('America/Sao_Paulo');
        $dtCriacao = date('Y-m-d');
        
        $dados_estilo = array(
        'idUsuario' => $this->session->userdata('idUsuario'),
        'descricao' => $this->input->post('descEstilo'),
        'tipoEstilo' => $this->input->post('rdTipo'),
        'dtCriacao' => $dtCriacao
        );
        
        /*echo ' '.$this->input->post('descEstilo');
        $recebe = $this->dao_estilo->criarEstilo($dados_estilo);
        echo ' '.$recebe;
        $idNovoEstilo = $this->dao_estilo->buscarIdNovoEstilo($this->session->userdata('idUsuario'));
        echo ' '.$idNovoEstilo;*/
        
        if($this->dao_estilo->criarEstilo($dados_estilo)){ 
            $data['idNovoEstilo'] = $this->dao_estilo->buscarIdNovoEstilo($this->session->userdata('idUsuario')); //buscar id do novo estilo
            $this->session->set_userdata('idEstilo',$data['idNovoEstilo']);
            $data['estrutura_content'] = 'estilos/criar_elemento';
            $this->load->view('layouts/estrutura', $data);
            $this->session->set_flashdata('criado_estilo','Estilo criado com sucesso!');
        }
    }
    
    public function buscarUltimoAgrup(){
        $result_agrup = $this->dao_estilo->buscarUltimoAgrup($this->session->userdata('idUsuario'));
        
        $last_row = $result_agrup->last_row();
        
        return $result_agrup->row[$last_row];
    }
    
    public function salvarElemento(){

        $ultIdAgrup = 1;           
        $this->session->set_userdata('ultIdAgrup', $ultIdAgrup);
        $idElemento = $this->input->post('idElemento');
        $idEstrutura = $this->input->post('idEstrutura');
        $idEstilo = $this->session->userdata('idEstilo');
        $codificacao = $this->input->post('codificacao');
        
        $campos = array(
            'idAgrup' => $ultIdAgrup,
            'idElemento' => $idElemento,
            'idEstrutura' => $idEstrutura,
            'idEstilo' => $idEstilo,
            'codificacao' => $codificacao
        );
        
        if($this->dao_estilo->salvarElemento($campos)){
            echo 'sucesso';
        }
        
    }
    
    public function visualizarMeusEstilos(){
        $idUsuario = $this->session->userdata('idUsuario');
        
        $result_estilos = $this->dao_estilo->visualizarMeusEstilos($idUsuario);
        
        if($result_estilos){
            $texto = '';
            
            foreach ($result_estilos->result() as $linha){
                $mensagem = 'mensagem';
                $texto .=  '<div data-id='.$linha->idEstilo.' class="listaDadosMeusEstilos"><a href="#">'.$linha->descricao.'</a></div>';
            }
           
            $data['estrutura_content'] = 'estilos/meus_estilos';
            $data['texto'] = $texto;
            $data['elementos'] = '';
            $data['menu'] = $this->input->post('menu');
            $this->load->view('layouts/estrutura',$data);
        }
    }
    
    public function visualizarElementosEstilo(){
        
        $this->session->set_userdata('idEstilo', $this->input->post('idEstilo'));
        
        $campos = array(        
        'idUsuario' => $this->session->userdata('idUsuario'),
        'idEstilo' => $this->session->userdata('idEstilo')
        //'idEstrutura' => 1 //HTML pra buscar apenas um registro por agrupamento de elemento
        );
        
        
        $result_elementos = $this->dao_estilo->visualizarElementosEstilo($campos);
        //echo 'entrou';
        
        if($result_elementos->num_rows() > 0){
            $elementos = '';
            $html = array();
            $css = array();
            $js =  array();
            $abas = array();
            $num_linha = 0;
            $num_linha2 = 0;
            $agrup = 0;
            $css2 = '';
            $html2 = '';
            
            
            foreach ($result_elementos->result() as $linha){ 
                if($num_linha2 == 0){
                    $agrup = $linha->idAgrup;
                }
                
                $html[$agrup] = '<!---->';
                $css[$agrup] = '/**/';
                
                if($linha->idEstrutura == 1 && $agrup == $linha->idAgrup){ 
                    $html[$agrup] = $agrup.' '.htmlspecialchars($linha->codificacao);
                }elseif($linha->idEstrutura == 2 && $agrup == $linha->idAgrup){ 
                    $css[$agrup] = $agrup.' '.$linha->codificacao;
                }else{
                    $js[$agrup] = $agrup.' '.$linha->codificacao;
                }
                
                /*echo $css[$num_linha];
                
                if($linha->idEstrutura == 1){
                $num_linha = $num_linha + 1; 
                }
                }*/
                
                
                /*$abas['inicio'] = 
                $abas['meio'] = 
                $abas[''] = 
                $abas[''] = */
                
                
                
                if($linha->idEstrutura == 1){

                    if($num_linha % 2 == 0){ 
                        $parOuImpar = 'par';
                    }else{
                        $parOuImpar = 'impar';
                    }
                    
                    $elementos .=   '<tr class="'.$parOuImpar.'">'
                                        .'<td>'
                                            .'<a href="#">'.$linha->desc_elemento.'</a>'
                                        .'</td>'
                                        .'<td class="btnMostraElementos">'
                                            .'<a href="#" id="editar"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" title="Editar"></i></a>'
                                        .'</td>'
                                        .'<td class="btnMostraElementos">'
                                            .'<a href="#" id="visualizar"><i class="fa fa-eye fa-2x" aria-hidden="true" title="Visualizar"></i></a>'
                                        .'</td>'
                                        .'<td class="btnMostraElementos" id="btnCodigo">'
                                            .'<a href="#codigo-popup'.$agrup.'" class="open-popup-link"><i class="fa fa-code fa-2x" aria-hidden="true" title="Código"></i></i></a>'
                                        .'</td>'
                                    .'</tr>';
                    
                    
                    
                    $num_linha = $num_linha + 1;
                }
                
                
                
                if($agrup != $linha->idAgrup){                    
                    
                    $abas[$agrup] =   '<div id="codigo-popup'.$agrup.'" class="white-popup mfp-hide">'
                                            .'<div class="tabs-container">'
                                                .'<input type="radio" name="tabs" class="tabs" id="tab-html" checked>'
                                                .'<label for="tab-html">HTML</label>'
                                                .'<div>'
                                                    .'<p>$html'.$html[$agrup].'</p>'
                                                .'</div>'
                                                .'<input type="radio" name="tabs" class="tabs" id="tab-css">'
                                                .'<label for="tab-css">CSS</label>'
                                                .'<div>'
                                                    .'<p>$css'.$css[$agrup].'</p>'
                                                .'</div>'
                                            .'</div>'
                                        .'</div>';
                    
                    /*$html = '';
                    $css = '';
                    $js =  '';*/
                    
                    $agrup = $linha->idAgrup;
                }
                $num_linha2++;
            }
            
            $abas[$agrup] =   '<div id="codigo-popup'.$agrup.'" class="white-popup mfp-hide">'
                                .'<div class="tabs-container">'
                                    .'<input type="radio" name="tabs" class="tabs" id="tab-html" checked>'
                                    .'<label for="tab-html">HTML</label>'
                                    .'<div>'
                                        .'<p>$html'.$html[$agrup].'</p>'
                                    .'</div>'
                                    .'<input type="radio" name="tabs" class="tabs" id="tab-css">'
                                    .'<label for="tab-css">CSS</label>'
                                    .'<div>'
                                        .'<p>$css'.$css[$agrup].'</p>'
                                    .'</div>'
                                .'</div>'
                            .'</div>';
            
            $script = "<script>$('.open-popup-link').magnificPopup({type:'inline', midClick: true });</script>";
            
            echo $elementos.implode('', $abas).$script;
        }
    }
    
    public function buscarCodificacaoElemento(){
        $campos = array(        
        'idUsuario' => $this->session->userdata('idUsuario'),
        'idEstilo' => $this->session->userdata('idEstilo')
        //'idEstrutura' => 1 //HTML pra buscar apenas um registro por agrupamento de elemento
        );
        
        $result_elementos = $this->dao_estilo->buscarCodificacaoElemento($campos);
        
        if($result_elementos->num_rows() > 0){
            $elementos = '';
            $num_linha = 0;
            /*foreach ($result_elementos->result() as $linha){
                if($linha->idEstrutura == 1){
                    $num_linha .= $num_linha + 1;

                    if($num_linha % 2 == 0){ 
                        $parOuImpar = 'par';
                    }else{
                        $parOuImpar = 'impar';
                    }

                    $elementos .=   '<tr class="'.$parOuImpar.'">'
                                        .'<td>'
                                            .'<a href="#">'.$linha->desc_elemento.'</a>'
                                        .'</td>'
                                        .'<td class="btnMostraElementos">'
                                            .'<a href="#"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" title="Editar"></i></a>'
                                        .'</td>'
                                        .'<td class="btnMostraElementos">'
                                            .'<a href="#"><i class="fa fa-eye fa-2x" aria-hidden="true" title="Visualizar"></i></a>'
                                        .'</td>'
                                        .'<td class="btnMostraElementos">'
                                            .'<a href="#"><i class="fa fa-code fa-2x" aria-hidden="true" title="Código"></i></i></a>'
                                        .'</td>'
                                    .'</tr>';
                }*/
            }
            echo $elementos;
    }
    
    public function visualizarElementosNovoEstilo(){
        
    }
    
    public function visualizarRankingEstilos(){
        
    }
}