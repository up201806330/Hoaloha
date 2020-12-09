/*var form = document.querySelector(".addComment form");

console.log(form.outerHTML);

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}
*/

/*function submitForm(event){
    console.log("Estou aqui\n");
    var question = document.querySelector('.addComment form label textarea').value;
    var idTopic = document.querySelector('form #idTopic').value;
    var idUser = document.querySelector('form #idUser').value;
    var data = document.querySelector('form #data').value;

    console.log(question);
    console.log(idTopic);
    console.log(idUser);
    console.log(data);

    var articles = document.querySelectorAll("#comments article");
    var commentID = 0;

    if (articles.length == 0){
        //no comments made yet
        let last = document.querySelector("#comments .last_id");
        commentID = last.textContent;
    }
    else {
        var commentIDs = document.querySelectorAll('#comments article .id');
        var last = commentIDs[commentIDs.length - 1];
        var commentID = last.textContent;
    }

    console.log("Form submitted.");

    let request = new XMLHttpRequest();
    request.onload = receiveComments;
    request.open('post', '../actions/action_add_question.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(encodeForAjax({idUser: idUser, idTopic: idTopic, question: question, data: data}));
    event.preventDefault();
}*/

/*function receiveComments() {
    console.log(this.responseText);
    var response = JSON.parse(this.responseText);
    console.log(response);
    //var comments = document.querySelector(".question-container");

    //var commentsCounter = comments.querySelector("h1");
    
    response.forEach( function(comment) {
        const username = comment['username'];
        const text = comment['text'];
        const commentID = comment['idComment'];

        let new_comment = document.createElement('article');

        let spanCommentID = document.createElement('span');
        spanCommentID.setAttribute('class', 'id');
        spanCommentID.innerText = commentID;
        spanCommentID.style.visibility = "hidden";

        let usernameElement = document.createElement('h4');
        usernameElement.innerText = username;

        let commentElement = document.createElement('p');
        commentElement.innerText = text;

        new_comment.append(usernameElement);
        new_comment.append(commentElement);
        new_comment.append(spanCommentID);

        comments.appendChild(new_comment);


        articles = document.querySelectorAll("#comments article");
        commentsCounter.innerText = "" + articles.length + " comments";
    })
}

form.addEventListener("submit", submitForm);*/