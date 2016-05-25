$(document).ready(function(){

  $(".home").hide(100);
  $(".who-we-are").hide(100);
  $(".pizze").show(100);


  $("#1").click(function() {
    $(".pizze").hide(100);
    $(".who-we-are").hide(100);;
    $(".home").show(100);
  });

  $("#2").click(function() {
    $(".home").hide(100);
    $(".who-we-are").hide(100);
    $(".pizze").show(100);
  });

  $("#3").click(function() {
    $(".pizze").hide(100);
    $(".home").hide(100);
    $(".who-we-are").show(100);
  });

});
