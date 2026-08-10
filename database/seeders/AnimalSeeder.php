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
<<<<<<< HEAD
                'foto_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQq_ekf2UYMmlwViCQ_8OGG-mDga8eDpeRAMnbstD6qCQ&s=10',
=======
                'foto_url' => 'https://th.bing.com/th/id/OIP.Zwrch19rguXv9Y4g0QEVrQHaE-?w=242&h=180&c=7&r=0&o=7&pid=1.7&rm=3',
>>>>>>> sistema-notif
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
<<<<<<< HEAD
                'foto_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0SjLNDEq6YLbfdprrB73vwwai1S6-1uymb-3K-qL0cA&s=10',
=======
                'foto_url' => 'https://th.bing.com/th/id/OIP.dyoJc_hnRnSwaEozOO0dWwHaE8?w=270&h=180&c=7&r=0&o=7&pid=1.7&rm=3',
>>>>>>> sistema-notif
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
<<<<<<< HEAD
                'foto_url' => 'https://clubedogato.org.br/wp-content/uploads/2018/05/Alice3-1.jpg',
=======
                'foto_url' => 'https://th.bing.com/th/id/OIP.cnc8bqmZKZOykzv3lACohAHaF7?w=223&h=180&c=7&r=0&o=7&pid=1.7&rm=3',
>>>>>>> sistema-notif
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
<<<<<<< HEAD
                'foto_url' => 'https://adotar.com.br/upload/2014-09/animais_imagem72996.jpg?w=700&format=webp',
=======
                'foto_url' => 'hhttps://th.bing.com/th/id/OIP.HoE0nvHQ8UG2WZAfyHAfbwHaEK?w=322&h=181&c=7&r=0&o=7&pid=1.7&rm=3',
>>>>>>> sistema-notif
                'status' => 'disponivel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}