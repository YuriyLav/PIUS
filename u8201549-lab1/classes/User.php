<?php

namespace lab1\classes;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class User
{
    protected \DateTime $dateCreate;

    public function __construct(protected int $id, protected string $name, protected string $email, protected string $password)
    {
        $this->dateCreate = new \DateTime();
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('id', new Assert\NotBlank());
        $metadata->addPropertyConstraint(
            'id',
            new Assert\Positive()
        );
        $metadata->addPropertyConstraint(
            'id',
            new Assert\Length(['min' => 6])
        );
        $metadata->addPropertyConstraint('name', new Assert\NotBlank());
        $metadata->addPropertyConstraint(
            'name',
            new Assert\Length(['min' => 2])
        );
        $metadata->addPropertyConstraint('email', new Assert\NotBlank());
        $metadata->addPropertyConstraint(
            'email', 
            new Assert\Email());
        $metadata->addPropertyConstraint('password', new Assert\NotBlank());
        $metadata->addPropertyConstraint(
            'password',
            new Assert\Length(['min' => 8])
        );
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    public function getPassword() : string
    {
        return $this->password;
    }

    public function getDateCreate() : \DateTime
    {
        return $this->dateCreate;
    }

    public function printUser()
    {
        echo "id: {$this->id} name: {$this->name} email: {$this->email} password: {$this->password}\n";
    }
}
