<?php

namespace Liloi\I60\API;

use Liloi\API\Manager;
use Liloi\API\Method;
use Liloi\I60\API\Method as RuneMethod;
use Liloi\I60\Modules\Modules;

/**
 * @inheritDoc
 */
class Tree
{
    private static ?self $instance = null;

    private Manager $manager;

    private function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @obsolete It is centralized, which is incorrect.
     * @todo Add general API Pool.
     * @return static
     */
    public static function getInstance(): self
    {
        if(self::$instance === null)
        {
            $manager = new Manager();

            $manager->add(new Method('I60.Questions.Collection', '\Liloi\I60\API\Questions\Collection\Method::execute'));
            $manager->add(new Method('I60.Questions.Create', '\Liloi\I60\API\Questions\Create\Method::execute'));
            $manager->add(new Method('I60.Questions.Remove', '\Liloi\I60\API\Questions\Remove\Method::execute'));
            $manager->add(new Method('I60.Questions.Edit', '\Liloi\I60\API\Questions\Edit\Method::execute'));
            $manager->add(new Method('I60.Questions.Save', '\Liloi\I60\API\Questions\Save\Method::execute'));
            $manager->add(new Method('I60.Questions.Show', '\Liloi\I60\API\Questions\Show\Method::execute'));
            $manager->add(new Method('I60.Questions.Test', '\Liloi\I60\API\Questions\Test\Method::execute'));
            $manager->add(new Method('I60.Questions.Suite', '\Liloi\I60\API\Questions\Suite\Method::execute'));

            $manager->add(new Method('I60.Vertex.Show', '\Liloi\I60\API\Vertex\Show\Method::execute'));

            $manager = Modules::collect($manager);

            self::$instance = new self($manager);
        }

        return self::$instance;
    }

    public function execute(): string
    {
        $response = $this->manager->search($_POST['method'])->execute($_POST['parameters'] ?? []);
        return $response->asJson();
    }

    /**
     * Get API manager.
     *
     * @return Manager
     */
    public function getManager(): Manager
    {
        return $this->manager;
    }
}