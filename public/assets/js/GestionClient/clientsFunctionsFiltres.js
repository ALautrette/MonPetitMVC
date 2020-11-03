/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function filtrerClient()
{
    if (titres.value == "Choisir..." && villes.value == "Choisir..." && cps.value == "Choisir..."){
        document.getElementById("retour").style.visibility = "hidden";
    } else{
        let xhr = new XMLHttpRequest();
        let reponse;
        xhr.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("retour").innerHTML = xhr.responseText;
                document.getElementById("retour").style.visibility = "visible";
            }
        }
        xhr.open("post", "/?c=gestionClient&a=rechercheClientsAjax", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        let parametres = "titreCli=" + document.getElementById("titres").value;
        parametres += "&villeCli=" + document.getElementById("villes").value;
        parametres += "&cpCli=" + document.getElementById("cps").value;
        xhr.send(parametres);
    }
}

let titres = document.getElementById("titres");
titres.addEventListener('change', filtrerClient, false);

let villes = document.getElementById("villes");
villes.addEventListener('change', filtrerClient, false);

let cps = document.getElementById("cps");
cps.addEventListener('change', filtrerClient, false);