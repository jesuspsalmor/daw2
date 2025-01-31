<?php
include_once("Controller/Controller.php");

class ControllerPersona extends Controller{
    public function personas(){
        $string = $this->getQueryStringParams();
        $uri = $this->getUriSegments();
        switch($_SERVER["REQUEST_METHOD"]){
            case "GET":
                $this->sendOutput(json_encode(array("GET" => "GET")), array("Content-Type: application/json", "HTTP/1.1 200 OK"));
                break;
            case "POST":
                $this->sendOutput(json_encode(array("POST" => $_POST)), array("Content-Type: application/json", "HTTP/1.1 200 OK"));
                break;
            case "PUT":
                $this->sendOutput(json_encode(array("PUT" => "PUT")), array("Content-Type: application/json", "HTTP/1.1 200 OK"));
                break;
            case "DELETE":
                $this->sendOutput(json_encode(array("DELETE" => "DELETE")), array("Content-Type: application/json", "HTTP/1.1 200 OK"));
                break;
            default:
                header("HTTP/1.1 400 BAD REQUEST");
        }
    }
}