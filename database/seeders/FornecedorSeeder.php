<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor1';
        $fornecedor->site = 'Fornecedor1.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'Fornecedor1@contato.com';
        $fornecedor->save();

        Fornecedor::create([
            'nome' => 'Fornecedor2',
            'site' => 'Fornecedor2.com.br',
            'uf' => 'PI',
            'email' => 'Fornecedor2@contato.com'
        ]);

    }
}
