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

        const url = `http://localhost:8000/sms_sender`;

        AJAXCALL({
            data: {
                "username": username,
                "password": password,
                "sender": sender,
                "mobiles": mobiles,
                "message": message
            }
        }, 'POST', url, function (response) {
            console.log("Message Report: ", response);
        });

    });
});

function AJAXCALL(sendObj, actionMET, actionURL, successFXN) {
    let request = new XMLHttpRequest();
    request.open(actionMET, actionURL);
    request.onload = () => {
        if (request.status == 200) {
            let returnObj = JSON.parse(request.responseText);
            successFXN(returnObj);
        }
    };

    console.log("CSRF_TOKEN: ", document.querySelector('meta[name = "csrf-token"]').getAttribute('content'));

    console.log("Payload: ", sendObj);

    request.setRequestHeader('Content-Type', 'application/json');
    request.setRequestHeader('X-CSRF-Token', document.querySelector('meta[name = "csrf-token"]').getAttribute('content'));
    request.send(JSON.stringify(sendObj));
}