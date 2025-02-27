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

    public function render()
    {
        // pegar os dados do banco
        $unidades = AdmUnidade::all();
        return view('livewire.adm-unidades', compact('unidades'));
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->name_fantasia = '';
        $this->razao_social = '';
        $this->cnpj = '';
        $this->organization_id = '';
    }

    public function store()
    {
        $this->validate([
            'name_fantasia' => 'required',
            'razao_social' => 'required',
            'cnpj' => 'required|unique:organizations,cnpj|max:18'
        ]);

        Organization::updateOrCreate(['id' => $this->organization_id], [
            'name_fantasia' => $this->name_fantasia,
            'razao_social' => $this->razao_social,
            'cnpj' => $this->cnpj
        ]);

        session()->flash('message', 
            $this->organization_id ? 'Organização atualizada!' : 'Organização criada!');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $organization = AdmUnidade::findOrFail($id);
        $this->organization_id = $id;
        $this->name_fantasia = $organization->name_fantasia;
        $this->razao_social = $organization->razao_social;
        $this->cnpj = $organization->cnpj;
        
        $this->openModal();
    }

    public function delete($id)
    {
        Unidade::find($id)->delete();
        session()->flash('message', 'Organização deletada!');
    }
}