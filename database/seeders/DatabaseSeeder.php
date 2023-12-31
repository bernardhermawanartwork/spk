<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Jemaat;
use App\Models\Kehadiran;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Renata',
            'email' => 'renata@spk.com',
            'password'=> bcrypt('admin')
        ]);

        Jemaat::factory(10)->create();

        $dataKehadiran = [
            [
                "jemaat_id" => "1",
                "jumlah_kehadiran" => "39",
            ],
            [
                "jemaat_id" => "2",
                "jumlah_kehadiran" => "50",
            ],
            [
                "jemaat_id" => "3",
                "jumlah_kehadiran" => "52",
            ],
            [
                "jemaat_id" => "4",
                "jumlah_kehadiran" => "34",
            ],
            [
                "jemaat_id" => "5",
                "jumlah_kehadiran" => "45",
            ],
            [
                "jemaat_id" => "6",
                "jumlah_kehadiran" => "30",
            ],
            [
                "jemaat_id" => "7",
                "jumlah_kehadiran" => "30",
            ],
            [
                "jemaat_id" => "8",
                "jumlah_kehadiran" => "30",
            ],
            [
                "jemaat_id" => "9",
                "jumlah_kehadiran" => "30",
            ],
            [
                "jemaat_id" => "10",
                "jumlah_kehadiran" => "30",
            ],
            [
                "jemaat_id" => "11",
                "jumlah_kehadiran" => "30",
            ],
            [
                "jemaat_id" => "12",
                "jumlah_kehadiran" => "30",
            ],
            [
                "jemaat_id" => "13",
                "jumlah_kehadiran" => "30",
            ],
            [
                "jemaat_id" => "14",
                "jumlah_kehadiran" => "30",
            ],
            [
                "jemaat_id" => "15",
                "jumlah_kehadiran" => "30",
            ],

        ];
        foreach($dataKehadiran as $key=>$val)
        {
            Kehadiran::create($val);
        }
    }
}
