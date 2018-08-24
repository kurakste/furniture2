document.addEventListener('DOMContentLoaded', function() {

   var townsel = document.getElementById('orders-city');
   var delivery_to_door = document.getElementById('delivery_to_door');
   console.log(delivery_to_door);
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
      var town = document.getElementById('orders-city');
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
      console.log(town);
      console.log(todoor);
      var town = getTown();
      // var xhr = new XMLHttpRequest();
      var addr = '/pec/ajax-get-delivery-cost';
      var param =  {'town':town, 'tohome':todoor};
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
