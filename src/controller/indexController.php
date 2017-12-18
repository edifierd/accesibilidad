<?php


class indexController extends Controller {

  public function index(){
    if ($_POST) {
      FlashMsj::getInstance()->setMsj('success',"Se envio correctamente el mensaje");
    }

    $this->_view->render('index.html.twig');
  }

  public function nosotros(){

    $this->_view->render('nosotros.html.twig');
  }

  public function contacto(){


    $this->_view->render('contacto.html.twig');
  }






}
