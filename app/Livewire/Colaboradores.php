<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Colaborador;
use Illuminate\Support\Facades\Validator;

class Colaboradores extends Component
{
    public $colaboradores = [];
    public $nome;
    public $email;
    public $cpf;
    public $unidade_id;

    public function mount()
    {
        // pegar os dados do banco
        $this->colaboradores = Colaboradores::all();
    }

    public function adicionarColaborador()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'cpf' => 'required|string|max:11', // fazer a verificação
            'unidade_id' => 'required|exists:unidades,id',
        ]);

        // Criar nova unidade
        $colaborador = Colaborador::create([
            'nome' => $this->nome,
            'email' => $this->email,
            'cpf' => $this->cpf,
            'unidade_id' => $this->unidade_id,
        ]);

        session()->flash('message', 'unidade criada com sucesso!');

        // Atualizar lista de grupos
        $this->colaboradores[] = $colaborador->toArray();
        $this->nome = '';
    }

    public function render()
    {
        return view('livewire.colaboradores');
    }
}
