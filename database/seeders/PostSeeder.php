<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Schema\ForeignKeyDefinition;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\Foreach_;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   //por cada post que se genere, se carga una imagen que se almacena en la información image
       $posts = Post::factory(100)->create();

       foreach ($posts as $post) {
            Image::factory(1)->create([
                'imageable_id' => $post->id,
                'imageable_type' => Post::class

            ]);
             $post->tags()->attach([
                 rand(1, 4),
                rand(5, 8)
             ]);
       }
    }
}
