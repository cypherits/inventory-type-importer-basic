// $.ajaxSetup({
//     beforeSend: function(){
//         console.log('beforeSend');
        
//     }
// });
class Ajax_global{
    constructor (base_url, ajax_object){
        this.base_url = base_url;
        this.ajax_object = ajax_object;
    }
    is_url(str){
        var regexp =  /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/;
        if (regexp.test(str)){
            return true;
        }else{
            return false;
        }
    }
    execute_ajax(url, data, callback_method, inline = false, request_type = 'post'){
        if(!this.is_url(url)){
            url = this.base_url+url;
        }
        var request = this.ajax_object({
            url: url,
            method: request_type,
            data: data,
            dataType: "json",
            beforeSend: function(){
                if(!inline){
                    $('#spinner-wrap').fadeIn();
                }else{
                    inline.show();
                }
            }
        });
        
        request.done(callback_method).then(function(){
            $('#spinner-wrap').hide();
        });
        
        request.fail(function( jqXHR, textStatus ) {
            // alert( "Request failed: " + textStatus );
        }).then(function(){
            $('#spinner-wrap').fadeOut();
        });
    }

}