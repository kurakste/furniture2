window.onload = function() {

   var delButtons = document.getElementsByClassName('file-delete-button');
   // console.log(delButtons);
   
   // delButtons.forEach(function (item) {
   //    item.onclick = deleteImage;
   // })
   console.log(delButtons.length);
   for (var i = 0; i < delButtons.length; i++) {
      delButtons[i].onclick = deleteImage; 
      console.log(delButtons[i]);
   }
   function deleteImage() 
   {
      alert('Надо доделывать');
      // var xhr = new XMLHttpRequest();
      // var params = 'filename='+encodeURIComponent(this.value);
      // xhr.open("POST", '/files/delete?' + params, true);

   
   }
}
