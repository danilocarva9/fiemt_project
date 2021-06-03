require('./bootstrap');
require('./jquery.mask');

//Masks dos campos
$('.money').mask('000.000.000.000.000,00', {reverse: true});
$(".date").mask("99/99/9999", {clearIfNotMatch: true, reverse: true});
$('.cpf').mask('000.000.000-00', {clearIfNotMatch: true, reverse: true});

//Calcular valor total do Pedido
$("#produto").change(function(){
    //Checa se tem valor
    !$("#quantidade").val() ? $("#quantidade").val(1) : !$("#quantidade").val();
    //Calcula
    var valor_total = calcularValorTotalPedido();
    $("#valor_total").val(valor_total);
});
//Quantidade
$("#quantidade").keyup(function(){
    //Checa se tem valor, só calcula se tiver produto selecionado
    var valor_total = !$("#produto").val() || !$("#quantidade").val() ? null : calcularValorTotalPedido();
    $("#valor_total").val(valor_total);
});

function calcularValorTotalPedido(){
    var valor_unitario = $("#produto").find(':selected').attr("data-value");
    var quantidade = $("#quantidade").val();
    $("#valor_unitario").val(formataParaReal(limpaFormatacao(valor_unitario)));
    var valor_total = (limpaFormatacao(quantidade) * limpaFormatacao(valor_unitario));
    return formataParaReal(valor_total);
}

function formataParaReal(valor){
    var v = valor+'';
    v = v.replace(/\D/g, "");
    v = v.replace(/(\d{1,2})$/, ",$1");  
    v = v.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");  
    v = v != ""? v:"";
    return v;
}

function limpaFormatacao(value){
    return parseInt(value.replace(/[\D]+/g,''));
}