        /*------------------
        super validator AJAX-fabulos
        --------------------*/

        /*--------------------------
            Input No. 2
        -------------------------*/

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
  $('p#help2').fadeOut(3000);

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
    $('p#help2').fadeOut(1000);
  } else {
    $('#help2').after(
      '<p id="help2" style="color: #FF0000" class="help-block"><small>Error : Not a valid matric number!<small></p>'
    );
    $('#labelform2').attr('class', 'form-group has-error');
    $('p#help2').fadeOut(2000);
  }
});

/*--------------------------
    Input No. 3
-------------------------*/

$(document).on('focus','#student3',function(){
  var x_timer;
  $("#student3").keyup(function (e){
    clearTimeout(x_timer);
    var user_name = $(this).val();
    x_timer = setTimeout(function(){
      check_username_ajax(user_name);
    }, 1000);
  });

  function check_username_ajax(username){
    $.post('data.php', {'username':username}, function(data) {
      $("#help3").html(data);
    });
  }
});

$(document).on('focus','#student3',function(){
  var value = $('#student3').val();

  if (!value.trim())
    $('#help3').after(
    '<p id="help3" style="color: #4200FC" class="help-block"><small>Reminder : Please make sure the matric number is correct </br> and use uppercase B or D<small></p>'
  );
  $('p#help3').fadeOut(3000);

}).on('blur','#student3',function(){
  var value = $('#student3').val();
  var newval = value.charAt(0);
  var lastval = value.charAt(9);
  var subval = value.substring(1,9);
  var subBool = $.isNumeric(subval);
  var lastBool = $.isNumeric(lastval);

  if ((newval == 'B' || newval == 'b' || newval == 'D' || newval == 'd') && (subBool == 1 && lastBool == 1)){
    $('#help3').after(
      '<p id="help3" style="color: #00FB21" class="help-block"><small>Success<small></p>'
    );
    $('#labelform3').attr('class', 'form-group has-success');
    $('p#help3').fadeOut(1000);
  } else {
    $('#help3').after(
      '<p id="help3" style="color: #FF0000" class="help-block"><small>Error : Not a valid matric number!<small></p>'
    );
    $('#labelform3').attr('class', 'form-group has-error');
    $('p#help3').fadeOut(2000);
  }
});

/*--------------------------
    Input No. 4
-------------------------*/

$(document).on('focus','#student4',function(){
  var x_timer;
  $("#student4").keyup(function (e){
    clearTimeout(x_timer);
    var user_name = $(this).val();
    x_timer = setTimeout(function(){
      check_username_ajax(user_name);
    }, 1000);
  });

  function check_username_ajax(username){
    $.post('data.php', {'username':username}, function(data) {
      $("#help4").html(data);
    });
  }
});

$(document).on('focus','#student4',function(){
  var value = $('#student4').val();

  if (!value.trim())
    $('#help4').after(
    '<p id="help4" style="color: #4200FC" class="help-block"><small>Reminder : Please make sure the matric number is correct </br> and use uppercase B or D<small></p>'
  );
  $('p#help3').fadeOut(3000);

}).on('blur','#student4',function(){
  var value = $('#student4').val();
  var newval = value.charAt(0);
  var lastval = value.charAt(9);
  var subval = value.substring(1,9);
  var subBool = $.isNumeric(subval);
  var lastBool = $.isNumeric(lastval);

  if ((newval == 'B' || newval == 'b' || newval == 'D' || newval == 'd') && (subBool == 1 && lastBool == 1)){
    $('#help4').after(
      '<p id="help4" style="color: #00FB21" class="help-block"><small>Success<small></p>'
    );
    $('#labelform4').attr('class', 'form-group has-success');
    $('p#help4').fadeOut(1000);
  } else {
    $('#help4').after(
      '<p id="help4" style="color: #FF0000" class="help-block"><small>Error : Not a valid matric number!<small></p>'
    );
    $('#labelform4').attr('class', 'form-group has-error');
    $('p#help4').fadeOut(2000);
  }
});

/*--------------------------
    Input No. 5
-------------------------*/
$(document).on('focus','#student5',function(){
  var x_timer;
  $("#student5").keyup(function (e){
    clearTimeout(x_timer);
    var user_name = $(this).val();
    x_timer = setTimeout(function(){
      check_username_ajax(user_name);
    }, 1000);
  });

  function check_username_ajax(username){
    $.post('data.php', {'username':username}, function(data) {
      $("#help5").html(data);
    });
  }
});

$(document).on('focus','#student5',function(){
  var value = $('#student5').val();

  if (!value.trim())
    $('#help5').after(
    '<p id="help5" style="color: #4200FC" class="help-block"><small>Reminder : Please make sure the matric number is correct </br> and use uppercase B or D<small></p>'
  );
  $('p#help5').fadeOut(3000);

}).on('blur','#student5',function(){
  var value = $('#student5').val();
  var newval = value.charAt(0);
  var lastval = value.charAt(9);
  var subval = value.substring(1,9);
  var subBool = $.isNumeric(subval);
  var lastBool = $.isNumeric(lastval);

  if ((newval == 'B' || newval == 'b' || newval == 'D' || newval == 'd') && (subBool == 1 && lastBool == 1)){
    $('#help5').after(
      '<p id="help5" style="color: #00FB21" class="help-block"><small>Success<small></p>'
    );
    $('#labelform5').attr('class', 'form-group has-success');
    $('p#help5').fadeOut(1000);
  } else {
    $('#help5').after(
      '<p id="help5" style="color: #FF0000" class="help-block"><small>Error : Not a valid matric number!<small></p>'
    );
    $('#labelform5').attr('class', 'form-group has-error');
    $('p#help5').fadeOut(2000);
  }
});

/*--------------------------
    Input No. 6
-------------------------*/
$(document).on('focus','#student6',function(){
  var x_timer;
  $("#student6").keyup(function (e){
    clearTimeout(x_timer);
    var user_name = $(this).val();
    x_timer = setTimeout(function(){
      check_username_ajax(user_name);
    }, 1000);
  });

  function check_username_ajax(username){
    $.post('data.php', {'username':username}, function(data) {
      $("#help6").html(data);
      console.log(flag);
    });
  }
});

$(document).on('focus','#student6',function(){
  var value = $('#student6').val();

  if (!value.trim())
    $('#help6').after(
    '<p id="help6" style="color: #4200FC" class="help-block"><small>Reminder : Please make sure the matric number is correct </br> and use uppercase B or D</small></p>'
  );
  $('p#help3').fadeOut(3000);

}).on('blur','#student6',function(){
  var value = $('#student6').val();
  var newval = value.charAt(0);
  var lastval = value.charAt(9);
  var subval = value.substring(1,9);
  var subBool = $.isNumeric(subval);
  var lastBool = $.isNumeric(lastval);

  if ((newval == 'B' || newval == 'b' || newval == 'D' || newval == 'd') && (subBool == 1 && lastBool == 1)){
    $('#help6').after(
      '<p id="help6" style="color: #00FB21" class="help-block"><small>Success</small></p>'
    );
    $('#labelform6').attr('class', 'form-group has-success');
    $('p#help6').fadeOut(1000);
  } else {
    $('#help6').after(
      '<p id="help6" style="color: #FF0000" class="help-block"><small>Error : Not a valid matric number!</small></p>'
    );
    $('#labelform6').attr('class', 'form-group has-error');
    $('p#help6').fadeOut(2000);
  }
});

/*--------------------------
    Input No. 7
-------------------------*/
$(document).on('focus','#student7',function(){
  var x_timer;
  $("#student7").keyup(function (e){
    clearTimeout(x_timer);
    var user_name = $(this).val();
    x_timer = setTimeout(function(){
      check_username_ajax(user_name);
    }, 1000);
  });

  function check_username_ajax(username){
    $.post('data.php', {'username':username}, function(data) {
      $("#help7").html(data);
    });
  }
});

$(document).on('focus','#student7',function(){
  var value = $('#student7').val();

  if (!value.trim())
    $('#help7').after(
    '<p id="help7" style="color: #4200FC" class="help-block"><small>Reminder : Please make sure the matric number is correct </br> and use uppercase B or D<small></p>'
  );
  $('p#help3').fadeOut(3000);

}).on('blur','#student7',function(){
  var value = $('#student7').val();
  var newval = value.charAt(0);
  var lastval = value.charAt(9);
  var subval = value.substring(1,9);
  var subBool = $.isNumeric(subval);
  var lastBool = $.isNumeric(lastval);

  if ((newval == 'B' || newval == 'b' || newval == 'D' || newval == 'd') && (subBool == 1 && lastBool == 1)){
    $('#help7').after(
      '<p id="help7" style="color: #00FB21" class="help-block"><small>Success<small></p>'
    );
    $('#labelform7').attr('class', 'form-group has-success');
    $('p#help7').fadeOut(1000);
  } else {
    $('#help7').after(
      '<p id="help7" style="color: #FF0000" class="help-block"><small>Error : Not a valid matric number!<small></p>'
    );
    $('#labelform7').attr('class', 'form-group has-error');
    $('p#help7').fadeOut(2000);
  }
});

/*--------------------------
    Input No. 8
-------------------------*/
$(document).on('focus','#student8',function(){
  var x_timer;
  $("#student8").keyup(function (e){
    clearTimeout(x_timer);
    var user_name = $(this).val();
    x_timer = setTimeout(function(){
      check_username_ajax(user_name);
    }, 1000);
  });

  function check_username_ajax(username){
    $.post('data.php', {'username':username}, function(data) {
      $("#help8").html(data);
    });
  }
});

$(document).on('focus','#student8',function(){
  var value = $('#student8').val();

  if (!value.trim())
    $('#help8').after(
    '<p id="help8" style="color: #4200FC" class="help-block"><small>Reminder : Please make sure the matric number is correct </br> and use uppercase B or D<small></p>'
  );
  $('p#help3').fadeOut(3000);

}).on('blur','#student8',function(){
  var value = $('#student8').val();
  var newval = value.charAt(0);
  var lastval = value.charAt(9);
  var subval = value.substring(1,9);
  var subBool = $.isNumeric(subval);
  var lastBool = $.isNumeric(lastval);

  if ((newval == 'B' || newval == 'b' || newval == 'D' || newval == 'd') && (subBool == 1 && lastBool == 1)){
    $('#help8').after(
      '<p id="help8" style="color: #00FB21" class="help-block"><small>Success<small></p>'
    );
    $('#labelform8').attr('class', 'form-group has-success');
    $('p#help8').fadeOut(1000);
  } else {
    $('#help8').after(
      '<p id="help8" style="color: #FF0000" class="help-block"><small>Error : Not a valid matric number!<small></p>'
    );
    $('#labelform8').attr('class', 'form-group has-error');
    $('p#help8').fadeOut(2000);
  }
});

/*--------------------------
    Input No. 9
-------------------------*/
$(document).on('focus','#student9',function(){
  var x_timer;
  $("#student9").keyup(function (e){
    clearTimeout(x_timer);
    var user_name = $(this).val();
    x_timer = setTimeout(function(){
      check_username_ajax(user_name);
    }, 1000);
  });

  function check_username_ajax(username){
    $.post('data.php', {'username':username}, function(data) {
      $("#help9").html(data);
    });
  }
});

$(document).on('focus','#student9',function(){
  var value = $('#student9').val();

  if (!value.trim())
    $('#help9').after(
    '<p id="help9" style="color: #4200FC" class="help-block"><small>Reminder : Please make sure the matric number is correct </br> and use uppercase B or D<small></p>'
  );
  $('p#help3').fadeOut(3000);

}).on('blur','#student9',function(){
  var value = $('#student9').val();
  var newval = value.charAt(0);
  var lastval = value.charAt(9);
  var subval = value.substring(1,9);
  var subBool = $.isNumeric(subval);
  var lastBool = $.isNumeric(lastval);

  if ((newval == 'B' || newval == 'b' || newval == 'D' || newval == 'd') && (subBool == 1 && lastBool == 1)){
    $('#help9').after(
      '<p id="help9" style="color: #00FB21" class="help-block"><small>Success<small></p>'
    );
    $('#labelform9').attr('class', 'form-group has-success');
    $('p#help9').fadeOut(1000);
  } else {
    $('#help9').after(
      '<p id="help9" style="color: #FF0000" class="help-block"><small>Error : Not a valid matric number!<small></p>'
    );
    $('#labelform9').attr('class', 'form-group has-error');
    $('p#help9').fadeOut(2000);
  }
});

/*--------------------------
    Input No. 10
-------------------------*/
$(document).on('focus','#student10',function(){
  var x_timer;
  $("#student10").keyup(function (e){
    clearTimeout(x_timer);
    var user_name = $(this).val();
    x_timer = setTimeout(function(){
      check_username_ajax(user_name);
    }, 1000);
  });

  function check_username_ajax(username){
    $.post('data.php', {'username':username}, function(data) {
      $("#help10").html(data);
    });
  }
});

$(document).on('focus','#student10',function(){
  var value = $('#student10').val();

  if (!value.trim())
    $('#help10').after(
    '<p id="help10" style="color: #4200FC" class="help-block"><small>Reminder : Please make sure the matric number is correct </br> and use uppercase B or D<small></p>'
  );
  $('p#help3').fadeOut(3000);

}).on('blur','#student10',function(){
  var value = $('#student10').val();
  var newval = value.charAt(0);
  var lastval = value.charAt(9);
  var subval = value.substring(1,9);
  var subBool = $.isNumeric(subval);
  var lastBool = $.isNumeric(lastval);

  if ((newval == 'B' || newval == 'b' || newval == 'D' || newval == 'd') && (subBool == 1 && lastBool == 1)){
    $('#help10').after(
      '<p id="help10" style="color: #00FB21" class="help-block"><small>Success<small></p>'
    );
    $('#labelform10').attr('class', 'form-group has-success');
    $('p#help10').fadeOut(1000);
  } else {
    $('#help10').after(
      '<p id="help10" style="color: #FF0000" class="help-block"><small>Error : Not a valid matric number!<small></p>'
    );
    $('#labelform10').attr('class', 'form-group has-error');
    $('p#help10').fadeOut(2000);
  }
});

/*-----------------------------
    No same value for you foo!
-----------------------------*/

$("#form2").submit(function(event){

  var selVal = $('#dropdown').val();
  var student = 'student';
  var arrayVal = [];

  // Set all value to array

  for(var i = 1; i<= selVal; i++){
    var j = $('#'+student+i).val();
    arrayVal.push(j);
   }

   checkIfArrayIsUnique(arrayVal);
   // Check if there is any same value in an array

   function checkIfArrayIsUnique(arrayVal)
       {
           for (var i = 0; i < arrayVal.length; i++)
           {
               for (var j = i; j < arrayVal.length; j++)
               {
                   if (i != j)
                   {
                       if (arrayVal[i] == arrayVal[j])
                       {
                         swal({
                           title:"Hold up!",
                           text: "Same value is detacted, please change",
                           type: "warning",
                           confirmButtonText: "OK"
                         });
                         event.preventDefault();
                         //return true; // means there are duplicate values
                       }
                   }
               }
           }
           //return false; // means there are no duplicate values.
       }

/*-------------------------------
    Super AJAX super Valid
-------------------------------*/

//Loop each gain into parameter
// function checkDataExistInDb(arrayVal){
//   var flag = 0;
//
//     jQuery.each(arrayVal , function(index, value){
//       $.ajax({
//            type: "POST",
//            url: "valid.php",
//            data: {value:value}
//        }).done(function(popster) {
//             if (popster < 1) {
//
//             }else{
//               flag++;
//             }
//             flagBroke(flag);
//        });
//     });
// }
//
// // AJAX call this function to tell error
//
// function flagBroke(flag){
//   if(flag > 0){
//     swal({
//       title:"Error!",
//       text: "Several data that you\'ve entered doesn\'t exist on database, pleare re-enter",
//       type: "warning",confirmButtonText: "OK"
//     });
//     return false;
//         //event.preventDefault();
//   } else {
//     console.log("flag is okay");
//     return true;
//   }
// }

});
