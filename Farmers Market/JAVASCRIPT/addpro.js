var msg;
function check_numbers()
{
	msg=document.getElementById("value").value;
	var i,t=0;
	for(i=0;i<msg.length;i++)
	{
		var cha=msg.charAt(i);
		if((cha.charCodeAt() >= 48 && cha.charCodeAt() <=57) || cha=='.')
		{
			continue;
		}
		else
		{
			t=t+1;
		}
	}
	if(t>0)
	{
		document.getElementById("price").innerHTML="*Enter the price in numerals.";
		document.getElementById("value").style.borderBottom="2px solid #ff4f30";
	}
	else
	{
		document.getElementById("price").innerHTML="";
		document.getElementById("value").style.borderBottom="2px solid #7aff12";
	}
}