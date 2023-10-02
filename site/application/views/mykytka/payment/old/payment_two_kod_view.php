<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>





<script>
  window.LiqPayCheckoutCallback = function() {
    LiqPayCheckout.init({
          data: "eyJ2ZXJzaW9uIjozLCJhY3Rpb24iOiJwYXkiLCJhbW91bnQiOiIxNDkiLCJjdXJyZW5jeSI6IlVBSCIsImRlc2NyaXB0aW9uIjoi0JrQvtC80ZbQutGBIMKr0J/RgNC40LPQvtC00Lgg0JzQuNC60LjRgtC60LggSUnCuyIsInB1YmxpY19rZXkiOiJpNzgxNjA4ODEzNDUiLCJsYW5ndWFnZSI6InVrIn0=",
      signature: "R+xMCdG9J9gHYCmP4vpbtQrf3JE=",
      embedTo: "#liqpay_checkout",
      language: "uk",
      mode: "embed" // embed || popup,
        }).on("liqpay.callback", function(data){
          //  if(data.status=='success'){
       location.href =  '/resultpay/callback/';
   // }  
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



