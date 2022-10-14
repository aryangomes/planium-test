<div>
    <div>
        @if (count($beneficiariosPorPlano)> 0)
        <h3>Beneficiários cadastrados: </h3>
        <ul class="list-group">
            @foreach ($beneficiariosPorPlano as $beneficiarios )
            @foreach ($beneficiarios as $beneficiario)

            @if (is_object($beneficiario))
            <li class="list-group-item">
                <h4>Beneficiário: {{ $beneficiario->nome }}</h4>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Idade:</strong> {{ $beneficiario->idade }} anos</li>
                    <li class="list-group-item"><strong>Plano:</strong> {{ $beneficiario->plano }}</li>
                </ul>
            </li>
            @endif

            @endforeach
            @endforeach
        </ul>
        @else
        <div class="alert alert-warning" role="alert">
            Não há beneficiários cadastrados! Para cadastrar, informes os dados acima e clique no botão
            <strong>"Cadastrar
                Beneficiário".</strong>
        </div>
    </div>

    @endif
    <div class="row g-3">

        <button wire:click="listarBeneficiarios" class="btn btn-primary">Listar Beneficiários</button>
    </div>
</div>