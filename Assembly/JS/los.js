
function log()
{
  document.getElementById("for").innerHTML="<input type='text' name='email' id='email' placeholder='MAIL - ID' required/><input type='password' name='password' id='pass' placeholder='PASSWORD' required/><input type='checkbox' id='check' onclick='show()'/><label>show password</label><input type='submit' id='submit' value='SUBMIT'/>";
  document.getElementById("log").style.color="#000000";
  document.getElementById("sign").style.color="#a3a3a3";
  document.getElementById("outline").style.margin="5%";
}

function sign()
{
  document.getElementById("for").innerHTML="<input type='text' name='username' id='user' placeholder='USERNAME' onclick='clearp()' required/><p id='ualert'></p><input type='text' name='department' id='depart' placeholder='DEPARTMENT' required/><input type='text' name='email' id='email' placeholder='MAIL - ID' onclick='clearm()' required/><p id='malert'></p><input type='password' name='password' id='pass' oninput='validation()' placeholder='PASSWORD' required/><p id='alert'></p><input type='checkbox' id='check' onclick='show()'/><label>show password</label><input type='submit' id='submit' value='SUBMIT'/>";
  document.getElementById("log").style.color="#a3a3a3";
  document.getElementById("sign").style.color="#000000";
  document.getElementById("outline").style.margin="4%";
}

function show(){
  if(document.getElementById("check").checked)
  {
    document.getElementById("pass").type="text";
  }
  else
  {
    document.getElementById("pass").type="password";
  }
}

function validation()
{
  var x=document.getElementById("pass").value;
  var u=0,s=0,n=0,l=0;
  for(var i=0;i<x.length;i++)
  {
    var asval=x.charCodeAt(i);
    if(asval>=97 && asval<=122)
    {
      l+=1;
    }
    else if(asval>=65 && asval<=90)
    {
      u+=1;
    }
    else if(asval>=48 && asval<=57)
    {
      n+=1;
    }
    else if(x[i]!=' '){
      s+=1;
    }
  }
  if((u>=1 && n>=1 && s>=1) || x==="")
  {
    document.getElementById("alert").innerHTML="";
    document.getElementById("submit").disabled=false;
  }
  else{
    document.getElementById("alert").innerHTML="Password should contain a uppercase letter,</br>a digit and a special character.</br>shouldn't contain spaces and quotes.";
    document.getElementById("submit").disabled=true;
  }
}

function uvalidation(){
  var x=document.getElementById("exist").value;
  var y=document.getElementById("incorrect").value;
  var z=document.getElementById("mail").value;
  if(x==1 && z!=1)
  {
    sign();
    document.getElementById("ualert").innerHTML="Username already exists!";
  }
  else if(y==1)
  {
    document.getElementById("ualert").innerHTML="Incorrect username or password";
    document.getElementById("ualert").style.margin="0 0 1% 0";
  }
  else if(z==1 && x!=1)
  {
    sign();
    document.getElementById("malert").innerHTML="Email-id already exists!";
  }
  else if(x==1 && z==1)
  {
    sign();
    document.getElementById("ualert").innerHTML="Username already exists!";
    document.getElementById("malert").innerHTML="Email-id already exists!";
  }
}

function clearp()
{
  document.getElementById("ualert").innerHTML="";
}

function clearm()
{
  document.getElementById("malert").innerHTML="";
}
