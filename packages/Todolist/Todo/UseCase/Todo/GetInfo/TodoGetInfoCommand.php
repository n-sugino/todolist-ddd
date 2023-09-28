<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Todolist\Todo\UseCase\Todo\GetInfo;
use packages\Todolist\Todo\Domain\Todo\Todo;
/**
 * TodoGetInfoCommand class
 */
class TodoGetInfoCommand
{
    /** @var string */
    public $content;

    /**
     * TodoGetInfoCommand construcer.
     *
     * @param string $name
     * @param string $mailAddress
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }
}
