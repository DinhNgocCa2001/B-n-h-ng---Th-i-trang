<?php
class BaseController
{
    public function __construct()
    {
        session_start();
    }

    public function render_view($viewName, $data=[])
    {
        extract($data);
        include('Views/views/'.$viewName.'.php');
    }

    public function get_model($modelName)
    {
        include('Models/'.$modelName.'.php');
        $modelObj = new $modelName();
        return $modelObj;
    }

    public function render_layout($layoutName, $views=[], $data=[])
    {
        $params = [
            'views' => $views,
            'data' => $data,
        ];
        extract($params);
        include('Views/Layout/'.$layoutName.'.php');
    }

    public function redirect($controller, $action)
    {
        header("Location: ?controller=".$controller."&action=".$action);
    }
}