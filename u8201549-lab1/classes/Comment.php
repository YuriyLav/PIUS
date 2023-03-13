<?php

namespace lab1\classes;

class Comment
{
    public function __construct(protected User $user, protected string $message)
    {
    }

    public function getUser() : User
    {
        return $this->user;
    }

    public function getMessage() : string
    {
        return $this->message;
    }

    function info(): void
    {
        echo "id: {$this->user->getId()} name: {$this->user->getName()} email: {$this->user->getEmail()} password: {$this->user->getPassword()}\n" . "Message: $this->message;\n";
    }
} 

