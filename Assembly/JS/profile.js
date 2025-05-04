var x;
var key;
var val1,val2;

function escape(key){
  location.href="profile.php?key="+key;
}
function edit2(x){
  document.getElementById("blur").style.filter="blur(4px)";
  document.getElementById("pop").style.display="inline-block";
  document.getElementById("input").name="email";
  document.getElementById("input").placeholder="MAIL-ID";
  document.getElementById("input").value=x;
}
function edit3(x){
  document.getElementById("blur").style.filter="blur(4px)";
  document.getElementById("pop").style.display="inline-block";
  document.getElementById("input").name="department";
  document.getElementById("input").placeholder="DEPARTMENT";
  document.getElementById("input").value=x;
}
function upload()
{
  document.getElementById("prp").click();
}
function sub()
{
  document.getElementById("sprp").click();
}
function uvalidation(val1)
{
  var y = document.getElementById('m').value;
  if(y==1)
  {
    edit2(val1);
    document.getElementById('ualert').innerHTML="Mail-id already exits!";
  }
}
function clearu()
{
  document.getElementById('ualert').innerHTML="";
}
