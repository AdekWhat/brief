<?php
/**
 * Created by PhpStorm.
 * User: AdekWhat
 * Date: 21.05.2018
 * Time: 13:48
 */

namespace core;
use core\view;

class controller
{
    /** @var View */
    protected $view;

    protected $title;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

}