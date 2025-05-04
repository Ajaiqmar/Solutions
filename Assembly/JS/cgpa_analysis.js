var key;

function edit(){
  var x = document.getElementById('cgpa').value;
  document.getElementById('malert').innerHTML = "";
  document.getElementById('salert').innerHTML="";
  if(x==="")
  {
    document.getElementById('sub').click();
  }
  else
  {
    var ecgpa = document.getElementById('cgpa').value;
    var ocgpa = document.getElementById('ocgpa').value;
    var c = document.getElementById('c').value;
    if(ecgpa < parseFloat(ocgpa))
    {
      document.getElementById('ualert').innerHTML = "AIM HIGHER!!";
    }
    else if(c!=0)
    {
      document.getElementById('analysis').style.display = "inline-block";
      var val = ((ecgpa*8)-(parseFloat(ocgpa)*(8-c)))/c;
      val=val.toFixed(2);

      if(val>10)
      {
        val=10.00;
        document.getElementById('malert').innerHTML="GPA - "+val;
        document.getElementById('salert').innerHTML="APPRECIATE YOUR ENTHUSIASM, BUT WE CAN'T CHANGE THE PAST.";
      }
      else
      {
        document.getElementById('malert').innerHTML="GPA - "+val;
      }
    }
    else if(c==0)
    {
      document.getElementById('ualert').innerHTML = "YOU HAVE COMPLETED YOUR DEGREE";
    }
    document.getElementById('cgpa').value="";
  }
}


function clearp()
{
  document.getElementById('ualert').innerHTML = "";
}
