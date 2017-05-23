<?php 
class dao_estilo extends CI_Model{
    
    public function criarEstilo($dados_estilo){
        $insert = $this->db->insert('estilo',$dados_estilo);
        return $insert;
    }
    
    public function buscarIdNovoEstilo($idUsuario){
        $this->db->where('idUsuario',$idUsuario);
        $result_estilos = $this->db->get('estilo');
        $idNovoEstilo = $result_estilos->last_row()->idEstilo;
        return $idNovoEstilo;   
    }
    
    public function buscarUltimoAgrup($idUsuario){
        $this->db->select('idAgrup');
        $this->db->where('idUsuario',$idUsuario);
        $result_agrup = $this->db->get('agrupamento');
        
        return $result_agrup;
    }
    
    public function salvarElemento($dados_elemento){
        $insert = $this->db->insert('agrupamento',$dados_elemento);
    }
    
    public function visualizarMeusEstilos($idUsuario){
        /*BUSCAR OS ESTILOS DO USUARIO*/
        $this->db->select('idEstilo, descricao');
        $this->db->from('estilo');
        $this->db->where('idUsuario',$idUsuario);
        $result_estilos = $this->db->get();
        
        if($result_estilos->num_rows() > 0){            
            return $result_estilos;
        }else{
            return false; //não possui estilos
        }
        
    }
    
    public function visualizarElementosEstilo($campos){
        
        $this->db->select('a.*, el.descricao desc_elemento');
        $this->db->from('agrupamento a');
        $this->db->join('estilo e','a.idEstilo = e.idEstilo','inner');
        $this->db->join('elemento el','a.idElemento = el.idElemento','inner');
        $this->db->join('estrutura es','a.idEstrutura = es.idEstrutura','inner');
        $this->db->where('e.idUsuario',$campos['idUsuario']);
        $this->db->where('e.idEstilo',$campos['idEstilo']);
        $this->db->order_by('a.idAgrup','ASC');
        //$this->db->where('es.idEstrutura',$campos['idEstrutura']);
        $result_elementos = $this->db->get();

        return $result_elementos;

    }
    
    public function buscarCodificacaoElemento($campos){
        
        $this->db->select('e.descricao desc_estilo, el.descricao desc_elemento, es.idEstrutura, a.codificacao');
        $this->db->from('agrupamento a');
        $this->db->join('estilo e','a.idEstilo = e.idEstilo','inner');
        $this->db->join('elemento el','a.idElemento = el.idElemento','inner');
        $this->db->join('estrutura es','a.idEstrutura = es.idEstrutura','inner');
        $this->db->where('e.idUsuario',$campos['idUsuario']);
        $this->db->where('e.idEstilo',$campos['idEstilo']);
        $result_elementos = $this->db->get();

        return $result_elementos;

    }
    
    
}