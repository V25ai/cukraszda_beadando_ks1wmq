<?php

class Uzenetek_Controller
{
    public $baseName = 'uzenetek';

    public function main(array $vars)
    {
        $uzenetekModel = new Uzenetek_Model;
        $retData = $uzenetekModel->get_data($vars);

        $view = new View_Loader($this->baseName . "_main");

        foreach($retData as $name => $value)
            $view->assign($name, $value);
    }
}

?>