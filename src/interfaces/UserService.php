<?php

interface UserService {

    public function findUserById(int $id): User;

    public function findUserByPhoneNumber(string $phoneNumber): User;

    /** @return array<User> */
    public function findUsersByType(Type $type): array;
}

?>