<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'shohag@gmail.com')->first();
        if(is_null($user)){
            $user = new User();
            $user->name = "Shohag";
            $user->email = "shohag@gmail.com";
            $user->password = Hash::make('12345678');
            $user->save();
        }
    }
}
