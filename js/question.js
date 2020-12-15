'use strict'

var form = document.querySelector(".add-question-container form");

form.addEventListener("submit", submitQuestionForm);

var questionsContainer = document.querySelectorAll(".delete-button");

questionsContainer.forEach(questionDiv => {questionDiv.addEventListener("click", deleteQuestion);});

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}


function deleteQuestion(event){

    let thisQuestion = event.target;


    let idQuestion = thisQuestion.querySelector('input').value;

    //console.log(idQuestion);

    let request = new XMLHttpRequest();
    request.onload = deleteQuestionContainer;
    request.open('post','../actions/action_delete_question.php', true);
    request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    request.send(encodeForAjax({idQuestion : idQuestion}));
    event.preventDefault();
}

function deleteQuestionContainer() {

    var response = JSON.parse(this.responseText);
    
    console.log(response);

    var div = document.getElementById(response);

    div.parentNode.removeChild(div);

}

function submitQuestionForm(event){
    
    let question = document.querySelector('.add-question-container form textarea').value;
    let idTopic = document.querySelector('form #idTopic').value;
    let idUser = document.querySelector('form #idUser').value;
    //var data = document.querySelector('form #data').value;


    console.log("Form submitted.");

    let request = new XMLHttpRequest();
    request.onload = receiveQuestions;
    request.open('post', '../actions/action_add_question.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(encodeForAjax({idUser: idUser, idTopic: idTopic, question: question}));
    event.preventDefault();
    
}


function receiveQuestions() {
    console.log(this.responseText);
    var response = JSON.parse(this.responseText);
    console.log(response);
    
    var questions = document.querySelector("#questions-container");

    response.forEach( function(question) {
        const username = question['username'];
        const name = question['name'];
        const questionText = question['question'];
        const idPhoto = question['idPhoto']; 
        const data = question['data']; 
        const idQuestion = question['id'];
        const idUser = question['idUser'];   
        
        //console.log(username);

        let newQuestionContainer = document.createElement('div');
        newQuestionContainer.setAttribute('class','question-container');
        newQuestionContainer.setAttribute('id', idQuestion);

        let questionHeader = document.createElement('div');
        questionHeader.setAttribute('class', 'question-header');

        let newQuestionUsername = document.createElement('div');
        newQuestionUsername.setAttribute('class','question-username');
        newQuestionUsername.innerText = "Posted by";

        let h1 = document.createElement('h1');

        let articleName = document.createElement('a');
        articleName.innerText = name + " - ";

        let articleProfile = document.createElement('a');
        articleProfile.setAttribute('class','topic-question-link');
        articleProfile.setAttribute('href',"../pages/profile.php?username=" + username);

        articleProfile.innerText = username;

        h1.appendChild(articleName);
        h1.appendChild(articleProfile);

        //newQuestionUsername.appendChild(articleName);
        //newQuestionUsername.appendChild(articleProfile);
        newQuestionUsername.appendChild(h1);

        let questionData = document.createElement('div');
        questionData.setAttribute('class','question-data');

        questionData.innerText = "at ";

        let articleData = document.createElement('a');
        articleData.innerText = data;

        questionData.appendChild(articleData);

        questionHeader.appendChild(newQuestionUsername);
        questionHeader.appendChild(questionData);

        let questionBody = document.createElement('div');
        questionBody.setAttribute('class', 'question-body');

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
        description.setAttribute('class','question-description');
        description.innerText = questionText;

        questionBody.appendChild(userPhotoContainer);
        questionBody.appendChild(description);

        newQuestionContainer.appendChild(questionHeader);
        newQuestionContainer.appendChild(questionBody);
        //newQuestionContainer.appendChild(userPhotoContainer);
        //newQuestionContainer.appendChild(description);

        questions.appendChild(newQuestionContainer);

        let addAnswer = document.createElement('div');
        addAnswer.setAttribute('class','add-answer-container');

        let form = document.createElement('form');

        let formTitle = document.createElement('div');
        formTitle.setAttribute('class','form-title');

        let newH1 = document.createElement('h1');
        newH1.innerText = "Add an Answer ";

        let span = document.createElement('span');
        span.setAttribute('class','material-icons-round');
        span.innerText = "insert_comment";

        newH1.appendChild(span);
        formTitle.appendChild(newH1);

        form.appendChild(formTitle);

        let textInput = document.createElement('div');
        textInput.setAttribute('class','textinput');

        let textarea = document.createElement('textarea');
        textarea.setAttribute('name','text');

        textInput.appendChild(textarea);

        form.appendChild(formTitle);
        form.appendChild(textInput);

        let idQuestionInput = document.createElement('input');
        idQuestionInput.setAttribute('type','hidden');
        idQuestionInput.setAttribute('id','idQuestion');
        idQuestionInput.setAttribute('value',idQuestion);

        let idUserInput = document.createElement('input');
        idUserInput.setAttribute('type','hidden');
        idUserInput.setAttribute('id','idUser');
        idUserInput.setAttribute('value',idUser);

        let button = document.createElement('input');
        button.setAttribute('class','forum-button');
        button.setAttribute('type','submit');
        button.setAttribute('id',idQuestion);
        button.setAttribute('value', 'Reply');

        form.appendChild(idQuestionInput);
        form.appendChild(idUserInput);
        form.appendChild(button);

        addAnswer.appendChild(form);

        form.addEventListener("submit", submitAnswerForm);

        let answerContainer = document.createElement('div');
        answerContainer.setAttribute('class','answers-container');
        answerContainer.setAttribute('id','answers-container' + idQuestion);

        questions.appendChild(answerContainer);

        questions.appendChild(addAnswer);
              
    })
}

