var arrx=[];
var arry=[];
var arrz=[];
var sc;
var key,t;

function uvalidation()
{
  var x=document.getElementById('f').value;
  var y=document.getElementById('a').value;
  var z=document.getElementById('b').value;
  var a=document.getElementById('c').value;
  if(x==1)
  {
    document.getElementById('h').style.display="none";
    document.getElementById('entry').style.display="none";
    document.getElementById('subm').style.display="none";
    document.getElementById('info').style.display="block";
    document.getElementById('edit').style.display="inline-block";
    document.getElementById('he').style.display="inline-block";
    document.getElementById('exit').style.display="inline-block";
    var arr = document.getElementsByClassName('ex');
    for(var i=0;i<arr.length;i++)
    {
      arr[i].style.display="none";
    }
  }
  if(y==1)
  {
    document.getElementById('ualert').innerHTML="Invalid input!!";
  }
  if(z==1)
  {
    document.getElementById('ualert').innerHTML="Data already entered!!";
  }
  if(a==1)
  {
    document.getElementById('list').style.display="block";
  }
}

function clearp()
{
  document.getElementById('ualert').innerHTML="";
}

function addm()
{
  document.getElementById('sub').click();
}

function addma()
{
  document.getElementById('sc').required = false;
  document.getElementById('credits').required = false;
  document.getElementById('marks').required = false;
  document.getElementById('gpa').value = "1";
  document.getElementById('sub').click();
}

function del(sc)
{
  document.getElementById('credits').required = false;
  document.getElementById('marks').required = false;
  document.getElementById('gpa').value = "2";
  document.getElementById('sc').value = sc;
  document.getElementById('sub').click();
}

function edit(key,t)
{
  location.href="cgpa_list.php?key="+key+"&t="+t+"&f=0";
}

function exit(key)
{
  location.href="cgpa.php?key="+key;
}
