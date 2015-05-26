/**
 * Created by asm on 5/27/15.
 */
$(function(){

    $("#lang-img").click(function(){
        var lang = $(this).attr('lang');
        console.log(lang);
        $.post('/index/lang',{'lang':lang},function(response){
            if(response){
                window.location.reload();
            }
        });
    });
});