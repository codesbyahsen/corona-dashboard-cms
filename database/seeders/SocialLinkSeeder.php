<?php

namespace Database\Seeders;

use App\Models\SocialLink;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SocialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socialLinks = [
            [
                'name' => 'facebook',
                'link' => 'https://facebook.com',
                'is_active' => SocialLink::STATUS_INACTIVE,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'instagram',
                'link' => 'https://instagram.com',
                'is_active' => SocialLink::STATUS_INACTIVE,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'linkedin',
                'link' => 'https://linkedin.com',
                'is_active' => SocialLink::STATUS_INACTIVE,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'snapchat',
                'link' => 'https://snapchat.com',
                'is_active' => SocialLink::STATUS_INACTIVE,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'twitter',
                'link' => 'https://twitter.com',
                'is_active' => SocialLink::STATUS_INACTIVE,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('social_links')->insert($socialLinks);
    }
}
