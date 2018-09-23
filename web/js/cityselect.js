$(document).ready(function() {
   
   $('#cityselector').keyup(onChange);

   function onChange()
   {
      if (this.value.length > 2 ) {
      getCityList(this.value)
      $('#citytable').css({'display': 'none'})
      }
   }


   function getCityList(pattern)
   {
      $.ajax({
         type: "POST",
         url: "/pec/ajax-get-cities",
         data: 'pattern='+ pattern,

         success: function (msg) {
            var data = msg;
            var table = getTable(data);
            $('#citycont').html(table);
            setHoverHendler();
            setClickHendler();
         }
      });
   }

   function setHoverHendler()
   {
      $('#citytable tr').mouseover(function(){
         $(this).css({'background-color':'grey'});
      });
      $('#citytable tr').mouseout(function(){
         $(this).css({'background-color':'white'});
      });
   }

   function setClickHendler()
   {
      $('#citytable tr').click(function(){
      let cityid = $(this).find('td:first').html();
      let cityname = $(this).find('td').eq(1).html();
      $('#cityid').val(cityid);
      $('#cityid').change();
      $('#cityselector').val(cityname);
      $('#citytable').css({'display': 'none'})
      });
   }

   function getTable(arrayOfItems)
   {
      let str ='';

      arrayOfItems.forEach(function(item, i, arr) {
         str = str + "<tr><td style='display: none;'>" + item.id + "</td><td>" + item.text + "</td></tr>"
      });

      return "\
           <style> \
              #citytable tr { \
              background-color: green; \
   }        \
           </style> \
          <table id='citytable' style = 'width: 100%'>" + str +"</table>";
   }

})
