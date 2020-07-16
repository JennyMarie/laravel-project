<?php

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
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
                'name' => 'Jenny Marie De Juan',
                'email' => 'jenny@gmail.com',
                'contact' => '09128657934',
                'position_id' => '1',
            ],
        ];

        foreach ($items as $item) {
            Employee::updateOrCreate(
                [
                    'id'            => $item['id']
                ],
                [
                    'name'          => $item['name'],
                    'email'         => $item['email'],
                    'contact'       => $item['contact'],
                    'position_id'   => $item['position_id']
                ]
            );
        }
    }
}
