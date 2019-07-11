$(document).ready(function () {
    $(document).on('click','#new-author',function (e) {
       e.preventDefault();
       var inputs='';
       inputs+='<div class="form-group">';
       inputs+='<label class="control-label">Имя автора</label>';
       inputs+='<input class="form-control" type="text" name="BookForm[author_data][name]" placeholder="Имя автора">';
       inputs+='</div>';
        inputs+='<div class="form-group">';
        inputs+='<label class="control-label">Фамилия автора</label>';
        inputs+='<input class="form-control" type="text" name="BookForm[author_data][surname]" placeholder="Фамилия автора">';
        inputs+='</div>';
        inputs+='<div class="form-group">';
        inputs+='<label class="control-label">Отчество автора</label>';
        inputs+='<input class="form-control" type="text" name="BookForm[author_data][patronymic]" placeholder="Отчество автора">';
        inputs+='</div>';
        inputs+='<div class="form-group">';
        inputs+='<label class="control-label">Город рождения</label>';
        inputs+='<input class="form-control" type="text" name="BookForm[author_data][birth]" placeholder="Город рождения">';
        inputs+='</div>';
       $('#book-author').html(inputs);
    });

    $(document).on('click','#existing-author',function (e) {
        e.preventDefault();
        var inputs='';
        $.ajax({
            url: '/author/index',
            type: "GET",
            data:{},
            contentType: false,
            cache: false,
            processData: true,
            dataType: 'json',
            success: function (data)
            {
                console.log(data);
                inputs+='<div class="form-group">';
                inputs+='<select class="form-control" name="BookForm[author_id]">';
                for(var i=0;i<data.length;i++){
                    inputs+='<option value="'+data[i]['id']+'">'+data[i]['name']+' '+data[i]['surname']+'</option>';
                }
                inputs+='</select>';
                inputs+='</div>';
                console.log(inputs);
                $('#book-author').html(inputs);
            }
        });

    });
});