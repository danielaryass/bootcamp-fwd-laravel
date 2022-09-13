<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MasterData\Consultation;
use Illuminate\Support\Facades\DB;
class ConsultationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create data here
        $consultation = [
            [
                'name' => 'Jantung Sesak',
            ],
             [
                'name' => 'Tekanan Darah Tinggi',
            ],
             [
                'name' => 'Gangguan Irama Jantung',
            ],
             [
                'name' => 'Kanker Kantong Kering',
            ],
        ];
        //this array $consultation will be insert to table 'consultation'
        Consultation::insert($consultation);
    }
}
