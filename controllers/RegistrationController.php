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


    public function actionIndex()
    {
        if($this->acceptRegistration() === true){
            autorization::validate($_POST["regName"],$_POST["regPassword"]);
            header('Location: http://brief/admin');


        }else {

            $this->title = 'RegistrationController';
            $this->view->render('reg/index');
        }
    }

    public function acceptRegistration()
    {
        $some = new Registration();

        if ($_POST["regName"] == null  || $_POST["regPassword"] == null) {

           return false;

        } else {

            if ($some->register($_POST["regName"], $_POST["regPassword"])) {
                Path::createPath($_POST["regName"]);

                return true;





            }

        }
    }


}