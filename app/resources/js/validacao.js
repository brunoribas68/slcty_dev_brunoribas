$("#enviar").click(function(){
  event.preventDefault();
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  if (!filter.test($("#email").val())) {
      $("#previousFinal").click();
      $("#previousSecond").click();
      $("#email").focus();
      $("#emailErr").text("Campo preechido errado!");
      $("#emailErr").css("display","block");
      return false;
  }
  // $("#formulario").submit();
});
