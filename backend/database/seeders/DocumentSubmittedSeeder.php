<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentSubmittedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            'COLB PSA AND LOCAL COPY (ERRONEOUS)',
            'BAPTISMAL CERTIFICATE',
            'SCHOOL RECORDS',
            'IMMUNIZATION CARD',
            'MARRIAGE CERTIFICATE',
            'FATHER\'S BIRTH CETIFICATE',
            'FATHER\'S DEATH CERTIFICATE',
            'MOTHER\'S BIRTH CERTIFICATE',
            'MOTHER\'S DEATH CERTIFICATE',
            'PARENT\'S MARRIAGE CERTIFICATE',
            'VALID ID\'S',
            'AFFIDAVIT OF EXPLAINATION',
            'AFFIDAVIT OF DISCREPANCY',
            'JOINT AFFIDAVIT',
            'SPECIAL ATTORNEY'
        ];

        foreach ($items as $item) {
            \App\Models\DocumentSubmitted::create(['name' => $item]);
        }
    }
}
