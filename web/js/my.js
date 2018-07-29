alert('hi');
var xhr = new XMLHttpRequest();
// xhr = new XDomainRequest();
xhr.open("GET", 'https://www.pecom.ru/ru/calc/towns.php', true);
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

xhr.onreadystatechange = function() {
  if (this.readyState != 4) return;

  console.log('done');
  console.log(this.responseText);
}
xhr.send('');
