<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Todolist\Todo\UseCase\Todo\GetInfo;

/**
 * TodoGetInfoService interface
 */
interface TodoGetInfoServiceInterface
{
    /**
     * Get Todo Data.
     *
     * @param string $userId
     * @return TodoData|null
     */
    public function handle(TodoGetInfoCommand $command);
}
