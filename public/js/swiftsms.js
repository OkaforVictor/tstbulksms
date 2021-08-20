document.addEventListener('DOMContentLoaded', function(e){
    e.preventDefault();

    let regBtn = document.querySelector('#regBtn');
    let logBtn = document.querySelector('#logBtn');
    let dashboardlog = document.querySelector('#dashboardlog');

    regBtn && regBtn.addEventListener('click', function(e){
        e.preventDefault();

        let userdetails = {
            firstname: document.querySelector('#fname').value,
            lastname: document.querySelector('#lname').value,
            email: document.querySelector('#email').value,
            phone: document.querySelector('#phone').value,
            password: document.querySelector('#password').value,
            confirmpassword: document.querySelector('#confirmpassword').value
        };

        if(userdetails.firstname==''){
            alert('Please Enter Firstname');
            return
        }else if(userdetails.lastname==''){
            alert('Please Enter Lastname');
            return;
        }else if(userdetails.email==''){
            alert('Please enter an email Address');
            return
        }else if(userdetails.phone==''){
            alert('Please Enter Phone Number');
            return
        }else if(userdetails.password==''){
            alert('Please Enter Password');
            return
        }else if(userdetails.confirmpassword==''){
            alert('Please confirm Password');
            return
        }else if(userdetails.confirmpassword !== userdetails.password){
            alert('Passwords do not match');
            return
        }else{
            AJAXCALL(userdetails, 'POST', '/Register', (resp)=>{
                if(resp.success){

                    alert('REGISTRATION SUCCESSFUL'),
                    document.querySelector('#regform').reset();
                    window.location.href = '/dashboard';
                }
            })
        }
    });

    logBtn && logBtn.addEventListener('click', function(e){
        e.preventDefault();
        //alert('Login Ready');

        let logindetails = {
            email: document.querySelector('#loginform #email').value,
            password: document.querySelector('#loginform #password').value
        };
        console.log(logindetails)

        if(logindetails.email == ''){
            alert('Please Enter Email Address');
            return
        }else if(logindetails.password == ''){
            alert('Please Enter Password');
            return
        }else{
           // alert('Ready');

           AJAXCALL(logindetails, 'POST', '/Login', (resp)=>{
               if(resp.success && resp.success.length !== 0){
                   //alert('Logged In');
                window.location.href = '/dashboard'; 
                document.querySelector('#logModal').remove();
               }else{
                   alert('Incorrect Login details');
               }
           })
            
        }
    })

    dashboardlog.addEventListener('click', function(e){
        e.preventDefault();    

       let userdetails = {
        email: document.querySelector('#dashboardform #email').value,
        password: document.querySelector('#dashboardform #password').value
    };
    console.log(userdetails)

    if(userdetails.email == ''){
        alert('Please Enter Email Address');
        return
    }else if(userdetails.password == ''){
        alert('Please Enter Password');
        return
    }else{

       AJAXCALL(userdetails, 'POST', '/Login', (resp)=>{
           if(resp.success){
               //alert('Logged In');
            window.location.href = '/dashboard'; 
            //document.querySelector('#logModal').remove();
           }else{
               alert('Incorrect Login details');
           }
       });
        
    }
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
    request.setRequestHeader('X-CSRF-Token', document.querySelector('meta[name = "csrf-token"]').getAttribute('content'));
    request.send(JSON.stringify(sendObj));      
}