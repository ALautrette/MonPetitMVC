/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function chercheUn(){
    if(document.getElementById("id").value == "-- Choisir --"){
        document.getElementById("retour").style.visibility = "hidden";
    } else{
        let xhr = new XMLHttpRequest();
        //let reponse;
        xhr.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                document.getElementById('date').innerHTML = xhr.responseText;
                document.getElementById('date').style.visibility = "visible";
            }
        };
        xhr.open("post", "/?c=gestionClient&a=chercheUnAjax", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        let parametres = "id=" + document.getElementById("id").value;
        xhr.send(parametres);
    }
}

var chIdClient = document.getElementById("id");
chIdClient.addEventListener("change", chercheUn, false);
