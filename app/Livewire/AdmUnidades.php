<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AdmUnidade;
use Illuminate\Support\Facades\Validator;


class AdmUnidades extends Component
{
    public $unidades = [];
    public $nome_fantasia;
    public $razao_social;
    public $cnpj;
    public $bandeira_id;

    public function mount()
    {
        // pegar os dados do banco
        $this->unidades = AdmUnidade::all()->toArray();
    }

    public function adicionarUnidade()
    {
        $this->validate([
            'nome_fantasia' => 'required|string|max:255',
            'razao_social' => 'required|string|max:255',
            'cnpj' => 'required|string|max:11', // fazer a verificação
            'bandeira_id' => 'required|exists:bandeiras,id',
        ]);

        // Criar nova unidade
        $unidade = AdmUnidade::create([
            'nome_fantasia' => $this->nome_fantasia,
            'razao_social' => $this->razao_social,
            'cnpj' => $this->cnpj,
            'bandeira_id' => $this->bandeira_id,
        ]);

        session()->flash('message', 'unidade criada com sucesso!');

        // Atualizar lista de grupos
        $this->unidades[] = $unidade->toArray();
        $this->nome_fantasia = '';
    }

    public function render()
    {
        return view('livewire.adm-unidades', ['unidades' => $this->unidades]);
    }
}
