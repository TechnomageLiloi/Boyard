<?php

namespace Liloi\I60\API\Questions\Collection;

use Liloi\API\Response;
use Liloi\I60\API\Method as SuperMethod;
use Liloi\I60\Domain\Questions\Manager;
use Liloi\I60\Domain\Questions\Types;
use Liloi\I60\Domain\Questions\Entity;


class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $collection = Manager::loadCollection();

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'collection' => $collection
        ]));

        return $response;
    }
}