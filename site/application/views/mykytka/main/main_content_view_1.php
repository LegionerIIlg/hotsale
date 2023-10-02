<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>





    
    
      <?php if (!empty($pages_table_one)): ?>
    <section class="main-wrap-3-carousel-name-1">
        <div class="container">
        <h2><?php if (!empty($buttons['21_name'])) echo $buttons['21_name']; // ПРИГОДИ  ?></h2>
        </div>
    </section>

          
        <section class="container-fluid main-wrap-3-carousel">
            <div id='slider1' class="owl-carousel owl-theme">
                <?php
                foreach ($pages_table_one as $kp => $vp):
                    $upload = '/upload/pages' . $vp['path'];
                    $img_big = $upload . $vp['img'];
                    $img_small = $upload . 'small_' . $vp['img'];
                    ?>
                    <div class="item">
                        <a href="<?= $img_big; ?>" class="mygroup action-view-page-now" 
                           title="<?= $vp['title']; ?>" target="_blank">
                            <img src="<?= $img_small; ?>"></a>
                    </div>
    <?php endforeach; ?>

            </div>



        </section>

<?php endif; ?>


    
    
    
    
    
     <?php if (!empty($pages_table_two)): ?>
    <section class="main-wrap-3-carousel-name-2 ">
        <div class="container">
        <h2><?php if (!empty($buttons['22_name'])) echo $buttons['22_name']; // ПРИГОДИ  ?></h2>
        </div>
    </section>
    
    
    
    
   
        <section class="container-fluid main-wrap-3-carousel">
            <div id='slider2' class="owl-carousel owl-theme">
                <?php
                foreach ($pages_table_two as $kp => $vp):
                    $upload = '/upload/pages' . $vp['path'];
                    $img_big = $upload . $vp['img'];
                    $img_small = $upload . 'small_' . $vp['img'];
                    ?>
                    <div class="item">
                        <a href="<?= $img_big; ?>" class="mygroup action-view-page-now" 
                           title="<?= $vp['title']; ?>" target="_blank">
                            <img src="<?= $img_small; ?>"></a>
                    </div>
    <?php endforeach; ?>

            </div>



        </section>

<?php endif; ?>
    
    
    
    
    
    
    
    

    <section class=" d-none main-wrap-4">

        <div class="d-inline-block main-wrap-4-block-1">




            <div  class="styag-tv">
                <img class="svg" src="/site/imgs/styag2.svg">

            </div>


            <h2><?php if (!empty($buttons['5_name'])) echo $buttons['5_name']; // Зібрано  ?></h2>                 


        </div>






        <div class="container main-wrap-4-block-2">
            <h3 class="suuma"><?php if (!empty($buttons['17_name'])) echo $buttons['17_name']; // 14 563  ?></h3>
            <h4><?php if (!empty($buttons['6_name'])) echo $buttons['6_name']; // ГРН.  ?></h4>
            <h5><?php if (!empty($buttons['7_name'])) echo $buttons['7_name']; // ДЛЯ ЗБРОЙНИХ СИЛ УКРАЇНИ  ?></h5>
        </div>



    </section>



<?php if(!empty($about_comics)):?>
    <section class="main-wrap-5">
        <h3 ><?php if (!empty($buttons['8_name'])) echo $buttons['8_name']; // ПРО КОМІКС  ?></h3>
    </section>

    <section class="container-fluid main-wrap-6">
       
            <div id='slider-kanal' class="owl-carousel owl-theme">

                <?php
                $i=1;
                foreach ($about_comics as $kp => $vp):
                    $upload = '/upload/pages' . $vp['path'];
                    $img_big = $upload . $vp['img'];
                    $img_small = $upload . 'tump2_' . $vp['img'];
                    
                    $mod = $i % 2;
                    $class = '';
                    if ($mod == 0)
                        $class = 'nth-child-in';
                    ?>
                  
                <div data-id="<?=$vp['id'];?>" onclick="get_page_now(this)"
                     class="item card w-100 border-0 <?= $class; ?>">
                            <img src="<?=$img_small;?>" class="card-img-top" alt="mykytka">
                            <div class="card-body">
                                <h5 class="card-title"><?=$vp['name'];?></h5>

                                <p class="card-text"><?=$vp['short_text'];?></p>
                                <div class="d-inline-block w-100 text-center">
                                    <a class="btn btn-get-kanal" 
                                       data-id="<?=$vp['id'];?>"
                                       onclick="get_page_now(this)"><?php if (!empty($buttons['34_name'])) echo $buttons['34_name']; // Детальніше  ?></a>
                                    
                                </div>
                            </div>
                        </div>



                  
<?php $i++; endforeach; ?>




       

        </div>



    </section>
<?php endif;?>

    <section class="main-wrap-7">

        <div class="container">
            <div class="styag-inner">
                <img src="/site/imgs/prapor2.svg">
            </div>

            <h3><?php if (!empty($buttons['11_name'])) echo $buttons['11_name']; // ОТРИМАТИ КОМІКС  ?></h3>
        </div>
    </section>



    <section class="main-wrap-8">
        <div class="container">
            <div class="main-wrap-8-block">
                <div class="row d-flex justify-content-center mb-5">
                    <div class="col-2 col-sm-2 col-md-1">   
                        <img  src="/site/imgs/pdf.webp">
                    </div>
                    <div class="col-8 col-sm-6 col-md-4  bg-color-red mx-3">
                        <h6 class="w-100"><?php if (!empty($buttons['12_title'])) echo htmlspecialchars_decode($buttons['12_title']); // У <strong>PDF</strong> ФОРМАТІ   ?></h6>
                    </div>


                </div>


                <?php 
                $ob2 =  $ob1 = array();
                $upload = '/upload/pages' ;
                $img_ob1 = '/upload/ilustrat/mykytka_002.webp'; 
                $img_ob2 = '/upload/ilustrat/mykytka_0021.png';
                $img_ob3 = '/upload/ilustrat/mykytka_0031.png';
                $title_ob2 = $title_ob1 = '';
                if(!empty($obkladenka_t)){
                  $ob1 = array_shift($obkladenka_t);
                    $img_ob1 = $upload.$ob1['path']. $ob1['img'];
                    if(!empty($img_ob1['title'])) {
                    $title_ob1 = htmlspecialchars($img_ob1['title']);}
                }
                if(!empty($obkladenka_t)){
                  $ob2 = array_shift($obkladenka_t);
                  $img_ob2 = $upload.$ob2['path']. $ob2['img'];
                  if(!empty($img_ob2['title'])) {
                  $title_ob2 = htmlspecialchars($img_ob2['title']);}
                }
?>

                <div class="row d-flex justify-content-between mt-5">
                    <div class="col-3 col-sm-3 main-wrap-8-block-img-inner1">
                        <img class="img-fluid" 
                             alt="<?=$title_ob2;?>"
                             title="<?=$title_ob2;?>" 
                             src="<?= $img_ob1;?>">
                        
                        
                        
                    <div class="d-none display-inline-block-view-576">
                        
                        <p class="p-summ"> 99 <span class="span-small"><?php if (!empty($buttons['13_name'])) echo $buttons['13_name']; // ГРН.   ?></span></p>
                        <div class="main-wrap-8-block-2">
                            <a 
                                data-name="<?php if (!empty($buttons['23_name'])) echo $buttons['23_name']; //   Першу частину коміксу" ?>"
                                data-sum="99"
                                data-id="1"
                                class="btn-get-pdf" href="#">
                                <span><?php if (!empty($buttons['14_name'])) echo $buttons['14_name']; // ОТРИМАТИ У PDF  ?></span>
                                <span><i class="fas fa-plus"></i></span>
                            </a>
                        </div> 
                    </div>
                
                        
                        
                    </div>
                    <div class="col-4 col-sm-4 position-relative main-wrap-8-block-img-inner3 text-center ">
                         <!--  <img class="img-blister-two" 
                             alt="<?=$title_ob1;?>"
                             title="<?=$title_ob1;?>"
                              src="<?= $img_ob1;?>">
                        <img  class="img-blister-one" 
                              alt="<?=$title_ob2;?>"
                             title="<?=$title_ob2;?>"
                              src="<?= $img_ob2;?>">-->
                      <img  class="img-blister-one-no img-fluid" 
                              alt="<?=$title_ob2;?>"
                             title="<?=$title_ob2;?>"
                              src="<?= $img_ob3;?>">
                        
                        
                        
                   

                    
                    <div class="d-none display-inline-block-view-576">
                        <p class="p-summ"> 249 <span class="span-small"><?php if (!empty($buttons['13_name'])) echo $buttons['13_name']; // ГРН.   ?></span></p>
                        <div class="main-wrap-8-block-2">
                            <a 
                                data-name="<?php if (!empty($buttons['24_name'])) echo $buttons['24_name']; //   Дві частини коміксу ?>"
                                data-sum="249"
                                data-id="2"
                                class="btn-get-pdf" href="#">
                                <span><?php if (!empty($buttons['14_name'])) echo $buttons['14_name']; // ОТРИМАТИ У PDF  ?></span>
                                <span><i class="fas fa-plus"></i></span>
                            </a>
                        </div> 
                    </div>
                    
                
                     
                       
                    </div>
                      <div class="col-3 col-sm-3 main-wrap-8-block-img-inner2">
                        <img class="img-fluid" 
                             alt="<?=$title_ob2;?>"
                             title="<?=$title_ob2;?>"
                             src="<?= $img_ob2;?>">
                        
                        
                         <div class="d-none display-inline-block-view-576">
                       
                        <p class="p-summ"> 149 <span class="span-small"><?php if (!empty($buttons['13_name'])) echo $buttons['13_name']; // ГРН.   ?></span></p>
                        <div class="main-wrap-8-block-2">
                            <a 
                                data-name="<?php if (!empty($buttons['25_name'])) echo $buttons['25_name']; //   Другу частину коміксу ?>"
                                data-sum="149"
                                data-id="3"
                                class="btn-get-pdf" href="#">
                                <span><?php if (!empty($buttons['14_name'])) echo $buttons['14_name']; // ОТРИМАТИ У PDF  ?></span>
                                <span><i class="fas fa-plus"></i></span>
                            </a>
                        </div> 
                    </div>
                      
                    </div>
                </div>
                
                
                <div class="row d-flex justify-content-center mt-5 display-inline-block-noview-576">
                    <div class="col-sm-4">
                        
                        <p class="p-summ"> 99 <span class="span-small"><?php if (!empty($buttons['13_name'])) echo $buttons['13_name']; // ГРН.   ?></span></p>
                        <div class="main-wrap-8-block-2">
                            <a 
                                data-name="<?php if (!empty($buttons['23_name'])) echo $buttons['23_name']; //   Першу частину коміксу" ?>"
                                data-sum="99"
                                data-id="1"
                                class="btn-get-pdf" href="#">
                                <span><?php if (!empty($buttons['14_name'])) echo $buttons['14_name']; // ОТРИМАТИ У PDF  ?></span>
                                <span><i class="fas fa-plus"></i></span>
                            </a>
                        </div> 
                    </div>

                    
                    <div class="col-sm-4 position-relative">
                        <p class="p-summ"> 249 <span class="span-small"><?php if (!empty($buttons['13_name'])) echo $buttons['13_name']; // ГРН.   ?></span></p>
                        <div class="main-wrap-8-block-2">
                            <a 
                                data-name="<?php if (!empty($buttons['24_name'])) echo $buttons['24_name']; //   Дві частини коміксу ?>"
                                data-sum="249"
                                data-id="2"
                                class="btn-get-pdf" href="#">
                                <span><?php if (!empty($buttons['14_name'])) echo $buttons['14_name']; // ОТРИМАТИ У PDF  ?></span>
                                <span><i class="fas fa-plus"></i></span>
                            </a>
                        </div> 
                    </div>
                    
                    
                    
                      <div class="col-sm-4">
                       
                        <p class="p-summ"> 149 <span class="span-small"><?php if (!empty($buttons['13_name'])) echo $buttons['13_name']; // ГРН.   ?></span></p>
                        <div class="main-wrap-8-block-2">
                            <a 
                                data-name="<?php if (!empty($buttons['25_name'])) echo $buttons['25_name']; //   Другу частину коміксу ?>"
                                data-sum="149"
                                data-id="3"
                                class="btn-get-pdf" href="#">
                                <span><?php if (!empty($buttons['14_name'])) echo $buttons['14_name']; // ОТРИМАТИ У PDF  ?></span>
                                <span><i class="fas fa-plus"></i></span>
                            </a>
                        </div> 
                    </div>
                    


                </div>
                
                



            </div>
        </div>


        <div class="d-inline-block w-100">
            <div class="main-wrap-8-block-3">

                <div class="row d-flex justify-content-center">
                    <div class="col-3 col-md-2">
                        <h4>20%</h4> 
                    </div>
                    <div class="col-9 col-md-8">
                        <h5>    
<?php if (!empty($buttons['15_title'])) echo $buttons['15_title']; // ВІД СУМИ ПЕРЕРАХОВУЮТЬСЯ У ЗБРОЙНІ СИЛИ УКРАЇНИ  ?>
                        </h5>
                    </div>

                </div>

            </div>
        </div>


    </section>






    










