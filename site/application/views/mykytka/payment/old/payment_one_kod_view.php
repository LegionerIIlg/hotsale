<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>





<script>
  window.LiqPayCheckoutCallback = function() {
    LiqPayCheckout.init({
        data: "eyJ2ZXJzaW9uIjozLCJhY3Rpb24iOiJwYXkiLCJhbW91bnQiOiI5OSIsImN1cnJlbmN5IjoiVUFIIiwiZGVzY3JpcHRpb24iOiLQmtC+0LzRltC60YEgwqvQn9GA0LjQs9C+0LTQuCDQnNC40LrQuNGC0LrQuCDQhsK7IiwicHVibGljX2tleSI6Imk3ODE2MDg4MTM0NSIsImxhbmd1YWdlIjoidWsifQ==",
      signature: "x/2S9NiZs+weeTL4T4zr93PhYWU=",
      embedTo: "#liqpay_checkout",
       language: "uk",
      mode: "embed" // embed || popup,
        }).on("liqpay.callback", function(data){
             // if(data.status=='success'){
       location.href =  '/resultpay/callback/';
  //  } 
      console.log(data.status);
      console.log(data);
      }).on("liqpay.ready", function(data){
        // ready
      }).on("liqpay.close", function(data){
        // close
    });
  };
</script>
<script src="//static.liqpay.ua/libjs/checkout.js" async></script>
    