$(document).ready(function (){
   $('#go-to-colors-btn').on('click', toChooseColor);
   $('#go-to-description').on('click', toBackToDescription);
   $('#go-to-facture-btn').on('click', toChooseFacture);
   $('#back-to-color').on('click', backToColor);

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
      $('#page2').css('display', 'none');
      $('#page3').css('display', 'block');
   }

   function backToColor()
   {
      $('#page3').css('display', 'none');
      $('#page2').css('display', 'block');
   }


});
