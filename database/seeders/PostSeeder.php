<?php

namespace Database\Seeders;
use App\Models\Post;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $imagePath = 'dist/assets/img/post10.jpg';  

        Post::create([
            'title' => 'Empowering the Future: The Role of Electricity in Modern Society',
            'body' => ' Electricity powers nearly every aspect of our daily lives, from the devices we use at home to the technologies that drive industries. As the demand for energy continues to grow, the importance of sustainable and reliable electricity sources becomes more critical than ever. With innovations in renewable energy, smart grids, and efficient storage solutions, the future of electricity promises to be cleaner and more accessible for everyone. Join us as we explore the advancements shaping the future of electricity and how it impacts our world today and beyond.',
            'image' => $imagePath, // Save the image path
        ]);
    }
}
