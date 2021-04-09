<?php

class User {
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name;
    }

    public function sendMessage(string $message) {
        ChatRoom::sendMessage($this, $message);
    }
}

class ChatRoom {
    public static function sendMessage(User $user, string $message) {
        $name = $user->getName();
        $date = date("Y-m-d h:m:s", time());
        echo "$date [$name] $message" . PHP_EOL;
    }
}

$robert = new User("Robert");
$john = new User("John");

$robert->sendMessage("Hello, John");
$john->sendMessage("Hi, Robert! Nice to meet you!");
