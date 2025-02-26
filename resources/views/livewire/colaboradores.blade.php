<div>
    <h1>Administração de Colaboradores</h1>
    <form wire:submit.prevent="adicionarColaborador">
        <input type="text" wire:model="nome" placeholder="nome" required></br>
        <input type="text" wire:model="email" placeholder="email" required></br>
        <input type="text" wire:model="cpf" placeholder="cpf" required></br>
        <input type="text" wire:model="unidade_id" placeholder="id unidade relacionada" required>
        @error('foreign_id') <span class="error">{{ $message }}</span> @enderror
        <button type="submit">Adicionar novo colaborador</button>
    </form>

    <table>
        <thead>
        <h1>colaboradores existentes</h1>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>CPF</th>
            </tr>
        </thead>
        <tbody>
            @foreach($colaboradores as $colabolador)
                <tr>
                    <td>{{ $colabolador['id'] ?? '' }}</td>
                    <td>{{ $colabolador['nome'] ?? '' }}</td>
                    <td>{{ $colabolador['email'] ?? '' }}</td>
                    <td>{{ $colabolador['cpf'] ?? '' }}</td>


                </tr>
            @endforeach
        </tbody>
    </table>
</div>