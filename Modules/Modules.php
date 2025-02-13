<?php

namespace Liloi\I60\Modules;

use Liloi\API\Manager as APIManager;
use Liloi\API\Method;

/**
 * @inheritDoc
 */
class Modules
{
    public static function collect(APIManager $manager): APIManager
    {
        $manager->add(new Method('I60.Maps.Show', '\Liloi\I60\Modules\Maps\API\Show\Method::execute'));

        return $manager;
    }
}