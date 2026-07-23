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
                'idade' => 'Adulto',
                'porte' => 'Grande',
                'descricao' => 'Cachorro dócil, enérgico e muito companheiro. Adora correr e brincar ao ar livre.',
                'foto_url' => 'https://images.unsplash.com/photo-1543466835-00a7907e9de1?w=500',
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
                'foto_url' => 'https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?w=500',
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
                'foto_url' => 'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?w=500',
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
                'foto_url' => 'https://images.unsplash.com/photo-1533738363-b7f9aef128ce?w=500',
                'status' => 'disponivel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}