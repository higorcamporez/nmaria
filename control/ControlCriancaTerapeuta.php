<?php


require_once '../model/MySqlModel.php';


class ControlCriancaTerapeuta  {

    public $db;

    public function __construct() {
        $this->db = new MySQLModel();
        $this->db->_tabela = "crianca_terapeuta";
    }


    public function cadastrarCriancaTerapeuta ($dados){
        return $this->db->inserir($dados);
    }

    public function excluirCriancaTerapeuta ($where){
        return $this->db->deletar($where);

    }

    public function obterCriancaTerapeutas(){
        return $this->db->buscar();
    }

    public function obterCriancaTerapeuta ($where){
        return $this->db->buscar($where, null, null, null);
    }

    public function alterarCriancaTerapeuta ($dados, $where){
        return $this->db->atualizar($dados, $where);
        
    }


}