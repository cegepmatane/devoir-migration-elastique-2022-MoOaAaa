class VueModifierPoutine{
    constructor(){
      this.html = document.getElementById("html-vue-modifier-poutine").innerHTML;
      this.modifierPoutine = null;
    }
  
    initialiserModifierPoutine(poutine){
      this.modifierPoutine = poutine;
    }
  
    afficher(){
      document.getElementsByTagName("body")[0].innerHTML = this.html;
      document.getElementById("poutine-nom").innerHTML = this.poutine.nom;
      document.getElementById("poutine-ingredients").innerHTML = this.poutine.ingredients;
      document.getElementById("poutine-prix").innerHTML = this.poutine.prix;
      document.getElementById("poutine-tailles").innerHTML = this.poutine.tailles;
      document.getElementById("poutine-description").innerHTML = this.poutine.description;
    }

    enregistrer(evenement){
        evenement.preventDefault();
    
        let nom = document.getElementById("poutine-nom").value;
        let ingredients = document.getElementById("poutine-ingredients").value;
        let prix = document.getElementById("poutine-prix").value;
        let tailles = document.getElementById("poutine-tailles").value;
        let description = document.getElementById("poutine-description").value;
    
        this.modifierPoutine(new Poutine(nom, ingredients, prix, tailles, description, null));
    
      }
  
  }
  