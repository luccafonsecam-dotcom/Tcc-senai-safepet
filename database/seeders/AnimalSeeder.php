<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Animal;

class AnimalSeeder extends Seeder
{
    public function run(): void
    {
        Animal::insert([
            [
                'nome' => 'Thor',
                'especie' => 'Cachorro',
                'idade' => 'Filhote',
                'porte' => 'Pequeno',
                'descricao' => 'Cachorro dócil, enérgico e muito companheiro. Adora correr e brincar ao ar livre.',
                'foto_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQq_ekf2UYMmlwViCQ_8OGG-mDga8eDpeRAMnbstD6qCQ&s=10',
                'status' => 'disponivel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Mel',
                'especie' => 'Cachorro',
                'idade' => 'Filhote',
                'porte' => 'Pequeno',
                'descricao' => 'Filhote carinhosa e brincalhona. Procura uma família para dar muito amor.',
                'foto_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0SjLNDEq6YLbfdprrB73vwwai1S6-1uymb-3K-qL0cA&s=10',
                'status' => 'disponivel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Simba',
                'especie' => 'Gato',
                'idade' => 'Adulto',
                'porte' => 'Médio',
                'descricao' => 'Gato tranquilo, independente e muito curioso. Castrado e vacinado.',
                'foto_url' => 'https://clubedogato.org.br/wp-content/uploads/2018/05/Alice3-1.jpg',
                'status' => 'disponivel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Luna',
                'especie' => 'Gato',
                'idade' => 'Filhote',
                'porte' => 'Pequeno',
                'descricao' => 'Gatinha dócil que adora um colo e dorme enroladinha. Muito dócil com outros pets.',
                'foto_url' => 'https://adotar.com.br/upload/2014-09/animais_imagem72996.jpg?w=700&format=webp',
                'status' => 'disponivel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}