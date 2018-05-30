function getMessages(){
  // 1. Elle doit créer une requête AJAX pour se connecter au serveur, et notamment au fichier handler.php
  const requeteAjax = new XMLHttpRequest();
  requeteAjax.open("GET", "../models/handlerAJAX.php");

  // 2. Quand elle reçoit les données, il faut qu'elle les traite (en exploitant le JSON) et il faut qu'elle affiche ces données au format HTML
  requeteAjax.onload = function(){
    const resultat = JSON.parse(requeteAjax.responseText);
    const html = resultat.reverse().map(function(message){
        if (message.from_id != document.getElementById('sessionValue').getAttribute('value').valueOf()) {
            return '<div class="messageForMe">' +
                '<span class="date">'+ message.creat_at.substring(11, 16) +'</span><br/>' +
                '<span class="' + message.from_id + '">' + message.firstname + " " + message.name + '</span> : <span class="content">' + message.content + '</span></div>'
        }
        if (message.from_id == document.getElementById('sessionValue').getAttribute('value').valueOf()) {
            return '<div class="messageOfMe">' +
                '<span class="date">'+ message.creat_at.substring(11, 16) +'</span><br/>' +
                '<span class="' + message.from_id + '">' + message.firstname + " " + message.name + '</span> : <span class="content">' + message.content + '</span></div>';
        }

    }).join('');

      const messages = document.querySelector('#messages');
      messages.innerHTML = html;
      messages.scrollTop = messages.scrollHeight;
  };

  // 3. On envoie la requête
  requeteAjax.send();
}

/**
 * Il nous faut une fonction pour envoyer le nouveau
 * message au serveur et rafraichir les messages
 */

function postMessage(event){
  // 1. Elle doit stoper le submit du formulaire
  event.preventDefault();

  // 2. Elle doit récupérer les données du formulaire
  const content = document.querySelector('#content');
  // 3. Elle doit conditionner les données
  const data = new FormData();
  data.append('content', content.value);

  // 4. Elle doit configurer une requête ajax en POST et envoyer les données
  const requeteAjax = new XMLHttpRequest();
  requeteAjax.open('POST', '../models/handlerAJAX.php?task=write');

  requeteAjax.onload = function(){
    content.value = '';
    content.focus();
    getMessages();
  };

  requeteAjax.send(data);
}

function getElementIdContact(e) {
    document.cookie = "idContactSelected = e.target.id";
    var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)idContactSelected\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    alert(e.target.id);
}

if (document.querySelector('#sessionValue').getAttribute('value').valueOf() != "") {
    getMessages();
    document.querySelector('form').addEventListener('submit', postMessage);
    window.setInterval(getMessages, 5000);
}



