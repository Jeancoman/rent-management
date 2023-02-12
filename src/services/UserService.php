<?php
/*
include(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/models/User.php');

class UserService
{
    public static function createTenant(string $name, string $phoneNumber, string $password)
    {
        return User::create(["name" => $name, "phone_number" => $phoneNumber, 'password' => $password]);
    }

    public static function updateTenant(int $id, string $name, string $phoneNumber, string $aadhaarNumber, string $ebNumber, string $address, string $shopName)
    {
        $user = User::find($id);

        $user->name = $name;

        $user->phone_number = $phoneNumber;

        $user->aadhaar_number = $aadhaarNumber;

        $user->eb_number = $ebNumber;

        $user->address = $address;

        $user->save();
    }

    public static function queryAllTenants()
    {
        return User::query()->where('type', "TENANT");
    }

    public static function queryById(int $id)
    {
        return User::find($id);
    }

    public static function queryByPhone(string $phoneNumber)
    {
        return User::query()->where('phone_number', $phoneNumber)->first();
    }
}
*/
