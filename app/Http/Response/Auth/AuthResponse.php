<?php

namespace App\Http\Response\Auth;


use App\Http\Transformers\UserTransformer;
use App\User;

class AuthResponse implements \JsonSerializable
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->transform();
    }

    protected function transform()
    {
        $this->user = UserTransformer::transform($this->user);
    }

    public function toArray()
    {
        return $this->user;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}