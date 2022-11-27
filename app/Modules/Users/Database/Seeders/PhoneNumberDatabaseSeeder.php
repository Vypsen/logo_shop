<?php

namespace App\Modules\Users\Database\Seeders;

use App\Modules\Users\Entities\PhoneNumber;
use App\Modules\Users\Entities\User;
use Faker\Generator;
use Illuminate\Database\Seeder;

class PhoneNumberDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PhoneNumber::query()->delete();

        $userIds = User::query()->get('id');
        /** @var Generator $faker */
        $faker = app(Generator::class);

        for ($i = 0; $i < 23; ++$i){
            $number = new PhoneNumber();
            $number->number = $faker->phoneNumber;
            $number->user()->associate($userIds[$i]);
            $number->save();
        }
    }
}
