<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <title>PLANIUM TEST</title>
</head>

<body>

    <form>
        <x-beneficiario.forms.input />
        <button id="cadastrarBeneficiario">Cadastrar</button>
    </form>

    <livewire:scripts />
    <livewire:lista-beneficiarios />
    <livewire:propostas />

</html>
<script>
    let beneficiarios = [];

    $("#cadastrarBeneficiario").click(function(event){
      event.preventDefault();
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
        });
    });

    $("#botaoGerarProposta").click(function(event){
    event.preventDefault();

    $.get("api/gerarProposta",
    function(data, status){
    });
    });

</script>