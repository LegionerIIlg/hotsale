<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<header class="container-fluid">

    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-4">
                <img src="/site/imgs/logo.png" class="img-fluid">
            </div>
            <div class="col-xl-7 col-lg-4 col-md-6 col-sm-4 col-2" >

                <div class=" row mt-4 justify-content-around header-menu-big" id="menu">


                    <?php
                    if (!empty($top_button)):
                        foreach ($top_button as $v):
                            ?>
                            <a class="col menu-action-link" href="<?= $v['url']; ?>"><?= $v['name']; ?></a>                                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>

                <div class="header-menu-smal float-end">

                    <a class="menu-action-link " title="menu" id="modal-show" href="#dropdownMenuLink">
                        <span><i class="fas fa-bars menu-action-link-i"></i></span>
                    </a>


                    <div class="modal fade" id="dropdownMenuLink" tabindex="-1">
                        <div class="modal-dialog modal-fullscreen">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Меню</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body list-group list-group-flush" id="menu2">

                                    
                                        <?php
                                        if (!empty($top_button)):
                                            foreach ($top_button as $v):
                                                ?>
                                                <a class="list-group-item list-group-item-action"   href="<?= $v['url']; ?>"><?= $v['name']; ?></a>
                                                <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </div>



                               
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>


            </div>
            <div class="col-xl-2 col-md-3  col-sm-5 col-6">

                <a class="menu-action-phone" href="tel:+380961122333">
                    <span class="pe-1"><img src="site/imgs/maincontent/icon_phone.png" alt="phone"></span>
                    <span > +380 96 11 22 333</span></a>
            </div>
        </div>
        <h1 class="site-header-name">
            ЗАХІДГАЗІНВЕСТ <br>
            Досвід та професійність
        </h1>
        <p class="header-caption-about">
            Основна діяльність Товариства - Видобування <br> 
            корисних копалин (промислова розробка родовищ).
        </p>
        <br>
        <a href="#" class="d-inline-block header-button-caption ">Докладніше</a>
        <div class="row justify-content-start mt-5 mb-5 for-small-screen">
            <div class="col-4">  
                <h3 class="header-h3"> 2012</h3>
                <h4 class="header-h4"> рік заснування</h4>
            </div>
            <div class="col-4">  
                <h3 class="header-h3">23 564</h3>
                <h4 class="header-h4">кубів газу видобуто</h4>
            </div>
            <div class="col-3">  
                <h3 class="header-h3">3,8 км<sup>2</sup></h3>
                <h4 class="header-h4">площа видобування</h4>
            </div>
        </div>
    </div>


</header>