var modo = "";
            
function obterTodos(){

    $.ajax({

        type:"POST",
        url:"router.php",
        data:{acao:"obterTodos"},
        success: function(dados){

            modo = ""; 

            $("#table").html(dados);

            $("#txt_nome").val("");
            $("#txt_classificacao").val("");
            $("#txt_estudio").val("");
            
            $("#btn_enviar").val("Registrar");

        }

    });    

}

function inserir(){

    $.ajax({

        type:"POST",
        url:"router.php",
        data:{

            nome:$("#txt_nome").val(),
            classificacao:$("#txt_classificacao").val(), 
            estudio:$("#txt_estudio").val(),
            acao:"inserir"},

        success: function(dados){        

            obterTodos();

        }

    });

}

function obterUm(idFilme){

    $.ajax({

        type:"POST",
        url:"router.php",
        data:{acao:"obterUm", id:idFilme},
        success: function(dados){

            modo = "atualizar";

            var filme = JSON.parse(dados);

            $("#txt_nome").val(filme["nome"]);
            $("#txt_classificacao").val(filme["classificacao"]);
            $("#txt_estudio").val(filme["estudio"]);
            
            $("#btn_enviar").val("Atualizar");

        }

    });

}

function atualizar(){

    $.ajax({

        type:"POST",
        url:"router.php",
        data:{

            nome:$("#txt_nome").val(),
            classificacao:$("#txt_classificacao").val(), 
            estudio:$("#txt_estudio").val(),
            acao:"atualizar"},

        success: function(dados){

            obterTodos();

        }

    });

}

function remover(idFilme){

    $.ajax({

        type:"POST",
        url:"router.php",
        data:{acao:"remover", id:idFilme},
        success: function(dados){

            obterTodos();

        }

    });

}

$(document).ready(function(){

    obterTodos();

    $("#btn_enviar").click(function(){

        if(modo == "atualizar"){

            atualizar();

        } else { 

            inserir();

        }

    });

});