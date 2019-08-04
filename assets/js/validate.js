var name_pattern = /^[a-zA-Z ]{2,30}$/;
var phone_pattern = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
var email_pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
var date_pattern = /^\d{2}[./-]\d{2}[./-]\d{4}$/;
var is_error = false;
function validate(form_name){
    $('.form-control').removeClass('invalid');
    $('.invalid-feedback').hide();
    $('.invalid-icon').hide();
    $($(form_name+' :input').get().reverse()).each(function(){
        let is_required = $(this).data('required');
        let value = $(this).val();
        let type = $(this).attr('type');
        let val_type = $(this).data('val_type');
        // console.log(is_required, value);
        if(typeof val_type == 'undefined'){
            val_type = '';
        }
        switch(type){
            case 'checkbox':
                call_validate_check(this, is_required, value, val_type);
                break;
            default :
                call_validate(this, is_required, value, val_type);
                break;
        } 
    });
    return (is_error)? false: true;
}
function call_validate(object, is_required, value, val_type){
    // console.log(is_required, value);
    if(is_required && value == ''){
        $(object).addClass('invalid').focus();
        $(object).parent().find('.invalid-feedback').show();
        $(object).parent().find('.invalid-icon').show();
        is_error = true;
        // return;
    }
    if(val_type != ''){
        var val_match = true;
        switch(val_type){
            case 'name':
                val_match = name_pattern.test(value);
            break;
            case 'phone':
                val_match = phone_pattern.test(value);
            break;
            case 'email':
                val_match = email_pattern.test(value);
            break;
            case 'date':
                val_match = date_pattern.test(value);
            break;
        }
        if(!val_match){
            $(object).addClass('invalid').focus();
            $(object).parent().find('.invalid-feedback').show();
            $(object).parent().find('.invalid-icon').show();
            is_error = true;
            // return;
        }
    }
}
function call_validate_check(object, is_required, value, val_type){
    if(is_required && !$(object).prop('checked')){
        $(object).addClass('invalid').focus();
        $(object).parent().find('.invalid-feedback').show();
        $(object).parent().find('.invalid-icon').show();
        is_error = true;
        // return;
    }
}