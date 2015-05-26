/**
 * Created by asm on 5/26/15.
 */
$(function(){
    var $exitButton = $("#exitButton");
    $exitButton.button();
    $exitButton.click(function(){
        $.post('/lk/exit',function(response){

            if(response){
                window.location.replace("/");
            }
        });
    });
});