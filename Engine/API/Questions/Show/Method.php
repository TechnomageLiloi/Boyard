<?php

namespace Liloi\I60\API\Questions\Show;

use Liloi\API\Response;
use Liloi\I60\API\Method as SuperMethod;
use Liloi\I60\Domain\Questions\Manager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $path = ROOT_DIR . '/' . self::getParameter('link');
        $entity = Manager::load($path);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity
        ]));

        return $response;
    }
}