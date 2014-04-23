<?php

namespace App\Provider;

class AppProvider extends \Bono\Provider\Provider
{
    public function initialize()
    {
        $app = $this->app;

        $app->get(
            '/',
            function () use ($app) {
                $app->response->template('home');
            }
        );
    }
}
