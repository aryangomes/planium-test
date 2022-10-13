<div>
    @if (count($beneficiariosPorPlano)> 0)
    <ul>
        <h3>Beneficiários cadastrados: </h3>
        @foreach ($beneficiariosPorPlano as $beneficiarios )
        @foreach ($beneficiarios as $beneficiario)

        @if (is_object($beneficiario))
        <li>
            <h4>Beneficiário: {{ $beneficiario->nome }}</h4>
            <ul>
                <li><strong>Idade:</strong> {{ $beneficiario->idade }} anos</li>
                <li><strong>Plano:</strong> {{ $beneficiario->plano }}</li>
            </ul>
        </li>
        @endif

        @endforeach
        @endforeach
    </ul>

    @endif
    <button wire:click="listarBeneficiarios">Listar Beneficiários</button>
</div>