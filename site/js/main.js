




function ValidateEmail(input) {

  var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

  if (input.match(validRegex)) {
    return true;
  } else {
    return false;

  }

}




function addNewUser(action){
    let $form = $(action);
    let $modal=$('#modalAddNew');   
    let $email = $('#inputEmail1').val();
    let $paswdone = $('#inputPassword').val(); 
    let $paswdtwo = $('#inputPasswordt').val();
    
    if($paswdone.length <6 ){ 
        error__view('Пароль закороткий!');
        return false;
    }
    
    if($paswdone !=$paswdtwo){
        error__view('Паролі не співпадають!');
        return false;
    }
 
 
    if( !ValidateEmail($email)){
        error__view('Введіть правильно email!');
        return false;
    }
 
    $.ajax({
            url:  $form.attr('action'),
            type: 'POST',
            cache: false,
            dataType: "JSON",
            data: $form.serialize(),
            beforeSend: function () {
                load__show();
            },
            success: function ($data) {
                load__hide();
               if($data.success){
                   $modal.modal('hide');
                   sucses__view($data.success);
                   functionSeachInTableSmall();
                }
            },
            error: function ($data) {
                load__hide();
                error__view($data);
            }
        })
        return false;
}

function saveChangeUser(action){
    let $form = $(action);
    let $modal=$('#modalChange');   
    let $email = $('#changeEmail1').val();
    let $paswdone = $('#changePassword').val(); 
 
 
    if( !ValidateEmail($email)){
        error__view('Введіть правильно email!');
        return false;
    }
 
    $.ajax({
            url:  $form.attr('action'),
            type: 'POST',
            cache: false,
            dataType: "JSON",
            data: $form.serialize(),
            beforeSend: function () {
                load__show();
            },
            success: function ($data) {
                load__hide();
               if($data.success){
                   $modal.modal('hide');
                   sucses__view($data.success); 
                   functionSeachInTableSmall();
                }
            },
            error: function ($data) {
                load__hide();
                error__view($data);
            }
        })
        return false;
}

function functionChangePass(action){
      let $action = $(action);
    let $tr=$action.parents('tr');   
    let $id = $tr.data('id'); 
     let $modal=$('#modalChangePassword'); 
    $('#changeRecordPassword').val($id);
    $modal.modal('show');
}

function savePassword(action){
    
    let $form = $(action);
    let $modal=$('#modalChangePassword');   
    
    let $paswdone = $('#changePassword').val(); 
    let $paswdtwo = $('#changePasswordt').val();
    
    if($paswdone.length <6 ){ 
        error__view('Пароль закороткий!');
        return false;
    }
    
    if($paswdone !=$paswdtwo){
        error__view('Паролі не співпадають!');
        return false;
    }
 
 
 
 
    $.ajax({
            url:  $form.attr('action'),
            type: 'POST',
            cache: false,
            dataType: "JSON",
            data: $form.serialize(),
            beforeSend: function () {
                load__show();
            },
            success: function ($data) {
                load__hide();
               if($data.success){
                   $modal.modal('hide');
                   sucses__view($data.success); 
                   functionSeachInTableSmall();
                }
            },
            error: function ($data) {
                load__hide();
                error__view($data);
            }
        })
        return false;
    
    
};



function functionDestroy(action){
    let $action = $(action);
    let $tr=$action.parents('tr');   
    let $id = $tr.data('id'); 
 
 
   if(confirm('Дійсно хочере видалити?')){
    $.ajax({
            url:  '/destroy/?record='+$id,
            type: 'GET',
            cache: false,
            dataType: "JSON",
            beforeSend: function () {
                load__show();
            },
            success: function ($data) {
                load__hide();
               if($data.success){
                  
                   sucses__view($data.success); 
                   
                   functionSeachInTableSmall();
                }
            },
            error: function ($data) {
                load__hide();
                error__view($data);
            }
        })
    }
        return false;
}


function functionSeachInTableSmall(){

 let $tbody = $('#tbody-users');
 

    $.ajax({
            url:  '/search/?q=1',
            type: 'GET',
            cache: false,
            dataType: "JSON",
            beforeSend: function () {
              
            },
            success: function ($data) {
           
                $tbody.empty();
               if($data.html){
                  $tbody.html($data.html);
                }
            },
            error: function ($data) {
              
                error__view($data);
            }
        })
    
        return false;
}

function functionSeachInTable(){

 let $tbody = $('#tbody-users');
 

    $.ajax({
            url:  '/search/?q=1',
            type: 'GET',
            cache: false,
            dataType: "JSON",
            beforeSend: function () {
                load__show();
            },
            success: function ($data) {
                load__hide();
                $tbody.empty();
               if($data.html){
                  $tbody.html($data.html);
                }
            },
            error: function ($data) {
                load__hide();
                error__view($data);
            }
        })
    
        return false;
}