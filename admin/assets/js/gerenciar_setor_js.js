function InserirSetor() {

    $.post("assets/ajax/gerenciar_setor_ajx.php",
            {
                nome: $("#nome").val().trim(),
                acao: 'I'
            }, function (ret) {

        $("#msg").html(ret);
        $("#nome").val('');

        $.post("assets/ajax/gerenciar_setor_ajx.php",
                {
                    acao: 'C'
                }, function (ret) {
            $("#tabSetores").html(ret);
        });
    });
}    