<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="modal fade viewPagesModal" id="viewPagesModal" 
     tabindex="-1" aria-labelledby="viewPagesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body position-relative">
                 <a type="button" class="btn-close-modal" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </a>
                
                
                
                <div class="row d-flex justify-content-center">
                    <div class="col-1 col-sm-1 position-relative">
                        <button class="btn btn-link btn-link--modalabsolute btn-link--modalabsolute-left"  onclick="get_page_now_bf_af('beafore')">
                            <i class="fa fa-angle-left"></i>
                        </button>
                    </div>
                
                    <div class="col-10 col-sm-10">
                <div class="row justify-content-center mt-3">
                    <div class="col-12 col-sm-12">
                        <h3 id="view-title" class="modal-name text-center"></h3>
                    </div>
                  

                </div>

                
                    
                <div  id="view-href" class="row justify-content-center mt-3 modal-name-hrf">
                    <div class="col-12 col-sm-12">
                        <a href="" class="" target="_blank">
                        <h5  class="w-100 text-center">
                            Перейти на сторніку з новиною
                        </h5>
                        </a>
                    </div>
                  

                </div>
                
                

                <div class="row justify-content-center mt-3">
                    <div class="col-12 col-sm-6" >
                        <img  id="view-full-img" class="img-fluid" src="">
                    </div>
                </div>



                <div class="row justify-content-center mt-3 mb-3">
                    <div class="col-12 col-sm-12" id="view-full-text">



                    </div>
                </div>

                    </div>
                    <div class="col-1 col-sm-1 position-relative">
                        <button class="btn btn-link btn-link--modalabsolute btn-link--modalabsolute-right" 
                                onclick="get_page_now_bf_af('after')">
                            <i class="fa fa-angle-right"></i>
                        </button>
                    </div>
                </div>
                    

            </div>
        </div>
    </div>
</div>

<div class="modal fade viewPagesModal" id="viewPagesModalVideo" 
     tabindex="-1" aria-labelledby="viewPagesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body position-relative">
                 <a type="button" class="btn-close-modal" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </a>
                
                
                
                <div class="row d-flex justify-content-center">
                    <div class="col-1 col-sm-1 position-relative">
                        <button class="btn btn-link btn-link--modalabsolute btn-link--modalabsolute-left"  onclick="get_page_now_bf_af('beafore')">
                            <i class="fa fa-angle-left"></i>
                        </button>
                    </div>
                
                    <div class="col-10 col-sm-10">
                
                    
                <div  id="view-href" class="row justify-content-center mt-3 modal-name-hrf">
                    <div class="col-12 col-sm-12">
                        <a href="" class="" target="_blank">
                        <h5  class="w-100 text-center">
                            Перейти на  сторінку з відео
                        </h5>
                        </a>
                    </div>
                  

                </div>
                
                
                <div class="row justify-content-center mt-3 mb-3">
                    <div class="col-12 col-sm-12" id="view-full-text">



                    </div>
                </div>

                    </div>
                    <div class="col-1 col-sm-1 position-relative">
                        <button class="btn btn-link btn-link--modalabsolute btn-link--modalabsolute-right" 
                                onclick="get_page_now_bf_af('after')">
                            <i class="fa fa-angle-right"></i>
                        </button>
                    </div>
                </div>
                    

            </div>
        </div>
    </div>
</div>



<div class="modal fade viewDonateModal" id="viewDonateModal" 
     tabindex="-1" aria-labelledby="viewPagesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content black-bg-35">
            <div class="modal-body position-relative">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
                       
              <div class="row  justify-content-center  mt-3">
                    <div class="col-10"> 
                        <h3 id="modal-name-viewDonateModal" class="text-center">
                  <?php if (!empty($buttons['26_name'])) echo $buttons['26_name']; //    Ви хочете купити ?>:
                  <br><span></span>!
                        </h3>
                        <p class="d-none text-center">
                            <small class="text-white"> Для переходу до оплати,  спочатку пройдіть коротку реєстрацію. </small> <br>
                           
                            <small class="text-white"> Після сплати Вам будуть доступні посилання на завантаження </small> 
                            
                        </p>
                        
                        
                        <p class="text-center">
                            <small class="text-white"> Cпочатку пройдіть коротку реєстрацію <br>
                                та виберіть спосіб оплати</small> 
                            
                        </p>
                            
                        </h5>
                    </div>
              </div>
                   

              <h3 class="mt-3 text-center d-none"><?php if (!empty($bs['27_name'])) echo $bs['27_name']; //    Представтесь будь-ласка ?>!</h3>
                <div class="row  justify-content-center  mt-3 mb-3">
                    <div class="col-10" >

                        <form  action="/paynow/get_pay_now/" 
                              method="POST" onsubmit="return getPayComcis(this)">
                            
                            <input type="hidden" name="summ" value="" id="summPayComics">
                             <input type="hidden" name="idc" value="" id="payComics">
                             <input type="hidden" name="name_comics" value="" id="namePayComics">
                            
                              <div class="mb-3">
                                <label for="exampleInputPip" class="form-label"><?php if (!empty($bs['29_name'])) echo $bs['29_name']; // П.І.П ?></label>
                                <input type="text" 
                                       required="true"
                                       placeholder="<?php if (!empty($bs['29_title'])) echo $bs['29_title']; // П.І.П ?>" name="pip" class="form-control" id="exampleInputPip">
                            </div>
                            
                           
                            <div class="mb-3">
                                <label for="exampleInputPhone" class="form-label"><?php if (!empty($bs['28_name'])) echo $bs['28_name']; // Телефон ?></label>
                                <input type="text" placeholder="+380********" name="phone" 
                                       required="true"
                                       class="form-control" 
                                       id="exampleInputPhone">
                            </div>
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label"><?php if (!empty($bs['35_name'])) echo $bs['35_name']; // Введіть свій E-mail ?></label>
                                <input type="email" 
                                       placeholder="<?php if (!empty($bs['35_title'])) echo $bs['35_title']; // Введіть свій E-mail ?>"
                                       name="email" value="" required="true"
                                       class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                           
                               <div class="mb-3">
                                <label for="exampleInputOplata" class="form-label">Виберіть спосіб оплати</label>
                                
                                <select 
                                     name="oplata"
                                    class="form-select" 
                                    id="exampleInputOplata" 
                                    aria-describedby="oplataHelp">
                                    <option value="0 selected="true">Безготівкова онлайн</option>
                                    <option value="1">Оплата на картку</option>
                                    
                                    
                                </select>
                                
                            </div>
                             
                             
                             <button type="submit"    class="btn-get-pdf-modal float-end pt-1 pb-1 mt-3"><?php if (!empty($bs['30_name'])) echo $bs['30_name']; // Продовжити ?></button>
                        </form>

                    </div>
                </div>






            </div>
        </div>
    </div>
</div>



<div class="modal fade viewPagesModal" id="viewMenuModal" 
     tabindex="-1" aria-labelledby="viewMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-body position-relative">
                <a type="button" class="btn-close-modal" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </a>
                
                <div class="row justify-content-center mt-3">
                    <div class="col-sm-10">
                        <h3 class="text-center" >Меню</h3>
                    </div>
                    

                </div>





                <div class="row justify-content-center mt-3 mb-3">
                    <div class="col-sm-10">
                      <ul class="list-group">
                          <li class="list-group-item border-0">
                              <a target="_blank" class="btn btn-link" href="/about/">Про нас</a>
                          </li>
    <li class="list-group-item  border-0">
        <a class="btn btn-link" target="_blank"  href="/publicoferta/">Публічна оферта</a></li>
    
  </ul>


                    </div>
                </div>



            </div>
        </div>
    </div>
</div>




<div class="modal fade viewDonateModal" id="viewMessageModal" 
     tabindex="-1" aria-labelledby="viewPagesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content black-bg-35">
            <div class="modal-body position-relative">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
                <div class="row  justify-content-center  mt-3 mb-3">
                    <div class="col-10" >
              <h3 class="mt-3 text-center">Надішліть нам повідомлення</h3>
                
              <p class="text-white text-center">Ви можете безпосередньо на Email: <br>
                  <a class="text-white" href="mailto:comics.ukraine1@gmail.com">comics.ukraine1@gmail.com</a> </p>
              
                    </div>
                </div>
              
              <div class="hr-line-dashed"></div>

              
              <div class="row  justify-content-center  mt-3 mb-3">
                    <div class="col-10" >

                        <form  action="/sendmessage/" 
                              method="POST" onsubmit="return sentMessage(this)">
                            
                            
                              <div class="mb-3">
                                <label for="example1InputPip" 
                                       class="form-label">Введіть ім‘я</label>
                                <input type="text" 
                                       required="true"
                                       placeholder="Введіть ім‘я" name="pip" 
                                       class="form-control" id="example1InputPip">
                            </div>
                            
                           
                            <div class="mb-3">
                                <label for="example1InputPhone" 
                                       class="form-label">Вкажіть номер телефону</label>
                                <input type="text" placeholder="+380********" name="phone" 
                                       required="true"
                                       class="form-control" 
                                       id="example1InputPhone">
                            </div>
                            
                              <div class="mb-3">
                                <label for="example1InputEmail1" 
                                       class="form-label">Введіть свій E-mail</label>
                                <input type="email" 
                                       placeholder="Введіть свій E-mail"
                                       name="email" value="" required="true"
                                       class="form-control" id="example1InputEmail1" 
                                       aria-describedby="emailHelp">
                            </div>
                            
                            
                             <div class="mb-3">
                                <label for="example1InputMessage" 
                                       class="form-label">Введіть текст повідомлення</label>
                                       <textarea 
                                           maxlength="500"
                                       placeholder="Текст повідомлення"
                                       name="message"  required="true"
                                       class="form-control" id="example1InputMessage" 
                                       aria-describedby="emailHelp"></textarea>
                            </div>
                            
                           
                             <button type="submit"    
                                     class="btn-get-pdf-modal float-end pt-1 pb-1 mt-3">Надіслати</button>
                        </form>

                    </div>
                </div>


              


            </div>
        </div>
    </div>
</div>



<div class="modal fade viewDonateModal" id="viewShortMessage" 
     tabindex="-1" aria-labelledby="viewPagesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content black-bg-35">
            <div class="modal-body position-relative">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
                       
              <h3 class="mt-3 text-center" id="modal-text-message-in">
                  
               </h3>
                

            </div>
        </div>
    </div>
</div>