<?php

namespace packages\Todolist\Todo\Domain\Todo;

final class TodoDue
{

    /** @var string */
    private $value;

    /**
     * UserId constructer.
     *
     * @param string $value User ID
     */
    public function __construct($value)
    {
        // if (is_null($value)) {
        //     throw new ArgumentNullException(get_class($value));
        // }
        $this->value = $value;
    }

    /**
     * Get User ID.
     *
     * @return void
     */
    public function getValue()
    {
        return $this->value;
    }

}
