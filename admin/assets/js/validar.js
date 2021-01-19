function Validar(tela) {

    var ret = true;
    switch (tela) {
        case 1: //adm_setor_gerenciar                          

            if ($("#nome").val().trim() == '') {
                $("#val_nome").show().html("Preencher o campo NOME");
                $("#divNome").addClass("has-error");
                ret = false;
            } else {
                $("#val_nome").hide();
                $("#divNome").removeClass("has-error");
            }

            break;
        case 2: //adm_funcionario_novo
            if ($("#tipo").val().trim() == '') {
                $("#val_tipo").show().html("Selecionar o campo TIPO");
                $("#divTipo").addClass("has-error");
                ret = false;
            } else {
                $("#val_tipo").hide();
                $("#divTipo").removeClass("has-error");
            }

            if ($("#nome").val().trim() == '') {
                $("#val_nome").show().html("Preencher o campo NOME");
                $("#divNome").addClass("has-error");
                ret = false;
            } else {
                $("#val_nome").hide();
                $("#divNome").removeClass("has-error");
            }

            if ($("#tipo").val().trim() != 1) {

                if ($("#setor").val().trim() == '') {
                    $("#val_setor").show().html("Selecionar o campo SETOR");
                    $("#divSetor").addClass("has-error");
                    ret = false;
                } else {
                    $("#val_setor").hide();
                    $("#divSetor").removeClass("has-error");
                }

                if ($("#email").val().trim() == '') {
                    $("#val_email").show().html("Prencher o campo E-MAIL");
                    $("#divEmail").addClass("has-error");
                    ret = false;
                } else {
                    $("#val_email").hide();
                    $("#divEmail").removeClass("has-error");
                }

                if ($("#telefone").val().trim() == '') {
                    $("#val_tel").show().html("Preencher o campo TELEFONE");
                    $("#divTelefone").addClass("has-error");
                    ret = false;
                } else {
                    $("#val_tel").hide();
                    $("#divTelefone").removeClass("has-error");
                }

                if ($("#endereco").val().trim() == '') {
                    $("#val_end").show().html("Preencher o campo ENDEREÇO");
                    $("#divEndereco").addClass("has-error");
                    ret = false;
                } else {
                    $("#val_end").hide();
                    $("#divEndereco").removeClass("has-error");
                }
            }
            break;
        case 3://adm_funcionario_consultar

            if ($("#tipo").val().trim() == '') {
                $("#val_tipo").show().html("Selecionar o campo TIPO");
                $("#divTipo").addClass("has-error");
                ret = false;
            } else {
                $("#val_tipo").hide();
                $("#divTipo").removeClass("has-error");
            }

            break;
        case 4://adm_funcionario_alterar
            if ($("#tipo").val().trim() == '') {
                $("#val_tipo").show().html("Selecione o campo Tipo");
                $("#divTipo").addClass("has-error");
                ret = false;
            } else {
                $("#val_tipo").hide();
                $("#divTipo").addClass("has-error");
            }
            if ($("#nome").val().trim() == '') {
                $("#val_nome").show().html("Preencher o campo NOME");
                $("#divNome").addClass("has-error");
                ret = false;
            } else {
                $("#val_nome").hide();
                $("#divNome").addClass("has-error");
            }
            if ($("#email").val().trim() == '') {
                $("#val_email").show().html("Preencher o campo E-MAIL");
                $("#divEmail").addClass("has-error");
                ret = false;
            } else {
                $("#val_email").hide();
                $("#divEmail").addClass("has-error");
            }
            if ($("#telefone").val().trim() == '') {
                $("#val_telefone").show().html("Preencher o campo TELEFONE");
                $("#divTelefone").addClass("has-error");
                ret = false;
            } else {
                $("#val_telefone").hide();
                $("#divTelefone").addClass("has-error");
            }
            if ($("#endereco").val().trim() == '') {
                $("#val_endereco").show().html("Preencher o campo ENDEREÇO");
                $("#divEndereco").addClass("has-error");
                ret = false;
            } else {
                $("#val_endereco").hide();
                $("#divEndereco").addClass("has-error");
            }

            break;
        case 5://adm_tipo_gerenciar

            if ($("#nomeTipo").val().trim() == '') {
                $("#val_nomeTipo").show().html("Preencher o campo NOME DO TIPO");
                $("#divNomeTipo").addClass("has-error");
                ret = false;
            } else {
                $("#val_nomeTipo").hide();
                $("#divNomeTipo").addClass("has-error");
            }

            break;
        case 6://adm_modelo_gerenciar

            if ($("#nomeModelo").val().trim() == '') {
                $("#val_nomeModelo").show().html("Preencher o campo NOME DO MODELO");
                $("#divNomeModelo").addClass("has-error");
                ret = false;
            } else {
                $("#val_nomeModelo").hide();
                $("#divNomeModelo").addClass("has-error");
            }

            break;
        case 7: //adm_novo_equipamento
            if ($("#tipo").val().trim() == '') {
                $("#val_tipo").show().html("Selecionar o campo TIPO");
                $("#divTipo").addClass("has-error");
                ret = false;
            } else {
                $("#val_tipo").hide();
                $("#divTipo").addClass("has-error");
            }
            if ($("#modelo").val().trim() == '') {
                $("#val_modelo").show().html("Selecionar o campo MODELO");
                $("#divModelo").addClass("has-error");
                ret = false;
            } else {
                $("#val_modelo").hide();
                $("#divModelo").addClass("has-error");
            }
            if ($("#identificacao").val().trim() == '') {
                $("#val_ident").show().html("Preencher o campo IDENTIFICAÇÃO");
                $("#divIdent").addClass("has-error");
                ret = false;
            } else {
                $("#val_ident").hide();
                $("#divIdent").addClass("has-error");
            }
            if ($("#descricao").val().trim() == '') {
                $("#val_descricao").show().html("Preencher o campo DESCRIÇÃO");
                $("#divDescricao").addClass("has-error");
                ret = false;
            } else {
                $("#val_descricao").hide();
                $("#divDescricao").addClass("has-error");
            }
            break;
        case 8: //adm_consultar_equipamento
            if ($("#rever").val().trim() == '') {
                $("#val_rever").show().html("Selecione o campo TIPO / REVER");
                $("#divRever").addClass("has-error");
                ret = false;
            } else {
                $("#val_rever").hide();
                $("#divRever").addClass("has-error");
            }
            break;
        case 9: //adm_alterar_equipamento
            if ($("#tipo").val().trim() == '') {
                $("#val_tipo").show().html("Selecionar o campo TIPO");
                $("#divTipo").addClass("has-error");
                ret = false;
            } else {
                $("#val_tipo").hide();
                $("#divTipo").addClass("has-error");
            }
            if ($("#modelo").val().trim() == '') {
                $("#val_modelo").show().html("Selecionar o campo MODELO");
                $("#divModelo").addClass("has-error");
                ret = false;
            } else {
                $("#val_modelo").hide();
                $("#divModelo").addClass("has-error");
            }
            if ($("#identificacao").val().trim() == '') {
                $("#val_ident").show().html("Preencher o campo IDENTIFICAÇÃO");
                $("#divIdent").addClass("has-error");
                ret = false;
            } else {
                $("#val_ident").hide();
                $("#divIdent").addClass("has-error");
            }
            if ($("#descricao").val().trim() == '') {
                $("#val_descricao").show().html("Preencher o campo DESCRIÇÃO");
                $("#divDescricao").addClass("has-error");
                ret = false;
            } else {
                $("#val_descricao").hide();
                $("#divDescricao").addClass("has-error");
            }
            break;

        case 10: //adm_alocar_equipamento
            if ($("#setor").val().trim() == '') {
                $("#val_setor").show().html("Selecionar o campo SETOR");
                $("#divSetor").addClass("has-error");
                ret = false;
            } else {
                $("#val_setor").hide();
                $("#divSetor").addClass("has-error");
            }
            if ($("#equipamento").val().trim() == '') {
                $("#val_equipamento").show().html("Selecionar o campo EQUIPAMENTO");
                $("#divEquipamento").addClass("has-error");
                ret = false;
            } else {
                $("#val_equipamento").hide();
                $("#divEquipamento").addClass("has-error");
            }

        case 11: //adm_remover_equipamento
            if ($("#tipo").val().trim() == '') {
                $("#val_tipo").show().html("Selecionar o campo TIPO");
                $("#divTipo").addClass("has-error");
                ret = false;
            } else {
                $("#val_tipo").hide();
                $("#divTipo").addClass("has-error");
            }
            break;
    }
    return ret;
}
function ExibirTipo(tipo) {
//    alert(tipo);

//verifica se o tipo é ADM
    if (tipo == 1) {
        $("#divNomeFunc").show();
        $("#divGeral").hide();
    } else if (tipo == 2 || tipo == 3) { //caso contrario mostra os demais campos
        $("#divNomeFunc").show();
        $("#divGeral").show();
    } else {
        $("#divNomeFunc").hide();
        $("#divGeral").hide();
    }
}

function ValidarEmail() {
    
    var email = $("#email").val().trim();

    $.post("assets/ajax/validar_email.php", {email_user: email}, function (ret){
        if(ret == '1'){
            $("#val_email").show().html("E-mail já existente");
            $("#divEmail").addClass("has-error");
            ret = false;
        }else{
            $("#val_email").hide();
            $("#divEmail").removeClass("has-error");
        }
    });
}


    