<div class="mb-2">

    <div>
        @if ($propostasDosBeneficiarios)

        <h3>Propostas: </h3>
        @foreach ($propostasDosBeneficiarios as $propostaPorPlano )
        <ol class="list-group list-group-numbered">
            @foreach ($propostaPorPlano as $proposta )

            @if (is_array($proposta))

            <li class="list-group-item">
                <span>Beneficiário: {{ $proposta['nome'] }}</span>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Idade:</strong> {{ $proposta['idade'] }} anos</li>
                    <li class="list-group-item"><strong>Nome do Plano:</strong> {{ $proposta['nome_plano'] }}</li>
                    <li class="list-group-item"><strong>Registro do Plano:</strong> {{ $proposta['registro_plano'] }}
                    </li>
                    <li class="list-group-item"><strong>Preço: R$</strong> {{ number_format($proposta['preco'],2) }}
                    </li>
                </ul>
            </li>
            @endif
            @endforeach
            <div class="alert alert-info">

                <p>
                    <strong>Preço total do Plano : R$ {{ number_format($propostaPorPlano['precoTotalDoPlano'],2) }}
                    </strong>
                </p>
            </div>
        </ol>
        @endforeach

        @else
        <div class="alert alert-warning" role="alert">
            <p>
                Não há propostas geradas! Para gerar as propostas, clique no botão <strong>"Gerar Propostas"</strong>
            </p>
        </div>
        @endif

        <div class="row g-3">
            <button id="botaoGerarProposta" class="btn btn-secondary">Gerar Propostas</button>
        </div>
    </div>
</div>

<script>
    $("#botaoGerarProposta").click(function(event){
    event.preventDefault();
    
    $.get("api/gerarProposta",
    function(data, status){
        let result = JSON.parse(data);
        @this.propostasDosBeneficiarios = result;
    alert("Propostas geradas com sucesso!");
    }).fail(function(){
    alert("Ocorreu um erro e não foi possível gerar as propostas!");
    });
    });


</script>