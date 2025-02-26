<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AdmBandeira;

class AdmBandeiras extends Component
{
    public $bandeiras = [];
    public $nome;
    public $grupo_economico_id;

    public function mount()
    {
        // pegar os dados do banco
        $this->bandeiras = AdmBandeiras::all();
        //dd($this->grupos);
    }

    public function adicionarBandeira()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'grupo_economico_id' => 'required|exists:gruposEconomicos,id',
        ]);

        //dd($this);

        // Criar novo grupo
        $bandeira = AdmBandeira::create([
            'nome' => $this->nome,
            'grupo_economico_id' => $this->grupo_economico_id,
        ]);

        session()->flash('message', 'Grupo criado com sucesso!');

        // Atualizar lista de grupos
        $this->bandeiras[] = $bandeira->toArray();
        $this->nome = '';
    }

    public function render()
    {
        return view('livewire.adm-bandeiras');
    }
}
