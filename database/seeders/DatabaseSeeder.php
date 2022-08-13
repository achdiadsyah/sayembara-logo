<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Journey;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Journey::insert([
            'id'            => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'name'          => 'New Registration',
            'slug'          => 'new',
            'description'   => 'Selamat datang, silahkan ikuti langkah selanjutnya untuk mengunggah hasil karya anda',
            'order_number'  => '6',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s"),
        ]);

        Journey::insert([
            'id'            => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'name'          => 'Need Review',
            'slug'          => 'need-review',
            'description'   => 'Karya anda telah terkirim, kami akan segera mereview karya anda',
            'order_number'  => '5',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s"),
        ]);

        Journey::insert([
            'id'            => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'name'          => 'On Review',
            'slug'          => 'on-review',
            'description'   => 'Karya anda sedang kami review',
            'order_number'  => '4',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s"),
        ]);

        Journey::insert([
            'id'            => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'name'          => 'Assesment',
            'slug'          => 'assesment',
            'description'   => 'Selamat, karya anda masuk ke seleksi kelayakan dan kesesuaian dari kami',
            'order_number'  => '3',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s"),
        ]);

        Journey::insert([
            'id'            => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'name'          => 'Passed',
            'slug'          => 'passed',
            'description'   => 'Selamat, karya anda lolos kedalam tahap finalisasi, kami meminta anda untuk mengupload file asli dari karya anda',
            'order_number'  => '2',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s"),
        ]);

        Journey::insert([
            'id'            => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'name'          => 'Unpassed',
            'slug'          => 'unpassed',
            'description'   => 'Sayang sekali, karya anda tidak lolos kedalam tahap finalisasi. Terima kasih telah berpartisipasi',
            'order_number'  => '1',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s"),
        ]);

        User::insert([
            'id'                    => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'email'                 => 'admin@ruhulislam.com',
            'email_verified_at'     => date("Y-m-d H:i:s"),
            'password'              => Hash::make('25Tahun_Ruhul_Islam'),
            'is_admin'              => 1,
            'name'                  => 'Administrator',
            'nik'                   => '1111222233334444',
            'phone'                 => '08116800000',
            'registered_as'         => 'admin',
            'registered_as_info'    => 'Super Admin',
            'created_at'            => date("Y-m-d H:i:s"),
            'updated_at'            => date("Y-m-d H:i:s"),
        ]);
    }
}
