$(document).ready(function (){
   $('#go-to-colors-btn').on('click', toChooseColor);
   $('#go-to-description').on('click', toBackToDescription);

   $('#add-to-cart').submit(function(){
      if (path_without_checkbpx) return true;
      if (!isCidChecked()) {
         let warn = $('#warn-message-choose-facture');
         warn.css('display', 'block');
         return false;
      };

      return true;
      
   });
   
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


});
