<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Todolist\Todo\Infrastructure\QueryBuilder\User;

use packages\Todolist\Todo\Domain\User\User;
use packages\Todolist\Todo\Domain\User\UserFactoryInterface;
use packages\Todolist\Todo\Domain\User\UserId;
use packages\Todolist\Todo\Domain\User\UserName;

use Ulid\Ulid;

/**
 * UserRepository class
 *
 */
class UserFactory implements UserFactoryInterface
{

/**
     * Create New User.
     *
     * @param UserName $name
     * @return User
     */
    public function create(UserName $name): User
    {
        $seqId = Ulid::generate()->__toString();

        $id = new UserId($seqId);
        return new User($id, $name);
    }
}
