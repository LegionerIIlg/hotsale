<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="ua">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Таблиця користувачів</title>
        <meta name="description" content="Таблиця користувачів" />
        <meta name="keywords" content="Таблиця користувачів" />
        <meta name="author" content="lrgioner">
        <meta name="publisher-email" content="" />
        <meta name="robots" content="index, follow" />

        <link rel="stylesheet" href="/site/bootstrap/css/bootstrap.css" >
        <link rel="stylesheet" href="/fontawesomefree/css/all.css" >
        <!-- Owl Stylesheets -->

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 

        <link href="/site/css/main.css?r=<?php echo rand(1, 100); ?>" rel="stylesheet">









    </head>
    <body  class="bg-light">


        <div class="container mx-auto">

            <div class="row">
                <div class="col-9">
                    <h1>Таблиця користувачів</h1>
                </div>
                <div class="col-3 text-end">

                    <a title="Додати користувача" 
                       class="btn btn-link text-info" style="text-decoration: none;"
                       onclick="$('#modalAddNew').modal('show')">
                        <span>Додати</span>  
                        <span><i class="fa fa-plus"></i></span>      
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover ">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Ім'я</th>
                            <th scope="col">Прізвище</th>
                            <th scope="col">Email</th>
                            <th scope="col">Пароль</th>
                            <th scope="col">Редагувати</th>

                        </tr>
                    </thead>
                    <tbody id="tbody-users">

                        <?php if (!empty($tbody)) echo $tbody; ?>
                    </tbody>
                </table>
            </div>

        </div>


        <div class="modal fadel" id="modalAddNew" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body position-relative">
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close">

                        </button>

                        <h3 class="mt-3 text-center">Введіть дані</h3>
                        <div class="row  justify-content-center  mt-3 mb-3">
                            <div class="col-10" >

                                <form  action="/addnew/" 
                                       method="POST" onsubmit="return addNewUser(this)">
                                    <div class="mb-3">
                                        <label for="inputName" class="form-label">Ім'я</label>
                                        <input type="text" 
                                               required="true"
                                               placeholder="" name="name" class="form-control" id="inputName">
                                    </div>


                                    <div class="mb-3">
                                        <label for="inputSurname" class="form-label">Прізвище</label>
                                        <input type="text"  name="surname" 
                                               required="true"
                                               class="form-control" 
                                               id="inputSurname">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputEmail1" class="form-label">Email</label>
                                        <input type="email" 
                                               placeholder=""
                                               name="email" value="" required="true"
                                               class="form-control" id="inputEmail1" aria-describedby="emailHelp">
                                    </div>

                                    <div class="mb-3">
                                        <label for="inputPassword" class="form-label">Пароль</label>
                                        <input type="password"  name="password" 
                                               required="true"
                                               class="form-control" 
                                               id="inputPassword">
                                    </div>

                                    <div class="mb-3">
                                        <label for="inputPasswordt" class="form-label">Пароль повторно</label>
                                        <input type="password"  name="passwordt" 
                                               required="true"
                                               class="form-control" 
                                               id="inputPasswordt">
                                    </div>



                                    <button type="submit"    class="btn btn-success float-end pt-3 pb-3 mt-3">Додати</button>
                                </form>

                            </div>
                        </div>






                    </div>
                </div>
            </div>
        </div>


        <div class="modal fadel" id="modalChange" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body position-relative">
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close">

                        </button>

                        <h3 class="mt-3 text-center">Введіть дані</h3>
                        <div class="row  justify-content-center  mt-3 mb-3">
                            <div class="col-10" >

                                <form  action="/savechange/" 
                                       method="POST" onsubmit="return saveChangeUser(this)">
                                    
                                    <input   type="hidden" 
                                               placeholder="" 
                                               name="record" 
                                               class="form-control" 
                                               id="changeRecord">
                                    
                                    <div class="mb-3">
                                        <label for="changeName" class="form-label">Ім'я</label>
                                        <input type="text" 
                                               required="true"
                                               placeholder="" 
                                               name="name" 
                                               class="form-control" 
                                               id="changeName">
                                    </div>


                                    <div class="mb-3">
                                        <label for="changeSurname" class="form-label">Прізвище</label>
                                        <input type="text"  name="surname" 
                                               required="true"
                                               class="form-control" 
                                               id="changeSurname">
                                    </div>
                                    <div class="mb-3">
                                        <label for="changeEmail1" class="form-label">Email</label>
                                        <input type="email" 
                                               placeholder=""
                                               name="email" value="" required="true"
                                               class="form-control" id="changeEmail1" aria-describedby="emailHelp">
                                    </div>

                                    <button type="submit"    class="btn btn-success float-end pt-3 pb-3 mt-3">Зберегти</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
        
        
        <div class="modal fadel" id="modalChangePassword" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body position-relative">
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close">

                        </button>

                        <h3 class="mt-3 text-center">Введіть дані</h3>
                        <div class="row  justify-content-center  mt-3 mb-3">
                            <div class="col-10" >

                                <form  action="/passwordchange/" 
                                       method="POST" onsubmit="return savePassword(this)">
                                    
                                    <input   type="hidden" 
                                               placeholder="" 
                                               name="record" 
                                               class="form-control" 
                                               id="changeRecordPassword">
                                    
                                    <div class="mb-3">
                                        <label for="changePassword" class="form-label">Пароль</label>
                                        <input type="password"  name="password" 
                                               required="true"
                                               class="form-control" 
                                               id="changePassword">
                                    </div>

                                    <div class="mb-3">
                                        <label for="inputPasswordt" class="form-label">Пароль повторно</label>
                                        <input type="password"  name="passwordt" 
                                               required="true"
                                               class="form-control" 
                                               id="changePasswordt">
                                    </div>


                                 

                                    <button type="submit"    class="btn btn-success float-end pt-3 pb-3 mt-3">Змінити</button>
                                </form>

                            </div>
                        </div>






                    </div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="/site/bootstrap/js/bootstrap.bundle.min.js"></script> 
        <script src="/site/bootstrap/js/bootstrap.js"></script> 
        <script src="/fontawesomefree/js/all.js"></script> 


        <script src="/site/js/jquery.blockUI.js"></script>
        <script src="/site/js/main.js?r=<?php echo rand(1, 100); ?>"></script>




    </body>
</html>
