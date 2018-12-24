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

class UserController extends controller
{




    public function actionIndex()
    {
        if (true){
        $this->title = 'userController';
        $this->view->render("user/index");

            }else{
                $this->action404();
            }
        }







    public function action404()
    {

        $info = new Info();
        var_dump($info->getRandom());
        $this->title = 'Non found controller';
        $this->view->render("action404/index");
    }

    /**
     * @return string
     */





}