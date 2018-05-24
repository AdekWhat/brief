<?php
namespace controllers;
use core\controller;
class HomeController extends Controller
{
    public function actionIndex()
    {
        $this->title = 'Home page';
        $this->view->render('home/index');
    }

    public function action404()
    {
        $this->title = 'Non found controller';
        $this->view->render("action404/index");
    }
}