<?php

namespace Liloi\I60\Domain\Vertex;

class Manager
{
    public const ROOT = ROOT_DIR . '/Root';

    public static function getCollection(string $keyAtom): Collection
    {
        $collection = new Collection();

        $dirAtom = rtrim(self::ROOT . self::ATOMtoURL($keyAtom), '/');

        if ($handle = opendir($dirAtom))
        {
            while (false !== ($entry = readdir($handle)))
            {
                $path = $dirAtom . '/' . $entry;
                $parts = pathinfo($path);

                if (in_array($entry, ['.', '..']))
                {
                    continue;
                }

                if (!is_dir($path) && in_array($parts['extension'], ['atom']))
                {
                    continue;
                }

                $collection[] = Entity::create([
                    'title' => $entry,
                    'path' => $path
                ]);
            }

            closedir($handle);
        }

        return $collection;
    }

    public static function URLtoATOM(string $URL): string
    {
        $lower = trim($URL, '/');

        if(in_array($lower, ['', 'rune']))
        {
            return 'rune';
        }

        return 'rune:' . str_replace('/', ':', $lower);
    }

    public static function ATOMtoURL(string $keyAtom): string
    {
        if($keyAtom === 'rune')
        {
            return '/';
        }

        $lower = str_replace('rune:', '', $keyAtom);
        return '/' . str_replace(':', '/', $lower);
    }
}