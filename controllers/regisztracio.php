<?php

class Regisztracio_Controller
{
    public $baseName = 'regisztracio';

    public function main(array $vars)
    {
        $regisztracioModel = new Regisztracio_Model;
        $retData = $regisztracioModel->get_data($vars);

        $view = new View_Loader($this->baseName . "_main");
        foreach($retData as $name => $value)
            $view->assign($name, $value);
    }
}

?>