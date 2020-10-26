
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
          console.log(data)
        },
        error: function () {
            console.log('error');
        }
    });
}
