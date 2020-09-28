<?php

abstract class Controller {

    public function loadView($name, $data=array())
    {
        ob_start();
        include($name);
        $htmlInclude = ob_get_contents();
        ob_clean();
        return $htmlInclude;
    }
    public abstract function errorMsg();
}