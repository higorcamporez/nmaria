<?php


require_once '../model/MySqlModel.php';


class ControlToque  {

    public $db;

    public function __construct() {
        $this->db = new MySQLModel();
        $this->db->_tabela = "toques";
    }


    public function cadastrarToque ($dados){
        return $this->db->inserir($dados);
    }

    public function excluirToque ($where){
        return $this->db->deletar($where);

    }

    public function obterToques(){
        return $this->db->buscar();
    }

    public function obterToque ($where){
        return $this->db->buscar($where, null, null, null);
    }

    public function alterarToque ($dados, $where){
        return $this->db->atualizar($dados, $where);
        
    }


}