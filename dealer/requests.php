<!DOCTYPE html>
<html>
<head>
<script>
function showUser(str) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getdata.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>
<form>
<span>Type of Crop: </span>
<select name="users" onchange="showUser(this.value)">
<option value="">All</option>
<option value="veg">Vegetables</option>
<option value="fruit">Fruit</option>
</select>
</form>
<br>
<div id="txtHint"><b>Person info will be listed here.</b></div>

</body>
</html>