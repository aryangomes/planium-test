<div>

    <div>
        @if ($propostas)

        <h3>Propostas: </h3>
        @foreach ($propostas as $propostaPlano )
        <ol>
            @foreach ($propostaPlano as $proposta )

            @if (is_array($proposta))

            <li>
                <h4>Beneficiário: {{ $proposta['nome'] }}</h4>
                <ul>
                    <li><strong>Idade:</strong> {{ $proposta['idade'] }} anos</li>
                    <li><strong>Nome do Plano:</strong> {{ $proposta['nome_plano'] }}</li>
                    <li><strong>Registro do Plano:</strong> {{ $proposta['registro_plano'] }}</li>
                    <li><strong>Preço: R$</strong> {{ number_format($proposta['preco'],2) }}</li>
                </ul>
            </li>
            @endif
            @endforeach

            <h4>Preço total do Plano : R$ {{ number_format($propostaPlano['precoTotalDoPlano'],2) }} </h4>
        </ol>
        @endforeach
        @endif

        <button id="botaoGerarProposta">Gerar Propostas</button>
        <button wire:click="listarProposta">Listar Propostas</button>
    </div>
</div>