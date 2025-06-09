<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'status' => 'Imekamilika',
            'title' => 'Ujenzi wa Nyumba za Kisasa',
            'place' => 'Arusha Ploti 201',
            'description' => 'Nyumba za kisasa zenye vipengele vya teknolojia ya hali ya juu na muundo wa kisasa.',
            'image' => 'c1.jpg',
            'category' => 'Makazi',
            'duration' => '8 miezi'
        ]);

        Project::create([
            'status' => 'Imekamilika',
            'title' => 'Jengo la Biashara',
            'place' => 'Dar es Salaam CBD',
            'description' => 'Jengo la biashara lenye orofa 12 na vipengele vya kisasa vya uongozi wa nishati.',
            'image' => 'c1.jpg',
            'category' => 'Biashara',
            'duration' => '18 miezi'
        ]);

        Project::create([
            'status' => 'Haijakamilika',
            'title' => 'Kiwanda cha Uzalishaji',
            'place' => 'Morogoro',
            'description' => 'Kiwanda cha kisasa cha uzalishaji chenye teknolojia ya hali ya juu.',
            'image' => 'c1.jpg',
            'category' => 'Viwanda',
            'duration' => '24 miezi'
        ]);
    }
}
