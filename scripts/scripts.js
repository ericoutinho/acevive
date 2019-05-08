function clearForm(){
    $("form input, form textarea").val("");
}

const getMask = (value, mask) => {
    var este  = event.target;
    var valor = value.replace(/[\D]+/g, "");
    var campo = mask;
    for (var i = 0; i <= valor.length; i++) {
        campo = campo.replace("#", valor.charAt(i));
    }
    este.value = campo;
    //console.log(campo);
}

function sendForm(){
    var nome        = $("#nome");
    var email       = $("#email");
    var telefone    = $("#telefone");
    var mensagem    = $("#mensagem");
    var btnSubmit   = $("#btn-submit");
    var btnCancel   = $("#btn-cancel");
    var errors      = 0;

    $(".form-text").removeClass("text-danger").html("");

    if (nome.val() == "" || nome.val().length < 3) {
        // nome.closest("div").find(".helper").html("vazio");
        errors += 1;
        $("#nomeHelperBlock").addClass("text-danger").html("<i class='fas fa-info-circle fa-fw mr-2'></i> Queremos te conhecer. Informe seu nome");
    }
    if (email.val() =="" || email.val().search("[a-z0-9\.\-]+@{1}[a-z]+\.[a-z]{3}.?[a-z]*")) {
        // email.closest("div").find(".helper").html("vazio");
        errors += 1;
        $("#emailHelperBlock").addClass("text-danger").html("<i class='fas fa-info-circle fa-fw mr-2'></i> É necessário informar um e-mail válido.");
    }
    if (telefone.val() =="") {
        // telefone.closest("div").find(".helper").html("vazio");
        errors += 1;
        $("#telefoneHelperBlock").addClass("text-danger").html("<i class='fas fa-info-circle fa-fw mr-2'></i> Alô! Por favor informe um telefone de contato");
    }
    if (mensagem.val() =="") {
        // mensagem.closest("div").find(".helper").html("vazio");
        errors += 1;
        $("#mensagemHelperBlock").addClass("text-danger").html("<i class='fas fa-info-circle fa-fw mr-2'></i> Sua mensagem é importante para nós. Escreva!");
    }

    //console.warn("Erros: " + errors);

    if (errors === 0) {
        var info = $("#contact-form").serialize();
        var ajax = $.post("scripts/mailer.php", info);
        ajax.done(function(data){
            if(data == 'success'){
                console.log(data);
                $("#contact-form").hide();
                $("#status-form").removeClass("d-none");
            } else {
                console.warn("FAIL");
            }
        });
        ajax.fail(function(){
            console.warn("A");
        });
    }
    
}
