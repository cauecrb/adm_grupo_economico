<?php

//namespace App\Http\Livewire;
namespace App\Livewire;


use Livewire\Component;

class AdmGrupos extends Component
{
    public $grupos = [];
    public $nome;

    public function mount()
    {
        // Inicializar dados (isto seria substituído por dados reais do banco)
        $this->grupos = [
            ['id' => 1, 'nome' => 'Grupo 1', 'descricao' => 'Descrição do Grupo 1'],
            ['id' => 2, 'nome' => 'Grupo 2', 'descricao' => 'Descrição do Grupo 2'],
        ];
    }

    public function adicionarGrupo()
    {
        // Adicionar novo grupo à lista (isto seria substituído por lógica de salvamento no banco)
        $this->grupos[] = [
            'id' => count($this->grupos) + 1,
            'nome' => $this->nome,
            'descricao' => 'Descrição do Novo Grupo'
        ];

        // Limpar o campo de entrada
        $this->nome = '';
    }

    public function render()
    {
        return view('livewire.adm-grupos');
    }
}
