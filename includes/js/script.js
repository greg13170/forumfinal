function edit(bouton, id_block, id_none) { // On déclare la fonction toggle_div qui prend en param le bouton et un id

    var div_block = document.getElementById(id_block); // On récupère le div ciblé grâce à l'id
    var div_none = document.getElementById(id_none);
    div_block.style.display = "block"; // ... on l'affiche...
    div_none.style.display = "none";
    bouton.style.display = "none"; // ... et on change le contenu du bouton.

}

function redirect(url, sleep) {
    setTimeout(function () {
        window.location.replace(url)
    }, sleep);
}

//script bbcode

