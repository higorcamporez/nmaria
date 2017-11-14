<?php


require_once '../model/MySqlModel.php';


class ControlTerapeuta  {

    public $db;

    public function __construct() {
        $this->db = new MySQLModel();
        $this->db->_tabela = "terapeutas";
    }


    public function cadastrarTerapeuta ($dados){
        return $this->db->inserir($dados);
    }

    public function excluirTerapeuta ($where){
        return $this->db->deletar($where);

    }

    public function obterTerapeutas(){
        return $this->db->buscar();
    }

    public function obterTerapeuta ($where){
        return $this->db->buscar($where, null, null, null);
    }

    public function obterCriancas($id){
        $query = "SELECT `criancas`.* FROM `crianca_terapeuta` INNER JOIN `criancas` ON `crianca_terapeuta`.`crianca_idcrianca` = `criancas`.`idCrianca`  WHERE `crianca_terapeuta`.`terapeuta_idterapeuta` = ".$id;

        return $this->db->runQuery($query);
    }

    public function obterInstitucoes($id){
        $query = "SELECT `instituicoes`.* FROM `terapeuta_instituicoes` INNER JOIN `instituicoes` ON `terapeuta_instituicoes`.`instituicao_idinstituicao` = `instituicoes`.`idInstituicao`  WHERE `terapeuta_instituicoes`.`terapeuta_idterapeuta` = ".$id;

        return $this->db->runQuery($query);
    }

    public function alterarTerapeuta ($dados, $where){
        return $this->db->atualizar($dados, $where);
        
    }


}