$(document).ready(function(){
    $('#search').on('input', function(){
        var search = $(this).val();
        if(search != ''){
            $.ajax({
                url: 'search.php',
                method: 'POST',
                data: {search: search},
                success: function(response){
                    $('#results').html(response);
                }
            });
        } else {
            $('#results').html('');
        }
    });
});


