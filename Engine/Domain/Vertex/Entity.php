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
        $ahref = '<a href="%s">%s</a>';

        $path = $this->getPath();

        if(is_dir($path))
        {
            $link = str_replace(Manager::ROOT, '', $path);
        }
        else if(pathinfo($path, PATHINFO_EXTENSION) === 'quest')
        {
            $ahref = '<a href="javascript:void(0);" onclick="%s">%s</a>';
            $link = sprintf("I60.Questions.test('%s');", '/Root' . str_replace(Manager::ROOT, '', $path));
        }
        else
        {
            $link = '/Root' . str_replace(Manager::ROOT, '', $path);
        }

        return sprintf($ahref, $link, $this->getTitle());
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