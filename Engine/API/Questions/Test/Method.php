<?php

namespace Liloi\I60\API\Questions\Test;

use Liloi\API\Response;
use Liloi\I60\API\Method as SuperMethod;
use Liloi\I60\Domain\Questions\Manager;
use Liloi\I60\Domain\Questions\Statuses;
use Liloi\I60\Domain\Questions\Types;
use Liloi\I60\Domain\Questions\Entity;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $path = ROOT_DIR . '/' . self::getParameter('link');
        $entity = Manager::load($path);

        $response = new Response();
        $response->set('render', self::renderTest($entity));
        return $response;
    }

    public static function renderTest(Entity $entity): string
    {

        // @todo: encapsulate block at entity
        switch ($entity->getType())
        {
            case Types::CHECK:
                $template = 'Check'; break;
            case Types::RADIO:
                $template = 'Radio'; break;
            case Types::SENTENCE:
                $template = 'Sentence'; break;
            case Types::CARD:
            default: $template = 'Card';
        }

        return static::render(__DIR__ . '/' . $template . '.tpl', [
            'entity' => $entity
        ]);
    }
}