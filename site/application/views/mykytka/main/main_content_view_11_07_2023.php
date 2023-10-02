<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php if (!empty($pay_comics)): ?>
    <div class="text-center " 
         style="position: fixed; bottom: 75%; right: 1%; z-index: 1000; display: table;">




        <a  class="btn btn-link  bg-danger text-uppercase text-white" 
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
            <div class="row">
           
                <?php
                if (!empty($pay_comics))
                    if (!empty($pay_comics->id_comics == 1 or $pay_comics->id_comics == 2)):
                        ?>
                        <div class="col-2  col-md-2 col-lg-1 pt-3 text-end">
                            <img  src="/site/imgs/pdf.webp">
                        </div>
                        <div class="col-10 col-md-10 col-lg-3 pt-3 text-center">
                            <a  class="btn btn-link bg-color-red text-uppercase" 
                                title="<?php if (!empty($bc['32_name'])) echo $bc['32_name']; ?>"
                                href="/download/one/" target="_blank" ><?php if (!empty($buttons['40_name'])) echo htmlspecialchars_decode($buttons['40_name']); //Завантажити у PDF    ?></a>
                        </div>
    <?php endif; ?>
            </div>
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















<section class=" d-none main-wrap-4">

    <div class="d-inline-block main-wrap-4-block-1">




        <div  class="styag-tv">
            <img class="svg" src="/site/imgs/styag2.svg">

        </div>


        <h2><?php if (!empty($buttons['5_name'])) {echo $buttons['5_name'];} // Зібрано    ?></h2>                 


    </div>






    <div class="container main-wrap-4-block-2">
        <h3 class="suuma"><?php                    if (!empty($buttons['17_name'])) {
                echo $buttons['17_name'];
            } // 14 563    ?></h3>
        <h4><?php if (!empty($buttons['6_name'])) {echo $buttons['6_name'];} // ГРН.    ?></h4>
        <h5><?php if (!empty($buttons['7_name'])) {echo $buttons['7_name'];} // ДЛЯ ЗБРОЙНИХ СИЛ УКРАЇНИ    ?></h5>
    </div>



</section>



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



<section class="main-wrap-8">
    <div class="container">
        <div class="main-wrap-8-block main-wrap-3-carousel pt-4">
       


       

             <div class="row main-wrap-8-block-img-inner1 justify-content-center">
           
                <?php $ik = 0; if(!empty($comics_pages))
               foreach ($comics_pages as $kc => $vc):
                       $ik++;
                $upload = '/upload/pages/' . $vc['path'];
                $img_big = $upload . $vc['img'];?>

                 <div class="col-6 col-xl-4 col-lg-4  col-md-6 mb-3 d-flex">
                     <div class=" d-inline-block w-100 bg-990-in">
                     
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
                        
                         <h4 class="text-warning"><?=$vc['name'];?></h4>
                      
                        <div class="card w-100 bg-transparent border-0">
                           <div class="card-body">
                            <h5 class=" card-title p-summ"><?=$vc['dop1']; //   149 "   ?> <span class="span-small"><?php if (!empty($buttons['13_name'])) echo $buttons['13_name']; // ГРН.     ?></span></h5>
                            <div class="main-wrap-8-block-2">
                                
                              <?php if($ik==1):?>
                                   <a 
                                    data-name="<?= htmlspecialchars($vc['title']); ?>"
                                    data-sum="<?=$vc['dop1'];?>"
                                    data-id="<?=$vc['dop3'];?>"
                                    class="btn w-100 btn-get-pdf-2 "
                                    title="<?php echo strip_tags($vc['full_text']); // ОТРИМАТИ У PDF    ?>"
                                    href="#">
                                       <div class="row ">
                                                     <div class="col-3 p575 bg-warning text-white">
                                                            <i class="fas fa-briefcase"></i>
                                                     </div>
                                                     <div class="col-9 btn btn-get-pdf-print" >
                                                      <?php if (!empty($buttons['47_title'])) echo strip_tags($buttons['47_title']);      ?> 
                                                    </div>
                                              </div>
                                       
                                       
                                      
                                </a>
                             
                                  <?php else:?> 
                                   
                               
                                       <a 
                                    data-name="<?= htmlspecialchars($vc['title']); ?>"
                                    data-sum="<?=$vc['dop1'];?>"
                                    data-id="<?=$vc['dop3'];?>"
                                    title="<?php echo strip_tags($vc['full_text']); // ОТРИМАТИ У PDF     <i class="far fa-file-pdf"></i>  ?>"
                                    class="btn w-100 btn-get-pdf-2 " href="#">
                                              
                                              <div class="row">
                                                     <div class="col-3 p575 bg-warning text-white">
                                                          
                                                            <i class="fas fa-briefcase"></i>
                                                     </div>
                                                     <div class="col-9 btn bg-color-red">
                                                          <?php if (!empty($buttons['47_title'])) echo htmlspecialchars_decode($buttons['47_title']);      ?> 
                                                  
                                                       </div>
                                              </div> 
                                       </a>     
                                
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

















