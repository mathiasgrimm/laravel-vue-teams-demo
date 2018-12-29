<?php

use Illuminate\Database\Seeder;

class ClubsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $team = factory(App\Team::class)->create();

            for ($j = 0; $j < 10; $j++) {
                $player = factory(App\Player::class)->create([
                    'team_id' => $team->id
                ]);
            }
        }
    }
}
