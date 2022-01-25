<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert($this->getData());
    }

    private function getData(): array
	{
		$faker = Factory::create();
		$data = [];

		for($i=0; $i < 5; $i++) {
			$data[] = [
				'title' => $faker->sentence(mt_rand(3,10)),
				'description' => $faker->text(mt_rand(100, 200))
			];
		}

		return $data;
	}
}
