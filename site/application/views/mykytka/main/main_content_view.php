<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php if (!empty($pay_comics)) 
    if(intval($pay_comics->id_comics) !=1):
    
 
     ?>
    <div class="text-center " 
         style="position: fixed; bottom: 75%; right: 1%; z-index: 1000; display: table;">
        <a  class="btn btn-danger  bg-danger text-uppercase text-white" 
            title="Перейти до сторінки завантаження"
            href="/download/" target="_blank" >
            <img  style="height: 2rem;" src="/site/imgs/pdf.webp"> 
            <small class="ms-3">Завантажити</small>

        </a>
    </div>
<?php endif; ?>  





<?php if (!empty($pages_table_one)): ?>
    <section class="main-wrap-3-carousel-name-1">
        <div class="container">
          
                    <h2 class="text-center"><?php if (!empty($buttons['21_name'])) echo $buttons['21_name']; // ПРИГОДИ    ?></h2>
              
        </div>
    </section>



    <section class="container-fluid main-wrap-3-carousel main-wrap-ch1-carousel">
        <div id='slider1' class="owl-carousel owl-theme">
            <?php
            foreach ($pages_table_one as $kp => $vp):
                $upload = '/upload/pages' . $vp['path'];
                $img_big = $upload . $vp['img'];
                $img_small = $upload . 'small_' . $vp['img'];
                /* href="<?= $img_big;?>"*/
                ?>
                <div class="item">
                    <a  class=" action-view-page-now" 
                       title="<?= $vp['title']; ?>" target="_blank">
                        <img src="<?= $img_small; ?>"></a>
                </div>
    <?php endforeach; ?>

        </div>



    </section>

<?php endif; ?>















<?php if (!empty($about_comics)): ?>
    <section class="main-wrap-5">
        <h3 ><?php if (!empty($buttons['8_name'])) {echo $buttons['8_name'];} // ПРО КОМІКС    ?></h3>
    </section>

    <section class="container-fluid main-wrap-6">

        <div id='slider-kanal' class="owl-carousel owl-theme">

            <?php
            $i = 1;
            foreach ($about_comics as $kp => $vp):
                $upload = '/upload/pages' . $vp['path'];
                $img_big = $upload . $vp['img'];
                // $img_small = $upload . 'tump2_' . $vp['img'];
                $img_small = $upload . 'small_' . $vp['img'];

                $mod = $i % 2;
                $class = '';
                if ($mod == 0) {
            $class = 'nth-child-in';
                }
    ?>

                <div data-id="<?= $vp['id']; ?>" onclick="get_page_now(this)"
                     class="item card w-100 border-0 <?= $class; ?>">

                    <?php
                    if (!empty($vp['dop2'])):?>
                           
             <?php if ($vp['dop2']=='video'):
                           
                        $array_src = array('https://youtu.be/', 'https://www.youtube.com/watch?v=');
                        $src = str_replace($array_src, '', $vp['dop1']);
                        ?>

                        <iframe style="height: 14rem; width: 100%;" src="https://www.youtube.com/embed/<?= $src; ?>" title="<?= htmlspecialchars($vp['title']); ?>" frameborder="0" allow="accelerometer;   encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                       <?php endif;?> 
                        
     <?php if ($vp['dop2']=='myvideo'):
                        ?>

                        <video  style="width:100%; height: 14rem;" 
                                class="card-img-top "
                                controls poster="<?= $img_small; ?>"
                                
                                ><source src="<?=$vp['dop1'];?>" type="video/mp4" /> Your browser does not support the video tag. </video>
                        
               
                       <?php endif;?> 
                        
                        
                        
                        
                    <?php else: ?>

                        <img style="height: 14rem;" src="<?= $img_small; ?>" class="card-img-top" alt="mykytka">
        <?php endif; ?>        

                    <div class="card-body">
                        <h5 class="card-title"><?= $vp['name']; ?></h5>

                        <p class="card-text"><?= $vp['short_text']; ?></p>
                        <div class="d-inline-block w-100 text-center">
                            <a class="btn btn-get-kanal" 
                               data-id="<?= $vp['id']; ?>"
                               onclick="get_page_now(this)"><?php if (!empty($buttons['34_name'])) echo $buttons['34_name']; // Детальніше    ?></a>

                        </div>
                    </div>
                </div>




        <?php $i++;
    endforeach;
    ?>






        </div>



    </section>
<?php endif; ?>

<section class="main-wrap-7">

    <div class="container">
        <div class="styag-inner">
            <img src="/site/imgs/prapor2.svg">
        </div>

        <h3><?php if (!empty($buttons['11_name'])) echo $buttons['11_name']; // ОТРИМАТИ КОМІКС    ?></h3>
    </div>
</section>



<section class="main-wrap-8" id="pay-in-pdf-format">
    <div class="container">
        <div class="main-wrap-8-block main-wrap-3-carousel pt-4">
       


       

             <div class="row main-wrap-8-block-img-inner1 justify-content-center">
           
                <?php $ik = 0; if(!empty($comics_pages))
               foreach ($comics_pages as $kc => $vc):
                       $ik++;
                $upload = '/upload/pages/' . $vc['path'];
                $img_big = $upload . $vc['img'];?>

                 <div class=" col-6  col-xl-4 col-lg-4  
                      
                       mb-3 d-flex">
                     <div class=" d-inline-block w-100 bg-990-in position-relative

                    <?php if($vc['dop3']==1):?>btn-get-druk <?php else:?>btn-get-pdf-file  <?php endif;?>" 
                    
                          
                          
                          data-name="<?= htmlspecialchars($vc['title']); ?>"
                                    data-sum="<?=$vc['dop1'];?>"
                                    data-id="<?=$vc['dop3'];?>"
                                     
                          
                          >
                         <?php if($ik==1):?>
                         <img class="img-nova-post-nopay  position-absolute w-50 d-none" 
                              style="top:0; right: 0; z-index: 5;"
                             alt="Безкоштовна доставка"
                             title="Безкоштовна доставка" 
                             src="/site/imgs/newpost.png-atributika-ukr.png">
                         
                         
                           <img class="img-new-in-png  position-absolute w-25" 
                              style="top:0; left: 0; z-index: 5;"
                             alt="New"
                             title="New" 
                             src="/site/imgs/bestseler.png">
                         
                        <?php endif;?> 
                         
                     
                           <?php if($ik==3):?>
                      
                         
                           <img class="img-new-in-png  position-absolute w-25" 
                              style="top:0; left: 0; z-index: 5;"
                             alt="New"
                             title="New" 
                             src="/site/imgs/bestseler.png">
                         
                        <?php endif;?> 
                           
                           
                      <div class=" owl-carousel owl-theme  owl-carousel-galery-comics">
                    <div class="card w-100 bg-transparent border-0">
                        <img class="card-img-top" 
                             alt="<?= htmlspecialchars($vc['title']); ?>"
                             title="<?= htmlspecialchars($vc['title']); ?>" 
                             src="<?= $img_big; ?>">
                        
                    </div>
                     
                     
                     <?php if(!empty($vc['galery'])):
                         $galery  = $vc['galery'];
                         foreach ($galery as $kg => $vg):
                             $img_big = '/upload/pages/' . $vc['path'].'/fotogalery/big/'.$vg['img'];
                
                             ?>
                     
                     <div class="card w-100 bg-transparent border-0">
                        <img class="card-img-top" 
                             alt="<?= htmlspecialchars($vc['title']); ?>"
                             title="<?= htmlspecialchars($vc['title']); ?>" 
                             src="<?= $img_big; ?>">
                        
                    </div>
                     
                     <?php endforeach;?>
                     <?php endif;?>
                 </div>
                        
                         <h4 class="name-card-pay"><?=$vc['name'];?></h4>
                      
                        <div class="card w-100 bg-transparent border-0">
                           <div class="card-body">
                                 <?php if($vc['dop3']==1):?>
                               <h5 class="electron-versiya-h5">&nbsp; &nbsp;</h5>     
                               <button type="button" class="btn  bg-color-druk-2"
                     title="<?php echo strip_tags($vc['full_text']); // ОТРИМАТИ У PDF  btn-get-comics-druk  ?>">
                                   <p class="p1_in">
                                   <i class="fab fa-readme"></i>
                                   </p>
                                   <p class="p2_in"> <?php echo htmlspecialchars(strip_tags($vc['full_text'])); // ОТРИМАТИ У PDF    ?></p>
                             
                               </button>
                               
                               <?php else:?>
                               
                               <h5 class="electron-versiya-h5">Електронна версія</h5>
                               
                               <button type="button" class="btn  bg-color-red-2"
                               title="<?php echo strip_tags($vc['full_text']); // ОТРИМАТИ У PDF    ?>">
                                 <img  src="/site/imgs/pdf.webp">
                                 <p> <?php if (!empty($buttons['12_title'])) echo htmlspecialchars_decode($buttons['12_title']); // У <strong>PDF</strong> ФОРМАТІ     ?>
                                       </p>
                              
                               </button>
                               <?php endif;?>
                               
                               
                               
                               
                            <h5 class=" card-title p-summ"><?=$vc['dop1']; //   149 "   ?> <span class="span-small"><?php if (!empty($buttons['13_name'])) echo $buttons['13_name']; // ГРН.     ?></span></h5>
                            <div class="main-wrap-8-block-2">
                                
                              <?php if($vc['dop3']==1):?>
                                   
                               
                                
                                <button type="button"
                                    data-name="<?= htmlspecialchars($vc['title']); ?>"
                                    data-sum="<?=$vc['dop1'];?>"
                                    data-id="<?=$vc['dop3'];?>"
                                    class="btn w-100 btn-get-pdf-2 btn-get-druk bg-color-red"
                                    title="<?php echo strip_tags($vc['full_text']); // ОТРИМАТИ У PDF    ?>"
                                    >
                                         <span class="bg-warning"> 
                                                             <i class="fas fa-shopping-cart text-white"></i> 
                                                         </span>
                                                     <span class="span-text-in">
                                                      <?php if (!empty($buttons['47_title'])) echo strip_tags($buttons['47_title']);      ?> 
                                                               </span>
                                </button>
                             
                                  <?php else:?> 
                                   
                          
                                <button type="button"
                                    data-name="<?= htmlspecialchars($vc['title']); ?>"
                                    data-sum="<?=$vc['dop1'];?>"
                                    data-id="<?=$vc['dop3'];?>"
                                    title="<?php echo strip_tags($vc['full_text']); // ОТРИМАТИ У PDF       ?>"
                                    class="btn w-100 btn-get-pdf-2 btn-get-pdf-file  bg-color-red" >
                                              
                                           
                                                          
                                                         <span class="bg-warning"> 
                                                             <i class="fas fa-shopping-cart text-white"></i> 
                                                         </span>
                                                     <span class="span-text-in">
                                                          <?php if (!empty($buttons['47_title'])) echo htmlspecialchars_decode($buttons['47_title']);      ?> 
                                                  
                                                     </span>
                                </button>
                                
                                         <?php endif;?> 
                               
                      
                            </div>
                        </div>
                        </div>
               
                         </div>
                        
                        
                 </div>
               
               <?php endforeach;?>
               
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
<?php if (!empty($buttons['15_title'])) echo $buttons['15_title']; // ВІД СУМИ ПЕРЕРАХОВУЮТЬСЯ У ЗБРОЙНІ СИЛИ УКРАЇНИ    ?>
                    </h5>
                </div>

            </div>

        </div>
    </div>


</section>

















