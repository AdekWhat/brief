<?php
/**
 * Created by PhpStorm.
 * User: AdekWhat
 * Date: 25.12.2018
 * Time: 14:23
 */

namespace controllers;
use core\controller;
use core\Router;
use core\view;
use model\Info;
use model\autorization;
use model\Registration;

class PublicationController extends controller
{
    public function actionIndex()
    {
        if ($_SESSION["username"]) {

            $this->title = 'userController';
            $this->view->render("publication/index");

        } else {
            $this->action404();
        }
    }


    public function actionSendPublication()
    {
        $userId = Registration::getUserID();
        print_r($userId["id"]);



           $updateInfo = new Info();
            $updateInfo->addCardsInfo($_POST["name_publication"], $_POST["short_name"],$_POST["typePublication"],
             $_POST["size_page"], $_POST["circulation"], $_POST["way_of_printing"], $userId["id"]);



        header('Location: http://brief/publication');

    }

    public function action404()
    {

        $info = new Info();

        $this->title = 'Non found controller';
        $this->view->render("action404/index");
    }





}