<?php

namespace App\Modules\Users\Database\Seeders;

use App\Modules\Users\Entities\PhoneNumber;
use App\Modules\Users\Entities\User;
use Faker\Generator;
use Illuminate\Database\Seeder;

class UsersDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->delete();

        /** @var Generator $faker */
        $faker = app(Generator::class);

        for ($i = 0; $i < 23; ++$i){
            $user = new User();
            $user->name = $faker->word;
            $user->email = $faker->email;
            $user->save();
        }
    }
}
