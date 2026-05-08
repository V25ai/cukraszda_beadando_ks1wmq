<?php

class Kapcsolat_Controller
{
    public $baseName = 'kapcsolat';

    public function main(array $vars)
    {
        $kapcsolatModel = new Kapcsolat_Model;
        $retData = $kapcsolatModel->get_data($vars);

        $view = new View_Loader($this->baseName . "_main");

        foreach($retData as $name => $value)
            $view->assign($name, $value);
    }
}

?>