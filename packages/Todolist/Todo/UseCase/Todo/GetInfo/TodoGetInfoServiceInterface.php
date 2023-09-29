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
  * Undocumented function
  *
  * @param TodoGetInfoCommand $command
  * @return void
  */
    public function handle(TodoGetInfoCommand $command);
}
