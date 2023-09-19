<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Todolist\Todo\UseCase\Todo\GetInfo;

/**
 * TodoGetInfoCommand class
 */
class TodoGetInfoCommand
{
    /** @var string */
    public $id;

    /**
     * TodoGetInfoCommand construcer.
     *
     * @param string $name
     * @param string $mailAddress
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }
}
