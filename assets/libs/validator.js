// JavaScript Document
function submitContactForm(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	var mtitle = $('#mtitle option:selected').val();
    var fname = $('#fname').val();
	var oname = $('#oname').val();
	var sname = $('#sname').val();
	var address = $('#address').val();
	var dob = $('#dor').val();
	var occup = $('#occup option:selected').val();
	var selgender = $('#selgender option:selected').val();
	var mobile = $('#mobile').val();
	var email = $('#email').val();
	var mc = $('#mc').val();
	var photo = $('#photo').val();

	
    if(mtitle.trim() == 'Select Title' ){
        alert('Please select Title.');
        $('#mtitle').focus();
        return false;
    }else if(fname.trim() == '' ){
        alert('Please enter Firstname.');
        $('#fname').focus();
        return false;
    }else if(sname.trim() == '' ){
        alert('Please enter Surname.');
        $('#sname').focus();
        return false;
    }else if(address.trim() == '' ){
        alert('Please enter Address.');
        $('#address').focus();
        return false;
    }else if(email.trim() != '' && !reg.test(email)){
        alert('Please enter valid email.');
        $('#email').focus();
        return false;
    }else if(occup.trim() == 'Select Occupation' ){
        alert('Please select Occupation.');
        $('#occup').focus();
        return false;
    }else if(selgender.trim() == 'Select Gender' ){
        alert('Please select Gender.');
        $('#selgender').focus();
        return false;
    }else if(mobile.trim() == '' ){
        alert('Please enter Mobile Number.');
        $('#mobile').focus();
        return false;
    }else if(mc.trim() == '' || mc==0){
        alert('Please enter Amount greater than zero.');
        $('#mc').focus();
        return false;
    }else{
        $.ajax({
            type:'POST',
            url:'regmem.php',
			cache:false,
			data:'contactFrmSubmit=1&mtitle='+mtitle+'&fname='+fname+'&oname='+oname+'&sname='+sname+'&address='+address+'&occup='+occup+'&selgender='+selgender+'&mobile='+mobile+'&email='+email+'&mc='+mc+'&dor='+dob+'&photo='+photo,
            beforeSend: function () {
                $('.submitBtn').attr("disabled","disabled");
                $('.modal-body').css('opacity', '.3');
            },
            success:function(msg){
                if(msg == 'ok'){
                    $('#fname').val('');
					$('#oname').val('');
                    $('#sname').val('');
                    $('#address').val('');
					$('#mobile').val('');
					$('#email').val('');
					$('#mc').val('');
                    $('.statusMsg').html('<span style="color:green;">Registration successfull.</p>');
                }else{
					alert(msg);
                    $('.statusMsg').html('<span style="color:red;">Some problems occurred, please try again.</span>');
                }
                $('.submitBtn').removeAttr("disabled");
                $('.modal-body').css('opacity', '');
            }
        });
    }
}

$('#modalForm').on('hidden.bs.modal', function () {
 location.reload();
})
$('#editBox').on('hidden.bs.modal', function () {
 location.reload();
})

function postTransaction(){
    var tdate = $('#tdate').val();
	var pdate = $('#pdate').val();
	var mname = $('#mname').val();
	var mid = $('#mid').val();
	var tt = $('#tt option:selected').val();
	var mc = $('#mc').val();
	var nar = $('#nar').val();
	
	var response = confirm("Are you sure you want to post this transaction \n ---------------------------------------------------------------\n Member name: " + mname + "\n Transaction amount: " + mc + "\n Transaction type: " + tt);
	if(response == false){
		return;
	}else{
		if(mc.trim() == '' || mc==0){
			alert('Please enter Amount greater than zero.');
			$('#mc').focus();
			return false;
		}else if(nar.trim() == ''){
			alert('Please enter Narration.');
			$('#nar').focus();
			return false;
		}else{
			$.ajax({
				type:'POST',
				url:'post-transaction.php',
				cache:false,
				data:'postTransaction=1&tdate='+tdate+'&pdate='+pdate+'&mname='+mname+'&mid='+mid+'&tt='+tt+'&mc='+mc+'&nar='+nar,
				beforeSend: function () {
					$('.submitBtn').attr("disabled","disabled");
					$('.modal-body').css('opacity', '.3');
				},
				success:function(msg){
					if(msg == 'ok'){
						location.reload();
					}else{
						
						$('.statusMsg').html('<span style="color:red;">Some problems occurred, please try again.</span>');
					}
					$('.submitBtn').removeAttr("disabled");
					$('.modal-body').css('opacity', '');
				}
			});
		}
	}
}

function postPayment(){
	var tid = $('#tid').val();
    var tdate = $('#tdate').val();
	var pdate = $('#pdate').val();
	var mname = $('#mname').val();
	var mid = $('#mid').val();
	var tt = $('#tt').val();
	var mc = $('#mc').val();
	var nar = $('#nar').val();
	
	var response = confirm("Are you sure you want to post this transaction \n ---------------------------------------------------------------\n Member name: " + mname + "\n Transaction amount: " + mc + "\n Transaction type: " + tt);
	if(response == false){
		return;
	}else{
		if(mc.trim() == '' || mc==0){
			alert('Please enter Amount greater than zero.');
			$('#mc').focus();
			return false;
		}else if(nar.trim() ==''){
			alert('Please enter Narration.');
			$('#nar').focus();
			return false;
		}else{
			$.ajax({
				type:'POST',
				url:'post-payment.php',
				cache:false,
				data:'postPayment=1&tdate='+tdate+'&pdate='+pdate+'&mname='+mname+'&mid='+mid+'&tt='+tt+'&mc='+mc+'&nar='+nar+'&tid='+tid,
				beforeSend: function () {
					$('.submitBtn').attr("disabled","disabled");
					$('.modal-body').css('opacity', '.3');
				},
				success:function(msg){
					if(msg == 'ok'){
						location.reload();
					}else{
						
						$('.statusMsg').html('<span style="color:red;">Some problems occurred, please try again.</span>');
					}
					$('.submitBtn').removeAttr("disabled");
					$('.modal-body').css('opacity', '');
				}
			});
		}
	}
}

function postSpecialDeposit(){
	var tid = $('#tid').val();
    var tdate = $('#tdate').val();
	var pdate = $('#pdate').val();
	var mname = $('#mname').val();
	var mid = $('#mid').val();
	var tt = $('#tt').val();
	var mc = $('#mc').val();
	var nar = $('#nar').val();
	
	var response = confirm("Are you sure you want to post this transaction \n ---------------------------------------------------------------\n Member name: " + mname + "\n Transaction amount: " + mc + "\n Transaction type: " + tt);
	if(response == false){
		return;
	}else{
		if(mc.trim() == '' || mc==0){
			alert('Please enter Amount greater than zero.');
			$('#mc').focus();
			return false;
		}else if(nar.trim() ==''){
			alert('Please enter Narration.');
			$('#nar').focus();
			return false;
		}else{
			$.ajax({
				type:'POST',
				url:'post-deposit.php',
				cache:false,
				data:'postPayment=1&tdate='+tdate+'&pdate='+pdate+'&mname='+mname+'&mid='+mid+'&tt='+tt+'&mc='+mc+'&nar='+nar+'&tid='+tid,
				beforeSend: function () {
					$('.submitBtn').attr("disabled","disabled");
					$('.modal-body').css('opacity', '.3');
				},
				success:function(msg){
					if(msg == 'ok'){
						location.reload();
					}else{
						//alert(msg);
						$('.statusMsg').html('<span style="color:red;">Some problems occurred, please try again.</span>');
					}
					$('.submitBtn').removeAttr("disabled");
					$('.modal-body').css('opacity', '');
				}
			});
		}
	}
}

function postSharesPurchased(){
	var tid = $('#tid').val();
    var tdate = $('#tdate').val();
	var pdate = $('#pdate').val();
	var mname = $('#mname').val();
	var mid = $('#mid').val();
	var tt = $('#tt').val();
	var mc = $('#mc').val();
	var nar = $('#nar').val();
	
	var response = confirm("Are you sure you want to post this transaction \n ---------------------------------------------------------------\n Member name: " + mname + "\n Transaction amount: " + mc + "\n Transaction type: " + tt);
	if(response == false){
		return;
	}else{
		if(mc.trim() == '' || mc==0){
			alert('Please enter Amount greater than zero.');
			$('#mc').focus();
			return false;
		}else if(nar.trim() ==''){
			alert('Please enter Narration.');
			$('#nar').focus();
			return false;
		}else{
			$.ajax({
				type:'POST',
				url:'post-deposit.php',
				cache:false,
				data:'postPayment=1&tdate='+tdate+'&pdate='+pdate+'&mname='+mname+'&mid='+mid+'&tt='+tt+'&mc='+mc+'&nar='+nar+'&tid='+tid,
				beforeSend: function () {
					$('.submitBtn').attr("disabled","disabled");
					$('.modal-body').css('opacity', '.3');
				},
				success:function(msg){
					if(msg == 'ok'){
						location.reload();
					}else{
						
						$('.statusMsg').html('<span style="color:red;">Some problems occurred, please try again.</span>');
					}
					$('.submitBtn').removeAttr("disabled");
					$('.modal-body').css('opacity', '');
				}
			});
		}
	}
}
function postWithdrawals(){
	var tid = $('#tid').val();
    var tdate = $('#tdate').val();
	var pdate = $('#pdate').val();
	var mname = $('#mname').val();
	var mid = $('#mid').val();
	var tt = $('#tt').val();
	var mc1 = $('#mc').val();
	var nar = $('#nar').val();
	var accb = $('#acb2').val();
	
	var response = confirm("Are you sure you want to post this transaction \n ---------------------------------------------------------------\n Member name: " + mname + "\n Transaction amount: " + mc1 + "\n Transaction type: " + tt);
	
	if(response == false){
		return;
	}else{
		if(accb < parseInt(mc1)){		
			alert('Cannot withdraw more than account balance.');
			//$('#mc').val('');
			$('#acb2').focus();
			return false;
		}
		if(mc1.trim() == '' || mc1==0){
			alert('Please enter Amount greater than zero.');
			$('#mc').focus();
			return false;
		}else if(nar.trim() ==''){
			alert('Please enter Narration.');
			$('#nar').focus();
			return false;
		}else{
			$.ajax({
				type:'POST',
				url:'post-withdrawals.php',
				cache:false,
				data:'postWithdraw=1&tdate='+tdate+'&pdate='+pdate+'&mname='+mname+'&mid='+mid+'&tt='+tt+'&mc='+mc1+'&nar='+nar+'&tid='+tid,
				beforeSend: function () {
					$('.submitBtn').attr("disabled","disabled");
					$('.modal-body').css('opacity', '.3');
				},
				success:function(msg){
					if(msg == 'ok'){
						
						location.reload();
					}else{
						
						$('.statusMsg').html('<span style="color:red;">Some problems occurred, please try again.</span>');
					}
					$('.submitBtn').removeAttr("disabled");
					$('.modal-body').css('opacity', '');
				}
			});
		}
	}
}

function postInterestIncome(){
    var tdate = $('#tdate').val();
	var pdate = $('#pdate').val();
	var drcc = $('#drcc').val();
	var tt = $('#tt').val();
	var mc1 = $('#iamt').val();
	var nar = $('#nar').val();

	
	var response = confirm("Are you sure you want to post this transaction \n ---------------------------------------------------------------\n Credit Account: " + drcc + "\n Transaction amount: " + mc1 + "\n Debit Account: " + tt);
	
	if(response == false){
		return;
	}else{
		
		if(mc1.trim() == '' || mc1==0){
			alert('Please enter Amount greater than zero.');
			$('#mc').focus();
			return false;
		}else if(nar.trim() ==''){
			alert('Please enter Narration.');
			$('#nar').focus();
			return false;
		}else{
			$.ajax({
				type:'POST',
				url:'post-interest-income.php',
				cache:false,
				data:'postInterestIncome=1&tdate='+tdate+'&pdate='+pdate+'&drcc='+drcc+'&tt='+tt+'&mc='+mc1+'&nar='+nar,
				beforeSend: function () {
					$('.submitBtn').attr("disabled","disabled");
					$('.modal-body').css('opacity', '.3');
				},
				success:function(msg){
					if(msg == 'ok'){
						
						location.reload();
					}else{
						
						$('.statusMsg').html('<span style="color:red;">Some problems occurred, please try again.</span>');
					}
					$('.submitBtn').removeAttr("disabled");
					$('.modal-body').css('opacity', '');
				}
			});
		}
	}
}

function postDividend(){
    var intacc = $('#intacc option:selected').val();
	var perdiv = $('#perdiv').val();
	
	var response = confirm("Are you sure you want to post this transaction \n ---------------------------------------------------------------\n Percentage Dividend: " + perdiv + "%\n Transaction Type: POST DIVIDEND");
	if(response == false){
		return;
	}else{
		if(intacc.trim() == 'Select Interest Account'){
			alert('Please Select Interest Account.');
			$('#intacc').focus();
			return false;
		}else if(perdiv.trim() =='' || parseInt(perdiv == 0)){
			alert('Percentage must be greater than zero (0).');
			$('#perdiv').focus();
			return false;
		}else{
			$.ajax({
				type:'POST',
				url:'postDividend.php',
				cache:false,
				data:'postDividend=1&intacc='+intacc+'&perdiv='+perdiv,
				beforeSend: function () {
					$('.submitBtn').attr("disabled","disabled");
					$('.modal-body').css('opacity', '.3');
				},
				success:function(msg){
					if(msg == 'ok'){
						
						location.reload();
					}else{
						
						$('.statusMsg').html('<span style="color:red;">Some problems occurred, please try again.</span>');
					}
					$('.submitBtn').removeAttr("disabled");
					$('.modal-body').css('opacity', '');
				}
			});
		}
	}
}

function callBal(str){
    if (str.length == 0) { 
      location.reload()
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("divamt").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "get bal.php?n="+str, true);
        xmlhttp.send();
    }
}

function loadCompanyByName(str) {
	if(str.length <3){
		return;
	}
    if (str.length == 0) { 
        document.getElementById("coylisting").innerHTML = "";
		location.reload();
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				//document.getElementById("coylisting").style.visibility = 'visible';
                document.getElementById("coylisting").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "load-company-by-name?n=" + str, true);
        xmlhttp.send();
    }
}