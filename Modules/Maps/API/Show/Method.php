<?php

namespace Liloi\Rune\Modules\Maps\API\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;

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