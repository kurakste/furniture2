$(document).ready(function (){
   $('#go-to-colors-btn').on('click', toChooseColor);
   $('#go-to-description').on('click', toBackToDescription);
   $('#go-to-facture-btn').on('click', toChooseFacture);
   $('#back-to-color').on('click', backToColor);

   $('#add-to-cart').submit(function(){
      if (path_without_checkbpx) return true;
      if (!isFidChecked()) {
         alert('Выберите пожалуйста фактуру.');
         return false;
      };

      return true;
      
   });
   
   function isFidChecked()
   {
      var out = false;
      $("input[name='fid']").each(function (i, val)
         {
            if (val.checked) {
               out = true;
            }
      });
      return out;
   }

   function toChooseColor()
   {
      $('#page1').css('display', 'none');
      $('#page2').css('display', 'block');
   }

   function toBackToDescription()
   {
      $('#page1').css('display', 'block');
      $('#page2').css('display', 'none');
   }

   function toChooseFacture()
   {
      if (!isCidChecked()){
         alert('Выберите пожалуйста цвет.');
         return;
      }
      $('#page2').css('display', 'none');
      $('#page3').css('display', 'block');
      return;
   };
   
   function isCidChecked()
   {
      var out = false;
      $("input[name='cid']").each(function (i, val)
         {
            if (val.checked) {
               out = true;
            }
      });
      return out;
   }

   function backToColor()
   {
      $('#page3').css('display', 'none');
      $('#page2').css('display', 'block');
   }

});
