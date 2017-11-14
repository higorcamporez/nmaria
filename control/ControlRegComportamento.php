<?php


require_once '../model/MySqlModel.php';


class ControlRegComportamento {

    public $db;

    public function __construct() {
        $this->db = new MySQLModel();
        $this->db->_tabela = "registroscomportamentos";
    }


    public function cadastrarRegComportamento($dados){
        return $this->db->inserir($dados);
    }

    public function excluirRegComportamento($where){
        return $this->db->deletar($where);

    }

    public function obterRegComportamentos(){
        return $this->db->buscar();
    }

    public function obterRegComportamento($where){
        return $this->db->buscar($where, null, null, null);
    }

    public function alterarRegComportamento($dados, $where){
        return $this->db->atualizar($dados, $where);
        
    }

    public function obterUltimoRegComportamento(){
        
        $query = "SELECT * FROM registroscomportamentos ORDER BY idregistroComportamento DESC LIMIT 1";
        return $this->db->runQuery($query);
    }


}