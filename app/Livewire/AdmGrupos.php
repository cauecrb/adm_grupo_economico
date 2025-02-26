<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AdmGrupo;

class AdmGrupos extends Component
{
    public $grupos = [];
    public $nome;

    public function mount()
    {
        // pegar os dados do banco
        $this->grupos = AdmGrupos::all();
        //dd($this->grupos);
    }

    public function adicionarGrupo()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
        ]);

        //dd($this);

        // Criar novo grupo
        $grupo = AdmGrupo::create([
            'nome' => $this->nome,
        ]);

        // Atualizar lista de grupos
        $this->grupos[] = $grupo->toArray();
        $this->nome = '';
    }

    public function render()
    {
        return view('livewire.adm-grupos');
    }
}
