<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'title' => 'Privacy Policy',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut sunt, nobis sequi aliquam quisquam possimus at magni modi provident iusto vitae facilis consequuntur cupiditate exercitationem quas obcaecati voluptatem dolorem distinctio praesentium quos ducimus illum fuga laudantium perspiciatis! Nemo, recusandae! Harum, ipsum suscipit quia fugiat, molestias modi quod, animi officiis nobis commodi excepturi a doloribus mollitia? Perspiciatis, iste cumque aliquam sit aliquid optio, porro voluptatum tempore ipsam dolores minima voluptatem ex deleniti quibusdam voluptas quo culpa illum fugit possimus ipsa reprehenderit suscipit nemo. Accusamus, reiciendis illo in quasi architecto quisquam commodi unde dicta quibusdam magnam autem iste quidem sint reprehenderit facere.',
                'slug' => 'privacy-policy',
                'is_active' => Page::STATUS_INACTIVE,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Terms and Conditions',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut sunt, nobis sequi aliquam quisquam possimus at magni modi provident iusto vitae facilis consequuntur cupiditate exercitationem quas obcaecati voluptatem dolorem distinctio praesentium quos ducimus illum fuga laudantium perspiciatis! Nemo, recusandae! Harum, ipsum suscipit quia fugiat, molestias modi quod, animi officiis nobis commodi excepturi a doloribus mollitia? Perspiciatis, iste cumque aliquam sit aliquid optio, porro voluptatum tempore ipsam dolores minima voluptatem ex deleniti quibusdam voluptas quo culpa illum fugit possimus ipsa reprehenderit suscipit nemo. Accusamus, reiciendis illo in quasi architecto quisquam commodi unde dicta quibusdam magnam autem iste quidem sint reprehenderit facere.',
                'slug' => 'terms-and-conditions',
                'is_active' => Page::STATUS_INACTIVE,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Return Policy',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut sunt, nobis sequi aliquam quisquam possimus at magni modi provident iusto vitae facilis consequuntur cupiditate exercitationem quas obcaecati voluptatem dolorem distinctio praesentium quos ducimus illum fuga laudantium perspiciatis! Nemo, recusandae! Harum, ipsum suscipit quia fugiat, molestias modi quod, animi officiis nobis commodi excepturi a doloribus mollitia? Perspiciatis, iste cumque aliquam sit aliquid optio, porro voluptatum tempore ipsam dolores minima voluptatem ex deleniti quibusdam voluptas quo culpa illum fugit possimus ipsa reprehenderit suscipit nemo. Accusamus, reiciendis illo in quasi architecto quisquam commodi unde dicta quibusdam magnam autem iste quidem sint reprehenderit facere.',
                'slug' => 'return-policy',
                'is_active' => Page::STATUS_INACTIVE,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('pages')->insert($pages);
    }
}
