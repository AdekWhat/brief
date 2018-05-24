<?php
namespace controllers;
use core\controller;
use model\Info;
class NotFoundController extends Controller
{

    public function action404()
    {
        $bd = new Info();
        var_dump($bd->getContactInfo('admin'));
        $this->title = 'Error 404';
        $this->view->render('404/404');
    }
}