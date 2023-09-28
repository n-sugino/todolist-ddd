<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Todolist\Todo\Application\Todo\GetInfo;

use Exception;
use packages\Todolist\Todo\Domain\Todo\TodoContent;
use packages\Todolist\Todo\Domain\Todo\TodoDue;
use packages\Todolist\Todo\Domain\Todo\TodoTitle;
use packages\Todolist\Todo\Domain\Todo\TodoRepositoryInterface;
use packages\Todolist\Todo\UseCase\Todo\GetInfo\TodoData;
use packages\Todolist\Todo\UseCase\Todo\GetInfo\TodoGetInfoCommand;
use packages\Todolist\Todo\UseCase\Todo\GetInfo\TodoGetInfoServiceInterface;

/**
 * TodoGetInfoService class
 */
class TodoGetInfoService implements TodoGetInfoServiceInterface
{
    /** @var TodoRepositoryInterface */
    private $todoRepository;

    /**
     * TodoGetInfoService constructer
     *
     * @param TodoRepositoryInterface $todoRepository
     */
    public function __construct(TodoRepositoryInterface $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    /**
     * Get Todo Data.
     *
     * @param TodoGetInfoCommand $command
     * @return TodoData|null
     */
    public function handle(TodoGetInfoCommand $command)
    {
        $targetContent = new TodoContent($command->content);
        $todo = $this->todoRepository->findByName($targetContent);
        if (is_null($todo)) {
            return null;
        }

        return new TodoData($todo);
    }
}
