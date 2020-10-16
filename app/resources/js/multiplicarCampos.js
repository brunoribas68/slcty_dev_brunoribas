var campoExperiencia = $("#experienciaDiv").html();
$("#maisExperiencia").click(function(){
  var count = $("[name='countF']").last().val();
  campoExperiencia.replace("name='experiencia[]'",'name=experiencia['+count+']');
  campoExperiencia.replace('display:none','display:block');
  console.log(campoExperiencia);
  $("#experienciaDiv").after(campoExperiencia);
});

var campoFormacao = $("#formacaoDiv").html();

$("#maisFormacao").click(function(){
  var count = $("[name='countF']").last().val();
  campoFormacao.replace("name='formacao[]'",'name=formacao['+count+']');
  campoFormacao.replace('display:none','display:block');
  console.log(campoFormacao);
  $("#formacaoDiv").after(campoFormacao);
});
