<?php

namespace Database\Seeders;

use App\Models\KycDocumentType;
use Illuminate\Database\Seeder;

class KycDocumentTypeSeeder extends Seeder
{
    public function run(): void
    {
        collect([
            ['code' => 'CC'],
            ['code' => 'PP'],
            ['code' => 'AR'],
            ['code' => 'CM'],
        ])->each(
            callback: fn (array $data) => KycDocumentType::query()->create($data)
        );
    }
}
