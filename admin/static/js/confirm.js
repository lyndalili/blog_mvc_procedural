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