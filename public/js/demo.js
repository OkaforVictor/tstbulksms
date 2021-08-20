document.addEventListener('DOMContentLoaded', function (e) {
    console.log("I am loaded!");

    const sendButton = document.querySelector("#sendButton");
    const usernameField = document.querySelector("#username");
    const passwordField = document.querySelector("#password");
    const senderField = document.querySelector("#sender");
    const mobilesField = document.querySelector("#mobiles");
    const messageField = document.querySelector("#message");

    sendButton && sendButton.addEventListener('click', (event) => {
        const username = usernameField.value;
        const password = passwordField.value;
        const sender = senderField.value;
        const mobiles = mobilesField.value;
        const message = messageField.value; 

        const url = `https://portal.nigeriabulksms.com/api2/?username=${username}$password=${password}&sender=${sender}&message=${message}&mobiles=${mobiles}`;

        // AJAXCALL({}, 'POST', url, function (response) {
        //     console.log("Message Report: ", response);
        // });

        let request = new XMLHttpRequest();
        request.open('GET', url);
        request.onload=function () {
            console.log("Message Report: ", request.responseText);
        }
        request.send();

    });
});

function AJAXCALL(sendObj, actionMET, actionURL, successFXN){
    let request = new XMLHttpRequest();
    request.open(actionMET, actionURL);
    request.onload = ()=>{
        if (request.status == 200){
            let returnObj = JSON.parse(request.responseText);
            successFXN(returnObj);   
        }
    };

    request.setRequestHeader('Content-Type', 'application/json');
    // request.setRequestHeader('X-CSRF-Token', document.querySelector('meta[name = "csrf-token"]').getAttribute('content'));
    request.send(JSON.stringify(sendObj));      
}