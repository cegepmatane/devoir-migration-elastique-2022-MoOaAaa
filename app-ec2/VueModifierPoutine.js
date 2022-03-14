class VueModifierPoutine{
    constructor(app){
        this.html = document.getElementById("html-vue-modifier-poutine").innerHTML;
        this.poutine = null;
        this.modifierPoutine = null;
    }

    initialiserPoutine(poutine){
        this.poutine = poutine;
    }

    initialiserModifierPoutine(modif) {
        this.modifierPoutine = modif;
    }

    afficher() {
        document.getElementsByTagName("body")[0].innerHTML = this.html;

        document.getElementsByTagName("body")[0].innerHTML = this.html;
        document.getElementById("poutine-nom").value = this.poutine.nom;
        document.getElementById("poutine-ingredients").value = this.poutine.ingredients;
        document.getElementById("poutine-prix").value = this.poutine.prix;
        document.getElementById("poutine-tailles").value = this.poutine.tailles;
        document.getElementById("poutine-description").value = this.poutine.description;

        document.getElementById("formulaire-modifier").addEventListener("submit", evenement => this.enregistrer(evenement));

    }

    enregistrer(evenement){
        evenement.preventDefault();
        this.poutine.nom = document.getElementById("poutine-nom").value;
        this.poutine.ingredients = document.getElementById("poutine-ingredients").value;
        this.poutine.prix = document.getElementById("poutine-prix").value;
        this.poutine.tailles = document.getElementById("poutine-tailles").value;
        this.poutine.description = document.getElementById("poutine-description").value;

        this.modifierPoutine(this.poutine);

    }
}
