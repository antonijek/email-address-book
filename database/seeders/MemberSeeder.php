<?php

namespace Database\Seeders;
use App\Models\Member;
use App\Models\User;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Member::factory(3)->create([
            'user_id' => 1,
        ]);
    }
}
