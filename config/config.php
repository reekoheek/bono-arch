<?php

/**
 * Bono App Configuration
 *
 * @category  PHP_Framework
 * @package   Bono
 * @author    Ganesha <reekoheek@gmail.com>
 * @copyright 2013 PT Sagara Xinix Solusitama
 * @license   https://raw.github.com/xinix-technology/bono/master/LICENSE MIT
 * @version   0.10.0
 * @link      http://xinix.co.id/products/bono
 */

use Norm\Schema\String;
use Norm\Schema\Password;

return array(
    'bono.providers' => array(
        '\\Norm\\Provider\\NormProvider' => array(
            'datasources' => array(
                'mongo' => array(
                    'driver' => '\\Norm\\Connection\\MongoConnection',
                    'database' => 'bono',
                ),
            ),
            'collections' => array(
                'mapping' => array(
                    'User' => array(
                        'schema' => array(
                            'username' => String::create('username')->filter('trim|required|unique:User,username'),
                            'password' => Password::create('password')->filter('trim|confirmed|salt'),
                            'email' => String::create('email')->filter('trim|required|unique:User,email'),
                            'first_name' => String::create('first_name')->filter('trim|required'),
                            'last_name' => String::create('last_name')->filter('trim|required'),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'bono.middlewares' => array(
        '\\Bono\\Middleware\\ControllerMiddleware' => array(
            'default' => '\\Norm\\Controller\\NormController',
            'mapping' => array(
                '/user' => null,
            ),
        ),
        '\\Bono\\Middleware\\ContentNegotiatorMiddleware' => array(
            'extensions' => array(
                'json' => 'application/json',
            ),
            'views' => array(
                'application/json' => '\\Bono\\View\\JsonView',
            ),
        ),
        '\\ROH\\BonoAuth\\Middleware\\AuthMiddleware' => array(
            'driver' => '\\ROH\\BonoAuth\\Driver\\NormAuth',
        ),
        '\\Bono\\Middleware\\SessionMiddleware'
    ),
);
