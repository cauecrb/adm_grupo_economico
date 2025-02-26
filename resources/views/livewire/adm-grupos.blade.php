<div>
    <h1>Administração de Grupos</h1>
    <form wire:submit.prevent="adicionarGrupo">
        <input type="text" wire:model="nome" placeholder="Nome do grupo" required>
        <button type="submit">Criar novo Grupo Economico</button>
    </form>

    <table>
        <thead>
        <h1>Grupos existentes</h1>
            <tr>
                <th>ID</th>
                <th>Nome</th>
            </tr>
        </thead>
        <tbody>
            @foreach($grupos as $grupo)
                <tr>
                    <td>{{ $grupo['id'] ?? '' }}</td>
                    <td>{{ $grupo['nome'] ?? '' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
