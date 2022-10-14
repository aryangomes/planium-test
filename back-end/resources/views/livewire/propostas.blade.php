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

        @else
        <div>
            <p>Não há propostas geradas! Para gerar as propotas, clique no botão "Gerar Propostas"</p>
        </div>
        @endif

        <div>
            <button id="botaoGerarProposta">Gerar Propostas</button>
        </div>
    </div>
</div>

<script>
    $("#botaoGerarProposta").click(function(event){
    event.preventDefault();
    
    $.get("api/gerarProposta",
    function(data, status){
        let result = JSON.parse(data);
        @this.propostas = result;
    alert("Propostas geradas com sucesso!");
    }).fail(function(){
    alert("Ocorreu um erro e não foi possível gerar as propostas!");
    });
    });


</script>