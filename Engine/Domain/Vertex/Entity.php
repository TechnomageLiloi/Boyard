<?php

namespace Liloi\I60\Domain\Vertex;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getPath()
 * @method void setPath(string $value)
 */
class Entity extends AbstractEntity
{
    public function getLink(): string
    {
        $path = $this->getPath();

        if(is_dir($path))
        {
            return str_replace(Manager::ROOT, '', $path);
        }

        return '/Root' . str_replace(Manager::ROOT, '', $path);
    }

    public function getExtension(): string
    {
        $path = $this->getPath();

        if(is_dir($path))
        {
            return 'This is directory';
        }

        $parts = pathinfo($this->getPath());
        return $parts['extension'];
    }
}