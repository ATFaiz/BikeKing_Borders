// if(document.querySelector('.modal-close')){

 

//     const modalBox = document.querySelector('.modal-close');
    
     
    
//     modalBox.addEventListener('click', function(){
    
//     window.location.href = modalBox.getAttribute("data-Page");
    
//     });
    
     
    
//     }
    
     
    
     
    
    function check_password() {
    
     
    
    const password = document.getElementById('password').value;
    
    const confirm = document.getElementById('confirm').value;
    
     
    
    if (password == confirm) {
    
    document.getElementById('submit').disabled = false;
    
    } else {
    
    document.getElementById('submit').disabled = true;
    
    }
    
     
    
    }