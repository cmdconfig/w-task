/**
 * Created by asm on 5/25/15.
 */
$(function(){
    var form_error = false;
    var $finish_reg = $("#finish_reg");
    var $load_ava = $("#load_ava");
    var $u_email = $("#u_email");
    var $u_birth = $("#u_birth");
    $u_birth.datepicker();
    $("#u_sex_radioset").buttonset();
    $finish_reg.button();
    $load_ava.button();
    $('#u_phone').mask('(000) 000-00-00');

    $("#u_pass_conf").keyup(function(){
        var pass = $("#u_pass").val();
        var pass_conf = $(this).val();
        if(pass == pass_conf){
            $("#checkPassFalse").hide();
            $("#checkPassTrue").show();
        } else {
            $("#checkPassTrue").hide();
            $("#checkPassFalse").show();
        }
    });

    $finish_reg.click(function(){
        var $form = $("#register_form").serializeArray();
        if(checkFields($form)){
            var captchaVal = $("#ct_captcha").val();
            checkCaptcha(captchaVal);
        }
    });

    $('#uploadFile').JSAjaxFileUploader({
        uploadUrl:'/register/upload_ava',
        //inputText:'Select Your File',
        fileName:'file',
        autoSubmit:false,
        formData:{field1:'value1',field2:'value2',fieldN:'valueN'},
        maxFileSize:240090,
        zoomPreview:true,
        zoomWidth:260,
        zoomHeight:260,
        complete:function(){
            $("#uploadFile").hide();
        },
        success:function(response){
            if(response){
                $("#u_ava_file_name").val(response);
                $("#u_ava").attr('src','/data/ava/'+response);
            }
        }
    });

    $load_ava.click(function(){
        $("#uploadFile").toggle()
    });

    function goReg(){
        var $form = $("#register_form").serializeArray();

        $.post('/register/go',{'form':$form},function(response){
            if(response == 'ok'){
                window.location.replace("/lk");
            } else {
                $.each(response,function(i,val){
                    addInputError(val,emptyField);
                    if(val == 'u_email_v'){
                        addInputError({'name':'u_email'},valid_email);
                    }
                    if(val == 'u_email_e'){
                        addInputError({'name':'u_email'},valid_email);
                    }

                })
            }
        })
    }

    function checkCaptcha(value){
        if($("#pass").val() != $("#pass_conf").val()){
            return false;
        }
        $.post('/register/check_captcha',{'ct_captcha':value,dataType  : 'json'},function(response){
            $("#err_ct_captcha").remove();
            $("#empty_input").removeClass('empty_input');

            if(response){
                goReg();
            } else {
                $("#cap_refresh").click();
                addInputError({'name':'ct_captcha'},captcha_err);
            }
        })
    }

    function checkFields($form){
        var result = true;
        $.each($form,function(i,val){
            if(val.value == ''){
                if(val.name == 'u_ava_file_name'){
                    return ;
                }
                addInputError(val,emptyField);
                result = false;
            } else {
                $('#err_'+val.name).remove();
                $("#"+val.name).removeClass('empty_input');
            }
        });

        if(!validEmail($u_email.val()) && $u_email.val() != ''){
            addInputError({'name':'u_email'},valid_email)
        } else  {
            if($u_email.val() != ''){
                $('#err_u_email').remove();
                $u_email.removeClass('empty_input')
            }
        }

        return result;
    }

    $u_email.focusout(function(){
        var email = $(this).val();
        if(validEmail(email)){
            checkEmailExists(email);
        }
    });

    $u_birth.change(function(){

        $(this).removeClass('empty_input');
        $("#err_u_birth").remove();

    });

    function checkEmailExists(email){
        $.post('/register/check_email',{'email':email},function(response){
            if(response){
                addInputError({'name':'u_email'},email_exists);
                form_error = true;
            } else {
                $("#err_u_email").remove();
                $("#u_email").removeClass('empty_input');
            }
        })
    }

    function addInputError(val,text){
        $("<span/>",{
            'class':'empty_field',
            'id':'err_'+val.name,
            'text':text
        }).insertAfter("#"+val.name);
        $("#"+val.name).addClass('empty_input');
    }

    function validEmail(email) {
        var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
        return pattern.test(email);
    }
});


(function(win, doc, na) {

    var click_replace = {'id1' : 'func2'};


    addEvent(doc.getElementById('id1'), "click", function() {

        var click_replace = typeof click_replace['id1'] === 'string' ? click_replace['id1'] : false;

        if (click_replace) {
            try {
                eval(click_replace+"()");
            } catch(e){
                func1();
            }
        } else {
            func1();
        }
    });

    function func1() {
        alert('1');
    }

    function func2() {
        alert('2');
    }

})(window, document);