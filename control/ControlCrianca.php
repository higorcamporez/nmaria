<?php


require_once '../model/MySqlModel.php';


class ControlCrianca  {

    public $db;

    public function __construct() {
        $this->db = new MySQLModel();
        $this->db->_tabela = "criancas";
    }


    public function cadastrarCrianca ($dados){
        return $this->db->inserir($dados);
    }

    public function excluirCrianca ($where){
        return $this->db->deletar($where);

    }

    public function obterCriancas(){
        return $this->db->buscar();
    }

    public function obterCrianca ($where){
        return $this->db->buscar($where, null, null, null);
    }

    public function alterarCrianca ($dados, $where){
        return $this->db->atualizar($dados, $where);
        
    }


}