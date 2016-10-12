<?php

namespace WebDevBr\Facebook\Actions;

use WebDevBr\Facebook\Facebook;

class Object
{
    public function __construct(Facebook $fb)
    {
        $this->fb = $fb->getInstance();
    }

    public function get($access_token)
    {
        $this->fb->setDefaultAccessToken($access_token);

        $response = $this->fb->get('/me?fields=id,first_name,last_name,email,gender,link,friends,birthday');
        return $response->getGraphObject(GraphUser::className());
    }
}