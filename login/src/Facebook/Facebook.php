<?php

namespace WebDevBr\Facebook;

use Facebook\Facebook as Fb;

class Facebook
{
    private $fb;

    public function __construct($app_id, $app_secret)
    {
        $this->fb = new Fb([
            'app_id' => $app_id,
            'app_secret' => $app_secret,
            'default_graph_version' => 'v2.2',
        ]);
    }

    public function getInstance()
    {
        return $this->fb;
    }

    public function __call($method, $properties = null)
    {
        $obj = "WebDevBr\Facebook\Actions\\$method";
        if (class_exists($obj)) {
            return new $obj($this);
        }
        throw new \Exception("Not found class: $obj");
        
    }
}
