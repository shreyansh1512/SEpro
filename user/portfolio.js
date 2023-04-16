const searchIcon = document.querySelector('.material-icons-outlined');
const searchBar = document.querySelector('.search-bar');
const closeIcon = document.querySelector('.close-icon');
const profileIcon = document.querySelector('.profile-icon');
const dropdownMenu = document.querySelector('.dropdown-menu');


profileIcon.addEventListener('click', () => {
    dropdownMenu.classList.toggle('active');
});

searchIcon.addEventListener('click', () => {
    searchBar.classList.toggle('active');
});


closeIcon.addEventListener('click', () => {
    $("#results").empty();
    document.getElementById('search').value = "";
    searchBar.classList.remove('active');
});

function addInput(){
			var newInput = document.createElement('input');
			newInput.setAttribute('type','text');
			newInput.setAttribute('name','newInput');
			document.getElementById('Ntechs').appendChild(newInput);
            var newbreak = document.createElement("br");
            document.getElementById('Ntechs').appendChild(newbreak);
}


function save(about, tech1,tech2,tech3,tech4,tech5, Ntech1,Ntech2,Ntech3,Ntech4,Ntech5, pron1,prod1,prol1 ,pron2,prod2,prol2){
    $.ajax({
        type: "POST",
        url: "save",
        data: { 
            about: about,

            tech1: tech1,
            tech2: tech2,
            tech3: tech3,
            tech4: tech4,
            tech5: tech5,

            Ntech1: Ntech1,
            Ntech2: Ntech2,
            Ntech3: Ntech3,
            Ntech4: Ntech4,
            Ntech5: Ntech5,

            pron1: pron1,
            prod1: prod1,
            prol1: prol1,

            pron2: pron2,
            prod2: prod2,
            prol2: prol2

        },
        success: function(response) {
            document.getElementById('saved').innerHTML = response;        }
    }); 
}


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


