<?php
/**
 * Created by PhpStorm.
 * User: AdekWhat
 * Date: 22.05.2018
 * Time: 12:43
 */

namespace controllers;

use core\controller;
use core\Path;
use core\Router;
use model\autorization;
use model\Registration;
use controllers\AdminController;
use core\View;
class RegistrationController extends controller
{
    public  $memento = array();


    public function actionIndex()
    {


        if ($this->acceptRegistration())
        {

            Registration::register($_POST["regName"], $_POST["regPassword"]);
            autorization::validate($_POST["regName"],$_POST["regPassword"]);
//            $this->actionSecondStep();

//
//           header('Location: http://brief/registration/secondstep');


        } else {

            $this->title = 'Registration Controller';
            $this->view->render('reg/index');
        }
    }

    public function acceptRegistration()
    {


        if ($_POST["regName"] == null || $_POST["regPassword"] == null) {

            return false;

        } elseif (Registration::checkUser($_POST["regName"]))

            return true;

    }


    public function actionSecondStep()
    {
        $executer = $this->checkExecuter();
        $this->title = 'Secondstep';
        $this->view->render('secondstepregistration/index');
        if ($this->checkSecondReg())
        {
           var_dump( $remeber = $this->memento);
          var_dump(  $name = $remeber[0]);
          var_dump(  $password = $remeber[1]);

//            var_dump($executer);


        }else{
            return false;
        }


    }

//    public function actionSubmit()
//    {
//        $this->title = 'Second step';
//        $this->view->render('home/index');
//    }


    public function action404()
    {
        $this->title = 'Non found controller';
        $this->view->render("action404/index");
    }


    public function checkSecondReg()
    {

        if (  $_POST["email"] == null || $_POST["secondName"] == null || $_POST["phoneNumber"] == null ||
            $_POST["salary"] == null){
            return false;
        }else{
            return true;
        }


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

//    public function memento ()
//    {
//
//
//        $this->memento[0] = $_POST["regName"];
//        $this->memento[1] = $_POST["regPassword"];
//
//        return $this->memento;
//
//    }


}