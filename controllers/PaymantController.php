<?php
/**
 * Created by PhpStorm.
 * User: AdekWhat
 * Date: 25.12.2018
 * Time: 15:57
 */

namespace controllers;


use core\controller;

class PaymantController extends controller
{

    public function actionIndex()
    {


        $this->view->render('paymant/index');
    }

    public function action404()
    {


        $this->title = 'Non found controller';
        $this->view->render("action404/index");
    }

}