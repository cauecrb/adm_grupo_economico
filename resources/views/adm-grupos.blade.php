<div>
    <h1>Administração de Grupos</h1>

    <!-- Formulário para adicionar novo grupo -->
    <form wire:submit.prevent="adicionarGrupo">
        <input type="text" wire:model="nome" placeholder="Nome do grupo" required>
        <button type="submit">Adicionar Grupo</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
            </tr>
        </thead>
        <tbody>
            @foreach($grupos as $grupo)
                <tr>
                    <td>{{ $grupo['id'] }}</td>
                    <td>{{ $grupo['nome'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
