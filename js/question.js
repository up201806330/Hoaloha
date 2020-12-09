var form = document.querySelector(".addComment form");

console.log(form.outerHTML);

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}


function submitForm(event){
    
    var question = document.querySelector('.addComment form textarea').value;
    var idTopic = document.querySelector('form #idTopic').value;
    var idUser = document.querySelector('form #idUser').value;
    var data = document.querySelector('form #data').value;


    console.log("Form submitted.");

    let request = new XMLHttpRequest();
    request.onload = receiveComments;
    request.open('post', '../actions/action_add_question.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(encodeForAjax({idUser: idUser, idTopic: idTopic, question: question, data: data}));
    event.preventDefault();
    
}

function receiveComments() {
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

        let newQuestionContainer = document.createElement('div');
        newQuestionContainer.setAttribute('class','question-container');

        let newQuestionUsername = document.createElement('div');
        newQuestionUsername.setAttribute('class','question-username');
        newQuestionUsername.innerText = "Posted by";

        let articleName = document.createElement('article');
        articleName.innerText = name;

        let articleProfile = document.createElement('article');
        articleProfile.setAttribute('href',"../pages/profile.php?username=" + username);

        newQuestionUsername.appendChild(articleName);
        newQuestionUsername.appendChild(articleProfile);

        let questionData = document.createElement('div');
        questionData.setAttribute('class','question-data');

        questionData.innerText = "at";

        let articleData = document.createElement('article');
        articleData.innerText = data;

        questionData.appendChild(articleData);

        let userPhotoContainer = document.createElement('div');
        questionData.setAttribute('class','user-photo');

        let articlePhoto = document.createElement('article');
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
              
    })
}

form.addEventListener("submit", submitForm);