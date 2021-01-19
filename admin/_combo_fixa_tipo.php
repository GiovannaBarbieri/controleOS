<div class="form-group" id="divTipo">
    <label>Tipo</label>
    <select class="form-control" name="tipo" id="tipo" onchange="ExibirTipo(this.value)">
        <option value="">Selecione</option>
        <option value="1" <?= isset($tipo) ? ($tipo == 1 ? 'selected' : '') : '' ?> >Administrador</option>
        <option value="2" <?= isset($tipo) ? ($tipo == 2 ? 'selected' : '') : '' ?> >Setor</option>
        <option value="3" <?= isset($tipo) ? ($tipo == 3 ? 'selected' : '') : '' ?> >Técnico</option>     
    </select>
    <label id="val_tipo" class="Validar"></label>
</div>