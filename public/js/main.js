
$('.form-control-file').on('change',function () {
    var elem= $(this).next();
    elem.html('Фото выбрано');
    elem.removeClass('btn-danger');
    elem.addClass('btn-success');
});

let unloadPhoto=function (id,name){
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        data:{
            id:id,
            name:name
        },
        url: 'unload',
        success: function (data) {
            $('#popup_fio').html('Фотографии пациента '+name);
            $('.grid-item').remove();
            $('<div/>',{
                class:'grid-sizer',
            }).appendTo('.grid');
            $.each(data,function (key,value){
                var div=$( "<div/>", {
                    class: "grid-item",
                    html:value
                });
                $('.grid').append( div )
            });
            var grid = document.querySelector('.grid');
            var msnry;
            imagesLoaded( grid, function() {
                msnry = new Masonry( grid, {
                    itemSelector: '.grid-item',
                    columnWidth: '.grid-sizer',
                    percentPosition: true
                });
            })
            $.each($('.grid-item'),function () {
                $(this).attr('data-toggle','modal');
                $(this).attr('data-target','#popupSlide');
                $(this).on('click',function () {
                    $('.img-slide').remove();
                    var src=$(this).children('img').attr('src');
                    var img=$( "<img/>", {
                        src:src,
                        class:'img-slide'
                    });
                    $('#popupSlide').append(img);
                });
            })


        },
        error: function () {
            console.log('error');
        }
    });
}
