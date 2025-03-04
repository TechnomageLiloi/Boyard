<?php

namespace Liloi\I60\Domain\Questions;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * Question's entity.
 *
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getType()
 * @method void setType(string $value)
 *
 * @method string getProgram()
 * @method void setProgram(string $value)
 *
 * @method string getTags()
 * @method void setTags(string $value)
 *
 * @method string getDt()
 * @method void setDt(string $value)
 *
 * @method string getData()
 * @method void setData(string $value)
 *
 * @method string getLink()
 * @method void setLink(string $value)

 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_question');
    }

    public function getTypeTitle(): string
    {
        return Types::$list[$this->getType()];
    }


    public function getStatusTitle(): string
    {
        return Statuses::$list[$this->getStatus()];
    }

    public function getStatusClass(): string
    {
        // @todo: string to class
        $status = strtolower($this->getStatusCaption());
        return str_replace(' ', '-', $status);
    }

    public function getParse(): string
    {
        return Parser::parseString($this->getProgram());
    }

    public function getElement(string $key)
    {
        $data = $this->getProgram();
        return $data[$key];
    }

    /**
     * Save question to database.
     */
    public function save(): void
    {
        Manager::save($this);
    }

    /**
     * Set question's status as {@see Statuses::COMPLETE} and save to database.
     */
    public function remove(): void
    {
        $this->setStatus(Statuses::OBSOLETE);
        $this->save();
    }

    public function getElementStylo(string $key)
    {
        $raw = $this->getElement($key);

        if(is_array($raw))
        {
            $raw = implode("\n", $raw);
        }

        return Parser::parseString($raw);
    }

    public function getQuestion(): string
    {
        $raw = $this->getElement('question');

        if(is_array($raw))
        {
            $raw = implode("\n", $raw);
        }

        $path = dirname($this->getLink());
        $raw = str_replace('](./', '](' . $path . '/', $raw);

        return Parser::parseString($raw);
    }

    public function getTheory(): string
    {
        $program = (array)$this->getProgram();
        if(!isset($program['theory']))
        {
            return 'There is no theory.';
        }

        $raw = $this->getElement('theory');

        if(is_array($raw))
        {
            $raw = implode("\n", $raw);
        }

        $path = dirname($this->getLink());
        $raw = str_replace('](./', '](' . $path . '/', $raw);

        return Parser::parseString($raw);
    }
}