<?php

namespace Liloi\I60\Modules\Maps\API\Show;

use Liloi\API\Response;
use Liloi\I60\API\Method as SuperMethod;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [

        ]));

        return $response;
    }
}