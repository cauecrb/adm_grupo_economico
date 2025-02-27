<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Organization;

class OrganizationComponent extends Component
{
    public $name, $cnpj, $organization_id;
    public $isOpen = false;

    public function render()
    {
        $organizations = Organization::all();
        return view('livewire.organization-component', compact('organizations'));
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
        $this->name = '';
        $this->cnpj = '';
        $this->organization_id = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'cnpj' => 'required|unique:organizations,cnpj|max:18'
        ]);

        Organization::updateOrCreate(['id' => $this->organization_id], [
            'name' => $this->name,
            'cnpj' => $this->cnpj
        ]);

        session()->flash('message', 
            $this->organization_id ? 'Organização atualizada!' : 'Organização criada!');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $organization = Organization::findOrFail($id);
        $this->organization_id = $id;
        $this->name = $organization->name;
        $this->cnpj = $organization->cnpj;
        
        $this->openModal();
    }

    public function delete($id)
    {
        Organization::find($id)->delete();
        session()->flash('message', 'Organização deletada!');
    }
}