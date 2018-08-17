window.onload = function() {
   var cart = 0; 
   var cartstrings = [];
   function onChangeAmount() 
   {
      getCartCost();
      getCartStrings();

   }


   // Пересчитывает стоимость корзины.
   function getCartCost(){
      cart = 0;
      $('table tbody tr').each(function(){
         let tr = $(this);
         let td = tr.find('td');
         let price = $(td[7]).find('span').text();
         price = parseFloat(price);
         amount = $(td[6]).find('.qty-text').val();
         cost = price * amount;
         cart = cart + cost;
      })
      let cartval = $('#totalsum');
      cartval.text(cart)
   }
   
   // Пересчитывает стоимость корзины.
   function getCartStrings(){
      cartstrings = [];
      $('table tbody tr').each(function(){
         let str = {};
         let tr = $(this);
         let td = tr.find('td');
         str['iid'] = parseInt($(td[0]).text());
         str['cid'] = parseInt($(td[2]).text());
         str['fid'] = parseInt($(td[2]).text());
         str['price'] = parseFloat($(td[7]).find('span').text());
         str['amount'] = parseInt($(td[6]).find('.qty-text').val());
         cartstrings.push(str);
      })
      console.log(cartstrings);
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
   getCartCost();
   getCartStrings();
};

