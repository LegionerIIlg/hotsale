<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-2 col-footer-border footer-navbar-bock">
                <a href="tel:+380961122333" target="_blank" class="btn btn-link btn-link-tel ">
                    <span><img src="/site/imgs/footer/iconphone.svg"></span> 
                    <span class="text-number-email">+380 96 11 22 333</span>
                </a>
            </div>
            <div class="col-md-5 col-sm-3 col-2 text-lg-center footer-navbar-bock">
                <a href="mailto:info@westgasinvest.ua" target="_blank" class="btn btn-link btn-link-tel">
                    <span><img src="/site/imgs/footer/iconmail.svg"></span>
                    <span class="text-number-email" >info@westgasinvest.ua</span>
                </a> 
            </div>
            <div class="col-md-4 col-sm-6 col-8 text-md-center footer-navbar-bock">
                <a onclick="$('#sendMessageModal').modal('show')" title="send message" >
                    <div class="module-border-wrap mx-md-auto">
                        <div class="module">
                            Написати повідомлення
                        </div>
                    </div>
                </a>
            </div>

        </div>

        <hr class="footer-hr" />



        <div class="row">
            <div class="col-md-4  col-sm-10 col-10">
                <div class="d-block w-100">
                    <img src="/site/imgs/logo.png" class="img-fluid">
                </div>

                <p class="w-50 footer-adres ">Адреса: 79018, м. Львів, вул. Героїв УПА, 33</p>

            </div>
            <div class="col-md-8 col-sm-2 col-2">



                <div class="row  footer-action-block">
                    <div class="col-md-4 col-sm-6">
                        <h4>Компанія</h4>
                        <a href="#" class="" target="_blank">
                            <h5>Про нас</h5>
                        </a>
                        <a href="#" class="" target="_blank">
                            <h5>Новини</h5>
                        </a>
                        <a href="#" class="" target="_blank">
                            <h5>Структура</h5>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <h4>Послуги</h4>
                        <a href="#" class="" target="_blank">
                            <h5>Нафта і газ</h5>
                        </a>
                        <a href="#" class="" target="_blank">
                            <h5>Підземні води</h5>
                        </a>
                        <a href="#" class="" target="_blank">
                            <h5>Корисні копалини</h5>
                        </a>
                        <a href="#" class="" target="_blank">
                            <h5>Інші види діяльності</h5>
                        </a>

                    </div>
                    <div class="col-md-4 col-sm-6">
                        <h4>Інформація</h4>
                        <a href="#" class="" target="_blank">
                            <h5>Ліцензія</h5>
                        </a>
                        <a href="#" class="" target="_blank">
                            <h5>Уставні документи</h5>
                        </a>
                    </div>

                </div>


                <div class="header-menu-smal-footer ">

                    <a class="menu-action-link float-end" title="menu" id="modal-show-footer" href="#dropdownMenuLinkFooter">
                        <span><i class="fas fa-bars menu-action-link-i"></i></span>
                    </a>


                    <div class="modal fade" id="dropdownMenuLinkFooter" tabindex="-1">
                        <div class="modal-dialog modal-fullscreen">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Меню футер</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="menu3">
                                    <div class="row">
                                        <div class="col-4">
                                            <h4>Компанія</h4>
                                            <div class="list-group list-group-flush">    
                                                <a href="#" class="list-group-item list-group-item-action">Про нас</a>
                                                <a href="#" class="list-group-item list-group-item-action">Новини</a>
                                                <a href="#" class="list-group-item list-group-item-action">Структура</a>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <h4>Послуги</h4>
                                            <div class="list-group list-group-flush">    
                                                <a href="#" class="list-group-item list-group-item-action">Нафта і газ</a>
                                                <a href="#" class="list-group-item list-group-item-action">Підземні води</a>
                                                <a href="#" class="list-group-item list-group-item-action">Корисні копалини</a>
                                                <a href="#" class="list-group-item list-group-item-action">Інші види діяльності</a>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <h4>Інформація</h4>
                                            <div class="list-group list-group-flush">    
                                                <a href="#" class="list-group-item list-group-item-action">Ліцензія</a>
                                                <a href="#" class="list-group-item list-group-item-action">Уставні документи</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>




            </div>

        </div>



        <hr class="footer-hr2" />
        <div class="row">
            <div class="col-md-6 col-sm-6 col-6">
                <a href="/" title="copirite" class="btn btn-footer-copirite">
                    © 2022. ЗАХІДГАЗІНВЕСТ  
                </a>
            </div>
            <div class="col-md-6 col-sm-6 col-6 text-end">

                <a href="#" target="_blank" title="social facebook" class="btn btn-footer-social">
                    <img src="/site/imgs/footer/facebook.png">
                </a>

                <a href="#" target="_blank" title="social instagram" class="btn btn-footer-social">
                    <img src="/site/imgs/footer/instagram.png">
                </a>

            </div>    

        </div>




    </div>

</footer>