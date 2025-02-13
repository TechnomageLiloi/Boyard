<?php

namespace Liloi\I60\Domain\Questions;

/**
 * Question's type.
 *
 * @package Liloi\Exams\Engine\Domain\Questions
 */
class Types
{
    /**
     * Card: question/answer.
     */
    public const CARD = 1;

    /**
     * Radio: one correct answer.
     */
    public const RADIO = 2;

    /**
     * Check: many correct answers.
     */
    public const CHECK = 3;

    /**
     * Sentence: many type-in answers.
     */
    public const SENTENCE = 4;

    /**
     * Type list.
     *
     * @var string[]
     */
    public static $list = [
        self::CARD => 'Card',
        self::RADIO => 'Radio',
        self::CHECK => 'Check',
        self::SENTENCE => 'Sentence',
    ];
}