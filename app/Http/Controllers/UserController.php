<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\User;
use Faker\Factory;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //  Todo: create an edit form which uses one to many relation (phone number)
    public function randomizePhone()
    {

        $user = User::with('phone')->findOrFail(1);
        if ($user->phone === null) {
            $phone = new Phone(['number' => '1111111111']);
            $user->phone()->save($phone);
            dump($phone->number);
        } else {
            $user->phone->update(['number' => Factory::create()->phoneNumber]);
            dump($user->phone->number);
        }
    }
}
