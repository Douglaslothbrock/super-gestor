<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteContato;
use Database\Factories\SiteContatoFactory;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $contato = new SiteContato();
        // $contato->create([
        //     'nome' => 'Sistema',
        //     'telefone' => '(85)98888-8888',
        //     'email' => 'Sistema@contato.com',
        //     'motivo_contato' => 1,
        //     'mensagem' => 'Gostaria de saber mais sobre'
        // ]);
        // $contato->save();

        SiteContato::factory()->count(100)->create();
        
    }
}
