<?php

namespace Liloi\I60\API\Questions\Edit;

use Liloi\API\Response;
use Liloi\I60\API\Method as SuperMethod;
use Liloi\I60\Domain\Questions\Manager;
use Liloi\I60\Domain\Questions\Statuses;
use Liloi\I60\Domain\Questions\Types;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $key_question = self::getParameter('key_question');
        $entity = Manager::load($key_question);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'types' => Types::$list,
            'statuses' => Statuses::$list
        ]));

        return $response;
    }
}