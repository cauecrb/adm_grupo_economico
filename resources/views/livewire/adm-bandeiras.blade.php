<div>
    <h1>Administração de Bandeiras</h1>
    <form wire:submit.prevent="adicionarBandeira">
        <input type="text" wire:model="nome" placeholder="Nome da bandeira" required></br>
        <input type="text" wire:model="grupo_economico_id" placeholder="id do grupo relacionado" required>
        @error('foreign_id') <span class="error">{{ $message }}</span> @enderror
        <button type="submit">Criar novo Grupo Economico</button>
    </form>

    <table>
        <thead>
        <h1>Bandeiras existentes</h1>
            <tr>
                <th>ID</th>
                <th>Nome</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bandeiras as $bandeira)
                <tr>
                    <td>{{ $bandeira['id'] ?? '' }}</td>
                    <td>{{ $bandeira['nome'] ?? '' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>