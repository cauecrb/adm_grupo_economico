<div>
    <h1>Administração de Grupos</h1>
    <form wire:submit.prevent="adicionarGrupo">
        <input type="text" wire:model="nome" placeholder="Nome do grupo" required>
        <button type="submit">Criar novo Grupo Economico</button>
    </form>

    <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Lista de Grupos</h4>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    <ul class="list-group">
                        @foreach($grupos as $grupo)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                @if($editar && $grupoId == $grupo['id'])
                                    <form wire:submit.prevent="update" class="form-inline">
                                        <input type="text" wire:model="nome" class="form-control mr-2">
                                        @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
                                        <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                                    </form>
                                @else
                                    {{ $grupo['id']}} - {{ $grupo['nome'] }}
                                    <button wire:click="edit({{ $grupo['id'] }})" class="btn btn-primary btn-sm">Editar</button>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
</div>
