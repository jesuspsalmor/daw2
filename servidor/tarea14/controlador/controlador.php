<?php

class Controlador{
    public function __call($name, $arguments) {
        $this->sendOutput('', array("HTTP/1.1 400 BAD REQUEST"));
    }

    protected function  getUriSegments() {
        $uri = $_SERVER["PATH_INFO"];
        $uri = explode("/", $uri);

        return $uri;
    }

    protected function getQueryStringParams()
    {
        parse_str($_SERVER['QUERY_STRING'], $query);
        return $query;
    }
 
    /**
     * Send API output.
     *
     * @param mixed  $data
     * @param string $httpHeader
     */
    protected function sendOutput($data, $httpHeaders=array())
    {
       if (is_array($httpHeaders) && count($httpHeaders)) {
            foreach ($httpHeaders as $httpHeader) {
                header($httpHeader);
            }
        }
 
        echo $data;
        exit;
    }
}