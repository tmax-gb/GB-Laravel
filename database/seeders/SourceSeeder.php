<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('source')->insert($this->getData());
    }
    
    private function getData(): array
	{
		$faker = Factory::create();
		$data = [];

		for($i=0; $i < 10; $i++) {
			$data[] = [
				'title' => $faker->sentence(mt_rand(3,10)),
				'site' => $faker->url()

			];
		}

		return $data;
	}

}
