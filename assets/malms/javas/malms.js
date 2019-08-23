function openhidecontent(){
    $('.center-fixed').show();
    $('.blur').show();
}
function openlogin(){
    $.ajax({
            beforeSend: function(){
                $('.loading').show();
            },complete: function(){
                $('.loading').hide();
            },success: function(data){
                $('#loginbox').show();
                $('.blur').show();
                $('.blur').css("z-index","1000");
            }
    });
}
function closecontent(){
    $('.notif').hide();
    $('.center-fixed').fadeOut(2000);
    $('.blur').fadeOut(2000);
}

//change font size//
function font(f){
    return function(){
        $('.size.font-'+f).css("font-size",f +"px");
        $('.font.size-'+f).css("font-size",f +"px");
        $('.font.weight-'+f).css("font-weight",f);              
    }
}







// Penulisan

// <ul class="strips">
//     <li class="strips-1">Strip 1</li>
//     <li class="strips-2">Strip 2</li>
//     <li class="strips-3">Strip 3</li>
// </ul>

// <div class="tab tab-1">tab 1</div>
// <div class="tab tab-2" style="display:none">tab 2</div>
// <div class="tab tab-3" style="display:none">tab 3</div>
// note: selain tab 1 tab lainnya display=none

function callbackstrips( i ){
    return function(){
        $('.loading').show();
        $('.strips li').css("border","none");
        $('.ul-pg li .pg').css("border","none"); // cara terakhir
        $('ul .strips-'+ i +' .pg').css("border-bottom","2px solid #06F");
        $.ajax({ 
            success: function(){
                $('.loading').hide();
                $('.tab').hide();
                $('.tab-' + i).fadeIn();
            }
          });
      return false;
    }
}


$(document).ready(function(e) {
    for(var i=1;i<4;i++){
        $('.strips-'+ i).click(callbackstrips (i));
    }
    //selectall function
    $('#selectall').click(function(event) {
        if(this.checked) {
            $('.select').each(function() {
                this.checked = true;
            });
        }else{
            $('.select').each(function() {
                this.checked = false;
            });
        }
    });
    //--end selectall function
});
$(document).ready(function(){

    var wSquare = $('.square').width();
    $('.square').css("height",wSquare + "px");
    
    for(var f=1;f<=1000;f++){
        $('.size.font-'+f).css("font-size",f +"px");
        $('.font.size-'+f).css("font-size",f +"px");
        $('.font.weight-'+f).css("font-weight",f);                      
    }

    //accordion vertical menu
    $('.accord').click(function(){
    var menu=$(this).attr("href");
    $(menu).slideToggle();
    $(".submenu").not($(menu)).slideUp();
    });
    
    //get width while padding set
    // $(window).resize(function(){
    //     var padL = $('.min-padding').css("padding-left").replace("px","");
    //     var padR = $('.min-padding').css("padding-right").replace("px","");
    //     var padRL = (+padL) + (+padR);
    //     $('.getWidth').css("width","calc(100% - "+padRL+"px)");
    // }).resize();

});


// $(document).ready(function(e) {
//         $('.rectangle-height').css("height",$('.rectangle-height').width() * 1.3 +"px");
//         $('.main-content').css("padding-bottom",$('.footer').height() + "px");   
//     }).resize();
//     //slide strip
// });




        function sideslide(){
            if($('#slidemenu').css("marginLeft")=="-"+$('#slidemenu').width() +"px"){
                $('#slidemenu').animate({marginLeft:"0"},"slow");
                $('.blur').show();
            }else{
                $('#slidemenu').animate({marginLeft:"-"+$('#slidemenu').width() +"px"},"slow");
                $('.blur').hide();
            }
        }




function startTime()
{
var today=new Date();
var h=today.getHours();
var m=today.getMinutes();
var s=today.getSeconds();
// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);
document.getElementById('txt').innerHTML=h+":"+m+":"+s;
t=setTimeout(function(){startTime()},500);
}

function checkTime(i)
{
if (i<10)
  {
  i="0" + i;
  }
return i;
}


//Toggle button
function toggleOnOff(){
    if($('#toggleOn').is(':visible')){
        $('#toggleOff').show();
        $('#toggleOn').hide();
    }else if($('#toggleOff').is(':visible')){
        $('#toggleOff').hide();
        $('#toggleOn').show();
    }
}



$(document).ready(function(e) {
    $('.play').click(function(){
        var $this = $(this);
        var id = $this.attr('id').replace(/btn/, '');
        $this.toggleClass('active');
        if($this.hasClass('active')){
            $this.text('pause');
            $('audio[id^="sound"]')[id-1].play();
        } else {
            $this.text('play');
            $('audio[id^="sound"]')[id-1].pause();
        }
    });
});
