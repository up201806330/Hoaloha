'use strict'

var forms = document.querySelectorAll(".add-answer-container form");

forms.forEach(form => {form.addEventListener("submit", submitAnswerForm);});


function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}


function submitAnswerForm(event){
    
    let thisForm = event.target;

    var answer = thisForm.querySelector('.add-answer-container form textarea').value;
    var idQuestion = thisForm.querySelector('form #idQuestion').value;
    console.log(idQuestion);
    var idUser = thisForm.querySelector('form #idUser').value;
    //var data = thisForm.querySelector('form #data').value;


    console.log("Form submitted.");

    let request = new XMLHttpRequest();
    request.onload = receiveAnswers;
    request.open('post', '../actions/action_add_answer.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(encodeForAjax({idUser: idUser, idQuestion: idQuestion, answer: answer}));
    event.preventDefault();
    
}

function receiveAnswers() {
    //console.log(this.responseText);
    var response = JSON.parse(this.responseText);
    //console.log(response);

    response.forEach( function(answer) {

        var answers = document.querySelector("#answers-container" + answer['idQuestion']);

        const username = answer['username'];
        const name = answer['name'];
        const answerText = answer['answer'];
        const idPhoto = answer['idPhoto']; 
        const data = answer['data'];     

        let newAnswerContainer = document.createElement('div');
        newAnswerContainer.setAttribute('class','answer-container');

        let newAnswerUsername = document.createElement('div');
        newAnswerUsername.setAttribute('class','answer-username');
        newAnswerUsername.innerText = "Posted by";

        let articleName = document.createElement('a');
        articleName.innerText = name;

        let articleProfile = document.createElement('a');
        articleProfile.setAttribute('href',"../pages/profile.php?username=" + username);

        newAnswerUsername.appendChild(articleName);
        newAnswerUsername.appendChild(articleProfile);

        let answerData = document.createElement('div');
        answerData.setAttribute('class','answer-data');

        answerData.innerText = "at";

        let articleData = document.createElement('a');
        articleData.innerText = data;

        answerData.appendChild(articleData);

        let userPhotoContainer = document.createElement('div');
        userPhotoContainer.setAttribute('class','user-photo');

        let articlePhoto = document.createElement('a');
        articlePhoto.setAttribute('href',"../pages/profile.php?username=" + username);

        let photo = document.createElement('img');
        photo.setAttribute('src', '../database/db_link_image.php?id=' + idPhoto);
        photo.setAttribute('width', '200');
        photo.setAttribute('height', '200');

        articlePhoto.appendChild(photo);

        userPhotoContainer.appendChild(articlePhoto);

        let description = document.createElement('div');
        description.setAttribute('class','answer-description');
        description.innerText = answerText;

        newAnswerContainer.appendChild(newAnswerUsername);
        newAnswerContainer.appendChild(answerData);
        newAnswerContainer.appendChild(userPhotoContainer);
        newAnswerContainer.appendChild(description);

        answers.appendChild(newAnswerContainer);
              
    })
}

