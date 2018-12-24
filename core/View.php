<?php
namespace core;

use core\Controller;
use model\Info;

class View
{
    /** @var string */
    private $content;

    /** @var Controller */
    private $controller;

    private $link;
    private $userName;

    /**
     * @param Controller $controller
     */
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;

    }

    /**
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * @param string $template
     * @param array $variables
     * @return $this
     */
    public function render(string $template, array $variables = [])
    {
        extract($variables);
        try{
            ob_start();
            include($this->findTemplate($template));
            $this->content = ob_get_clean();
            include($this->findTemplate(Config::getInstance()->get('layout')));
        } catch (\Exception $ex)
        {}

        return $this;
    }

    /**
     * @param string $template
     * @return string
     * @throws \Exception
     */
    private function findTemplate(string $template): string
    {
        $path = Config::getInstance()->get('templates_route');
        $path .= '/' . $template . '.phtml';

        if (file_exists($path)) {
            return $path;
        } else {
            throw new \Exception('Template not found');
        }
    }

    public function getContent(): string
    {
        return $this->content;
    }

    private function findLink() : void
    {
        $info = new Info();
        $randomUser = $info->getRandom();
        $this->userName = ucfirst( $randomUser['username']);
       $this->link =  "http://brief/user/{$this->getUserName()}";

    }

    private function getLink()
    {
        return $this->link;
    }

    private function getUserName()
    {
        return $this->userName;
    }

}