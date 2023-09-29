<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Todolist\Todo\UseCase\Todo\GetInfo;

use packages\Todolist\Todo\Domain\Todo\Todo;

/**
 * TodoData class
 */
class TodoData
{
    /** @var string */
    public $id;
    /** @var string */
    public $title;
    /** @var string */
    public $content;
    /** @var string */
    public $due;
    /**
     * TodoData constructer.
     *
     * @param Todo $source
     */
    public function __construct(Todo $source)
    {
        $this->id = $source->getId()->getValue();
        $this->title = $source->getTitle()->getValue();
        $this->content = $source->getContent()->getValue();
        $this->due = $source->getDue()->getValue();
    }
}
