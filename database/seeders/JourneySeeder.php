<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Journey;

class JourneySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Journey::insert([
            'id'            => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'name'          => 'New',
            'slug'          => 'new',
            'order_number'  => '1',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s"),
        ]);

        Journey::insert([
            'id'            => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'name'          => 'Need Review',
            'slug'          => 'need-review',
            'order_number'  => '2',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s"),
        ]);

        Journey::insert([
            'id'            => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'name'          => 'On Review',
            'slug'          => 'on-review',
            'order_number'  => '3',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s"),
        ]);

        Journey::insert([
            'id'            => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'name'          => 'Assesment',
            'slug'          => 'assesment',
            'order_number'  => '4',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s"),
        ]);

        Journey::insert([
            'id'            => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'name'          => 'Passed',
            'slug'          => 'passed',
            'order_number'  => '5',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s"),
        ]);

        Journey::insert([
            'id'            => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'name'          => 'Unpassed',
            'slug'          => 'unpassed',
            'order_number'  => '6',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s"),
        ]);

    }
}
