<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="<?php if (!empty($langrow->short_name)) echo $langrow->short_name; ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php if (!empty($page->title)) echo $page->title . ' | ';
if (!empty($buttons['18_title'])) echo $buttons['18_title']; // ПЕРШИЙ ПАТРІОТИЧНИЙ ДИТЯЧИЙ КОМІКС  ?></title>
        <meta name="description" content="<?php if (!empty($page->short_text)) echo $page->short_text;
elseif (!empty($buttons['19_title'])) echo $buttons['19_title']; // ПЕРШИЙ ПАТРІОТИЧНИЙ ДИТЯЧИЙ КОМІКС  ?>" />
        <meta name="keywords" content="<?php if (!empty($page->keywords)) echo $page->keywords;
elseif (!empty($buttons['20_title'])) echo $buttons['20_title']; // ПЕРШИЙ ПАТРІОТИЧНИЙ ДИТЯЧИЙ КОМІКС  ?>" />
        <meta name="author" content="www.beststart.net">
        <meta name="publisher-email" content="" />
        <meta name="robots" content="index, follow" />







        <meta property="og:title" content="<?php if (!empty($page->title)) echo $page->title . ' | ';
if (!empty($buttons['18_title'])) echo $buttons['18_title']; // ПЕРШИЙ ПАТРІОТИЧНИЙ ДИТЯЧИЙ КОМІКС  ?>">
        <meta property="og:type" content="article">
        <meta property="og:updated_time" content="<?= date('Y-m-d') . 'T' . date('H:i:s') ?>+02:00">
        <meta name="author" content="www.beststart.net">
        <meta property="article:region" content="Україна">
        <meta name="twitter:image" content="https://comics.in.ua/upload/pages/2022/0627/15/9d5c5423cf04fcaa9a58955468c8d90b.png">
        <meta property="og:image" content="https://comics.in.ua/upload/pages/2022/0627/15/9d5c5423cf04fcaa9a58955468c8d90b.png">
        <meta itemprop="thumbnailUrl" content="https://comics.in.ua/upload/pages/2022/0627/15/9d5c5423cf04fcaa9a58955468c8d90b.png">
        <meta name="twitter:title" content="<?php if (!empty($page->title)) echo $page->title . ' | ';
if (!empty($buttons['18_title'])) echo $buttons['18_title']; // ПЕРШИЙ ПАТРІОТИЧНИЙ ДИТЯЧИЙ КОМІКС  ?>">
        <meta itemprop="dateCreated" content="<?= date('Y-m-d') . 'T' . date('H:i:s') ?>+02:00">
        <meta itemprop="datePublished" content="<?= date('Y-m-d') . 'T' . date('H:i:s') ?>+02:00">
        <meta itemprop="dateModified" content="<?= date('Y-m-d') . 'T' . date('H:i:s') ?>+02:00">
        <meta itemprop="url" content="https://comics.in.ua/">
        <meta itemprop="name" content="<?php if (!empty($page->title)) echo $page->title . ' | ';
if (!empty($buttons['18_title'])) echo $buttons['18_title']; // ПЕРШИЙ ПАТРІОТИЧНИЙ ДИТЯЧИЙ КОМІКС  ?>">
        <meta itemprop="author" content="www.beststart.net">
        <meta property="article:published_time" content="<?= date('Y-m-d') . 'T' . date('H:i:s') ?>+02:00">
        <meta property="article:modified_time" content="<?= date('Y-m-d') . 'T' . date('H:i:s') ?>+02:00">
        <meta property="article:publisher" content="https://www.facebook.com/beststart.net">
        <meta property="article:author" content="https://www.facebook.com/beststart.net">
        <meta property="article:section" content="<?php if (!empty($page->title)) echo $page->title . ' | ';
if (!empty($buttons['18_title'])) echo $buttons['18_title']; // ПЕРШИЙ ПАТРІОТИЧНИЙ ДИТЯЧИЙ КОМІКС  ?>">
        <meta property="article:tag" content="<?php if (!empty($page->title)) echo $page->title . ' | ';
if (!empty($buttons['18_title'])) echo $buttons['18_title']; // ПЕРШИЙ ПАТРІОТИЧНИЙ ДИТЯЧИЙ КОМІКС  ?>">
        <meta property="article:tag" content="<?php if (!empty($page->title)) echo $page->title . ' | ';
if (!empty($buttons['18_title'])) echo $buttons['18_title']; // ПЕРШИЙ ПАТРІОТИЧНИЙ ДИТЯЧИЙ КОМІКС  ?>">
        <meta property="article:tag" content="<?php if (!empty($page->short_text)) echo $page->short_text;
elseif (!empty($buttons['19_title'])) echo $buttons['19_title']; // ПЕРШИЙ ПАТРІОТИЧНИЙ ДИТЯЧИЙ КОМІКС  ?>">
        <meta name="news_keywords" content="<?php if (!empty($page->keywords)) echo $page->keywords;
elseif (!empty($buttons['20_title'])) echo $buttons['20_title']; // ПЕРШИЙ ПАТРІОТИЧНИЙ ДИТЯЧИЙ КОМІКС  ?>">
        <meta name="description" content="<?php if (!empty($page->short_text)) echo $page->short_text;
elseif (!empty($buttons['19_title'])) echo $buttons['19_title']; // ПЕРШИЙ ПАТРІОТИЧНИЙ ДИТЯЧИЙ КОМІКС  ?>">
        <meta name="twitter:description" content="<?php if (!empty($page->short_text)) echo $page->short_text;
elseif (!empty($buttons['19_title'])) echo $buttons['19_title']; // ПЕРШИЙ ПАТРІОТИЧНИЙ ДИТЯЧИЙ КОМІКС  ?>">
        <meta property="og:description" content="<?php if (!empty($page->short_text)) echo $page->short_text;
elseif (!empty($buttons['19_title'])) echo $buttons['19_title']; // ПЕРШИЙ ПАТРІОТИЧНИЙ ДИТЯЧИЙ КОМІКС  ?>">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="wmail-verification" content="test">
        <meta name="msvalidate.01" content="test">
        <meta name="alexaVerifyID" content="test">
        <meta name="google-site-verification" content="test">
        <meta name="geo.placename" content="Kiev, Ukraine">
        <meta name="geo.position" content="50.473782;30.459643">
        <meta name="geo.region" content="UA-Ukraine">
        <meta name="geo.country" content="UA">
        <meta name="ICBM" content="50.473782, 30.459643">
        <meta name="theme-color" content="#1b1b1b">
        <meta name="msapplication-TileColor" content="#fbed21">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--<meta property="fb:admins" content="1">
        <meta property="fb:app_id" content="2581849931908443">
        <meta property="fb:pages" content="148182332275963">
        <meta property="twitter:account_id" content="1">-->
        <meta property="og:site_name" content="<?php if (!empty($page->title)) echo $page->title . ' | ';
if (!empty($buttons['18_title'])) echo $buttons['18_title']; // ПЕРШИЙ ПАТРІОТИЧНИЙ ДИТЯЧИЙ КОМІКС  ?>">
        <meta property="twitter:site" content="@beststart.net">
        <meta property="og:locale" content="uk_UA">
        <meta property="og:url" content="https://comics.in.ua/">


        <meta name="facebook-domain-verification" content="yy18c0mamfcdysoon0m7d9xpxayurd" />





        <link rel="stylesheet" href="/site/bootstrap/css/bootstrap.css" >
        <link rel="stylesheet" href="/fontawesomefree/css/all.css" >
        <!-- Owl Stylesheets -->
        <link rel="stylesheet" href="/site/owlc/owlcarousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="/site/owlc/owlcarousel/assets/owl.theme.default.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 





        <link href="/site/colorbox/colorbox.css" rel="stylesheet">

        <link href="/site/css/main.css?r=<?php echo rand(1, 100); ?>" rel="stylesheet">

        
        
        <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-97863638-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-97863638-1');
</script>
        
        

    </head>
    <body>
        
        <div class="position-fixed botton-send-message"
             
             title="Надіслати повідомлення."
             onclick="$('#viewMessageModal').modal('show');">
            <span><i class="fas fa-comment-alt"></i></span>
          
            
        </div>
        
        
        
        <section class="fixet-footer-navbar d-inline-block w-100  d-none fixed-bottom pt-sm-3 pb-sm-3 "
                 id="container-footer-action" style="background: rgba(61, 155, 233, 0.7);"> 

            <a href="#pay-in-pdf-format" class="text-white font-bold">
        <div class="container"  id="footer-conteiner-first">

            
            <h3 class="w-100 text-center">Перейти до замовлення?</h3>
            

        </div>
            </a>
    </section>
        
        
        
        <video autoplay muted loop id="myVideo"  poster="/site/imgs/prapor.webp">
            <source src="/site/video/file_002.mp4" type="video/mp4">
        </video>

        <div class="main-wrap position-relative">
            <div class="d-none text-end w-100 position-absolute sticky-top ">
<?php
if (!empty($language_table))
    if (count($language_table) > 1)
        foreach ($language_table as $kl => $vl):
            ?>
                            <a onclick="changeLangNow(<?= $vl['id']; ?>)" 
                               class="btn btn-link">
                                <img  src="/upload/language/tump_<?= $vl['img']; ?>" 
                                      class="rounded img-language-view-change"
                                      alt="<?= $vl['title']; ?>" 
                                      title="<?= $vl['title']; ?>">
                            </a>


        <?php endforeach; ?>
            </div>

            <section class="container-fluid main-wrap-1 big-header">



                <div  class="styag">
                    <img class="svg" src="/site/imgs/styag_main.svg">
                </div>


                <div class="container">



                    <h1> <?php if (!empty($buttons['1_name'])) echo $buttons['1_name']; // ПЕРШИЙ ПАТРІОТИЧНИЙ ДИТЯЧИЙ КОМІКС   ?> </h1>

                </div>


            </section>

            
            
             <section class="d-none container-fluid main-wrap-1 small-header">


                 <div class="container">

                     
                 <div class="row">
                     
                     <div class="col-2">
                        <a class="btn btn-link" title="Меню" onclick="$('#viewMenuModal').modal('show');">
                                <h3 class="text-end">
                                    <i class="fas fa-bars"></i>
                                </h3>
                            </a> 
                     </div>
                     <div class="col-8">
                         
                    <h1> <?php if (!empty($buttons['1_name'])) echo $buttons['1_name']; // ПЕРШИЙ ПАТРІОТИЧНИЙ ДИТЯЧИЙ КОМІКС   ?> </h1>
                         
                     </div>
                     <div class="col-2"></div>
                 </div>
                 


                



                </div>


            </section>
            
            

            <section class="d-inline-block w-100  main-wrap-2 position-relative">


                <div class=" d-inline-block img-in-small">

                    <img src="/site/imgs/edited.webp" title="img" alt="edited">
                </div>


                <div class="container">
                    <div class="img-in-small">

                        <img src="/site/imgs/edited.webp" title="img" alt="edited">
                    </div>

                    <div class="row d-flex">

                        <div class="col-12 col-md-7">
                            <h2><?php if (!empty($buttons['2_name'])) echo $buttons['2_name']; // ПРИГОДИ   ?></h2>

                            <h3><?php if (!empty($buttons['3_name'])) echo $buttons['3_name']; // МИКИТКИ   ?></h3>
                            
                            <div  class="d-none styag-inner">
                    <img class="svg" src="/site/imgs/styag_main.svg">
                </div>
                        </div>



                        <div class="col-12 col-md-2 ">

                            <button id="button-play" class="btn btn-lik btn-link-play"
                                    data-hook="noplay" 
                                    aria-pressed="false" 
                                    type="button">

                                <i class="fas fa-play"></i>
                            </button>

                            <button  id="button-noplay" class="btn btn-lik btn-link-play d-none"
                                     data-hook="noplay" 
                                     aria-pressed="false" 
                                     type="button">

                                <i class="fas fa-pause"></i>
                            </button>

                            <!--  <audio  controls autoplay>
            <source src="/site/sound/sound.ogg" type="audio/ogg">
            <source src="/site/sound/sound.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
          </audio> -->

                        </div>
                        <div class=" col-sm-3 img-in position-relative">

                            <img src="/site/imgs/edited.webp" title="img" alt="edited">
                        </div>


                    </div>
                </div>

                <div class="d-inline-block main-wrap-2-block-3">
                    <div class="container">
                        <p> <?php
if (!empty($buttons['4_title']))
    echo nl2br($buttons['4_title']);
/*  Невеличка ілюстрована історія з життя хлопчика Микитки, який<br> 
  живе в прифронтовому селі Луганської області. За сюжетом батьків<br>
  Микитки  захопили в полон бойовики, а самого хлопчика знайшли і <br>
  взяли до себе солдати української армії. */
?>
                        </p>
                    </div>



                </div>



            </section>


<?php if (!empty($main_content)) {
    echo $main_content;
} ?>





            <section class="main-wrap-9">
                <div class="container container-for-ilua">

                    <div class="row">
                       
                            <div class="col-1 col-sm-3 col-lg-3 container-for-ilua-a"></div>
                        <div class="col-9 col-sm-6 col-lg-6">
                            <h3>
                            <?php if (!empty($buttons['16_name'])) echo $buttons['16_name']; //  Все буде Україна!  ?>
                            </h3>     
                        </div>
                        <div class="col-2 col-sm-3 col-lg-1 text-end">


                            <a class="btn btn-link" title="Меню" onclick="$('#viewMenuModal').modal('show');">
                                <h3 class="text-end">
                                    <i class="fas fa-bars"></i>
                                </h3>
                            </a>
                        </div>
                        <div class="col-12 col-lg-2 text-center text-lg-end">

<?php /* <a href="#" class="btn btn-link" title="Mastercard">
  <h3><i class="fab fa-cc-mastercard"></i></h3>
  </a>
  <a href="#" class="btn btn-link" title="Mastercard">
  <h3><i class="fab fa-cc-visa"></i></h3>
  </a> */ ?>

                            <a href="#" class="btn btn-link" title="Mastercard">
                                <h3>
                                    <img src="/site/imgs/mastercard.png" height="30">
                                </h3>
                            </a>
                            <a href="#" class="btn btn-link" title="Visa">
                                <h3><img src="/site/imgs/visa.png" height="30">
                                </h3>
                            </a>


                        </div>
                    </div>

                </div>


            </section>


        </div>



<?php if (!empty($modal_content)) {
    echo $modal_content;
} ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="/site/bootstrap/js/bootstrap.bundle.min.js"></script> 
        <script src="/site/bootstrap/js/bootstrap.js"></script> 
        <script src="/fontawesomefree/js/all.js"></script> 

        <script src="/site/colorbox/jquery.colorbox.js"></script>
        <script src="/site/colorbox/i18n/jquery.colorbox-uk.js"></script>


        <script src="/site/owlc/owlcarousel/owl.carousel.js"></script>
        <script src="/site/owlc/vendors/highlight.js"></script>
        <script src="/site/owlc/js/app.js"></script>
        <script src="/site/js/jquery.blockUI.js"></script>
        <script src="/site/js/main.js?r=<?php echo rand(1, 100); ?>"></script>



        <!-- Meta Pixel Code -->
        <script>
                                !function (f, b, e, v, n, t, s)
                                {
                                    if (f.fbq)
                                        return;
                                    n = f.fbq = function () {
                                        n.callMethod ?
                                                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                                    };
                                    if (!f._fbq)
                                        f._fbq = n;
                                    n.push = n;
                                    n.loaded = !0;
                                    n.version = '2.0';
                                    n.queue = [];
                                    t = b.createElement(e);
                                    t.async = !0;
                                    t.src = v;
                                    s = b.getElementsByTagName(e)[0];
                                    s.parentNode.insertBefore(t, s)
                                }(window, document, 'script',
                                        'https://connect.facebook.net/en_US/fbevents.js');
                                fbq('init', '213550835852082');
                                fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
                       src="https://www.facebook.com/tr?id=213550835852082&ev=PageView&noscript=1"
                       /></noscript>
        <!-- End Meta Pixel Code -->   

     
        
        
    </body>
</html>