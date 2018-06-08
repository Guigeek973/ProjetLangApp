
    function getMessages(){
        $.ajax({
            type: "GET",
            url: "../models/handlerAJAX.php",
            dataType: "json",
            success: function(rs) {
                var html = "";
                rs = rs.reverse();
                for(var i=0 ; i < rs.length; i++) {
                    if (rs[i].from_id != document.getElementById('sessionValue').getAttribute('value').valueOf()) {
                        html += '<div class="msgAndOptions">' +
                            '<div class="msgOptions">' +
                            '<button class="translateBtn"><img class="imgOptions" src="../translate.png"></button>' +
                            '<button class="correctBtn"><img class="imgOptions" src="../correct.png"></button>' +
                            '<button class="copyBtn"><img class="imgOptions" src="../copy.png"></button>' +
                            '</div>' +
                            '<button class="singleMsg messageForMe" >' +
                            '<span class="date">'+ rs[i].creat_at.substring(11,16) +'</span><br/>' +
                            '<span class="' + rs[i].from_id + '">' + rs[i].firstname + " " + rs[i].name + '</span> : <span class="content">' + rs[i].content
                            + '</span></button></div>';
                    }
                    if (rs[i].from_id == document.getElementById('sessionValue').getAttribute('value').valueOf()) {
                        html += '<div class="msgAndOptions">' +
                            '<div class="msgOptions">' +
                            '<button class="translateBtn"><img class="imgOptions" src="../translate.png"></button>' +
                            '<button class="correctBtn"><img class="imgOptions" src="../correct.png"></button>' +
                            '<button class="copyBtn"><img class="imgOptions" src="../copy.png"></button>' +
                            '</div>' +
                            '<button class="singleMsg messageOfMe">' +
                            '<span class="date">'+ rs[i].creat_at.substring(11,16) +'</span><br/>' +
                            '<span class="' + rs[i].from_id + '">' + rs[i].firstname + " " + rs[i].name
                            + '</span> : <span class="content">' + rs[i].content
                            + '</span></button></div>';
                    }
                }
                $('#messages').html(html);
                $('.msgOptions').addClass('hide');

                $(".singleMsg").on('click', function () {
                    if (!$(this).prev(".msgOptions").hasClass('hide')) {
                        $(this).prev(".msgOptions").removeClass('show').addClass('hide');
                        $(this).prev(".msgOptions").fadeOut();
                    } else {
                        $(this).prev(".msgOptions").removeClass('hide').addClass('show');
                        $(this).prev(".msgOptions").fadeIn();
                    }
                });

                // fonction copie
                $(".copyBtn").click(function () {
                    $("").clone();
                });
                // api google translate
                $(".translateBtn").click(function () {
                    $("").select();
                });
                // fonction correction, récupère le message, en fait une copie dans un champs non modifiable et une dans un champs texte
                $(".correctBtn").click(function () {
                    $("").select();
                });
            }
        });
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
    $(function() {
        $("#sendMsg").click(function (e) {
            document.querySelector('#form-chat').addEventListener('submit', postMessage);
            getMessages();
        });
        $(".contact_button").click(function (event) {
            document.getElementById('idContactSelected').setAttribute('value', event.target.id);
            initChat();
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



});

