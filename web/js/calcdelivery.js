document.addEventListener('DOMContentLoaded', function() {

   var townsel = document.getElementById('orders-city');
   townsel.onchange = cityChangeValue;

   function cityChangeValue()
   {
     let town = getTown();
      getDeliveryCost(town);
      var field = document.getElementById('deliveryCost');
      field.innerHTML = 'считаю';        
     
   }
   function getTown()
   {
      var town = document.getElementById('orders-city');
      town = town.value;
      return town;
   }
   
   function getDeliveryCost(town) 
   {
      console.log(town);
      var town = getTown();
      // var xhr = new XMLHttpRequest();
      var addr = '/pec/ajax-get-delivery-cost';
      var param =  {'town':town};
      var request = addr + param;
      // console.log(param);
      // xhr.open("GET", addr , true);
      // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      // xhr.onreadystatechange = function() {
      //    if (this.readyState != 4) return;

      //    console.log(this.responseText);
      //    var cost = parseFloat(this.responseText);
      //    var field = document.getElementById('deliveryCost');
      //    field.innerHTML = cost;        
      // }
      // xhr.send("?town=121212");
      $.ajax({
         url: addr,
         type: "POST",
         data: param,
         success: success,
      })
   }

   function success(resp)
   {
         console.log(resp);
         var cost = parseFloat(resp);
         var field = document.getElementById('deliveryCost');
         field.innerHTML = cost;        
      
   }
});
