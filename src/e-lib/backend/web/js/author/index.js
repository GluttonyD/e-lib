$(document).ready(function () {
    $(document).on('click','.author-delete',function (e) {
        e.preventDefault();
        var id=e.target.id;
        alert(id);
        $.ajax({
            url: '/author/delete',
            type: "GET",
            data: {id:id},
            contentType: false,
            cache: false,
            processData: true,
            dataType: 'json',
            success: function (data) {
                var element='.author#author-'+id;
                $(element).remove(element);
            }
        });
    });
});