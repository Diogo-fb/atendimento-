<?php 

    include_once '../Model/UsuarioModel.php';
    include_once '../DAO/UsuarioDAO.php';

    class atendController{

        public function cadastraUsuario($nomeUsuario, $idPerfil, $telefoneCelular, $emailUsuario, $senhaUsuario){
            include_once "../Model/UsuarioModel.php";
            $model = new UsuarioModel(null, $nomeUsuario, $idPerfil, $telefoneCelular, $emailUsuario, $senhaUsuario);
            $model->cadastraUsuario($model);
        }

        public static function listarUsuario(){
            include_once "../Model/UsuarioModel.php";
            return usuarioModel::listarUsuario();
        }

        public function buscarPorId($idUsuario) {
            return UsuarioModel::buscarPorId($idUsuario);
        }
    
        public function alterarUsuario($idUsuario, $nomeUsuario, $idPerfil, $telefoneCelular, $emailUsuario) {
            include_once "../Model/UsuarioModel.php";
            $model = new UsuarioModel($idUsuario, $nomeUsuario, $idPerfil, $telefoneCelular, $emailUsuario,null,null);
            return $model->alterar();
        }
    }
?>