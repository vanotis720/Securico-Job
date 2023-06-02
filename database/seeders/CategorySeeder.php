<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'title' => 'Ménage',
                'icon' => 'mop.png',
            ],
            [
                'title' => 'Cuisine',
                'icon' => 'pot.png',
            ],
            [
                'title' => 'Construction',
                'icon' => 'brickwall.png',
            ],
            [
                'title' => 'Chauffeur',
                'icon' => 'chauffeur.png',
            ],
            [
                'title' => 'Jardinage',
                'icon' => 'gardening.png',
            ],
            [
                'title' => 'informatique',
                'icon' => 'computer.png',
            ],
            [
                'title' => 'marketing',
                'icon' => 'social-media.png',
            ],
            [
                'title' => 'rédacteur de contenu',
                'icon' => 'blogger.png',
            ]
        ];

        foreach ($categories as $category) {
            Category::create([
                'title' => $category['title'],
                'icon' => $category['icon'],
            ]);
        }
    }
}
