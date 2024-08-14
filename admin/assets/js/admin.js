(function ($){
    "use strict";

    $(document).on('click','#duplicate_wedocs_submit_btn',function (e){
        e.preventDefault();
        var docId = $('#wedocs_id').val();
        var docText = $('#new_doc_name').val();
        var el = $('#duplicate_wedocs_submit_btn');
        var msgWrap = $('#wedoc_duplicate_msg_wrap');
        msgWrap.hide().removeClass('danger').removeClass('success').text('');
        if (docId.trim().length === 0 || docText.trim().length === 0){
            msgWrap.show().addClass('danger').text('select doc and enter duplicate doc name');
            return;
        }
        $.ajax({
            url: xgJS.ajaxUrl,
            type: 'POST',
            beforeSend: function (){
                el.text('Duplicating..')
                el.attr('disabled',true);
            },
            data: {
                'action' : 'duplicate_wedocs',
                doc_id : docId,
                doc_text : docText
            },
            success: function (data){
                el.text('Duplicate');
                el.attr('disabled',false);
                msgWrap.show().addClass('success').text('Duplicate Success');
            }
        })
    })


})(jQuery);