<?php
/**
 * Created by PhpStorm.
 * User: AdekWhat
 * Date: 22.05.2018
 * Time: 13:26
 */

namespace controllers;
use core\controller;
use core\Router;
use core\view;
use model\Info;
use model\autorization;

class UserController extends controller
{




    public function actionIndex()
    {
        if ( $_SESSION["username"]) {

        $this->title = 'userController';
        $this->view->render("user/index");

            }else{
                $this->action404();
            }
        }







    public function action404()
    {

        $info = new Info();
        $this->title = 'Non found controller';
        $this->view->render("action404/index");
    }

    /**
     * @return string
     */





}