<?php

namespace Router;

class RouterHandler {

    protected $method;
    protected $data;

    public function set_method($method) {
        $this->method = $method;
    }

    public function set_data($data) {
        $this->data = $data;
    }

    public function route($controller, $id, $param= null) {

        $resource = new $controller();

        echo "<script>console.log('Mensaje desde PHP en router: " .$this->method . "');</script>";
        echo "<script>console.log('router id: " .$id . "');</script>";
        echo "<script>console.log('router param: " .$param . "');</script>";
        switch($this->method) {
            case "get":
                if ($id && $id == "create")
                    $resource->create();
                if ($id && $id == "edit")
                    $resource->edit($param);
                else if($id)
                    $resource->show($id);
                else
                    $resource->index();
                break;

            case "post":
                $resource->store($this->data);
                // $resource->create();
                break;

            case "delete":
                $resource->delete($id);
                break;

        }

    }
    
}
