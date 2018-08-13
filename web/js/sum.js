window.onload = function() {
   var cart = 0; 
   getCartCost();

   function onChangeAmount() 
   {
      getCartCost();

   }


   // Пересчитывает стоимость корзины.
   function getCartCost(){
      cart = 0;
      $('table tbody tr').each(function(){
         let tr = $(this);
         let td = tr.find('td');
         console.log(td);
         let price = $(td[4]).find('span').text();
         price = parseInt(price);
         amount = $(td[3]).find('.qty-text').val();
         cost = price * amount;
         cart = cart + cost;
      })
      console.log(cart);
      let cartval = $('#totalsum');
      cartval.text(cart)
   }

   $('.qty-minus').each(function(){
      $(this).click(onChangeAmount);
   });
   
   $('.qty-plus').each(function(){
      $(this).click(onChangeAmount);
   });
   $('.qty-text').each(function(){
      $(this).change(onChangeAmount);
   });
};
