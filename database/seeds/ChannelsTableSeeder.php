<?php

use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		App\Channel::create([
			'name'    => 'Entrance',
		]);
		App\Channel::create([
			'name'    => 'First floor',
		]);
		App\Channel::create([
			'name'    => 'Room 1337',
		]);
    }
}
