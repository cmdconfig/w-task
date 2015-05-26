/**
 * Created by asm on 5/26/15.
 */
$(function(){
    var $enterButton = $("#enter");
    $enterButton.button();
    $finish_reg.button();
    $enterButton.click(function(){
        var $form = $("#enter_form").serializeArray();
    });
});