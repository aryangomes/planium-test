<div>
    <h3>Cadastrar Beneficiário</h3>
    <div>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
    </div>

    <div>
        <label for="idade">Idade:</label>
        <input type="number" name="idade" id="idade">
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
</div>