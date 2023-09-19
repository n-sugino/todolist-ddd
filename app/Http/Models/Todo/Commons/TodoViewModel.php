<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace App\Http\Models\Todo\Commons;

/**
 * TodoViewModel class
 */
class TodoViewModel
{
    /** @var string */
    public $id;
    /** @var string */
    public $title;

    /**
     * TodoViewModel constructer
     *
     * @param string $id
     * @param string $name
     */
    public function __construct(string $id, string $title)
    {
        $this->id = $id;
        $this->title = $title;
    }
}
