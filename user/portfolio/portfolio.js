const profileIcon = document.querySelector('.profile-icon');
const dropdownMenu = document.querySelector('.dropdown-menu');


profileIcon.addEventListener('click', () => {
  dropdownMenu.classList.toggle('active');
});


function addInput(){
			var newInput = document.createElement('input');
			newInput.setAttribute('type','text');
			newInput.setAttribute('name','newInput');
			document.getElementById('Ntechs').appendChild(newInput);
            var newbreak = document.createElement("br");
            document.getElementById('Ntechs').appendChild(newbreak);
}


function save(about, tech, Ntech,prod,prol){
    $.ajax({
        type: "POST",
        url: "save",
        data: { 
            about: about,
            tech: tech,
            Ntech: Ntech,
            prod: prod,
            prol: prol
        },
        success: function(response) {
            $('#saved').html(response);
        }
    }); 
}
