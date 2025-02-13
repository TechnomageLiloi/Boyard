<?php

namespace Liloi\I60\API\Questions\Suite;

use Liloi\API\Response;
use Liloi\I60\API\Method as SuperMethod;
use Liloi\I60\Domain\Questions\Manager;
use Liloi\I60\API\Questions\Test\Method as TestMethod;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $tags = self::getParameter('tags');
        $collection = Manager::loadByTags($tags);

        $renders = [];
        foreach($collection as $entity)
        {
            $renders[] = TestMethod::renderTest($entity);
        }

        $response = new Response();

        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'renders' => $renders
        ]));

        return $response;
    }
}