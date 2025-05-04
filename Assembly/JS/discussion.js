var key;
var q,i;

function checkp()
{
  ch = document.getElementById('ta').value;
  ch = ch.replace('\n',' ');
  ch = ch.replace('\r',' ');
  ch = ch.replace('<br/>',' ');
  document.getElementById('ta').value = ch;
}

function popup(){
  document.getElementById("body").style.filter="blur(4px)";
  document.getElementById("popup").style.display="inline-block";
}

function escape(key){
  location.href="discussion.php?key="+key;
}

function uvalidation(){
  var x=document.getElementById("q").value;
  if(x==1)
  {
    popup();
    document.getElementById("alert").innerHTML="Query already exists!";
  }
}

function cleart()
{
  document.getElementById("alert").innerHTML="";
}

function pag(key,q,i)
{
  location.href="discussion_board.php?key="+key+"&q="+q+"&i="+i;
}
