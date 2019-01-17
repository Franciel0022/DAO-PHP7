<?php

class Usuario {

	private $idusuario;
	private $deslogin;
	private $sessenha;
	private $dtcadastro;

	public function getIdusuario(){
         return $this->idusuario;

	}

	public function setIdusuario($value){
          $this->idusuario = $value;

	}

	public function getiIdusuario(){
         return $this->idusuario;

	}

	public function setDeslogin($value){
          $this->deslogin = $value;

	}

	public function getDeslogin(){
         return $this->deslogin;

	}

	public function setDessenha($value){
          $this->dessenha = $value;

	}

	public function getDessenha(){
         return $this->dessenha;

	}

	public function setDtcadastro($value){
          $this->dtcadastro = $value;

	}

	public function getDtcadastro(){
         return $this->dtcadastro;

	} 


	public function loadById($id){

		$sql = new Sql();

		$re = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(

                  ":ID"=>$id
		));

		if (count($re) > 0) {

			$row = $re[0];

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
		}
	}

	public function __toString(){

		return json_encode(array(
              "idusuario"=>$this->getIdusuario(),
              "deslogin"=>$this->getDeslogin(),
              "dessenha"=>$this->getDessenha(),
              "dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
		));
	}
}


?>