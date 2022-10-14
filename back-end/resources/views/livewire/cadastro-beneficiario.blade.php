<div>
    <h3>Cadastrar Beneficiário</h3>
    <form>
        <div>
            <label for="nome">Nome:</label>
            <input required type="text" name="nome" id="nome">
        </div>

        <div>
            <label for="idade">Idade:</label>
            <input required type="number" name="idade" id="idade">
        </div>

        <div>
            <label for="plano">Plano:</label>
            <select name="plano" id="plano">
                @foreach ($planos as $plano)
                <option value="<?= $plano->codigo ?>">
                    <?= $plano->nome ?>
                </option>
                @endforeach
            </select>
        </div>
        <button id="cadastrarBeneficiario">Cadastrar</button>


    </form>
    <ul id="erros">

    </ul>
</div>

<script>
    let beneficiarios = [];
    
    $("#cadastrarBeneficiario").click(function(event){
    event.preventDefault();
    
    let erros = [];
    
    let divErros = $("#erros");
    divErros.empty();
    
    let nome = $("#nome").val();
    let idade = $("#idade").val();
    let plano = $("#plano").val();
    
    let beneficiario = {
    nome:nome,
    idade:idade,
    plano:plano,
    };
    
    beneficiarios.push(beneficiario);
    $.post("api/beneficiarios",
        {beneficiarios: beneficiarios},
    function(data, status){
         alert(`Beneficiário ${beneficiario.nome} cadastrado com sucesso!`);
    }).fail(function(error){
    
    beneficiarios = [];
    
    erros = Object.values(error.responseJSON.errors);
    
    erros.forEach(function(erro){
    divErros.append(`<li>${erro}</li>`);
    });
         alert("Ocorreu um erro e não foi possível cadastrar o beneficiário!");
    });
    });
</script>