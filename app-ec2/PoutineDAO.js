﻿class PoutineDAO{
  constructor(){
    this.URL = 'https://54.205.182.138/'
  }
  lister(action){
    fetch(this.URL + 'lister.php')
      .then(response => response.json())
      .then(data =>
        {
          console.log(data);
          let listePoutine = [];
          for(let position in data){
            let poutine = new Poutine(data[position].nom,
                                    data[position].ingredients,
                                    data[position].prix,
                                    data[position].tailles,
                                    data[position].description,
                                    data[position].id);

            console.log(poutine);
            listePoutine.push(poutine);
          }
          action(listePoutine);
        });
  }

  chercher(id, action){
    fetch(this.URL + 'chercher-par-id.php' + '?id=' + id)
      .then(response => response.json())
      .then(data =>
        {
          console.log(data);
          let poutine = new Poutine(data.nom,
                                  data.ingredients,
                                  data.prix,
                                  data.tailles,
                                  data.description,
                                  data.id);
          action(poutine);
        });
  }

  ajouter(poutine, action){
    fetch(this.URL + 'ajouter.php',
      {
        method: 'POST',
        headers: {
          'Content-Type':'application/x-www-form-urlencoded'
        },
        body: "poutinejson="+JSON.stringify(poutine),
        mode: 'cors'
      })
      .then(response => response.text())
      .then(data =>
        {
          console.log('Détail:', data);
          action();
        });
  }

}