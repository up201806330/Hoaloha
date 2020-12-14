'use strict'

var form = document.querySelector(".add-question-container form");

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}


function submitQuestionForm(event){
    
    var question = document.querySelector('.add-question-container form textarea').value;
    var idTopic = document.querySelector('form #idTopic').value;
    var idUser = document.querySelector('form #idUser').value;
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

        let newQuestionUsername = document.createElement('div');
        newQuestionUsername.setAttribute('class','question-username');
        newQuestionUsername.innerText = "Posted by";

        let articleName = document.createElement('a');
        articleName.innerText = name;

        let articleProfile = document.createElement('a');
        articleProfile.setAttribute('href',"../pages/profile.php?username=" + username);

        articleProfile.innerText = username;

        newQuestionUsername.appendChild(articleName);
        newQuestionUsername.appendChild(articleProfile);

        let questionData = document.createElement('div');
        questionData.setAttribute('class','question-data');

        questionData.innerText = "at";

        let articleData = document.createElement('a');
        articleData.innerText = data;

        questionData.appendChild(articleData);

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

        newQuestionContainer.appendChild(newQuestionUsername);
        newQuestionContainer.appendChild(questionData);
        newQuestionContainer.appendChild(userPhotoContainer);
        newQuestionContainer.appendChild(description);

        questions.appendChild(newQuestionContainer);

        let addAnswer = document.createElement('div');
        addAnswer.setAttribute('class','addAnswer');

        let form = document.createElement('form');

        let label = document.createElement('label');
        label.innerText = "Add an Answer";

        form.appendChild(label);

        let text = document.createElement('div');
        text.setAttribute('class','textinput');

        let textArea = document.createElement('textarea');
        textArea.setAttribute('name','text');

        text.appendChild(textArea);

        let idQuestionInput = document.createElement('input');
        idQuestionInput.setAttribute('type','hidden');
        idQuestionInput.setAttribute('id','idQuestion');
        idQuestionInput.setAttribute('value',idQuestion);

        let idUserInput = document.createElement('input');
        idUserInput.setAttribute('type','hidden');
        idUserInput.setAttribute('id','idUser');
        idUserInput.setAttribute('value',idUser);

        let button = document.createElement('input');
        button.setAttribute('type','submit');
        button.setAttribute('id',idQuestion);
        button.setAttribute('value', 'Reply');

        form.appendChild(text);
        form.appendChild(idQuestionInput);
        form.appendChild(idUserInput);
        form.appendChild(button);

        addAnswer.appendChild(form);

        questions.appendChild(addAnswer);
              
    })
}

form.addEventListener("submit", submitQuestionForm);