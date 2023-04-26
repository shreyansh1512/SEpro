const profileIcon = document.querySelector('.profile-icon');
const dropdownMenu = document.querySelector('.dropdown-menu');


profileIcon.addEventListener('click', () => {
    dropdownMenu.classList.toggle('active');
});




$(document).ready(function(){
    $('#search').on('input', function(){
        var search = $(this).val();
        if(search != ''){
            $.ajax({
                url: 'search',
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

function deleteuser(){

    var username = document.getElementById('delete').value; 
    if(confirm("Do you want to delete this user")==true){
         $.ajax({
                url: 'userdelete',
                method: 'POST',
                data: {username: username},
                success: function(response){
                    window.location.href = "adminDash"
                }
            });
    }
    
}


