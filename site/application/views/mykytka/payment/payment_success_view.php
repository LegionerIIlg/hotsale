<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>





      
    
    
<div class="d-inline-block w-100 mt-1"></div>

 <?php if(!empty($pay_comics))
                    if(!empty($pay_comics->id_comics==1 or $pay_comics->id_comics==2)):?>
<section class="main-wrap-3-carousel-name-1 mt-3 mb-0">
        <div class="container">
            <div class="row">
                <div class="col-12   col-md-12 col-lg-8">
                <h2><?php if (!empty($buttons['21_name'])) echo $buttons['21_name']; // ПРИГОДИ  ?></h2>
                </div>
               
                <div class="col-2  col-md-2 col-lg-1 pt-3 text-end">
                 <img  src="/site/imgs/pdf.webp">
                </div>
                <div class="col-10 col-md-10 col-lg-3 pt-3 text-center">
                    <a  class="btn btn-link bg-color-red text-uppercase" 
                        title="<?php if (!empty($bc['32_name'])) echo $bc['32_name']; ?>"
                        href="/download/one/" target="_blank" ><?php if (!empty($buttons['40_name'])) echo htmlspecialchars_decode($buttons['40_name']); // ПРИГОДИ  ?></a>
                </div>
               
            </div>
            </div>
    </section>
 <?php endif;?>

<?php if(!empty($pay_comics))
                    if(!empty($pay_comics->id_comics==3 or $pay_comics->id_comics==2)):?>
<section class="main-wrap-3-carousel-name-2 mt-0">
        <div class="container">
            <div class="row">
                <div class="col-12   col-md-12 col-lg-8">
        <h2><?php if (!empty($buttons['22_name'])) echo $buttons['22_name']; // ПРИГОДИ  ?></h2>
           </div>
                
                <div class="col-2  col-md-2 col-lg-1 pt-3 text-end">
                 <img  src="/site/imgs/pdf.webp">
                </div>
                <div class="col-10 col-md-10 col-lg-3 pt-3 text-center">
                    <a  class="btn btn-link bg-color-red text-uppercase" 
                        title="<?php if (!empty($bc['33_name'])) echo $bc['33_name']; ?>"
                        href="/download/two/" target="_blank" ><?php if (!empty($buttons['40_name']))echo htmlspecialchars_decode( $buttons['40_name']); //Завантажити у PDF  ?></a>
                </div>
                
                
            </div>
        </div>
    </section>

          <?php endif;?>


    <section class="d-inline-block w-100  main-wrap-2 mt-0 mb-5">

        <div class="d-inline-block main-wrap-2-block-3 mb-3 black-bg-35">
            <div class="container ">
                 <?php if(!empty($page->full_text)) echo $page->full_text;?>
            </div>
        
        </div>



    </section>
    
    

    



