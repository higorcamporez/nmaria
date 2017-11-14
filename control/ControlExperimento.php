<?php


require_once '../model/MySqlModel.php';


class ControlExperimento  {

    public $db;

    public function __construct() {
        $this->db = new MySQLModel();
        $this->db->_tabela = "experimentos";
    }


    public function cadastrarExperimento ($dados){
        return $this->db->inserir($dados);
    }

    public function excluirExperimento ($where){
        return $this->db->deletar($where);

    }

    public function obterExperimentos(){
        return $this->db->buscar();
    }

    public function obterExperimento ($where){
        return $this->db->buscar($where, null, null, null);
    }

    public function alterarExperimento ($dados, $where){
        return $this->db->atualizar($dados, $where);
        
    }


}