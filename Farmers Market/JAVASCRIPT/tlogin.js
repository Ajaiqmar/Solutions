var msg,i,password=true;
function check_password()
{
	var u=0,l=0,n=0,s=0,sp=0;
	msg=document.getElementById("password").value;
	for(i=0;i<msg.length;i++)
	{
		var cha=msg.charAt(i);
		if(cha.charCodeAt() >= 65 && cha.charCodeAt() <= 90)
		{
			u=u+1;
		}
		else if(cha.charCodeAt() >= 97 && cha.charCodeAt() <= 122)
		{
			l=l+1;
		}
		else if(cha.charCodeAt() >= 48 && cha.charCodeAt() <= 57)
		{
			n=n+1;
		}
		else if(cha==' ')
		{
			sp=sp+1;
		}
		else
		{
			s=s+1;
		}
	}
	if((sp==0 && n>0 && s>0 && u>0 && l>0) || (sp==0 && n>0 && s>0))
	{
		document.getElementById("password").style.borderBottom="2px solid #7aff12";
		document.getElementById("alert").innerHTML="";
	}
	else if(msg=="")
	{
		document.getElementById("password").style.borderBottom="2px solid #7aff12";
		document.getElementById("alert").innerHTML="";
		sp=0;
		s=0;
		u=0;
		l=0;
		n=0;
	}
	else
	{
		document.getElementById("password").style.borderBottom="2px solid #ff4f30";
		document.getElementById("alert").innerHTML="* கடவுச்சொல்லில் எந்த இடைவெளிகளும் இருக்கக்கூடாது, குறைந்தபட்சம் ஒரு சிறப்பு எழுத்து, பெரிய எழுத்து, சிறிய எழுத்து மற்றும் ஒரு எண்.";
	}
}

function toggle_visibility()
{
	var icon,value;
	icon=document.getElementById("material");
	value=document.getElementById("password")
	if(password)
	{
		icon.innerHTML="visibility_off";
		value.type="text";
	}
	else
	{
		icon.innerHTML="visibility";
		value.type="password";
	}
	password=!password;
}