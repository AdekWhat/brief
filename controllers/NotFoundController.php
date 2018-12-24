<?php
namespace controllers;
use core\controller;
use model\Info;
class NotFoundController extends Controller
{

    public function action404()
    {

        $this->title = 'Error 404';
        $this->view->render('404/404');
    }
}