var key,q,i;
function popup(){
  document.getElementById("body").style.filter="blur(4px)";
  document.getElementById("popup").style.display="inline-block";
}

function escape(key,q,i){
  location.href="discussion_board.php?key="+key+"&q="+q+"&i="+i;
}
