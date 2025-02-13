<?php

namespace Liloi\I60\Domain\Questions;

use Liloi\I60\Domain\Manager as DomainManager;

/**
 * Question's manager.
 *
 * @package Liloi\Exams\Engine\Domain\Questions
 */
class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'questions';
    }

    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s order by key_question desc;',
            $name
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function loadByTags(string $tags): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where tags like "%%%s%%";',
            $name, $tags
        ));

        shuffle($rows);

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function load(string $key_question): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_question="%s"',
            $name,
            $key_question
        ));

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        // @todo: Get param name from const.
        $key = $data['key_question'];
        unset($data['key_question']);

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_question = "%s"', $key)
        );
    }

    public static function remove(Entity $entity): void
    {
        $name = self::getTableName();
        $key = $entity->getKey();

        self::getAdapter()->delete(
            $name,
            sprintf('key_question = "%s"', $key)
        );
    }

    // @todo: rise this method to more abstract level.
    public static function create(): array
    {
        $name = self::getTableName();
        $data = [
            'title' => 'Enter the title',
            'status' => Statuses::TODO,
            'type' => Types::CARD,
            'program' => '{}',
            'theory' => '// theory',
            'tags' => 'tags',
            'dt' => date('Y-m-d H:i:s'),
            'data' => '{}'
        ];
        self::getAdapter()->insert($name, $data);

        return $data;
    }
}