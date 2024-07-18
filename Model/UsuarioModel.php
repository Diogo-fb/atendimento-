<?php 

    class UsuarioModel{

        protected $id;
        protected $idPerfil;
        protected $nomeUsuario;
        protected $telefoneCelular;
        protected $emailUsuario;
        protected $senhaUsuario;
        protected $dataCadastro;

        function __construct($id, $nomeUsuario, $idPerfil, $telefoneCelular, $emailUsuario, $senhaUsuario, $dataCadastro = null)
        {
            $this->id = $id;
            $this->nomeUsuario= $nomeUsuario;
            $this->idPerfil = $idPerfil;
            $this->telefoneCelular = $telefoneCelular;
            $this->emailUsuario =  $emailUsuario;
            $this->senhaUsuario = $senhaUsuario;
            $this->dataCadastro = $dataCadastro ? $dataCadastro : date('Y-m-d H-i-s');
           
        }

        function cadastraUsuario(UsuarioModel $dao)
        {
            include_once "../DAO/UsuarioDAO.php";
            $dao = new UsuarioDAO();
            $dao->cadastraUsuario($this);
        }

        public static function listarUsuario(){
            include_once "../DAO/UsuarioDAO.php";
            $dao = new UsuarioDAO();
            return $dao->listarUsuario();
        }

        public static function buscarPorId($idUsuario) {
            $dao = new UsuarioDAO();
            return $dao->buscarPorId($idUsuario);
        }
    
        public function alterar() {
            $dao = new UsuarioDAO();
            return $dao->alterar($this);
        }

        public function getId()
        {
            return $this->id;
        }
        public function setId($id)
        {
            $this->id = $id;
        }
        public function getNomeUsuario()
        {
            return $this->nomeUsuario;
        }
        public function setNomeUsuario($nomeUsuario)
        {
            $this->nomeUsuario = $nomeUsuario;
        }
        public function getIdperfil()
        {
            return $this->idPerfil;
        }
        public function setIdPerfil($idPerfil)
        {
            $this->idPerfil = $idPerfil;
        }
        public function getTelefoneCelular()
        {
            return $this->telefoneCelular;
        }
        public function setTelefoneCelular($telefoneCelular)
        {
            $this->telefoneCelular = $telefoneCelular;
        }
        public function getEmailUsuario()
        {
            return $this->emailUsuario;
        }
        public function setEmailUsuario($emailUsuario)
        {
            $this->emailUsuario = $emailUsuario;
        } public function getSenhaUsuario()
        {
            return $this->senhaUsuario;
        }
        public function setSenhaUsuario($senhaUsuario)
        {
            $this->senhaUsuario = $senhaUsuario;
        }
        public function setDataCadastro($dataCadastro) 
        {
            $this->dataCadastro = $dataCadastro;
        }   
    }
?>