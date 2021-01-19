<div class="modal fade" id="modExcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Confirmar exclusão</h4>
            </div>
          
                <div class="modal-body">
                    Deseja excluir o item <b><span id="nome_exc"></span></b>?
                    <input type="hidden" id="cod_exc" name="cod" />
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button class="btn btn-success" name="btnExcluir">Sim</button>
                </div>
        </div>
    </div>
</div>