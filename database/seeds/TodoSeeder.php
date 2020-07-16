<?php

use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodoSeeder extends Seeder
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
                'title' => 'Create Todo List',
            ],
            [
                'id' => 2,
                'title' => 'Disinfect the room',
            ],
            [
                'id' => 3,
                'title' => 'Buy Facemask',
            ],
        ];

        foreach ($items as $item) {
            Todo::updateOrCreate(
                [
                    'id'            => $item['id']
                ],
                [
                    'title'          => $item['title'],
                ]
            );
        }
    }
}
