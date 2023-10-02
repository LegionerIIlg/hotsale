<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>





    
    
    

          


    <section class="d-inline-block w-100  main-wrap-2 mt-5">

        <div class="d-inline-block main-wrap-2-block-3 black-bg-35">
            
            <div class="container">
                <h4><?php if (!empty($ab['37_name'])) echo $ab['37_name']; //    Ваше замовлення:" ?> <?php if(!empty($row->name_comics)) echo $row->name_comics;?> </h4>
                <p class="ps-0"><?php if (!empty($ab['38_name'])) echo $ab['38_name']; //    Вартість:" ?> <?php if(!empty($row->summ)) echo intval ($row->summ).'  грн.';?> </p>
            </div>
            <div class="d-none container">
                <h4 class="text-danger">Увага! Після оплати для успішного завантаження файлів не закривайте сторінку до її перезавантаження</h4>
            </div>
            
        </div>
    </section>
    
    <section class="d-inline-block w-100  main-wrap-2 mt-2 mb-5">

    
            
            <div class="container mb-5">
                
                <div id="liqpay_checkout"></div>
                
                
                
                
            </div>
        
    </section>

    



