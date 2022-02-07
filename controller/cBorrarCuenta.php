<?php
    /*
        * Controlador de Borrar Cuenta
        * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
        * @since 18/01/2022 
        * @version 1.0 
        * Última modificación: 18/01/2022
    */
    if(isset($_REQUEST['cancelar'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; 
        $_SESSION['paginaEnCurso'] = 'inicioPrivado';
        header('Location: index.php');
        exit;
    }
    
    $aUsuario=[
        'nombre' => $_SESSION['usuario214DWESAplicacionFinal2122']->getCodUsuario(),
        'descripcion' => $_SESSION['usuario214DWESAplicacionFinal2122']->getDescUsuario(),
        'fechaHoraUltimaConexion' => $_SESSION['usuario214DWESAplicacionFinal2122']->getFechaHoraUltimaConexion(),
        'numConexiones' => $_SESSION['usuario214DWESAplicacionFinal2122']->getNumAccesos(),
        'perfil' => $_SESSION['usuario214DWESAplicacionFinal2122']->getPerfil(),
        'password' => $_SESSION['usuario214DWESAplicacionFinal2122']->getPassword()
    ];
    
    if(isset($_REQUEST['aceptar'])){
        UsuarioPDO::borrarUsuario($_SESSION['usuario214DWESAplicacionFinal2122']);
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit;
    }
    
    $paginaEnCurso = 'borrarCuenta';
    require_once "view/LayoutHeader.php";
    require_once $aVistas[$paginaEnCurso];
    require_once "view/LayoutFooter.php";