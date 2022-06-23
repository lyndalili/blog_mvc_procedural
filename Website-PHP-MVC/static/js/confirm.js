"use strict";
var liens = document.getElementsByClassName("suppr");

for (let lien of liens) {

    lien.addEventListener("click", function(event) {
        console.log(lien);
        if (!confirm("voulez vous supprimer?")) {
            event.preventDefault();
        }
    });
};


//gerer bare de recherche en ajax 
let topsearch = document.getElementById("topsearch");
topsearch.addEventListener("input", function() {
    responsesList.textContent = "";
    if (topsearch.value.length > 2) {
        console.log(topsearch.value);

        let request = new XMLHttpRequest(); //on créé une requete

        request.open('GET', absolute.value + `?module=posts&action=topsearch&val=${topsearch.value}`); // on la configure
        request.responseType = "json";
        request.send(); //on engage la requete
        request.addEventListener('load', topSearch); // préciser quelle fonction on veut utiliser quand la réponse nous revient
        function topSearch() {
            //console.log("status = " + request.status)
            if (request.status === 200) {
                let topReponse = request.response;
                //  console.log("reponse = " + topReponse)

                for (let i = 0; i < topReponse.length; i++) {
                    console.log(topReponse[i]["post_title"]);
                    let newLi = document.createElement('li');
                    newLi.innerHTML = `<a href='?action=single&id=${topReponse[i]["post_ID"]}'>${topReponse[i]["post_title"]}</a>`;

                    responsesList.appendChild(newLi);
                }
            } else {
                console.log("erreur http")
            }
        }

        //updateMeteo();
    }

})