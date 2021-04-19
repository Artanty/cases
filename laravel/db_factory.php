<?php
//database/factories/ThisFactory.php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

//use necessary models:
use App\Model1 as Model1;
use App\AnotherModel as AnotherModel;
use Faker\Generator as Faker;

$factory->define(Model1::class, function (Faker $faker) {
    $config = [
        'option1' => $faker->boolean,
        'option2' => $faker->randomDigit,
        'option3' => $faker->sentence
    ];

    $name = $faker->sentence;
    $slug = Str::slug($name);

    return [
        'question' => $faker->sentence,
        'component_id' => AnotherModel::all()->random()->id,
        'config' => $config,
        'order' => $faker->randomDigit,
        'name' => $name,
        'description' => $faker->text,
        'hash' => md5(Str::random(16)),
        'code_name' => $slug,
        'email_verified_at' => now(),
        'password' => bcrypt('qwerty123'), // password
        'remember_token' => Str::random(10)

    ];
});


//ANOTHER FILE
//database/seeds/ThisTableSeeder

use Illuminate\Database\Seeder;

class Model1TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model1::class, 30)->create();
    }
}

//ANOTHER FILE
//common seeder

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Model1TableSeeder::class);
        $this->call(Model2TableSeeder::class);
    }
}


