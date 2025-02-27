<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AdmGrupo;

class AdmGrupos extends Component
{
    public $grupos = [];
    public $editar = false;
    public $grupoId;
    public $nome;

    public function mount()
    {
        // pegar os dados do banco
        $this->grupos = AdmGrupo::all()->toArray();
    }

    public function edit($id)
    {
        $this->editar = true;
        $grupo = AdmGrupo::find($id);

        $this->grupoId = $grupo->id;
        $this->nome = $grupo->nome;
        //dd($this);
    }

    public function update()
    {
        //dd($this);
        $this->validate([
            'nome' => 'required',
        ]);
        //dd($this);
        $grupo = AdmGrupo::find($this->grupoId);
        $grupo->nome = $this->nome;
        //dd($grupo);
        $grupo->save();

        $this->editing = false;
        //$this->grupos = AdmGrupo::all();

        // Atualizar lista de grupos
        $this->grupos[] = $grupo->toArray();
        $this->nome = '';
        
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
