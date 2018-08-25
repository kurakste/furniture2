$(document).ready(function() {
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
      $('table.cart tbody tr').each(function(){
         let tr = $(this);
         let td = tr.find('td');
         let price = $(td[7]).find('span').text();
         price = parseFloat(String(price).replace(/ /g, ''));
         amount = $(td[6]).find('.qty-text').val();
         cost = price * amount;
         cart = cart + cost;
      })
      let cartval = $('#totalsum');
      let str = (cart.toFixed(2)).toString();
      cartval.text(cart.toLocaleString('ru'));
   }


   
   // Парсит данные из html таблицы что бы можно было потом
   // передать данные на бекэнд через  API.
   function getCartStrings()
   {
      console.log(outdata);
      var outdata = [];
      $('table.cart tbody tr').each(function(){
         let str = {};
         let tr = $(this);
         let td = tr.find('td');
         console.log(td);
         str['iid'] = parseInt($(td[0]).text());
         str['cid'] = parseInt($(td[2]).text());
         str['fid'] = parseInt($(td[4]).text());
         // str['price'] = parseFloat($(td[7]).find('span').text());
         str['amount'] = parseInt($(td[6]).find('.qty-text').val());
         outdata.push(str);
      })

      return outdata;
   }
   // Сохраняет всю корзину через API.
   function sendDataToAPI(cstrings)
   {
      console.log(JSON.stringify(cstrings));
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
});

