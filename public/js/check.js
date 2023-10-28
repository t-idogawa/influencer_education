$(function() {
    let ClearId;
    $('#check-btn').click(function(event) {
        let button = $(this);
        ClearId = button.data('id');
        console.log(ClearId); //ここまででClearIdにデータが入っているか確認

        $.ajax ({
            headers: { 
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
              },
            type:'post',
            url:'/influencer_education/public/update',
            data: {
                'id': ClearId
            }
        })
        .done(function(response) {
            console.log("成功");
            button.prop('disabled', true);
            button.text("受講済み");
        })
        .fail(function(response) {
            console.log("失敗");
        })
    })
})