function addForms(s){
var id = document.getElementById("id").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("formdiv").style.visibility = 'visible';
                document.getElementById("formdiv").innerHTML = xmlhttp.responseText;
            }
        }
        if(s=='Add Student'){			
        xmlhttp.open("GET", "add-new-student?s="+s, true);
        }
        if(s=='Add Staff'){			
        xmlhttp.open("GET", "add-new-staff?s="+s, true);
        }
        if(s=='Add Sponsor'){
        xmlhttp.open("GET", "add-sponsor-form?s="+s, true);
        }
        if(s=='Edit Student'){
        xmlhttp.open("GET", "edit-student?s="+s, true);
        }
        if(s=='User Profile'){
        xmlhttp.open("GET", "user-profile?s="+s+'&id='+id, true);
        }
        if(s=='Mark Attendance'){
        xmlhttp.open("GET", "attendance-by-date?s="+s, true);
        }
		xmlhttp.send();
}

//.......................................................................
const formatter = new Intl.NumberFormat('en-NG', {
  style: 'currency',
  currency: 'NGN',
  minimumFractionDigits: 2
})		

function getQtyFocus()
{
document.getElementById("sqty").focus() = true;
}
function getDrBal(a){
//var drbal = document.getElementById("drledger").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("drb").style.visibility = 'visible';
                document.getElementById("drb").innerHTML = xmlhttp.responseText;
            }
        }			
        xmlhttp.open("GET", "get-bal?a="+a, true);
		xmlhttp.send();	

}

function getCrBal(a){
//var drbal = document.getElementById("drledger").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("crb").style.visibility = 'visible';
                document.getElementById("crb").innerHTML = xmlhttp.responseText;
            }
        }			
        xmlhttp.open("GET", "get-cr-bal?a="+a, true);
		xmlhttp.send();	

}

function getExDrBal(a){
//var drbal = document.getElementById("drledger").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("drb").style.visibility = 'visible';
                document.getElementById("drb").innerHTML = xmlhttp.responseText;
            }
        }			
        xmlhttp.open("GET", "get-bal?a="+a, true);
		xmlhttp.send();	

}

function getExCrBal(a){
//var drbal = document.getElementById("drledger").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("crb").style.visibility = 'visible';
                document.getElementById("crb").innerHTML = xmlhttp.responseText;
            }
        }			
        xmlhttp.open("GET", "get-cr-bal?a="+a, true);
		xmlhttp.send();	

}

function getAsDrBal(a){
//var drbal = document.getElementById("drledger").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("drb").style.visibility = 'visible';
                document.getElementById("drb").innerHTML = xmlhttp.responseText;
            }
        }			
        xmlhttp.open("GET", "get-bal?a="+a, true);
		xmlhttp.send();	

}

function getAsCrBal(a){
//var drbal = document.getElementById("drledger").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("crb").style.visibility = 'visible';
                document.getElementById("crb").innerHTML = xmlhttp.responseText;
            }
        }			
        xmlhttp.open("GET", "get-cr-bal?a="+a, true);
		xmlhttp.send();	

}		

function getLiDrBal(a){
//var drbal = document.getElementById("drledger").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("drb").style.visibility = 'visible';
                document.getElementById("drb").innerHTML = xmlhttp.responseText;
            }
        }			
        xmlhttp.open("GET", "get-bal?a="+a, true);
		xmlhttp.send();	

}

function getLiCrBal(a){
//var drbal = document.getElementById("drledger").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("crb").style.visibility = 'visible';
                document.getElementById("crb").innerHTML = xmlhttp.responseText;
            }
        }			
        xmlhttp.open("GET", "get-cr-bal?a="+a, true);
		xmlhttp.send();	

}
function getEqDrBal(a){
//var drbal = document.getElementById("drledger").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("drb").style.visibility = 'visible';
                document.getElementById("drb").innerHTML = xmlhttp.responseText;
            }
        }			
        xmlhttp.open("GET", "get-bal?a="+a, true);
		xmlhttp.send();	

}

function getEqCrBal(a){
//var drbal = document.getElementById("drledger").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("crb").style.visibility = 'visible';
                document.getElementById("crb").innerHTML = xmlhttp.responseText;
            }
        }			
        xmlhttp.open("GET", "get-cr-bal?a="+a, true);
		xmlhttp.send();	

}		
		function getSNO(s){
		var fno= document.getElementById("fno").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuc").style.visibility = 'visible';
                document.getElementById("tsuc").innerHTML = xmlhttp.responseText;
            }
        }			
        xmlhttp.open("GET", "getNo?fno="+fno, true);
		xmlhttp.send();	
}	


		function postAcc(){
		var fno= document.getElementById("fno").value;
		var sno= document.getElementById("sno").value;
		var ccode= document.getElementById("ccode").value;
		var sname= document.getElementById("sname").value;
		if(sname == ''){alert('This field cannot be blank'); document.getElementById("sname").focus() = true; return false;}
		if(fno == 'Select Account Class'){alert('You did not select Account class'); document.getElementById("fno").focus() = true; return false;}
		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }			
        xmlhttp.open("GET", "post-acc?fno="+fno+'&sno='+sno+'&ccode='+ccode+'&sname='+sname, true);
		xmlhttp.send();
		document.getElementById("sno").value = '';
		document.getElementById("ccode").value = '';
		document.getElementById("sname").value = '';
		document.getElementById("fno").value = 'Select Account Class';
		document.getElementById("sname").focus() = true;			
}	
	
		function getTNO(s){
		var sno= document.getElementById("sno").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuc").style.visibility = 'visible';
                document.getElementById("tsuc").innerHTML = xmlhttp.responseText;
            }
        }			
        xmlhttp.open("GET", "getThirdNo?sno="+sno, true);
		xmlhttp.send();	
}	

		function getLNO(s){
		var tno= document.getElementById("tno").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuc").style.visibility = 'visible';
                document.getElementById("tsuc").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "getLedgerNo?tno="+tno, true);
		xmlhttp.send();	
}

		function postSecondAcc(){
		var fno= document.getElementById("fno").value;
		var sno= document.getElementById("sno").value;
		var tno= document.getElementById("tno").value;
		var ccode= document.getElementById("ccode").value;
		var tname= document.getElementById("tname").value;
		if(tname == ''){alert('This field cannot be blank'); document.getElementById("tname").focus() = true; return false;}
		if(sno == 'Select Account Group'){alert('You did not select Account Group'); document.getElementById("sno").focus() = true; return false;}


	
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-acc2?sno="+sno+'&tno='+tno+'&ccode='+ccode+'&tname='+tname+'&fno='+fno, true);
		xmlhttp.send();
		document.getElementById("sno").value = 'Select Account Group';
		document.getElementById("ccode").value = '';
		document.getElementById("tname").value = '';
		document.getElementById("tno").value = '';
		document.getElementById("fno").value = '';
		document.getElementById("tname").focus() = true;			
}

		function postLedgers(){
		
		var fno= document.getElementById("fno").value;
		var sno= document.getElementById("sno").value;
		var tno= document.getElementById("tno").value;
		var ledgerno= document.getElementById("ledgerno").value;
		var ledgername= document.getElementById("lname").value;		
		var bcode= document.getElementById("bcode").value;
		var ccode= document.getElementById("ccode").value;
		if(fno == ''){alert('This field cannot be blank'); document.getElementById("lname").focus() = true; return false;}
		if(sno == ''){alert('This field cannot be blank'); document.getElementById("lname").focus() = true; return false;}
		if(ledgername == ''){alert('This field cannot be blank'); document.getElementById("lname").focus() = true; return false;}
		if(tno == 'Select Account Class'){alert('You did not select Account class'); document.getElementById("tno").focus() = true; return false;}
		
		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-acc3?sno="+sno+'&tno='+tno+'&ledgerno='+ledgerno+'&bcode='+bcode+'&ccode='+ccode+'&ledgername='+ledgername+'&fno='+fno, true);
		xmlhttp.send();
		document.getElementById("tno").value = 'Select Account Class';
		document.getElementById("ccode").value = '';
		document.getElementById("lname").value = '';
		document.getElementById("ledgerno").value = '';
		document.getElementById("fno").value = '';
		document.getElementById("lname").focus() = true;			
}

		function postTrans(){
		var curr= document.getElementById("curr").value;
		var tdate= document.getElementById("tdate").value;
		var drledger= document.getElementById("drledger").value;
		var crledger= document.getElementById("crledger").value;
		var amt= document.getElementById("amt").value;
		var narration= document.getElementById("narration").value;	
		var drled = $('#drledger').find(':selected').text();
		var crled = $('#crledger ').find(':selected').text();
		var amt1 = amt.toLocaleString('en');
		var amt2 = formatter.format(amt);
		
		if(amt == ''){alert('This field cannot be blank'); document.getElementById("lname").focus() = true; return false;}
		if(narration == ''){alert('This field cannot be blank'); document.getElementById("lname").focus() = true; return false;}
		if(tdate == ''){alert('This field cannot be blank'); document.getElementById("lname").focus() = true; return false;}
		if(drledger == 'Select Debit Ledger'){alert('You did not select Account to debit'); document.getElementById("drledger").focus() = true; return false;}
		if(crledger == 'Select Credit Ledger'){alert('You did not select Account to credit'); document.getElementById("crledger").focus() = true; return false;}

        var response = confirm("Kindly confirm your posting details\n----------------------------------------------------------\nDR LEDGER NAME: " + drled + "\nCR LEDGER NAME: " + crled+"\nAMOUNT: "+amt2);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-trans-1?curr="+curr+'&tdate='+tdate+'&drledger='+drledger+'&crledger='+crledger+'&amt='+amt+'&narration='+narration+'&drled='+drled+'&crled ='+crled, true);
		xmlhttp.send();
		document.getElementById("drledger").selected = 'Select Debit Ledger';
		document.getElementById("crledger").selected = 'Select Credit Ledger';
		document.getElementById("amt").value = '';
		document.getElementById("narration").value = '';
		document.getElementById("amt").focus() = true;			
	}
}


function bodTrans(){
		var tdate = document.getElementById("tdate").value;
		if(tdate == ''){alert('You did not select curernt date'); return false;}
		else{
		var response = confirm("Are you sure you want to process Beginning of Day for this current date?\n----------------------------------------------------------\nCURRENT DATE: " + tdate);
			if(response == false){
				return;
			}else{				
	
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tbod").style.visibility = 'visible';
                document.getElementById("tbod").innerHTML = xmlhttp.responseText;
            }
        }			
		
        xmlhttp.open("GET", "bod-processing?tdate="+tdate, true);
		xmlhttp.send();
		
		//document.getElementById("tdate").value = '';
		}
	}			
 }

 function eodTransaction(){
 		var tdate = document.getElementById("tdate").value;
		var response = confirm("Are you sure you want to process End of day for date: " +tdate + "\n----------------------------------------------------------\nIf you continue this action you will not be able to post any transaction for that day\n \nProceed!");
			if(response == false){
				return;
			}else{				
	
	location.href = "eod-processing-begin?tdate="+tdate;		
		}
}


		function postCreateDept(){
		var deptname= document.getElementById("deptname").value;
		
		if(deptname == ''){alert('This field cannot be blank'); document.getElementById("deptname").focus() = true; return false;}

        var response = confirm("Kindly confirm your details\n----------------------------------------------------------\nDEPARTMENT NAME: " + deptname);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-create-dept-1?deptname="+deptname, true);
		xmlhttp.send();
		document.getElementById("deptname").value = '';
		document.getElementById("deptname").focus() = true;			
	}
}


		function postCreateUser(){
		var staffname= document.getElementById("staffname").value;
		var dept= document.getElementById("dept").value;
		var access= document.getElementById("access").value;
		var username= document.getElementById("username").value;
		var phone= document.getElementById("phone").value;
		var email= document.getElementById("email").value;	
		
		if(staffname == ''){alert('This field cannot be blank'); document.getElementById("staffname").focus() = true; return false;}
		if(username == ''){alert('This field cannot be blank'); document.getElementById("username").focus() = true; return false;}
		if(email == ''){alert('This field cannot be blank'); document.getElementById("email").focus() = true; return false;}
		if(phone == ''){alert('This field cannot be blank'); document.getElementById("phone").focus() = true; return false;}
		if(dept == 'Select Dept'){alert('You did not select Department'); document.getElementById("dept").focus() = true; return false;}
		if(access == 'Select Access Right'){alert('You did not select Access right'); document.getElementById("access").focus() = true; return false;}

        var response = confirm("Kindly confirm your details\n----------------------------------------------------------\nSTAFF NAME: " + staffname + "\nACCESS RIGHT: " + access+"\nUSERNAME "+username);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-create-user-1?staffname="+staffname+'&dept='+dept+'&access='+access+'&username='+username+'&phone='+phone+'&email='+email, true);
		xmlhttp.send();
		document.getElementById("staffname").value = '';
		document.getElementById("username").value = '';
		document.getElementById("phone").value = '';
		document.getElementById("email").value = '';
		document.getElementById("staffname").focus() = true;			
	}
}
		function postSupplier(){
		var sname= document.getElementById("sname").value;
		var bamt= document.getElementById("bamt").value;
		var cname= document.getElementById("cname").value;
		var email= document.getElementById("email").value;
		var phone= document.getElementById("phone").value;
		var bank= document.getElementById("bank").value;
		var acc= document.getElementById("acc").value;
		
		if(sname == ''){alert('This field cannot be blank'); document.getElementById("sname").focus() = true; return false;}
		if(cname == ''){alert('This field cannot be blank'); document.getElementById("cname").focus() = true; return false;}
		if(email == ''){alert('This field cannot be blank'); document.getElementById("email").focus() = true; return false;}
		if(phone == ''){alert('This field cannot be blank'); document.getElementById("phone").focus() = true; return false;}
		if(bank == ''){alert('This field cannot be blank'); document.getElementById("bank").focus() = true; return false;}
		if(acc == ''){alert('This field cannot be blank'); document.getElementById("acc").focus() = true; return false;}


          var response = confirm("Kindly confirm your details\n----------------------------------------------------------\nSUPPLIER NAME: " + sname + "\nPHONE NUMBER: " + phone+"\nCONTACT PERSON "+cname);
			if(response == false){
				return;
			}else{	
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }

        xmlhttp.open("GET", "postsuppliers?sname="+sname+'&bamt='+bamt+'&cname='+cname+'&email='+email+'&phone='+phone+'&bank='+bank+'&acc='+acc, true);
		xmlhttp.send();
		document.getElementById("sname").value = '';
		document.getElementById("cname").value = '';
		document.getElementById("phone").value = '';
		document.getElementById("email").value = '';
		document.getElementById("bamt").value = '';
		document.getElementById("bank").value = '';
		document.getElementById("acc").value = '';
		document.getElementById("bamt").focus() = true;			
 }
}

		function postCreateSchool(){
		var schname= document.getElementById("schname").value;
		
		if(schname == ''){alert('This field cannot be blank'); document.getElementById("schname").focus() = true; return false;}

        var response = confirm("Kindly confirm your details before posting\n----------------------------------------------------------\nSCHOOL NAME: " + schname);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-create-sch-1?schname="+schname, true);
		xmlhttp.send();
		document.getElementById("schname").value = '';
		document.getElementById("schname").focus() = true;			
	}
}


		function postCGroup(){
		var sch= document.getElementById("sch").value;
		var cgname= document.getElementById("cgname").value;
		
		if(cgname == ''){alert('This field cannot be blank'); document.getElementById("cgname").focus() = true; return false;}
		if(sch == 'Select School'){alert('You did not select School'); document.getElementById("sch").focus() = true; return false;}

        var response = confirm("Kindly confirm your details before posting\n----------------------------------------------------------\nSCHOOL NAME: " + sch  + "\nCLASS GROUP: " + cgname);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-create-class-group-1?sch="+sch+'&cgname='+cgname, true);
		xmlhttp.send();
		document.getElementById("cgname").value = '';
		document.getElementById("cgname").focus() = true;			
	}
}


		function postClass(){
		var cg= document.getElementById("cg").value;
		var cname= document.getElementById("cname").value;
		
		if(cname == ''){alert('This field cannot be blank'); document.getElementById("cname").focus() = true; return false;}
		if(cg == 'Select Class Group'){alert('You did not select Class group'); document.getElementById("cg").focus() = true; return false;}

        var response = confirm("Kindly confirm your details before posting\n----------------------------------------------------------\nCLASS NAME: " + cname  + "\nCLASS GROUP: " + cg);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-create-class-1?cg="+cg+'&cname='+cname, true);
		xmlhttp.send();
		document.getElementById("cname").value = '';
		document.getElementById("cname").focus() = true;			
	}
}

		function postSubjectGroup(){
		var sch= document.getElementById("sch").value;
		var sgname= document.getElementById("sgname").value;
		
		if(sgname == ''){alert('This field cannot be blank'); document.getElementById("sgname").focus() = true; return false;}
		if(sch == 'Select School'){alert('You did not select Class group'); document.getElementById("sch").focus() = true; return false;}

        var response = confirm("Kindly confirm your details before posting\n----------------------------------------------------------\nSUBJECT GROUP NAME: " + sgname  + "\nSCHOOL NAME: " + sch);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-create-subject-group-1?sch="+sch+'&sgname='+sgname, true);
		xmlhttp.send();
		document.getElementById("sgname").value = '';
		document.getElementById("sgname").focus() = true;			
	}
}

		function postSubject(){
		var sg= document.getElementById("sg").value;
		var sname= document.getElementById("sname").value;
		
		if(sname == ''){alert('This field cannot be blank'); document.getElementById("sname").focus() = true; return false;}
		if(sg == 'Select School'){alert('You did not select School'); document.getElementById("sg").focus() = true; return false;}

        var response = confirm("Kindly confirm your details before posting\n----------------------------------------------------------\nSUBJECT GROUP NAME: " + sg  + "\nSUBJECT NAME: " + sname);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-create-subject-1?sg="+sg+'&sname='+sname, true);
		xmlhttp.send();
		document.getElementById("sname").value = '';
		document.getElementById("sname").focus() = true;			
	}
}

		function postSponsor(){
		var pname= document.getElementById("pname").value;
		var address= document.getElementById("address").value;
		var phone= document.getElementById("phone").value;
		var email= document.getElementById("email").value;
		var occupation= document.getElementById("occupation").value;
		
		if(pname == ''){alert('This field cannot be blank'); document.getElementById("pname").focus() = true; return false;}
		if(address == ''){alert('This field cannot be blank'); document.getElementById("address").focus() = true; return false;}
		if(phone == ''){alert('This field cannot be blank'); document.getElementById("phone").focus() = true; return false;}
		if(email == ''){alert('This field cannot be blank'); document.getElementById("email").focus() = true; return false;}
		if(occupation == 'Select Occupation'){alert('You did not select Occupation'); document.getElementById("occupation").focus() = true; return false;}

        var response = confirm("Kindly confirm your details before posting\n----------------------------------------------------------\nSPONSOR NAME: " + pname  + "\nPHONE NO: " + phone + "\nEMAIL: " + email);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("formdiv").style.visibility = 'visible';
                document.getElementById("formdiv").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../model/post-create-sponsor?pname="+pname+'&address='+address+'&phone='+phone+'&email='+email+'&occupation='+occupation, true);
		xmlhttp.send();
		document.getElementById("pname").value = '';
		document.getElementById("address").value = '';
		document.getElementById("phone").value = '';
		document.getElementById("email").value = '';
		document.getElementById("pname").focus() = true;			
	}
}
		function postStudent(){
		var sname= document.getElementById("sname").value;
		var oname= document.getElementById("oname").value;
		var gender= document.getElementById("gender").value;
		var dob= document.getElementById("dob").value;
		var pob= document.getElementById("pob").value;
		var soo= document.getElementById("soo").value;
		var address= document.getElementById("address").value;
		var email= document.getElementById("email").value;
		var nos= document.getElementById("nos").value;
		var illness= document.getElementById("illness").value;
		var classp= document.getElementById("classp").value;
		var yr= document.getElementById("yr").value;
		var dol= document.getElementById("dol").value;
		var hosp= document.getElementById("hosp").value;
		var reason= document.getElementById("reason").value;
		var phs= document.getElementById("phs").value;
		var sclass= document.getElementById("sclass").value;
		var boarding= document.getElementById("boarding").value;
		var sponsor= document.getElementById("sponsor").value;
		var emergency= document.getElementById("emergency").value;
		var wdcc= document.getElementById("wdcc").value;
		var studno= document.getElementById("studno").value;
		var formno= document.getElementById("formno").value;
		var status= document.getElementById("status").value;
		if(sname == ''){alert('This field cannot be blank'); document.getElementById("sname").focus() = true; return false;}
		if(oname == ''){alert('This field cannot be blank'); document.getElementById("oname").focus() = true; return false;}
		if(email == ''){alert('This field cannot be blank'); document.getElementById("email").focus() = true; return false;}
		if(address == ''){alert('This field cannot be blank'); document.getElementById("address").focus() = true; return false;}
		if(soo == ''){alert('This field cannot be blank'); document.getElementById("soo").focus() = true; return false;}
		if(pob == ''){alert('This field cannot be blank'); document.getElementById("pob").focus() = true; return false;}
		if(nos == ''){alert('This field cannot be blank'); document.getElementById("nos").focus() = true; return false;}
		if(illness == ''){alert('This field cannot be blank'); document.getElementById("illness").focus() = true; return false;}
		if(yr == ''){alert('This field cannot be blank'); document.getElementById("yr").focus() = true; return false;}
		if(dol == ''){alert('This field cannot be blank'); document.getElementById("dol").focus() = true; return false;}
		if(hosp == ''){alert('This field cannot be blank'); document.getElementById("hosp").focus() = true; return false;}
		if(reason == ''){alert('This field cannot be blank'); document.getElementById("reason").focus() = true; return false;}
		if(phs == ''){alert('This field cannot be blank'); document.getElementById("phs").focus() = true; return false;}
	
		if(sclass == ''){alert('This field cannot be blank'); document.getElementById("sclass").focus() = true; return false;}
		if(boarding == ''){alert('This field cannot be blank'); document.getElementById("boarding").focus() = true; return false;}
		if(sponsor == ''){alert('This field cannot be blank'); document.getElementById("sponsor").focus() = true; return false;}
		if(emergency == ''){alert('This field cannot be blank'); document.getElementById("emergency").focus() = true; return false;}
		if(wdcc == ''){alert('This field cannot be blank'); document.getElementById("wdcc").focus() = true; return false;}
		if(studno == ''){alert('This field cannot be blank'); document.getElementById("studno").focus() = true; return false;}
		if(status == 'Select Status'){alert('You did not select student status'); document.getElementById("status").focus() = true; return false;}		
		if(sclass == 'Select Class'){alert('You did not select the class applying for'); document.getElementById("sclass").focus() = true; return false;}		

        var response = confirm("Kindly confirm your details before posting\n----------------------------------------------------------\nSTUDENT NO: " + studno  + "\nSURNAME: " + sname  + "\nOTHERNAME: " + oname  + "\nGENDER: " + gender  + "\nDATE OF BIRTH: " + dob  + "\nRESIDENTIAL ADDRESS: " + address + "\nSPONSOR: " + sponsor  + "\nEMAIL: " + email);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("formdiv").style.visibility = 'visible';
                document.getElementById("formdiv").innerHTML = xmlhttp.responseText;
            }
        }
        
	xmlhttp.open("GET", "../model/post-create-student-record?sname="+sname+'&oname='+oname+'&gender='+gender+'&dob='+dob+'&pob='+pob+'&soo='+soo+'&address='+address+'&email='+email+'&nos='+nos+'&illness='+illness+'&dol='+dol+'&classp='+classp+'&yr='+yr+'&hosp='+hosp+'&phs='+phs+'&reason='+reason+'&sclass='+sclass+'&boarding='+boarding+'&sponsor='+sponsor+'&emergency='+emergency+'&wdcc='+wdcc+'&studno='+studno+'&formno='+formno+'&status='+status, true);
		xmlhttp.send();
		//location.href ='add-student';
			document.getElementById("sname").value = "";
		document.getElementById("oname").value = "";
		document.getElementById("dol").value = "";
		document.getElementById("dob").value = "";
		document.getElementById("email").value = "";
		document.getElementById("pob").value = "";
		document.getElementById("soo").value = "";
		document.getElementById("address").value = "";
		document.getElementById("phone").value = "";
		document.getElementById("nos").value = "";
		document.getElementById("illness").value = "";
		document.getElementById("yr").value = "";
		document.getElementById("hosp").value = "";
		document.getElementById("reason").value = "";
		document.getElementById("phs").value = "";
		document.getElementById("sclass").value = "";
		document.getElementById("emergency").value = "";
		document.getElementById("wdcc").value = "";
		document.getElementById("studno").value = "";		
		document.getElementById("sname").focus() = true; 

		
   }
}

		function postAssignClass(){
		var studname= document.getElementById("studname").value;
		var cname= document.getElementById("cname").value;
		var studid = document.getElementById("studid").value;
		var sch = document.getElementById("sch").value;
		var nterm = document.getElementById("nterm").value;
		var sessionname = document.getElementById("sessionname").value;
		var bd = document.getElementById("bd").value;
		var classgrp = document.getElementById("classgrp").value;
		var gender = document.getElementById("gender").value;
		
		if(sch == ''){alert('You can not assign student to a class without school'); document.getElementById("sch").focus() = true; return false;}
		if(cname == 'Select Class Name'){alert('You did not Select the assign class'); document.getElementById("cname").focus() = true; return false;}
		if(sessionname == 'Select Academic Session'){alert('You did not Select academic session'); document.getElementById("sessionname").focus() = true; return false;}
		if(nterm == 'Select Term'){alert('You did not Select term'); document.getElementById("nterm").focus() = true; return false;}

        var response = confirm("Kindly confirm your details before posting\n----------------------------------------------------------\nASSIGN CLASS: " + cname);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-assign-class-1?studname="+studname+'&cname='+cname+'&studid='+studid+'&nterm='+nterm+'&sessionname='+sessionname+'&bd='+bd+'&gender='+gender+'&classgrp='+classgrp+'&sch='+sch, true);
		xmlhttp.send();
		//window.location.reload();
	}
}

		function postCreateSession(){
		var sessionname= document.getElementById("sessionname").value;
		var rdate= document.getElementById("rdate").value;
		
		if(sessionname == ''){alert('This field cannot be blank'); document.getElementById("sessionname").focus() = true; return false;}
		if(rdate == ''){alert('This field cannot be blank'); document.getElementById("rdate").focus() = true; return false;}
        var response = confirm("Kindly confirm your details before posting\n----------------------------------------------------------\nACADEMIC SESSION: " + sessionname);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-session-1?sessionname="+sessionname+'&rdate='+rdate, true);
		xmlhttp.send();
		document.getElementById("sessionname").value = '';
		//window.location.reload();
	}
}

function postFees(){
		var sch= document.getElementById("sch").value;
		var fname= document.getElementById("fname").value;
		var fcat= document.getElementById("fcat").value;
		var famt= document.getElementById("famt").value;
		var stype= document.getElementById("stype").value;
		var tsch = $('#sch ').find(':selected').text();
		if(fname == ''){alert('This field cannot be blank'); document.getElementById("fname").focus() = true; return false;}
		if(sch == 'Select School'){alert('You did not Select school'); document.getElementById("sch").focus() = true; return false;}
		if(famt == ''){alert('This field cannot be blank'); document.getElementById("famt").focus() = true; return false;}
		if(stype == 'Student Type'){alert('You did not Select Student Type'); document.getElementById("stype").focus() = true; return false;}
		if(fcat == 'Fee Category'){alert('You did not Select Fee Category'); document.getElementById("fcat").focus() = true; return false;}
        var response = confirm("Kindly confirm your details before posting\n----------------------------------------------------------\nFEE NAME: " + fname + "\nAMOUNT: " + famt  + "\nSCHOOL: " + tsch + "\nSTUDENT TYPE: " + stype);
			if(response == false){
				return;
			}else{
			
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-fee-1?fname="+fname+'&sch='+sch+'&fcat='+fcat+'&famt='+famt+'&stype='+stype, true);
		xmlhttp.send();
		document.getElementById("fname").value = '';
		document.getElementById("famt").value = '';
		document.getElementById("fname").focus() = true; 
			
  }	

}

		function postByCashier(){
		var drledger= document.getElementById("drledger").value;
		var crledger= document.getElementById("crledger").value;
		var amt1= document.getElementById("amt1").value;
		var narration= document.getElementById("narration").value;	
		var sid= document.getElementById("sid").value;	

		if(amt1 == ''){alert('This field cannot be blank'); document.getElementById("amt1").focus() = true; return false;}
		if(narration == ''){alert('This field cannot be blank'); document.getElementById("narration").focus() = true; return false;}
		if(drledger == 'Mode of Payment'){alert('You did not select Mode of Payment'); document.getElementById("drledger").focus() = true; return false;}

        var response = confirm("Kindly confirm your posting details\n----------------------------------------------------------\nDR LEDGER NAME: " + drledger + "\nCR LEDGER NAME: " + crledger+"\nAMOUNT: "+amt1);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-fee-trans-1?sid="+sid+'&drledger='+drledger+'&crledger='+crledger+'&amt1='+amt1+'&narration='+narration, true);
		xmlhttp.send();
		//location.href ='print-receipt.php';
	}
}
		function postByCashierAll(){
		var drledger= document.getElementById("paytype").value;
		var amt1= document.getElementById("amt1").value;
		var narration= document.getElementById("narration").value;	
		var sid= document.getElementById("sid").value;	
		var rno= document.getElementById("rno").value;
		var stname= document.getElementById("stname").value;

		if(amt1 == ''){alert('This field cannot be blank'); document.getElementById("amt1").focus() = true; return false;}
		if(narration == ''){alert('This field cannot be blank'); document.getElementById("narration").focus() = true; return false;}
		if(drledger == 'Mode of Payment'){alert('You did not select Mode of Payment'); document.getElementById("drledger").focus() = true; return false;}

        var response = confirm("Kindly confirm your posting details\n----------------------------------------------------------\nDR LEDGER NAME: " + drledger + "\nAMOUNT: "+amt1);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-fee-trans-all?sid="+sid+'&drledger='+drledger+'&amt1='+amt1+'&narration='+narration+'&rno='+rno+'&stname='+stname, true);
		xmlhttp.send();
		//location.href ='pay-fee-list.php';
	}
}

		function postCreateItemGroup(){
		var ig= document.getElementById("ig").value;

		if(ig == ''){alert('This field cannot be blank'); document.getElementById("ig").focus() = true; return false;}

        var response = confirm("Kindly confirm your posting details\n----------------------------------------------------------\nITEM GROUP NAME: " + ig);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-item-group?ig="+ig, true);
		xmlhttp.send();
		document.getElementById("ig").value = '';
		document.getElementById("ig").focus() = true; 
	}
}

		function postItem(){
		var igroup= document.getElementById("igroup").value;
		var itype= document.getElementById("itype").value;
		var iname= document.getElementById("iname").value;	
		var usales= document.getElementById("usales").value;

		if(iname == ''){alert('This field cannot be blank'); document.getElementById("iname").focus() = true; return false;}
		if(igroup == 'Select Item Group'){alert('You did not select Item Group'); document.getElementById("igroup").focus() = true; return false;}
		if(usales == ''){alert('This field cannot be blank'); document.getElementById("usales").focus() = true; return false;}
		if(itype == 'Item Type'){alert('You did not select Item Type'); document.getElementById("itype").focus() = true; return false;}

        var response = confirm("Kindly confirm your posting details\n----------------------------------------------------------\nITEM NAME: " + iname + "\nITEM GROUP: " + igroup + "\nITEM UNIT SALES: " + usales + "\nITEM TYPE: " + itype);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-item?iname="+iname+'&igroup='+igroup+'&itype='+itype+'&usales='+usales, true);
		xmlhttp.send();
		document.getElementById("iname").value = '';
		document.getElementById("usales").value = '';
		document.getElementById("igroup").value = 'Select Item Group';
		document.getElementById("itype").value = 'Item Type';
		document.getElementById("iname").focus() = true; 
	}
}

		function postPO(){
		var iname= document.getElementById("iname").value;
		var sname= document.getElementById("sname").value;
		var qty= document.getElementById("qty").value;	
		var amt= document.getElementById("amt").value;

		if(iname == 'Select Item'){alert('You did not select any Item'); document.getElementById("iname").focus() = true; return false;}
		if(sname == 'Supplier Name'){alert('You did not select any supplier'); document.getElementById("sname").focus() = true; return false;}
		if(qty == ''){alert('This field cannot be blank'); document.getElementById("qty").focus() = true; return false;}
		if(amt == ''){alert('This field cannot be blank'); document.getElementById("amt").focus() = true; return false;}

        var response = confirm("Kindly confirm your posting details\n----------------------------------------------------------\nITEM NAME: " + iname + "\nSUPPLIER: " + sname + "\nQUANTITY: " + qty + "\nPREVIOUS PRICE: " + amt);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-po-trans?iname="+iname+'&sname='+sname+'&qty='+qty+'&amt='+amt, true);
		xmlhttp.send();
		document.getElementById("qty").value = '';
		document.getElementById("iname").value = 'Select Item';
		document.getElementById("iname").focus() = true; 
	}
}
		function postPOAll(){
		var pono = document.getElementById("pono").value;	
        var response = confirm("Kindly confirm your PO details before posting");
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-po-trans-all?pono="+pono, true);
		xmlhttp.send();
		$("#mydiv").load(location.href + " #mydiv");
	}
}

function postStockinItems(){
		var iname= document.getElementById("iname").value;
		var itemid= document.getElementById("itemid").value;
		var sid= document.getElementById("sid").value;
		var sname= document.getElementById("sname").value;
		var sqty= document.getElementById("sqty").value;
		var poqty= document.getElementById("poqty").value;	
		var amt1= document.getElementById("amt1").value;
		var pono= document.getElementById("pono").value;
		var id= document.getElementById("id").value;
		var storeid= document.getElementById("storeid").value;
		var usales= document.getElementById("usales").value;
		var pobal = poqty-sqty;
		var receiptno= document.getElementById("receiptno").value;
		var rdate= document.getElementById("rdate").value;
		
		if(parseInt(sqty) > parseInt(poqty)){alert('Quantity supplied is more than the PO quantity'); document.getElementById("sqty").focus() = true; return false;}
		if(storeid == 'Store Name'){alert('You did not select Item Store'); document.getElementById("storeid").focus() = true; return false;}
		if(sqty == ''){alert('This field cannot be blank'); document.getElementById("sqty").focus() = true; return false;}
		if(receiptno == ''){alert('This field cannot be blank'); document.getElementById("receiptno").focus() = true; return false;}
		if(rdate == ''){alert('This field cannot be blank'); document.getElementById("rdate").focus() = true; return false;}
		if(usales == ''){alert('This field cannot be blank'); document.getElementById("usales").focus() = true; return false;}
		 var response = confirm("Kindly confirm your posting details\n----------------------------------------------------------\nITEM NAME: " + iname + "\nSUPPLIER: " + sname + "\nQUANTITY SUPLLIED: " + sqty + "\nUNIT PRICE: " + amt1);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-stockin-trans?iname="+iname+'&sname='+sname+'&sqty='+sqty+'&amt1='+amt1+'&poqty='+poqty+'&receiptno='+receiptno+'&pono='+pono+' &pobal='+pobal+'&storeid='+storeid+'&rdate='+rdate+'&id='+id+'&itemid='+itemid+'&sid='+sid+'&usales='+usales, true);
		xmlhttp.send();
		$("#mydiv").load(location.href + " #mydiv");
	}
		//window.location.reload();

}

		function postOpenTerm(){
		var tsession= document.getElementById("tsession").value;
		var tem= document.getElementById("tem").value;
		var sdate= document.getElementById("sdate").value;	

		if(tsession == 'Academic Session'){alert('You did not select Academic session'); document.getElementById("tsession").focus() = true; return false;}
		if(tem == 'Select Term'){alert('You did not select Term'); document.getElementById("tem").focus() = true; return false;}
		if(sdate == ''){alert('This field cannot be blank'); document.getElementById("sdate").focus() = true; return false;}

        var response = confirm("Kindly confirm your details\n----------------------------------------------------------\nACADEMIC SESSION: " + tsession + "\nTERM: " + tem + "\nRESUMPTION DATE: " + sdate);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-open-term?tsession="+tsession+'&tem='+tem+'&sdate='+sdate, true);
		xmlhttp.send();
		document.getElementById("sdate").value = '';
		document.getElementById("tsession").value = 'Academic Session';
		document.getElementById("tsession").focus() = true; 
	}
}

		function postCloseTerm(){
		var id= document.getElementById("id").value;
		var ts= document.getElementById("ts").value;
		var tm= document.getElementById("tm").value;
		var edate= document.getElementById("edate").value;	

		if(edate == ''){alert('This field cannot be blank'); document.getElementById("edate").focus() = true; return false;}

        var response = confirm("Kindly confirm your details\n----------------------------------------------------------\nACADEMIC SESSION: " + ts + "\nTERM: " + tm + "\nCLOSING DATE: " + edate);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "close-term?ts="+ts+'&tm='+tm+'&edate='+edate+'&id='+id, true);
		xmlhttp.send();
		window.location.reload();
	}
}

		function postEditStudent(){
		var id= document.getElementById("id").value;	
		var sname= document.getElementById("sname").value;
		var oname= document.getElementById("oname").value;
		var gender= document.getElementById("gender").value;
		var dob= document.getElementById("dob").value;
		var address= document.getElementById("address").value;
		var email= document.getElementById("email").value;
		var boarding= document.getElementById("boarding").value;
		var sch= document.getElementById("sch").value;
		var sclass= document.getElementById("sclass").value;
		var studno= document.getElementById("studno").value;
		var ledgerno= document.getElementById("ledgerno").value;
		
		if(sname == ''){alert('This field cannot be blank'); document.getElementById("sname").focus() = true; return false;}
		if(oname == ''){alert('This field cannot be blank'); document.getElementById("oname").focus() = true; return false;}
		if(email == ''){alert('This field cannot be blank'); document.getElementById("email").focus() = true; return false;}
		if(address == ''){alert('This field cannot be blank'); document.getElementById("address").focus() = true; return false;}
		if(boarding == ''){alert('This field cannot be blank'); document.getElementById("boarding").focus() = true; return false;}
		if(sch == 'Select School'){alert('You did not select school'); document.getElementById("sch").focus() = true; return false;}
		if(studno == ''){alert('This field cannot be blank'); document.getElementById("studno").focus() = true; return false;}

        var response = confirm("Are you sure you want to edit student record?\nEnsure all you edited information are correct before clicking ok OK button");
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("formdiv").style.visibility = 'visible';
                document.getElementById("formdiv").innerHTML = xmlhttp.responseText;
            }
        }
        
		xmlhttp.open("GET", "../model/post-edit-student-record?sname="+sname+'&oname='+oname+'&gender='+gender+'&dob='+dob+'&address='+address+'&email='+email+'&boarding='+boarding+'&sch='+sch+'&studno='+studno+'&ledgerno='+ledgerno+'&id='+id+'&sclass='+sclass, true);
		xmlhttp.send();
		window.parent.reload();
		
   }
}
		function postCloseSession(){
		var id= document.getElementById("id").value;
		var ts= document.getElementById("ts").value;
		var rdate= document.getElementById("rdate").value;	

		if(rdate == ''){alert('This field cannot be blank'); document.getElementById("rdate").focus() = true; return false;}

        var response = confirm("Kindly confirm your details\n----------------------------------------------------------\nACADEMIC SESSION: " + ts + "\nCLOSING DATE: " + rdate);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "close-session?ts="+ts+'&rdate='+rdate+'&id='+id, true);
		xmlhttp.send();
		//window.location.reload();
	}
}
		function postGetStudent(){
		var studid= document.getElementById("studid").value;
		if(studid == 'Select Student'){alert('You did not select any student'); document.getElementById("studid").focus() = true; return false;}
		location.href = "add-test-score?studid="+studid;
}
		function getCA1Student(){
		var sch= document.getElementById("sch").value;
		var cid= document.getElementById("cid").value;
		var sclass= document.getElementById("sclass").value;
		var cname = $('#cid ').find(':selected').text();
		if(cid == 'Select Class'){alert('You did not select any Class'); document.getElementById("cid").focus() = true; return false;}
		if(sch==9){
		location.href = "add-ca1-score?cid="+cid+'&cname='+cname;
		}
		if(sch==8){
		location.href = "add-ca1-score-primary?cid="+cid+'&cname='+cname;
		}
		if(sch==10){
		location.href = "add-ca1-score-junior?cid="+cid+'&cname='+cname;
		}
		if(sch==12){
		location.href = "add-ca1-score-nursery?cid="+cid+'&cname='+cname;
		}
		if(sch==11){
		location.href = "add-ca1-score-creche?cid="+cid+'&cname='+cname;
		}
}
		function getCA2Student(){
		var sch= document.getElementById("sch").value;
		var cid= document.getElementById("cid").value;
		var sclass= document.getElementById("sclass").value;
		var cname = $('#cid ').find(':selected').text();
		if(cid == 'Select Class'){alert('You did not select any Class'); document.getElementById("cid").focus() = true; return false;}
		
		if(sch==9){
			location.href = "add-ca2-score?cid="+cid+'&cname='+cname;		}
		if(sch==8){
		location.href = "add-ca2-score-primary?cid="+cid+'&cname='+cname;
		}
		if(sch==10){
		location.href = "add-ca2-score-junior?cid="+cid+'&cname='+cname;
		}
		if(sch==12){
		location.href = "add-ca2-score-nursery?cid="+cid+'&cname='+cname;
		}
		if(sch==11){
		location.href = "add-ca2-score-creche?cid="+cid+'&cname='+cname;
		}
}
		function getExamStudent(){
		var sch= document.getElementById("sch").value;
		var cid= document.getElementById("cid").value;
		var sclass= document.getElementById("sclass").value;
		var cname = $('#cid ').find(':selected').text();
		
		if(cid == 'Select Class'){alert('You did not select any Class'); document.getElementById("cid").focus() = true; return false;}

		if(sch==9){
		location.href = "add-exam-score2?cid="+cid+'&cname='+cname;			
		}
		if(sch==8){
		location.href = "add-exam-score2-primary?cid="+cid+'&cname='+cname;
		}
		if(sch==10){
		location.href = "add-exam-score2-junior?cid="+cid+'&cname='+cname;
		}
		if(sch==12){
		location.href = "add-exam-score2-nursery?cid="+cid+'&cname='+cname;
		}
		if(sch==11){
		location.href = "add-exam-score2-creche?cid="+cid+'&cname='+cname;
		}
}
		function getStudentResultSheet(){
		var sch= document.getElementById("sch").value;
		var cid= document.getElementById("cid").value;
		var sclass= document.getElementById("sclass").value;
		var cname = $('#cid ').find(':selected').text();
		var schname = $('#sch ').find(':selected').text();
		if(cid == 'Select Class'){alert('You did not select any Class'); document.getElementById("cid").focus() = true; return false;}
		
		if(sch==9){
		location.href = "compute-result?cid="+cid+'&cname='+cname+'&sch='+sch+'&schname='+schname;			
		}
		if(sch==8){
		location.href = "compute-result-primary?cid="+cid+'&cname='+cname+'&sch='+sch+'&schname='+schname;
		}
		if(sch==10){
		location.href = "compute-result-junior?cid="+cid+'&cname='+cname+'&sch='+sch+'&schname='+schname;
		}
		if(sch==12){
		location.href = "compute-result-nursery?cid="+cid+'&cname='+cname+'&sch='+sch+'&schname='+schname;
		}
		if(sch==11){
		location.href = "compute-result-creche?cid="+cid+'&cname='+cname+'&sch='+sch+'&schname='+schname;
		}
}

		function getStudentResultsPerClass(){
		var cid= document.getElementById("cid").value;
		var sch= document.getElementById("sch").value;
		var cname = $('#cid ').find(':selected').text();
		var schname = $('#sch ').find(':selected').text();
		if(cid == 'Select Class'){alert('You did not select any Class'); document.getElementById("cid").focus() = true; return false;}
		location.href = "student-result?cid="+cid+'&cname='+cname+'&sch='+sch+'&schname='+schname;
}

		function getTeacherRemark(){
		var cid= document.getElementById("cid").value;
		var cname = $('#cid ').find(':selected').text();
		if(cid == 'Select Class'){alert('You did not select any Class'); document.getElementById("cid").focus() = true; return false;}
		location.href = "add-teacher-remarks?cid="+cid+'&cname='+cname;
}

		function getStudentSubject(){
		var subjectid= document.getElementById("subjectid").value;
		var cid= document.getElementById("cid").value;
		var cname = $('#cid ').find(':selected').text();
		if(subjectid == 'Select Subject'){alert('You did not select any subject'); document.getElementById("subjectid").focus() = true; return false;}
		if(cid == 'Select Class'){alert('You did not select any Class'); document.getElementById("cid").focus() = true; return false;}
		location.href = "add-first-ca?subjectid="+subjectid+'&cid='+cid+'&cname='+cname;
}
		function getStudentSubject1(){
		var subjectid= document.getElementById("subjectid").value;
		var cid= document.getElementById("cid").value;
		var cname = $('#cid ').find(':selected').text();
		if(subjectid == 'Select Subject'){alert('You did not select any subject'); document.getElementById("subjectid").focus() = true; return false;}
		if(cid == 'Select Class'){alert('You did not select any Class'); document.getElementById("cid").focus() = true; return false;}
		location.href = "add-second-ca?subjectid="+subjectid+'&cid='+cid+'&cname='+cname;
}
		function getStudentSubject2(){
		var subjectid= document.getElementById("subjectid").value;
		var cid= document.getElementById("cid").value;
		var cname = $('#cid ').find(':selected').text();
		if(subjectid == 'Select Subject'){alert('You did not select any subject'); document.getElementById("subjectid").focus() = true; return false;}
		if(cid == 'Select Class'){alert('You did not select any Class'); document.getElementById("cid").focus() = true; return false;}
		location.href = "add-exam-score?subjectid="+subjectid+'&cid='+cid+'&cname='+cname;
}
		function getStudentSubject3(){
		var subjectid= document.getElementById("subjectid").value;
		var cid= document.getElementById("cid").value;
		var cname = $('#cid ').find(':selected').text();
		if(subjectid == 'Select Subject'){alert('You did not select any subject'); document.getElementById("subjectid").focus() = true; return false;}
		if(cid == 'Select Class'){alert('You did not select any Class'); document.getElementById("cid").focus() = true; return false;}
		location.href = "add-bulk-score?subjectid="+subjectid+'&cid='+cid+'&cname='+cname;
}

		function postScore(){
		var id= document.getElementById("id").value;
		var stype= document.getElementById("stype").value;
		var score= document.getElementById("score").value;
		var subname= document.getElementById("subname").value;

		if(score == ''){alert('This field cannot be blank'); document.getElementById("score").focus() = true; return false;}
		if(stype == 'Select'){alert('You did not select whether score is for first test or second test or exam '); document.getElementById("stype").focus() = true; return false;}

        var response = confirm("Kindly confirm your details\n----------------------------------------------------------\nSUBJECT: " + subname + "\nSCORE: " + score + "\n" + stype);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "posttest-score?id="+id+'&stype='+stype+'&score='+score, true);
		xmlhttp.send();
		//window.location.reload();
	}
}
		function getStudentScore(){
		var studid= document.getElementById("studid").value;
		if(studid == 'Select Student'){alert('You did not select any student'); document.getElementById("studid").focus() = true; return false;}
		location.href = "edit-score?studid="+studid;
}
		function postCreateDesignation(){
		var dname= document.getElementById("dname").value;

		if(dname == ''){alert('This field cannot be blank'); document.getElementById("dname").focus() = true; return false;}

        var response = confirm("Kindly confirm your details\n----------------------------------------------------------\nDESIGNATION: " + dname);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-designation-1?dname="+dname, true);
		xmlhttp.send();
		document.getElementById("dname").value = '';
		document.getElementById("dname").focus() = true;
		//window.location.reload();
	}
}

		function postStaffRecord(){
		var staffno= document.getElementById("staffno").value;
		var des= document.getElementById("des").value;
		var sname= document.getElementById("sname").value;
		var address= document.getElementById("address").value;
		var gender= document.getElementById("gender").value;
		var dob= document.getElementById("dob").value;
		var doe= document.getElementById("doe").value;
		var phone= document.getElementById("phone").value;
		var email= document.getElementById("email").value;
		var bname= document.getElementById("bname").value;
		var penname= document.getElementById("penname").value;
		var accno= document.getElementById("accno").value;
		var penno= document.getElementById("penno").value;	
		var dept= document.getElementById("dept").value;
		var stype= document.getElementById("stype").value;
		var uaccess= document.getElementById("uaccess").value;
		var uaname = $('#uaccess').find(':selected').text();
		var desname = $('#des ').find(':selected').text();
		var depname = $('#dept ').find(':selected').text();
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

		if(doe == ''){alert('This field cannot be blank'); document.getElementById("doe").focus() = true; return false;}
		if(staffno == ''){alert('Staff Number cannot be empty'); document.getElementById("staffno").focus() = true; return false;}
		if(sname == ''){alert('Staff Names cannot be empty'); document.getElementById("sname").focus() = true; return false;}
		if(dob == ''){alert('This field cannot be blank'); document.getElementById("dob").focus() = true; return false;}
		if(address == ''){alert('The Address  cannot be empty'); document.getElementById("address").focus() = true; return false;}
		if(des== 'Select Designation'){alert('You did not Select any designation'); document.getElementById("des").focus() = true; return false;}
		if(gender== 'Select Gender'){alert('You did not Select gender'); document.getElementById("gender").focus() = true; return false;}
		if(phone == ''){alert('Staff phone number cannot be empty'); document.getElementById("phone").focus() = true; return false;}
		if(email == ''){alert('Email field cannot be empty'); document.getElementById("email").focus() = true; return false;}
		if(dept== 'Select Department'){alert('You did not Select staff Department'); document.getElementById("dept").focus() = true; return false;}
 		if(stype== 'Select Type'){alert('You did not Select staff Type'); document.getElementById("stype").focus() = true; return false;}
 		if(uaccess== 'Select User Access'){alert('You did not Select staff Access Right'); document.getElementById("uaccess").focus() = true; return false;}
		if(!email.match(mailformat)){alert('You enter an invalid email'); document.getElementById("email").focus() = true; return false;}
		      
        var response = confirm("Kindly confirm your details\n----------------------------------------------------------\nSTAFF NAME: " + sname + "\nADDRESS: " + address + "\nPHONE NUMBER: " + phone + "\nEMAIL: " + email + "\nDESIGNATION: " + desname );
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("formdiv").style.visibility = 'visible';
                document.getElementById("formdiv").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../model/post-create-staff?staffno="+staffno+'&sname='+sname+'&des='+des+'&gender='+gender+'&address='+address+'&dob='+dob+'&phone='+phone+'&email='+email+'&bname='+bname+'&accno='+accno+'&penno='+penno+'&penname='+penname+'&dept='+dept+'&stype='+stype+'&doe='+doe+'&uaccess='+uaccess+'&uaname='+uaname+'&desname='+desname+'&depname='+depname, true);
		xmlhttp.send();
		document.getElementById("sname").value = '';
		document.getElementById("address").value = '';
		//document.getElementById("gender").value = '';
		//document.getElementById("dob").value = '';
		//document.getElementById("doe").value = '';
		document.getElementById("phone").value = '';
		document.getElementById("email").value = '';
		//document.getElementById("dept").selectedIndex = 0;
		//document.getElementById("uaccess").selectedIndex = 0;
		//document.getElementById("des").selectedIndex = 0;
		//document.getElementById("stype").value = '';
		document.getElementById("bname").value = '';
		document.getElementById("penname").value = '';
		document.getElementById("accno").value = '';
		document.getElementById("penno").value = '';
		document.getElementById("staffno").value = '';
		document.getElementById("sname").focus() = true;
		//document.getElementById("stype").selectedIndex = 0;
		//window.location.reload();
	}
}

		function createFeeReg(){
		var drledger= document.getElementById("drledger").value;
		var amt1= document.getElementById("amt1").value;
		var narration= document.getElementById("narration").value;	
		var sid= document.getElementById("sid").value;	
		var rno= document.getElementById("rno").value;
		var stname= document.getElementById("stname").value;

		if(amt1 == ''){alert('This field cannot be blank'); document.getElementById("amt1").focus() = true; return false;}
		if(narration == ''){alert('This field cannot be blank'); document.getElementById("narration").focus() = true; return false;}
		if(drledger == 'Mode of Payment'){alert('You did not select Mode of Payment'); document.getElementById("drledger").focus() = true; return false;}

        var response = confirm("Kindly confirm your posting details\n----------------------------------------------------------\nDR LEDGER NAME: " + drledger + "\nAMOUNT: "+amt1);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-reg-fee-trans?sid="+sid+'&drledger='+drledger+'&amt1='+amt1+'&narration='+narration+'&rno='+rno+'&stname='+stname, true);
		xmlhttp.send();
		location.href ='print-receipt.php';
	}
}

		function postEditStaff(){
		var id= document.getElementById("id").value;
		var staffno= document.getElementById("staffno").value;
		var des= document.getElementById("des").value;
		var sname= document.getElementById("sname").value;
		var address= document.getElementById("address").value;
		var gender= document.getElementById("gender").value;
		var doe= document.getElementById("doe").value;
		var phone= document.getElementById("phone").value;
		var email= document.getElementById("email").value;
		var bname= document.getElementById("bname").value;
		var penname= document.getElementById("penname").value;
		var accno= document.getElementById("accno").value;
		var penno= document.getElementById("penno").value;	
		var dept= document.getElementById("dept").value;
		var stype= document.getElementById("stype").value;
		var desname = $('#des ').find(':selected').text();
		var depname = $('#dept ').find(':selected').text();
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		if(doe == ''){alert('This field cannot be blank'); document.getElementById("doe").focus() = true; return false;}
		if(staffno == ''){alert('This field cannot be blank'); document.getElementById("staffno").focus() = true; return false;}
		if(sname == ''){alert('This field cannot be blank'); document.getElementById("sname").focus() = true; return false;}
		if(address == ''){alert('This field cannot be blank'); document.getElementById("address").focus() = true; return false;}
		if(des== 'Select Designation'){alert('You did not Select any designation'); document.getElementById("des").focus() = true; return false;}
		if(gender== 'Select Gender'){alert('You did not Select gender'); document.getElementById("gender").focus() = true; return false;}
		if(phone == ''){alert('This field cannot be blank'); document.getElementById("phone").focus() = true; return false;}
		if(email == ''){alert('This field cannot be blank'); document.getElementById("email").focus() = true; return false;}
		if(dept== 'Select Department'){alert('You did not Select staff Department'); document.getElementById("dept").focus() = true; return false;}
 		if(stype== 'Select Type'){alert('You did not Select staff Type'); document.getElementById("stype").focus() = true; return false;}
		if(!email.match(mailformat)){alert('You enter an invalid email'); document.getElementById("email").focus() = true; return false;}
		      
        var response = confirm("Kindly confirm your details\n----------------------------------------------------------\nSTAFF NAME: " + sname + "\nADDRESS: " + address + "\nPHONE NUMBER: " + phone + "\nEMAIL: " + email + "\nDESIGNATION: " + desname );
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-edit-staff?staffno="+staffno+'&sname='+sname+'&des='+des+'&gender='+gender+'&address='+address+'&phone='+phone+'&email='+email+'&bname='+bname+'&accno='+accno+'&penno='+penno+'&penname='+penname+'&dept='+dept+'&stype='+stype+'&doe='+doe+'&desname='+desname+'&depname='+depname+'&id='+id, true);
		xmlhttp.send();
	//window.location.reload();
	}

}	

		function postAssignStaff(){
		var id= document.getElementById("id").value;
		var staffno= document.getElementById("staffno").value;
		var assstaffno= document.getElementById("assstaffno").value;
		var aclass= document.getElementById("aclass").value;
		var sname = $('#staffno').find(':selected').text();

		if(staffno== 'Select Staff'){alert('You did not Select Staff to Assign'); document.getElementById("staffno").focus() = true; return false;}
		//if(assstaffno== 'Select Staff'){alert('You did not Select Assistant to Assign'); document.getElementById("assstaffno").focus() = true; return false;}
 		if(remark== ''){alert('This field cannot be blank'); document.getElementById("remark").focus() = true; return false;}
		      
        var response = confirm("Kindly confirm your details\n----------------------------------------------------------\nSTAFF NAME: " + sname + "\nCLASS: " + aclass );
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-assign-staff?staffno="+staffno+'&id='+id+'&aclass='+aclass+'&remark='+remark+'&assstaffno='+assstaffno, true);
		xmlhttp.send();
		//window.location.reload();
	}

}

		function postReAssignStaff(){
		var id= document.getElementById("id").value;
		var staffno= document.getElementById("staffno").value;
		var assstaffno= document.getElementById("assstaffno").value;
		var aclass= document.getElementById("aclass").value;
		var sess= document.getElementById("sess").value;
		var term= document.getElementById("term").value;
		var sname = $('#staffno').find(':selected').text();

		if(staffno== 'Select Staff'){alert('You did not Select Staff to Assign'); document.getElementById("staffno").focus() = true; return false;}
		//if(assstaffno== 'Select Staff'){alert('You did not Select Assistant to Assign'); document.getElementById("assstaffno").focus() = true; return false;}
 		if(remark== ''){alert('This field cannot be blank'); document.getElementById("remark").focus() = true; return false;}
		      
        var response = confirm("Kindly confirm your details\n----------------------------------------------------------\nSTAFF NAME: " + sname + "\nCLASS: " + aclass );
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-reassign-staff?staffno="+staffno+'&term='+term+'&id='+id+'&aclass='+aclass+'&remark='+remark+'&sess='+sess+'&assstaffno='+assstaffno, true);
		xmlhttp.send();
		//window.location.reload();
	}

}


		function postAssignSubject(){
		var id= document.getElementById("id").value;
		var staffno= document.getElementById("staffno").value;
		var assstaffno= document.getElementById("assstaffno").value;
		var subject= document.getElementById("subject").value;
		var sch= document.getElementById("sch").value;
		var schid= document.getElementById("schid").value;
		var remark= document.getElementById("remark").value;
		var term= document.getElementById("term").value;
		var sess= document.getElementById("sess").value;
		
		var sname = $('#staffno').find(':selected').text();

		if(staffno== 'Select Staff'){alert('You did not Select Staff'); document.getElementById("staffno").focus() = true; return false;}
		if(assstaffno== 'Select Staff'){alert('You did not Select Staff'); document.getElementById("assstaffno").focus() = true; return false;}
 		if(remark== ''){alert('This field cannot be blank'); document.getElementById("remark").focus() = true; return false;}
		      
        var response = confirm("Kindly confirm your details\n----------------------------------------------------------\nSTAFF NAME: " + sname + "\nSUBJECT: " + subject );
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-assign-subject?staffno="+staffno+'&sch='+sch+'&id='+id+'&subject='+subject+'&remark='+remark+'&assstaffno='+assstaffno+'&schid='+schid+'&term='+term+'&sess='+sess, true);
		xmlhttp.send();
		//window.location.reload();
	}

}	
		function postCreateBuilding(){
		var buildname= document.getElementById("buildname").value;
		var nroom= document.getElementById("nroom").value;
		if(buildname == ''){alert('This field cannot be blank'); document.getElementById("buildname").focus() = true; return false;}
		if(nroom == ''){alert('This field cannot be blank'); document.getElementById("nroom").focus() = true; return false;}
        var response = confirm("Kindly confirm your posting details\n----------------------------------------------------------\nBUILDING NAME: " + buildname + "\nNO OF ROOM: " + nroom);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-hostel-building?buildname="+buildname+'&nroom='+nroom, true);
		xmlhttp.send();
		document.getElementById("buildname").value = '';
		document.getElementById("nroom").value = '';
		document.getElementById("buildname").focus() = true; 
	}
}

		function postCreateRoom(){
		var building = document.getElementById("building").value;
		var rname= document.getElementById("rname").value;
		if(building == 'Select Building'){alert('This field cannot be blank'); document.getElementById("building").focus() = true; return false;}
		if(rname == ''){alert('This field cannot be blank'); document.getElementById("rname").focus() = true; return false;}
        var response = confirm("Kindly confirm your posting details\n----------------------------------------------------------\nBUILDING NAME: " + building + "\nROOM NAME: " + rname);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-hostel-room?building="+building+'&rname='+rname, true);
		xmlhttp.send();
		document.getElementById("building").value = '';
		document.getElementById("rname").value = '';
		document.getElementById("building").focus() = true; 
	}
}
	
		function postCreateBedSpace(){
		var bspace = document.getElementById("bspace").value;
		var rname= document.getElementById("rname").value;
		var room = $('#rname').find(':selected').text();
		if(bspace == ''){alert('This field cannot be blank'); document.getElementById("building").focus() = true; return false;}
		if(rname == ''){alert('This field cannot be blank'); document.getElementById("rname").focus() = true; return false;}
        var response = confirm("Kindly confirm your posting details\n----------------------------------------------------------\nBEDSPACE: " + bspace + "\nROOM NAME: " + room);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-bedspace?bspace="+bspace+'&rname='+rname, true);
		xmlhttp.send();
		document.getElementById("bspace").value = '';
		document.getElementById("rname").value = '';
		document.getElementById("bspace").focus() = true; 
	}
}

		function getRoom(x){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuc").style.visibility = 'visible';
                document.getElementById("tsuc").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "get-room?x="+x, true);
		xmlhttp.send();
}
		function postAllocateBedSpace(){
		var bspace = document.getElementById("bspace").value;
		var rname= document.getElementById("rname").value;
		var studno= document.getElementById("studno").value;
		var id= document.getElementById("id").value;
		var spb = $('#bspace').find(':selected').text();
		if(bspace == 'Select Bedspace'){alert('Bed space not selected'); document.getElementById("bspace").focus() = true; return false;}
		//if(rname == ''){alert('This field cannot be blank'); document.getElementById("rname").focus() = true; return false;}
       
		 var response = confirm("Kindly confirm your posting details\n----------------------------------------------------------\nBEDSPACE: " + spb + "\nROOM NAME: " + rname );
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-allocate-bedspace?bspace="+bspace+'&rname='+rname+'&studno='+studno+'&id='+id, true);
		xmlhttp.send();
		window.location.reload();
		//document.getElementById("bspace").value = '';
		//document.getElementById("rname").value = '';
		//document.getElementById("bspace").focus() = true; 
	}
}


		function postEditSellingPrice(){
		var iname = document.getElementById("iname").value;
		var usales= document.getElementById("usales").value;
		var cusales= document.getElementById("cusales").value;
		var id= document.getElementById("id").value;

		if(cusales == ''){alert('This field cannot be blank'); document.getElementById("cusales").focus() = true; return false;}
       
		 var response = confirm("Kindly confirm your posting details\n----------------------------------------------------------\nITEM NAME: " + iname + "\nCURRENT PRICE: " + cusales );
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-update-item-price?iname="+iname+'&usales='+usales+'&cusales='+cusales+'&id='+id, true);
		xmlhttp.send();
		window.location.reload();
	}
}
		function getModePayment(i){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("mop").style.visibility = 'visible';
                document.getElementById("mop").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "get-mode-payment?i="+i, true);
		xmlhttp.send();
}
		function getTotAmt(qty){
		var usales = document.getElementById("usales").value;
		var bqty = document.getElementById("bqty").value;
		var tot = qty * usales;
		if(qty==''){
		document.getElementById("totamt").value = 0;
		}
		else
		{
		document.getElementById("totamt").value = tot;
		}
	}
	
		function postSalesTrans(){
		var iname = document.getElementById("iname").value;
		var usales= document.getElementById("usales").value;
		var ucost= document.getElementById("ucost").value;
		var id= document.getElementById("id").value;
		var itemid= document.getElementById("itemid").value;
		var bqty = document.getElementById("bqty").value;
		var sqty = document.getElementById("sqty").value;
		var totamt= document.getElementById("totamt").value;
		var mopay= document.getElementById("mopay").value;
		var paytype= document.getElementById("paytype").value;
		var storename= document.getElementById("storename").value;
		var rno= document.getElementById("rno").value;
		var studid= document.getElementById("studid").value;
		
		if(sqty == ''){alert('This field cannot be blank'); document.getElementById("sqty").focus() = true; return false;}
		if(mopay == 'Select Mode of Payment'){alert('You did not select mode of mayment'); document.getElementById("mopay").focus() = true; return false;}
		if(paytype == 'Payment'){alert('You did not select Payment Type'); document.getElementById("paytype").focus() = true; return false;}
		
		 	var response = confirm("Kindly confirm your posting details\n----------------------------------------------------------\nITEM NAME: " + iname + "\nUNIT PRICE: " + usales + "\nTOTAL AMOUNT: " + totamt );
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-item-sales-trans?iname="+iname+'&usales='+usales+'&ucost='+ucost+'&id='+id+'&bqty='+bqty+'&sqty='+sqty+'&totamt='+totamt+'&mopay='+mopay+'&id='+id+'&bqty='+bqty+'&sqty='+sqty+'&totamt='+totamt+'&mopay='+mopay+'&paytype='+paytype+'&itemid='+itemid+'&storename='+storename+'&rno='+rno+'&studid='+studid, true);
		xmlhttp.send();
		location.href ='receipt.php';
		document.getElementById("sqty").value = '';
		document.getElementById("iname").focus() = true;
		//window.location.reload();
		

	}
}

		function postCreateStore(){
		var sname= document.getElementById("sname").value;
		
		if(sname == ''){alert('This field cannot be blank'); document.getElementById("sname").focus() = true; return false;}

        var response = confirm("Kindly confirm your details before posting\n----------------------------------------------------------\nSTORE NAME: " + sname );
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-create-store-1?sname="+sname, true);
		xmlhttp.send();
		document.getElementById("sname").value = '';
		document.getElementById("sname").focus() = true;			
	}
}
		function postOrderTrans(){
		var itemid= document.getElementById("iname").value;
		var sqty = document.getElementById("sqty").value;
		var mopay= document.getElementById("mopay").value;
		var paytype= document.getElementById("paytype").value;
		var rno= document.getElementById("reno").value;
		//var id= document.getElementById("id").value;
		if(sqty == ''){alert('This field cannot be blank'); document.getElementById("sqty").focus() = true; return false;}
		if(mopay == 'Select Mode of Payment'){alert('You did not select mode of mayment'); document.getElementById("mopay").focus() = true; return false;}
		if(paytype == 'Payment'){alert('You did not select Payment Type'); document.getElementById("paytype").focus() = true; return false;}
		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-item-order-trans?itemid="+itemid+'&sqty='+sqty+'&mopay='+mopay+'&paytype='+paytype+'&rno='+rno, true);
		xmlhttp.send();
		document.getElementById("sqty").value ='';
		document.getElementById("sqty").focus() = true;
		//window.location.reload();
	}
		function postOrderAll(){
		var rno = document.getElementById("rno").value;	
		var studid = document.getElementById("studid").value;
		if(studid == 'Select Student'){alert('You did not select student name'); document.getElementById("studid").focus() = true; return false;}
        var response = confirm("Kindly confirm your Sales details before posting");
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-sales-trans-all?rno="+rno+'&studid='+studid, true);
		xmlhttp.send();
		//location.href ='print-receipt-item.php';
		window.location.reload();
	}
}

function getBalItem(a){
if(a=='Select Item'){alert('You did not select any item'); a.focus()=true; return;}
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("getsucc").style.visibility = 'visible';
                document.getElementById("getsucc").innerHTML = xmlhttp.responseText;
            }
        }			
        xmlhttp.open("GET", "get-item-bal?a="+a, true);
		xmlhttp.send();	

}		
		function loadStudent(){
		var studid= document.getElementById("studid").value;
		if(studid == 'Select Student'){alert('You did not select any student'); document.getElementById("studid").focus() = true; return false;}
		location.href = "fee-reprint-receipt-list?studid="+studid;
}

		function postPurchaseTrans(){
		var curr= document.getElementById("curr").value;
		var tdate= document.getElementById("tdate").value;
		var drledger= document.getElementById("drledger").value;
		var crledger= document.getElementById("crledger").value;
		var amt= document.getElementById("amt").value;
		var id= document.getElementById("id").value;
		var rno= document.getElementById("rno").value;
		var iname= document.getElementById("iname").value;
		var narration= document.getElementById("narration").value;
		var qty= document.getElementById("qty").value;	
		var drled = $('#drledger').find(':selected').text();
		var crled = $('#crledger ').find(':selected').text();
		var amt1 = amt.toLocaleString('en');
		var amt2 = formatter.format(amt);
		
		if(amt == ''){alert('This field cannot be blank'); document.getElementById("lname").focus() = true; return false;}
		if(narration == ''){alert('This field cannot be blank'); document.getElementById("lname").focus() = true; return false;}
		if(tdate == ''){alert('This field cannot be blank'); document.getElementById("lname").focus() = true; return false;}
		if(drledger == 'Select Debit Ledger'){alert('You did not select Account to debit'); document.getElementById("drledger").focus() = true; return false;}
		if(crledger == 'Select Credit Ledger'){alert('You did not select Account to credit'); document.getElementById("crledger").focus() = true; return false;}

        var response = confirm("Kindly confirm your posting details\n----------------------------------------------------------\nDR LEDGER NAME: " + drled + "\nCR LEDGER NAME: " + crled+"\nAMOUNT: "+amt2);
			if(response == false){
				return;
			}else{		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-purchase-trans-1?curr="+curr+'&tdate='+tdate+'&drledger='+drledger+'&crledger='+crledger+'&amt='+amt+'&narration='+narration+'&drled='+drled+'&crled ='+crled+'&id='+id+'&iname='+iname+'&qty='+qty+'&rno='+rno, true);
		xmlhttp.send();
		document.getElementById("drledger").selected = 'Select Debit Ledger';
		document.getElementById("crledger").selected = 'Select Credit Ledger';
		document.getElementById("amt").value = '';
		document.getElementById("narration").value = '';
		document.getElementById("amt").focus() = true;			
	}
}

		function getClassSubject(s){
		//var tno= document.getElementById("tno").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("subd").style.visibility = 'visible';
                document.getElementById("subd").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "getsubject?s="+s, true);
		xmlhttp.send();	
}

function postStudFirstScore(){
	var t1= document.getElementById("test1").value;
	var studid= document.getElementById("studid").value;
	var subject= document.getElementById("subject").value;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-first-score?studid="+studid+'&t1='+t1+'&subject='+subject, true);
		xmlhttp.send();
		window.location.reload();
}

function postStudSecondScore(){
	var t2= document.getElementById("test2").value;
	var studid= document.getElementById("studid").value;
	var subject= document.getElementById("subject").value;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-second-test-score?studid="+studid+'&t2='+t2+'&subject='+subject, true);
		xmlhttp.send();
		window.location.reload();
}

function postStudExamScore(){
	var exam= document.getElementById("exam").value;
	var studid= document.getElementById("studid").value;
	var subject= document.getElementById("subject").value;


        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-exam-score-per-subject?studid="+studid+'&exam='+exam+'&subject='+subject, true);
		xmlhttp.send();
		window.location.reload();
}

function postChangeUser(){
	var id= document.getElementById("id").value;
	var uname= document.getElementById("uname").value;
	var urole= document.getElementById("urole").value;
	var crole= document.getElementById("crole").value;
	var remark= document.getElementById("remark").value;
	

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-change-user-role?id="+id+'&uname='+uname+'&urole='+urole+'&crole='+crole+'&remark='+remark, true);
		xmlhttp.send();
		//window.location.reload();
}


		function attendanceDate(){
		var tdate= document.getElementById("tdate").value;
		var cname= document.getElementById("cname").value;
		if(tdate == ''){alert('You did not select any date'); document.getElementById("tdate").focus() = true; return false;}
		location.href = "post-attendance?tdate="+tdate+'&cname='+cname;
}

function postAttendance(id,s){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tpresent").style.visibility = 'visible';
                document.getElementById("tpresent").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../model/post-present?id="+id+'&status='+s, true);
		xmlhttp.send();
		$("#mydiv").load(location.href + " #mydiv");
}

function postAttendanceAbsent(id){
var status = 'ABSENT';
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tpresent").style.visibility = 'visible';
                document.getElementById("tpresent").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-present?id="+id+'&status='+status, true);
		xmlhttp.send();
		window.location.reload();

}

function postAttendanceReport(){
var tdate= document.getElementById("tdate").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-attendance-report?tdate="+tdate, true);
		xmlhttp.send();

}
function postAttendanceCount(){
var fdate= document.getElementById("fdate").value;
var tdate= document.getElementById("tdate").value;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-attendance-count?fdate="+fdate+'&tdate='+tdate, true);
		xmlhttp.send();

}
	
		
function postResultCriteria(){
var lbound= document.getElementById("lbound").value;
var ubound= document.getElementById("ubound").value;
var grade= document.getElementById("grade").value;
var remark= document.getElementById("remark").value;
if(lbound== ''){alert('This field cannot be empty'); document.getElementById("lbound").focus() = true; return false;}
if(ubound== ''){alert('This field cannot be empty'); document.getElementById("ubound").focus() = true; return false;}
if(grade== ''){alert('This field cannot be empty'); document.getElementById("grade").focus() = true; return false;}
if(remark== ''){alert('This field cannot be empty'); document.getElementById("remark").focus() = true; return false;}

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-result-criteria?lbound="+lbound+'&ubound='+ubound+'&grade='+grade+'&remark='+remark, true);
		xmlhttp.send();

}
	
 function getDeleteResultCriteria(id){
		var response = confirm("Are you sure you want to delete this Result Criteria");
			if(response == false){
				return;
			}
		else{				
	
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("mydiv").style.visibility = 'visible';
                document.getElementById("mydiv").innerHTML = xmlhttp.responseText;
            }
        }	
        
			xmlhttp.open("GET", "post-delete-result-criteria?id="+id, true);
			xmlhttp.send();
			$("#mydiv").load(location.href + " #mydiv");

	
	}		
}


function postAccountTransRpt(){
var fdate= document.getElementById("fdate").value;
var tdate= document.getElementById("tdate").value;
var ledger= document.getElementById("ledgerno").value;
var led = $('#ledgerno').find(':selected').text();

if(tdate== ''){alert('This field cannot be empty'); document.getElementById("tdate").focus() = true; return false;}
if(fdate== ''){alert('This field cannot be empty'); document.getElementById("fdate").focus() = true; return false;}
if(ledger== 'Select Ledger'){alert('You did not select any account'); document.getElementById("ledger").focus() = true; return false;}

window.location.href = "account-statement-details.php?fdate="+fdate+'&tdate='+tdate+'&ledger='+ledger+'&led='+led;
}
 function postAssetsCreation(){
	var agroup= document.getElementById("agroup").value;
	var grpname = $('#agroup').find(':selected').text();
	var aname= document.getElementById("aname").value;
	var amt= document.getElementById("amt").value;
	var pdate= document.getElementById("pdate").value;
	var ano= document.getElementById("ano").value;
	if(aname== ''){alert('This field cannot be empty'); document.getElementById("aname").focus() = true; return false;}
	if(amt== ''){alert('This field cannot be empty'); document.getElementById("amt").focus() = true; return false;}
	if(pdate== ''){alert('This field cannot be empty'); document.getElementById("pdate").focus() = true; return false;}
	if(ano== ''){alert('This field cannot be empty'); document.getElementById("ano").focus() = true; return false;}
	if(agroup== 'Select Asset Group'){alert('This field cannot be empty'); document.getElementById("agroup").focus() = true; return false;}
 
		var response = confirm("Are you sure you want to Register this assets?");
			if(response == false){
				return;
			}
		else{				
	
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("mydiv").style.visibility = 'visible';
                document.getElementById("mydiv").innerHTML = xmlhttp.responseText;
            }
        }	
        
			xmlhttp.open("GET", "post-Assets-creation?agroup="+agroup+'&aname='+aname+'&amt='+amt+'&pdate='+pdate+'&ano='+ano+'&grpname='+grpname, true);
			xmlhttp.send();
			$("#mydiv").load(location.href + " #mydiv");

	
	}		
}
function getRegForm(){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("sregister").style.visibility = 'visible';
                document.getElementById("sregister").innerHTML = xmlhttp.responseText;
            }
        }			
        xmlhttp.open("GET", "add-new-student", true);
		xmlhttp.send();	

}

function loadForm(x){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("formdiv").style.visibility = 'visible';
                document.getElementById("formdiv").innerHTML = xmlhttp.responseText;
            }
        }
		
        xmlhttp.open("GET", "add-testscore-subject", true);
		xmlhttp.send();	
}

function loadForm2(x){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("formdiv").style.visibility = 'visible';
                document.getElementById("formdiv").innerHTML = xmlhttp.responseText;
            }
        }
		
        xmlhttp.open("GET", "add-testscore2", true);
		xmlhttp.send();	
}
function loadForm3(x){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("formdiv").style.visibility = 'visible';
                document.getElementById("formdiv").innerHTML = xmlhttp.responseText;
            }
        }
		
        xmlhttp.open("GET", "add-examscore", true);
		xmlhttp.send();	
}

function lockCA1Scores(){
		var sch= document.getElementById("sch").value;
		var sclass= document.getElementById("sclass").value;
		var cid= document.getElementById("cid").value;
		var cname = $('#cid ').find(':selected').text();
		var schname = $('#sch ').find(':selected').text();
		if(cid == 'Select Class'){alert('You did not select any Class'); document.getElementById("cid").focus() = true; return false;}

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-lock-first-score?cid="+cid+'&cname='+cname+'&sch='+sch+'&sclass='+sclass+'&schname='+schname, true);
		xmlhttp.send();
}

function lockCA2Scores(){
		var sch= document.getElementById("sch").value;
		var sclass= document.getElementById("sclass").value;
		var cid= document.getElementById("cid").value;
		var cname = $('#cid ').find(':selected').text();
		var schname = $('#sch ').find(':selected').text();
		if(cid == 'Select Class'){alert('You did not select any Class'); document.getElementById("cid").focus() = true; return false;}

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-lock-second-score?cid="+cid+'&cname='+cname+'&sch='+sch+'&sclass='+sclass+'&schname='+schname, true);
		xmlhttp.send();
}
function lockExamScores(){
		var sch= document.getElementById("sch").value;
		var sclass= document.getElementById("sclass").value;
		var cid= document.getElementById("cid").value;
		var cname = $('#cid ').find(':selected').text();
		var schname = $('#sch ').find(':selected').text();
		if(cid == 'Select Class'){alert('You did not select any Class'); document.getElementById("cid").focus() = true; return false;}

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-lock-exam-score?cid="+cid+'&cname='+cname+'&sch='+sch+'&sclass='+sclass+'&schname='+schname, true);
		xmlhttp.send();
}

function unLockCA1Scores(){
		var sch= document.getElementById("sch").value;
		var sclass= document.getElementById("sclass").value;
		var cid= document.getElementById("cid").value;
		var cname = $('#cid ').find(':selected').text();
		var schname = $('#sch ').find(':selected').text();
		if(cid == 'Select Class'){alert('You did not select any Class'); document.getElementById("cid").focus() = true; return false;}

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-unlock-first-score?cid="+cid+'&cname='+cname+'&sch='+sch+'&sclass='+sclass+'&schname='+schname, true);
		xmlhttp.send();
}

function unLockCA2Scores(){
		var sch= document.getElementById("sch").value;
		var sclass= document.getElementById("sclass").value;
		var cid= document.getElementById("cid").value;
		var cname = $('#cid ').find(':selected').text();
		var schname = $('#sch ').find(':selected').text();
		if(cid == 'Select Class'){alert('You did not select any Class'); document.getElementById("cid").focus() = true; return false;}

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-unlock-second-score?cid="+cid+'&cname='+cname+'&sch='+sch+'&sclass='+sclass+'&schname='+schname, true);
		xmlhttp.send();
}

function unLockExamScores(){
		var sch= document.getElementById("sch").value;
		var sclass= document.getElementById("sclass").value;
		var cid= document.getElementById("cid").value;
		var cname = $('#cid ').find(':selected').text();
		var schname = $('#sch ').find(':selected').text();
		if(cid == 'Select Class'){alert('You did not select any Class'); document.getElementById("cid").focus() = true; return false;}

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-unlock-exam-score?cid="+cid+'&cname='+cname+'&sch='+sch+'&sclass='+sclass+'&schname='+schname, true);
		xmlhttp.send();
}

function getPsychomoto(){
		var cid= document.getElementById("cid").value;
		var cname = $('#cid ').find(':selected').text();
		if(cid == 'Select Class'){alert('You did not select any Class'); document.getElementById("cid").focus() = true; return false;}
		location.href = "add-psychomoto2?cid="+cid+'&cname='+cname;
}

function psych1(r,p){
		//var p1= document.getElementById("p1").value;
		var cname= document.getElementById("cname").value;
		var studid= document.getElementById("studid").value;
		var classgroup= document.getElementById("classgroup").value;
		var term= document.getElementById("term").value;
		var tsession= document.getElementById("tsession").value;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "post-psychomoto?r="+r+'&cname='+cname+'&studid='+studid+'&classgroup='+classgroup+'&term='+term+'&tsession='+tsession+'&p='+p, true);
		xmlhttp.send();
}

function postPsychomoto(){
		var id= document.getElementById("id").value;
		var r1= document.getElementById("r1").value;
		var r2= document.getElementById("r2").value;
		var r3= document.getElementById("r3").value;
		var r4= document.getElementById("r4").value;
		var r5= document.getElementById("r5").value;
		var r6= document.getElementById("r6").value;
		var r7= document.getElementById("r7").value;
		var r8= document.getElementById("r8").value;
		var r9= document.getElementById("r9").value;
		var r10= document.getElementById("r10").value;
		var r11= document.getElementById("r11").value;
		var r12= document.getElementById("r12").value;
		var r13= document.getElementById("r13").value;
		if(r1 == 'Select Rating'){alert('You did not select any Rating'); document.getElementById("r1").focus() = true; return false;}
		if(r2 == 'Select Rating'){alert('You did not select any Rating'); document.getElementById("r2").focus() = true; return false;}
		if(r3 == 'Select Rating'){alert('You did not select any Rating'); document.getElementById("r3").focus() = true; return false;}
		if(r4 == 'Select Rating'){alert('You did not select any Rating'); document.getElementById("r4").focus() = true; return false;}
		if(r5 == 'Select Rating'){alert('You did not select any Rating'); document.getElementById("r5").focus() = true; return false;}
		if(r6 == 'Select Rating'){alert('You did not select any Rating'); document.getElementById("r6").focus() = true; return false;}
		if(r7 == 'Select Rating'){alert('You did not select any Rating'); document.getElementById("r7").focus() = true; return false;}
		if(r8 == 'Select Rating'){alert('You did not select any Rating'); document.getElementById("r8").focus() = true; return false;}
		if(r9 == 'Select Rating'){alert('You did not select any Rating'); document.getElementById("r9").focus() = true; return false;}
		if(r10 == 'Select Rating'){alert('You did not select any Rating'); document.getElementById("r10").focus() = true; return false;}
		if(r11 == 'Select Rating'){alert('You did not select any Rating'); document.getElementById("r11").focus() = true; return false;}
		if(r12 == 'Select Rating'){alert('You did not select any Rating'); document.getElementById("r12").focus() = true; return false;}
		if(r13 == 'Select Rating'){alert('You did not select any Rating'); document.getElementById("r13").focus() = true; return false;}

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "update-psychomotor?id="+id, true);
		xmlhttp.send();
		$("#mydiv").load(location.href + " #mydiv");
}

		function getResultsPerStudent(){
		var cid= document.getElementById("cid").value;
		var sch= document.getElementById("sch").value;
		var cname = $('#cid ').find(':selected').text();
		var schname = $('#sch ').find(':selected').text();
		if(cid == 'Select Class'){alert('You did not select any Class'); document.getElementById("cid").focus() = true; return false;}
		location.href = "result-per-students?cid="+cid+'&cname='+cname+'&sch='+sch+'&schname='+schname;
}

		function getClass(s){
		//var tno= document.getElementById("tno").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("cdiv").style.visibility = 'visible';
                document.getElementById("cdiv").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "getClass?s="+s, true);
		xmlhttp.send();	
}
		function getClassArm(s){
		//var tno= document.getElementById("tno").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("adiv").style.visibility = 'visible';
                document.getElementById("adiv").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "getClassArm?s="+s, true);
		xmlhttp.send();	
}

		function postGetAccountDetails(){
		var fdate= document.getElementById("fdate").value;
		var tdate= document.getElementById("tdate").value;
		var ledgerno= document.getElementById("ledgerno").value;
		var lname = $('#ledgerno ').find(':selected').text();
		if(fdate == ''){alert('This field cannot be blank'); document.getElementById("fdate").focus() = true; return false;}
		if(tdate == ''){alert('This field cannot be blank'); document.getElementById("tdate").focus() = true; return false;}
		if(ledgerno == 'Select Ledger Account'){alert('You did notr select any account'); document.getElementById("ledgerno").focus() = true; return false;}
		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("gaccount").style.visibility = 'visible';
                document.getElementById("gaccount").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "get-account-statement?fdate="+fdate+'&tdate='+tdate+'&ledgerno='+ledgerno+'&lname='+lname, true);
		xmlhttp.send();	
}

		function editStudentInfo(id,studno){		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("formdiv").style.visibility = 'visible';
                document.getElementById("formdiv").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "edit-student-info?id="+id+'&studno='+studno, true);
		xmlhttp.send();	
}

		function showReport(s){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("formdiv").style.visibility = 'visible';
                document.getElementById("formdiv").innerHTML = xmlhttp.responseText;
            }
        }
        if(s=='Total Student'){
        xmlhttp.open("GET", "../reports/student-listing?s="+s, true);
        }
        if(s=='Total Staff'){
        xmlhttp.open("GET", "../reports/staff-listing?s="+s, true);
        }
		xmlhttp.send();	
}

		function updateProfile(){
		var sname= document.getElementById("sname").value;
		var uname= document.getElementById("uname").value;
		var password= document.getElementById("password").value;
		var phone= document.getElementById("phone").value;
		var email= document.getElementById("email").value;
		var id= document.getElementById("id").value;
		
		if(sname == ''){alert('This field cannot be blank'); document.getElementById("sname").focus() = true; return false;}
		if(uname == ''){alert('This field cannot be blank'); document.getElementById("uname").focus() = true; return false;}
		if(password == ''){alert('This field cannot be blank'); document.getElementById("password").focus() = true; return false;}
		if(phone == ''){alert('This field cannot be blank'); document.getElementById("phone").focus() = true; return false;}
		if(email == ''){alert('This field cannot be blank'); document.getElementById("email").focus() = true; return false;}
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("formdiv").style.visibility = 'visible';
                document.getElementById("formdiv").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../model/update-profile?sname="+sname+'&uname='+uname+'&password='+password+'&phone='+phone+'&email='+email+'&id='+id, true);
		xmlhttp.send();	
}

		function postAttendanceForm(){
		var cname= document.getElementById("cname").value;
		var tdate= document.getElementById("tdate").value;
		
		if(tdate == ''){alert('This field cannot be blank'); document.getElementById("tdate").focus() = true; return false;}
        location.href = "attendance2?cname="+cname+'&tdate='+tdate;

}
