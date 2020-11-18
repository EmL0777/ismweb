<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        factory(User::class)->make([
           'name' => 'eml0777',
           'email' => 'emmanuel@yhhism.com',
           'email_verified_at' => now(),
           'password' => Hash::make('12345678'),
           'remember_token' => Str::random(10),
       ])->save();
    }
}
