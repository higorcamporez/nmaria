<?php


require_once '../model/MySqlModel.php';


class ControlRegFalaRosto {

    public $db;

    public function __construct() {
        $this->db = new MySQLModel();
        $this->db->_tabela = "registrosFalaRosto";
    }


    public function cadastrarRegFalaRosto($dados){
        return $this->db->inserir($dados);
    }

    public function excluirRegFalaRosto($where){
        return $this->db->deletar($where);

    }

    public function obterRegFalaRostos(){
        return $this->db->buscar();
    }

    public function obterRegFalaRosto($where){
        return $this->db->buscar($where, null, null, null);
    }

    public function alterarRegFalaRosto($dados, $where){
        return $this->db->atualizar($dados, $where);
        
    }

    public function obterUltimoRegFalaRosto(){
        
        $query = "SELECT * FROM registrosFalaRosto ORDER BY idRegistrosFalaRosto DESC LIMIT 1";
        return $this->db->runQuery($query);
    }


}