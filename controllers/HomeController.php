<?php
namespace controllers;
use core\controller;
use model\Info;

class HomeController extends Controller
{
    public function actionIndex()
    {
        $getPublicationInfo= new Info();
        $array = $getPublicationInfo->getCard_of_publication_AllInfo();
        $info = new Info();
        $info = $info->getMaxIdPublication();


        $this->title = 'Home page';
        $this->view->render('home/index',$array);
    }

    public function action404()
    {
        $this->title = 'Non found controller';
        $this->view->render("action404/index");
    }
}