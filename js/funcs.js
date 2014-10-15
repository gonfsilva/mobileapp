function upcod(str, upby)
{
var str = document.getElementById('cod_text').value;
if(str.length != 8)
{
	alert('É chato tentares mandar um código sem escrever nada ou com mais de 8 letras ou com menos, uma merda assim...\n\n\nMas como és um anormal e eu já sabia que ias fazer isto decidi avisar-te!');
}else{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint2").innerHTML=xmlhttp.responseText;
	document.getElementById("cod_text").value="";
	setTimeout(function(){document.getElementById("txtHint2").innerHTML="";},5000);
    }
  }
xmlhttp.open("GET","updatecode.php?cod="+str+"&upby="+upby,true);
xmlhttp.send();
}
}

function rcvcod(user)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","recvcode.php?user="+user,true);
xmlhttp.send();
}

function keycheck(e, user)
{
   var KeyID = (window.event) ? e.keyCode : e.which;

   switch(KeyID)
   {
      case 13:
	  upcod(document.getElementById("cod_text").value, user);
      break;
	  
	  case 86:
	  if(!document.getElementById("cod_text").hasFocus())
	  {
		  rcvcod(user);
	  }
      break;
   }
}
