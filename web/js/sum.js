window.onload = function() {
   var cart = 0; 
   function onChangeAmount() 
   {
      getCartCost();
      let cartstrings = getCartStrings();
      sendDataToAPI(cartstrings);
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


   
   // Парсит данные из html таблицы что бы можно было потом
   // передать данные на бекэнд через  API.
   function getCartStrings()
   {
      console.log(outdata);
      var outdata = [];
      outdata.length = 0;
      $('table tbody tr').each(function(){
         let str = {};
         let tr = $(this);
         let td = tr.find('td');
         str['iid'] = parseInt($(td[0]).text());
         str['cid'] = parseInt($(td[2]).text());
         str['fid'] = parseInt($(td[2]).text());
         str['price'] = parseFloat($(td[7]).find('span').text());
         str['amount'] = parseInt($(td[6]).find('.qty-text').val());
         outdata.push(str);
      })
      console.log(outdata);
      return outdata;
   }
   // Сохраняет всю корзину через API.
   function sendDataToAPI(cstrings)
   {
      $.ajax({
         type: "POST",
         url: "/cart/jason-api-store",
         data: 'cartstrings='+JSON.stringify(cstrings),

         success: function (msg) {
            console.log('Получены данные:' + msg);
         }
      });
   
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

