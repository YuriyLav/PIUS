<?php

namespace lab1\classes;

require 'vendor/autoload.php';

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;

$validator = Validation::createValidatorBuilder()
    ->addMethodMapping('loadValidatorMetadata')
    ->getValidator();

$user1= new User(16786776, 'Egor', 'egor@mail.ru', '43565657ghg');
$user2 = new User(2657678, 'Igor', 'igor@mail.ru', '187659jhyt');
$user3= new User(7654667, 'Daniil', 'daniil@mail.ru', 'fdsgfdh567');
$user4 = new User(45556732, 'Kirill', 'kirill@mail.ru', '767hhghk4857');

//not valid users
$user5= new User(16786776, 'Nastya', 'nastya.ru', '5467225667');
$user6 = new User(2657678, 'Maxim', 'max@mail.ru', '123');

$users = [$user1, $user2, $user3, $user4, $user5, $user6];
foreach ($users as $user) {
    $valide = (string) $validator->validate($user);
    if(empty($valide)){
        echo "The user" . $user->getId() .  " is valid!\n";
    } else {
        echo $valide . "\n";
    } 
}

$comment1= new Comment($user1, 'some comment 1');
$comment2 = new Comment($user2, 'some comment 2');
$comment3 = new Comment($user3, 'some comment 3');
$comment4 = new Comment($user4, 'some comment 4');
$comment5 = new Comment($user5, 'some comment 5');
$comment6 = new Comment($user6, 'some comment 6');

$comments = [$comment1, $comment2, $comment3, $comment4, $comment5, $comment6];
$dateTime = readline("Enter date in format 'd-m-Y H:i:s': ");

$dateValidator = Validation::createValidator();
$errors= $dateValidator->validate($dateTime,
[new Assert\DateTime(),
new Assert\NotBlank(),
]);
    if(!empty($error)){
        foreach ($errors as $error){
            echo $error->getMessage() . "\n";
        }
    } else {
        $dateTime = \DateTime::createFromFormat('d-m-Y H:i:s', $dateTime);
}

foreach ($comments as $comment) {
    if ($comment->getUser()->getDateCreate() > $dateTime) {
        echo $comment->info() . "\n";
    } 
}