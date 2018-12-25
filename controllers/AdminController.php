<?php
/**
 * Created by PhpStorm.
 * User: AdekWhat
 * Date: 21.05.2018
 * Time: 18:54
 */

namespace controllers;

use core\controller;
use core\View;
use model\autorization;
use model\info;
use core\Filter;
class AdminController extends controller
{
    private $user;

    public function actionAuth()
    {

        if (autorization::validate($_POST["Nickname"], $_POST["Password"]) === true) {
//            $this->setUser($_POST["Nickname"]);
//            $this->title = $this->user;
            $view = new View();
//            $controller = new userController($view);
            $info = new info();
//           $some = $info->getPersonalInfo();
//            print_r($some);

//            $view->setController($controller);
         $this->view->render("admin/index");

        } else {

            header('Location: http://brief/home');

        }

    }

    public function action404()
    {
        $this->title = 'Non found controller';
        $this->view->render("action404/index");
    }


    public function actionIndex()
    {
        if ($_SESSION['userid'] != null) {
            $this->title = 'Admin';
            $this->view->render('admin/index');
        } else {
            $view = new View();
            $controller = new NotFoundController($view);
            $view->setController($controller);
            $view->render("404/404");
        }
    }

    public function actionSubmit()
    {
        if ($_SESSION['userid'] != null) {


            $this->actionIndex();
        } else {
            $this->initNotFoundController();
        }
    }


    public function actionExit()
    {
        unset($_SESSION['userid']);
        unset($_SESSION['username']);
        header('Location: http://brief/home');
    }


    public function setUser(string $user): void
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

//    public function actionDownload()
//    {
//
//        if ($_SESSION['userid'] != null) {
//            $this->title = 'Admin';
//            $this->view->render('admin/index');
////            $uploaddir = "../templates/user/{$_SESSION['username']}";
//
//            if((move_uploaded_file($_FILES['userfile']['tmp_name'], $uploaddir .
//                $_FILES['userfile']['name']))) {
////                header('Location: http://brief/admin');
//                return true;
//            } else {
//                return false;
//            }
//        }else{
//            $this->initNotFoundController();
//        }



//    }

    private function initNotFoundController()
    {
        $view = new View();
        $controller = new NotFoundController($view);
        $view->setController($controller);
        $view->render("404/404");
    }

    public function actionUpdateInfo()
    {

        $userName = $_SESSION["username"];
        $executer = $this->checkExecuter();

        $updateInfo  = new info();
        $updateInfo->updateUsersInfo ($_POST["secondName"], $_POST["email"], $_POST["salary"],$executer,
           $_POST["phoneNumber"], $userName);

        header('Location: http://brief/admin');

    }

    public function checkExecuter()
    {
        if ($_POST["executer"] == 'on')
        {
            return "1";
        }elseif($_POST["executer"] == null){
            return "0";
        }

    }

}