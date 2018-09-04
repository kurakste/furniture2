document.addEventListener('DOMContentLoaded', function() {

   var townsel = document.getElementById('cityid');
   var delivery_to_door = document.getElementById('delivery_to_door');
   townsel.onchange = cityChangeValue;
   delivery_to_door.onchange = cityChangeValue;

   function cityChangeValue()
   {
      let town = getTown();
      let todoor = getToDoor();
      getDeliveryCost(town, todoor);
      var field = document.getElementById('deliveryCost');
      field.innerHTML = 'считаю';        
   }

   function getTown()
   {
      var town = document.getElementById('cityid');
      town = town.value;
      return town;
   }

   function getToDoor()
   {
      var todoor = document.getElementById('delivery_to_door');
      var out = todoor.value;
      return out
   }
   
   function getDeliveryCost(town, todoor) 
   {
      var town = getTown();
      // var xhr = new XMLHttpRequest();
      var addr = '/pec/ajax-get-delivery-cost';
      var param =  {'town':town, 'tohome':todoor};
      var request = addr + param;
      $.ajax({
         url: addr,
         type: "POST",
         data: param,
         success: success,
      })
   }

   function success(resp)
   {
         var cost = parseFloat(resp);
         var fielddelivery = document.getElementById('deliveryCost');
         var formFielddeliverycost = document.getElementById('ffdeliverycost');
         var formFieldtotal = document.getElementById('fftotalsumm');
         var totalsumm = document.getElementById('sumwithdelivery');
         let sum = totalsumm.innerHTML;
         var ordercost = document.getElementById('ordercost').innerHTML;
         sum = sum.replace(',','');
         ordercost = parseFloat(ordercost.replace(',',''));
         sum = parseFloat(sum);
         sum = ordercost + cost; 
         console.log(sum);
         fielddelivery.innerHTML = cost;        
         totalsumm.innerHTML = sum;        
         formFielddeliverycost.value = cost;
         formFieldtotal.value = sum;
      
   }
});
