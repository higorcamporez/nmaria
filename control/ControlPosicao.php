<?php


require_once '../model/MySqlModel.php';


class ControlPosicao {

    public $db;

    public function __construct() {
        $this->db = new MySQLModel();
        $this->db->_tabela = "registroposicoes";
    }


    public function cadastrarPosicao($dados){
        return $this->db->inserir($dados);
    }

    public function excluirPosicao($where){
        return $this->db->deletar($where);

    }

    public function obterPosicoes(){
        return $this->db->buscar();
    }

    public function obterPosicao($where){
        return $this->db->buscar($where, null, null, null);
    }

    public function alterarPosicao($dados, $where){
        return $this->db->atualizar($dados, $where);
        
    }


}