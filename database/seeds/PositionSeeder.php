<?php

use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [            
            [
                'id' => 1,
                'name' => 'CEO'
            ],
            [
                'id' => 2,
                'name' => 'COO'
            ],
            [
                'id' => 3,
                'name' => 'CTO'
            ],
        ];

        foreach ($items as $item) {
            Position::updateOrCreate(
                [
                    'id'            => $item['id']
                ],
                [
                    'name'          => $item['name'],
                ]
            );
        }
    }
}
