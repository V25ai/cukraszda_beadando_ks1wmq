<?php

class Kepek_Controller
{
    public $baseName = 'kepek';

    public function main(array $vars)
    {
        $kepekModel = new Kepek_Model;
        $retData = $kepekModel->get_data($vars);

        $view = new View_Loader($this->baseName . "_main");

        foreach($retData as $name => $value)
        {
            $view->assign($name, $value);
        }
    }
}

?>