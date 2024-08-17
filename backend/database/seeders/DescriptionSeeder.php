<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            'CHILD\'S FIRST NAME',
            'CHILD\'S MIDDLE NAME',
            'CHILD\'S LAST NAME',
            'CHILD\'S DATE OF BIRTH',
            'CHILD\'S SEX',
            'TYPE OF BIRTH',
            'BIRTH ORDER',
            'MOTHER\'S FIRST NAME',
            'MOTHER\'S MIDDLE NAME',
            'MOTHER\'S LAST NAME',
            'MOTHER\'S FULL NAME',
            'FATHER\'S FIRST NAME',
            'FATHER\'S MIDDLE NAME',
            'FATHER\'S LAST NAME',
            'INFORMANT\'S LAST NAME',
            'CHILD\'S MIDDLE NAME AND MOTHER\'S LAST NAME',
            'CHILDS, FATHER\'S AND INFORMANT\'S LAST NAME',
            'INFORMANT\'S FULL NAME',
            'DATE OF MARRIAGE OF PARENT\'S',
            'PLACE OF MARRIAGE OF PARENT\'S',
            'DATE AND PLACE OF MARRIAGE OF PARENT\'S',
        ];

        foreach ($items as $item) {
            \App\Models\DescriptionItem::create(['name' => $item]);
        }
    }
}
