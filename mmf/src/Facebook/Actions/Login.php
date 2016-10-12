<?php

namespace WebDevBr\Facebook\Actions;

use WebDevBr\Facebook\Facebook;

class Login
{
    public function __construct(Facebook $fb)
    {
        $this->fb = $fb->getInstance();
    }

    public function url($url, Array $permissions = [])
    {
        $helper = $this->fb->getRedirectLoginHelper();
        return $helper->getLoginUrl($url, $permissions);
    }

    public function getAccessToken()
    {
        $helper = $this->fb->getRedirectLoginHelper();
        return $helper->getAccessToken();
    }
}
