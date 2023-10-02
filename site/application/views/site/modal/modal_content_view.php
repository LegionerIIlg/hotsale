<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="modal fade modal-send-message" id="sendMessageModal" tabindex="-1" aria-labelledby="sendMessageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-sm-8">
                        <h3>Написати повідомлення</h3>
                    </div>
                    <div class="col-sm-1">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                </div>
                <form actio='' id='formSendModalMessage' onsubmit="return false">


                    <div class="d-inline-block w-100 mb-3">

                        <input type="text" name="name" value="" class="form-control mx-auto w-75" placeholder="Ім’я" aria-label="Ім’я" required="true">
                    </div>
                    <div class="d-inline-block w-100 mb-3">

                        <input type="tel" name="phone" value="" class="form-control mx-auto w-75" placeholder="Телефон" aria-label="Телефон" required="true">
                    </div>

                    <div class="d-inline-block w-100 mb-3">

                        <textarea  rows="5" name="text"  class="form-control mx-auto w-75" placeholder="Текст повідомлення" aria-label="Текст повідомлення" required="true"></textarea>
                    </div>
                    <div class="d-inline-block w-100 mb-3 text-center">


                        <button type="submit" class="modal-submit" title="send message" >
                            Відправити
                        </button>
                    </div>   

                </form>






            </div>
        </div>
    </div>
</div>

