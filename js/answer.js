'use strict'

var forms = document.querySelectorAll(".add-answer-container form");

forms.forEach(form => {form.addEventListener("submit", submitAnswerForm);});

var answersDeleteButton = document.querySelectorAll(".delete-button-answer");

answersDeleteButton.forEach(answerDeleteButton => {answerDeleteButton.addEventListener("click", deleteAnswer);});


function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}

function deleteAnswer(event){

    let thisAnswer = event.target;


    let idAnswer = thisAnswer.querySelector('input').value;

    //console.log(idQuestion);

    let request = new XMLHttpRequest();
    request.onload = deleteAnswerContainer;
    request.open('post','../actions/action_delete_answer.php', true);
    request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    request.send(encodeForAjax({idAnswer : idAnswer}));
    event.preventDefault();
}

function deleteAnswerContainer() {

    var response = JSON.parse(this.responseText);

    var div = document.getElementById("answer" + response);

    div.parentNode.removeChild(div);

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

    thisForm.reset();
    
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
        const idAnswer = answer['id'];      

        let newAnswerContainer = document.createElement('div');
        newAnswerContainer.setAttribute('class','answer-container');
        newAnswerContainer.setAttribute('id', "answer" + idAnswer);

        let answerHeader = document.createElement('div');
        answerHeader.setAttribute('class','answer-header');

        let deleteButton = document.createElement('div');
        deleteButton.setAttribute('class','delete-button-answer');

        let spanDelete = document.createElement('span');
        spanDelete.setAttribute('class','fas fa-times-circle');

        let inputHidden = document.createElement('input');
        inputHidden.setAttribute('type','hidden');
        inputHidden.setAttribute('value', idAnswer);

        spanDelete.appendChild(inputHidden);
        deleteButton.appendChild(spanDelete);
        answerHeader.appendChild(deleteButton);

        deleteButton.addEventListener("click", deleteAnswer);

        let newAnswerUsername = document.createElement('div');
        newAnswerUsername.setAttribute('class','answer-username');
        newAnswerUsername.innerText = "Posted by";

        let h1 = document.createElement('h1');

        let articleName = document.createElement('a');
        articleName.innerText = name + " - ";

        h1.appendChild(articleName);

        let articleProfile = document.createElement('a');
        articleProfile.setAttribute('class','topic-answer-link');
        articleProfile.setAttribute('href',"../pages/profile.php?username=" + username);
        articleProfile.innerText = username;

        //newAnswerUsername.appendChild(articleName);
        //newAnswerUsername.appendChild(articleProfile);
        h1.appendChild(articleProfile);

        newAnswerUsername.appendChild(h1);

        let answerData = document.createElement('div');
        answerData.setAttribute('class','answer-data');

        answerData.innerText = " at";

        let articleData = document.createElement('a');
        articleData.innerText = data;

        answerData.appendChild(articleData);

        answerHeader.appendChild(newAnswerUsername);
        answerHeader.appendChild(answerData);

        let answerBody = document.createElement('div');
        answerBody.setAttribute('class','answer-body');

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

        answerBody.appendChild(userPhotoContainer);
        answerBody.appendChild(description);

        //newAnswerContainer.appendChild(newAnswerUsername);
        //newAnswerContainer.appendChild(answerData);
        //newAnswerContainer.appendChild(userPhotoContainer);
        //newAnswerContainer.appendChild(description);
        newAnswerContainer.appendChild(answerHeader);
        newAnswerContainer.appendChild(answerBody);

        answers.appendChild(newAnswerContainer);
              
    })
}

