<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>





<script>
  window.LiqPayCheckoutCallback = function() {
    LiqPayCheckout.init({
            data: "<?=$data_kod?>",
      signature: "<?=$signature_kod?>",
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



