<?php
/**
 * Created by PhpStorm.
 * User: AdekWhat
 * Date: 23.05.2018
 * Time: 18:16
 */

namespace model;

use core\Connection;

class Info extends Connection
{
    public function addPersonalInfo($nick, $name, $secondName, $city)
    {


        if ($nick == null || $name == null || $secondName == null || $city == null) {

            return false;
        } else {

            $this->someMethod(
                " INSERT INTO personal 
              (nickname, `name`, secondName, city) 
            VALUES ('$nick','$name','$secondName','$city')  ");

            return true;
        }


    }


    public function addEducationInfo($nick, $place, $period, $speciality)
    {


        if ($nick == null || $place == null || $period == null || $speciality == null) {
            return false;
        } else {
            $this->someMethod(
                "INSERT INTO education 
                (nickname, place, period, speciality)
              VALUES ('$nick', '$place', '$period', '$speciality')")   ;

            return true;
        }


    }


    public function addExperienceInfo($nick, $company, $wperiod, $position)
    {

        if ($nick == null || $company == null || $wperiod == null || $position == null) {
            return false;
        } else {



            $this->someMethod
            ("INSERT INTO experience
                (nickname, company, wperiod, position)
                VALUES ('$nick','$company','$wperiod','$position') ");
            return true;
        }

    }

    public function addContactInfo($nick, $email, $linkedIn, $github, $phone)
    {

        if ($nick == null || $email == null || $linkedIn == null || $github == null || $phone == null) {
            return false;
        } else {
            $this->someMethod
            ("INSERT INTO contacts (nickname, email, linkedin, github, phone)
         VALUES ('$nick','$email','$linkedIn','$github','$phone')");
            return true;
        }

    }


    public function getPersonalInfo()
    {
        $temp = $this->someMethod("SELECT * FROM users");
        return $temp->fetch_all();

    }

    public function getEducationInfo($ident)
    {
        $temp = $this->someMethod("SELECT * FROM education WHERE nickname = '$ident' ");


        return $temp->fetch_assoc();


    }

    public function getExperienceInfo($ident)
    {
        $temp = $this->someMethod("SELECT * FROM experience WHERE nickname = '$ident' ");
        return $temp->fetch_assoc();

    }

    public function getContactInfo($ident)
    {
        $temp = $this->someMethod("SELECT * FROM contacts WHERE nickname = '$ident' ");

        return $temp->fetch_assoc();


    }

    public function getRandom()
    {
        $temp = $this->someMethod("SELECT username FROM users ORDER BY RAND()");
        return $temp->fetch_assoc();
    }


    public function updateEducationInfo($nick, $place, $period, $speciality)
    {

            $this->someMethod(
                "UPDATE education SET
                 place = '$place' , period = '$period', speciality = '$speciality' )
                  WHERE nickname = '$nick'");

            return true;



    }

    public function updateExperienceInfo($nick, $company, $period, $position)
    {

        $this->someMethod(
            "UPDATE experience SET
                 company = '$company' , period = '$period', position = '$position' )
                  WHERE nickname = '$nick'");

        return true;



    }

    public function updateContactsInfo($nick, $email, $linkedIn, $github, $phone)
    {

        $this->someMethod(
            "UPDATE contacts SET
                 email = '$email' , linkedin = '$linkedIn', github = '$github', phone = '$phone' )
                  WHERE nickname = '$nick'");

        return true;



    }

    public function updatePersonalInfo($nick, $name, $secondName, $city)
    {

        $this->someMethod(
            "UPDATE contacts SET
                 NAME = '$name' , secondName = '$secondName', city = '$city' )
                  WHERE nickname = '$nick'");

        return true;



    }





}
