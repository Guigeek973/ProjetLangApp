
    function getMessages(){
        // 1. Elle doit créer une requête AJAX pour se connecter au serveur, et notamment au fichier handler.php
        const requeteAjax = new XMLHttpRequest();
        requeteAjax.open("GET", "../models/handlerAJAX.php");

        // 2. Quand elle reçoit les données, il faut qu'elle les traite (en exploitant le JSON) et il faut qu'elle affiche ces données au format HTML
        requeteAjax.onload = function(){
            const resultat = JSON.parse(requeteAjax.responseText);
            const html = resultat.reverse().map(function(message){
                if (message.from_id != document.getElementById('sessionValue').getAttribute('value').valueOf()) {
                    return '<div class="msgAndOptions">' +
                        '<div class="msgOptions">' +
                        '<button class="translateBtn"><img class="imgOptions" src="../translate.png"></button>' +
                        '<button class="correctBtn"><img class="imgOptions" src="../correct.png"></button>' +
                        '<button class="copyBtn"><img class="imgOptions" src="../copy.png"></button>' +
                        '</div>' +
                        '<button class="singleMsg messageForMe" >' +
                        '<span class="date">'+ message.creat_at.substring(11, 16) +'</span><br/>' +
                        '<span class="' + message.from_id + '">' + message.firstname + " " + message.name + '</span> : <span class="content">' + message.content
                        + '</span></button></div>';
                }
                if (message.from_id == document.getElementById('sessionValue').getAttribute('value').valueOf()) {
                    return '<div class="msgAndOptions">' +
                        '<div class="msgOptions">' +
                        '<button class="translateBtn"><img class="imgOptions" src="../translate.png"></button>' +
                        '<button class="correctBtn"><img class="imgOptions" src="../correct.png"></button>' +
                        '<button class="copyBtn"><img class="imgOptions" src="../copy.png"></button>' +
                        '</div>' +
                        '<button class="singleMsg messageOfMe">' +
                        '<span class="date">'+ message.creat_at.substring(11, 16) +'</span><br/>' +
                        '<span class="' + message.from_id + '">' + message.firstname + " " + message.name
                        + '</span> : <span class="content">' + message.content
                        + '</span></button></div>';
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

    function getIdContactSession() {
        $.post(
            '../models/handlerHIDDEN.php', // Un script PHP que l'on va créer juste après
            {
                idSession : $("#sessionValue").val(),  // Nous récupérons la valeur de nos inputs que l'on fait passer à connexion.php
                idContact : $("#idContactSelected").val()
            }
        );
    }

    function initChat() {
        if($('#sessionValue').val() != "" && $('#idContactSelected').val() != "") {
            getMessages();
            document.querySelector('#form-chat').addEventListener('submit', postMessage);
            window.setInterval(getMessages, 10000);
        }
    }

    $(window).on('load', function() {
        $('#idContactSelected').val($('.contact_button').first().attr('id'));
        getIdContactSession();
        initChat();
    });


$(document).ready(function() {
    $(".msgOptions").each(function() {
        $(this).addClass('hide');
        $(this).style('display', 'none');
    });

    $("#sendMsg").click(function(e){
        document.querySelector('#form-chat').addEventListener('submit', postMessage);
        getMessages();
    });

    $(".contact_button").click(function(event){
        document.getElementById('idContactSelected').setAttribute('value',event.target.id);
        initChat();
    });

    $(".singleMsg").click(function () {
        if (!$(this).prev(".msgOptions").hasClass('hide')) {
            $(this).prev().removeClass('show');
            $(this).prev().addClass('hide');
            $(this).prev().fadeOut();
        } else {
            $(this).prev().removeClass('hide');
            $(this).prev().addClass('show');
            $(this).prev().fadeIn();
        }
    });

    // fonction copie
    $( ".copyBtn").click(function() {
        $( "" ).clone();
    });
    // api google translate
    $( ".translateBtn").click(function() {
        $( "" ).select();
    });
    // fonction correction, récupère le message, en fait une copie dans un champs non modifiable et une dans un champs texte
    $( ".correctBtn").click(function() {
        $( "" ).select();
    });




});

$(function() {

    $('#login-form-link').click(function(e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
    $('#register-form-link').click(function(e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
});
