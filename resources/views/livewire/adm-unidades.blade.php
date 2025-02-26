<div>
    <h1>Administração de Unidades</h1>
    <form wire:submit.prevent="adicionarUnidade">
        <input type="text" wire:model="nome_fantasia" placeholder="nome_fantasia" required></br>
        <input type="text" wire:model="razao_social" placeholder="razao_social" required></br>
        <input type="text" wire:model="cnpj" placeholder="cnpj" required></br>
        <input type="text" wire:model="bandeira_id" placeholder="id da bandeira relacionada" required>
        @error('foreign_id') <span class="error">{{ $message }}</span> @enderror
        <button type="submit">Criar nova unidade</button>
    </form>

    <table>
        <thead>
        <h1>Unidades existentes</h1>
            <tr>
                <th>ID</th>
                <th>Nome</th>
            </tr>
        </thead>
        <tbody>
            @foreach($unidades as $unidade)
                <tr>
                    <td>{{ $unidade['id'] ?? '' }}</td>
                    <td>{{ $unidade['nome_fantasia'] ?? '' }}</td>
                    <td>{{ $unidade['razao_social'] ?? '' }}</td>
                    <td>{{ $unidade['cnpj'] ?? '' }}</td>


                </tr>
            @endforeach
        </tbody>
    </table>
</div>