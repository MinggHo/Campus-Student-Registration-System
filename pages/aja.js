$(document).on('focus','#student2',function(){
  var x_timer;
  $("#student2").keyup(function (e){
    clearTimeout(x_timer);
    var user_name = $(this).val();
    x_timer = setTimeout(function(){
      check_username_ajax(user_name);
    }, 1000);
  });

  function check_username_ajax(username){
    $.post('data.php', {'username':username}, function(data) {
      $("#help2").html(data);
    });
  }
});

$(document).on('focus','#student2',function(){
  var value = $('#student2').val();

  if (!value.trim())
    $('#help2').after(
    '<p id="help2" style="color: #4200FC" class="help-block"><small>Reminder : Please make sure the matric number is correct </br> and use uppercase B or D<small></p>'
  );
  $('p#help2').fadeOut(5000);

}).on('blur','#student2',function(){
  var value = $('#student2').val();
  var newval = value.charAt(0);
  var lastval = value.charAt(9);
  var subval = value.substring(1,9);
  var subBool = $.isNumeric(subval);
  var lastBool = $.isNumeric(lastval);

  if ((newval == 'B' || newval == 'b' || newval == 'D' || newval == 'd') && (subBool == 1 && lastBool == 1)){
    $('#help2').after(
      '<p id="help2" style="color: #00FB21" class="help-block"><small>Success<small></p>'
    );
    $('#labelform2').attr('class', 'form-group has-success');
    $(":submit").removeAttr("disabled");
    $('p#help2').fadeOut(1000);
  } else {
    $('#help2').after(
      '<p id="help2" style="color: #FF0000" class="help-block"><small>Error : Not a valid matric number!<small></p>'
    );
    $('#labelform2').attr('class', 'form-group has-error');
    $(":submit").attr("disabled", true);
    $('p#help2').fadeOut(4000);
  }
});
