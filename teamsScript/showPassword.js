function showPassword(){
     var showPass = document.getElementById('floatingPassword');
     if (showPass.type== 'password'){
          showPass.type='text';
     }
     else{
          showPass.type='password';
     }

     var showPass1 = document.getElementById('floatingPassword1');
     if (showPass1.type== 'password'){
          showPass1.type='text';
     }
     else{
          showPass1.type='password';
     }
}
