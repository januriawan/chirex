<script language="JavaScript">
<!----------

function confirmIt 
(dbMsg,okURL,cancelURL,aOkMsg,aCancelMsg,okTyp,cancelTyp,okWin,cancelWin) {
	if (confirm (dbMsg)) {
		if (okTyp=="u") {
			if(okWin=="Self") location.href=okURL;
			if(okWin=="Parent") parent.location.href=okURL;
		}
		else if (okTyp=="a") {
			alert(aOkMsg);
		}
		}
	else {
		if (cancelTyp=="u") {
			if(cancelWin=="Self") location.href=cancelURL;
			if(cancelWin=="Parent") parent.location.href=cancelURL;
		}
		else if (cancelTyp=="a") {
			alert(aCancelMsg);
		}
	}
}


//--------->
</script>