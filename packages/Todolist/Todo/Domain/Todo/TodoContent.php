<?php

namespace packages\Todolist\Todo\Domain\Todo;


final class TodoContent 
{
    /* @var string */

    private $value;

    /**
     * UserName constructer.
     *
     * @param string $value User Name
     */
    public function __construct(string $value)
    {
        // if (is_null($value)) throw new ArgumentNullException(gettype($value));

        $this->value = $value;
    }

    /**
     * Get User Name.
     *
     * @return void
     */
    public function getValue()
    {
        return $this->value;
    }

}
