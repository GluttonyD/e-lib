$(document).ready(function () {
    $(document).on('click','.book-delete',function (e) {
        e.preventDefault();
        var id=e.target.id;
        alert(id);
        $.ajax({
            url: '/book/delete',
            type: "GET",
            data: {id:id},
            contentType: false,
            cache: false,
            processData: true,
            dataType: 'json',
            success: function (data) {
                var element='.book#book-'+id;
                $(element).remove(element);
            }
        });
    });
});