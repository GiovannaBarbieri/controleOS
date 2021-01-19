function InserirModelo(){
    $.post("assets/ajax/gerenciar_modelo_ajx.php",{
        nome: $("#nome").val().trim(),
        acao: 'I'
    },function (ret){
        $("#msg").html(ret);
        $("#nome").val('');
    });
}