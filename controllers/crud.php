<?php

class Crud_Controller
{
    public $baseName = 'crud';

    public function main(array $vars)
    {
        $crudModel = new Crud_Model;
        $retData = $crudModel->get_data($vars);

        $view = new View_Loader($this->baseName . "_main");

        foreach($retData as $name => $value)
            $view->assign($name, $value);
    }
}

?>