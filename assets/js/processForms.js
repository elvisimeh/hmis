function saveMenu(){
		var mname= document.getElementById("mname").value;
		if(mname == ''){alert('Menu name field is empty'); document.getElementById("mname").focus() = true; return false;}
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../model/add-menu?mname="+mname, true);
        document.getElementById("mname").value = '';
	xmlhttp.send();
}
function saveSubMenu(){
	var menu= document.getElementById("menu").value;
	var smname= document.getElementById("smname").value;
	var fname= document.getElementById("fname").value;
		if(menu == 'Select Menu'){alert('Menu name is not selected'); document.getElementById("menu").focus() = true; return false;}
		if(smname == ''){alert('Submenu name field is empty'); document.getElementById("smname").focus() = true; return false;}
		if(fname == ''){alert('Function name Field is not selected'); document.getElementById("fname").focus() = true; return false;}
		var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../model/add-submenu?smname="+smname+'&menu='+menu+'&fname='+fname, true);
        document.getElementById("smname").value = '';
        document.getElementById("fname").value = '';
        //document.getElementById("smname").focus() = true;
	xmlhttp.send();
}

function getRight(a){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("mydiv").style.visibility = 'visible';
                document.getElementById("mydiv").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "get-user-right?a="+a, true);
	xmlhttp.send();
}
function getSubmenu(a){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("sbsuccess").style.visibility = 'visible';
                document.getElementById("sbsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "get-submenu?a="+a, true);
	xmlhttp.send();
}
function addRights(smenu){
	var menu= document.getElementById("menu").value;
	var uname= document.getElementById("uname").value;
		if(menu == 'Select Menu'){alert('Menu name is not selected'); document.getElementById("menu").focus() = true; return false;}
		if(uname == 'Select User'){alert('Username Field is not selected'); document.getElementById("uname").focus() = true; return false;}
		var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("ursuccess").style.visibility = 'visible';
                document.getElementById("ursuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../model/user-right?smenu="+smenu+'&menu='+menu+'&uname='+uname, true);
	xmlhttp.send();
	$("#mydivr").load(location.href + " #mydivr");
}
function saveRole(){
		var urole= document.getElementById("urole").value;
		if(urole == ''){alert('Role name field is empty'); document.getElementById("urole").focus() = true; return false;}
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../model/add-role?urole="+urole, true);
        document.getElementById("urole").value = '';
	xmlhttp.send();
	document.getElementById("urole").focus() = true;
}

function delRight(id){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("ursuccess").style.visibility = 'visible';
                document.getElementById("ursuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../model/del-right?id="+id, true);
        //$("#mydiv").load(location.href + " #mydiv");
        xmlhttp.send();
}
function saveSbu(){
		var sbu= document.getElementById("sbu").value;
		if(sbu == ''){alert('SBU name field is empty'); document.getElementById("sbu").focus() = true; return false;}
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../model/add-sbu?sbu="+sbu, true);
        document.getElementById("sbu").value = '';
	xmlhttp.send();
}

function saveDept(){
	var sbu= document.getElementById("sbu").value;
	var dept= document.getElementById("dept").value;
		if(sbu == 'Select SBU'){alert('SBU is not selected'); document.getElementById("sbu").focus() = true; return false;}
		if(dept == ''){alert('Dept name field is empty'); document.getElementById("dept").focus() = true; return false;}
		var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../model/add-dept?dept="+dept+'&sbu='+sbu, true);
        document.getElementById("dept").value = '';
	xmlhttp.send();
	document.getElementById("dept").focus() = true;

}
function getDept(id){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("deptsuccess").style.visibility = 'visible';
                document.getElementById("deptsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "get-dept?id="+id, true);
	xmlhttp.send();
}
function saveUnit(){
	var sbu= document.getElementById("sbu").value;
	var dept= document.getElementById("dept").value;
	var unit= document.getElementById("unit").value;
		if(sbu == 'Select SBU'){alert('SBU is not selected'); document.getElementById("sbu").focus() = true; return false;}
		if(dept == 'Select Dept'){alert('Department is not selected'); document.getElementById("dept").focus() = true; return false;}
		if(unit == ''){alert('Unit name field is empty'); document.getElementById("unit").focus() = true; return false;}
		var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../model/add-unit?dept="+dept+'&sbu='+sbu+'&unit='+unit, true);
        document.getElementById("unit").value = '';
	xmlhttp.send();
	document.getElementById("unit").focus() = true;

}
function saveAccountGroup(){
	var acc= document.getElementById("acc").value;
	var agroup= document.getElementById("agroup").value;
		if(acc == 'Select Account'){alert('Account name is not selected'); document.getElementById("acc").focus() = true; return false;}
		if(agroup == ''){alert('Account Group name field is empty'); document.getElementById("agroup").focus() = true; return false;}
		var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../model/account-group?acc="+acc+'&agroup='+agroup, true);
        document.getElementById("agroup").value = '';
	   xmlhttp.send();
	   document.getElementById("agroup").focus() = true;
}
function getSubAccount(fno){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("accsuccess").style.visibility = 'visible';
                document.getElementById("accsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "get-sub-account?fno="+fno, true);
	xmlhttp.send();
}
function saveAccountClass(){
	var acc= document.getElementById("acc").value;
	var acc1= document.getElementById("acc1").value;
	var aclass= document.getElementById("aclass").value;

		if(acc == 'Select Account'){alert('Account name is not selected'); document.getElementById("acc").focus() = true; return false;}
		if(acc1 =='Select Sub Account'){alert('Sub Account name is not selected'); document.getElementById("acc1").focus() = true; return false;}
		if(aclass == ''){alert('Account Class name field is empty'); document.getElementById("aclass").focus() = true; return false;}
		var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		    document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../model/account-subgroup?acc="+acc+'&aclass='+aclass+'&acc1='+acc1, true);
        document.getElementById("aclass").value = '';
	   xmlhttp.send();
	   document.getElementById("aclass").focus() = true;
}
function getAccountClass(sno){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("subaccsuccess").style.visibility = 'visible';
                document.getElementById("subaccsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "get-account-class?sno="+sno, true);
	xmlhttp.send();
}
function saveAccountLedger(){
	var acc= document.getElementById("acc").value;
	var acc1= document.getElementById("acc1").value;
	var aclass= document.getElementById("aclass").value;
	var ledger= document.getElementById("ledger").value;

		if(acc == 'Select Account'){alert('Account name is not selected'); document.getElementById("acc").focus() = true; return false;}
		if(acc1 =='Select Sub Account'){alert('Sub Account name is not selected'); document.getElementById("acc1").focus() = true; return false;}
		if(aclass =='Select Account Class'){alert('Account Class name is not selected'); document.getElementById("aclass").focus() = true; return false;}
		if(ledger == ''){alert('Account Class name field is empty'); document.getElementById("aclass").focus() = true; return false;}
		var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		    document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../model/account-class?acc="+acc+'&aclass='+aclass+'&acc1='+acc1+'&ledger='+ledger, true);
        document.getElementById("ledger").value = '';
	   xmlhttp.send();
	   document.getElementById("ledger").focus() = true;
}
function getAccountLedger(tno){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("ledgeraccsuccess").style.visibility = 'visible';
                document.getElementById("ledgeraccsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "get-account-ledger?tno="+tno, true);
	xmlhttp.send();
}

function saveAccountSubLedger(){
	var acc= document.getElementById("acc").value;
	var acc1= document.getElementById("acc1").value;
	var aclass= document.getElementById("aclass").value;
	var ledger= document.getElementById("ledger").value;
	var sledger= document.getElementById("sledger").value;

		if(acc == 'Select Account'){alert('Account name is not selected'); document.getElementById("acc").focus() = true; return false;}
		if(acc1 =='Select Sub Account'){alert('Sub Account name is not selected'); document.getElementById("acc1").focus() = true; return false;}
		if(aclass =='Select Account Class'){alert('Account Class name is not selected'); document.getElementById("aclass").focus() = true; return false;}
		if(ledger =='Select Account Ledger'){alert('Account ledger name is not selected'); document.getElementById("ledger").focus() = true; return false;}
		if(sledger == ''){alert('Account Class name field is empty'); document.getElementById("sledger").focus() = true; return false;}
		var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		    document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../model/account-subledger?acc="+acc+'&aclass='+aclass+'&acc1='+acc1+'&ledger='+ledger+'&sledger='+sledger, true);
        document.getElementById("sledger").value = '';
	   xmlhttp.send();
	   document.getElementById("sledger").focus() = true;
}

function saveScat(){
		var scat= document.getElementById("scat").value;
		if(scat == ''){alert('Category name field is empty'); document.getElementById("scat").focus() = true; return false;}
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../model/add-service-category?scat="+scat, true);
        document.getElementById("scat").value = '';
	xmlhttp.send();
	document.getElementById("scat").focus() = true;
}
function saveSubcat(){
		var scat= document.getElementById("scat").value;
		var catid= document.getElementById("catid").value;
		if(scat == ''){alert('Subcategory name field is empty'); document.getElementById("scat").focus() = true; return false;}
		if(catid == 'Select Service category'){alert('Category name field is not selected'); document.getElementById("catid").focus() = true; return false;}
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../model/add-subservice-category?scat="+scat+'&catid='+catid, true);
        document.getElementById("scat").value = '';
	xmlhttp.send();
	document.getElementById("scat").focus() = true;
}

function getSubCategory(c){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("scatsuccess").style.visibility = 'visible';
                document.getElementById("scatsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "get-sub-category?c="+c, true);
	xmlhttp.send();
}
function saveService(){
		var catid= document.getElementById("catid").value;
		var scatid= document.getElementById("scatid").value;
		var sname= document.getElementById("sname").value;
		if(sname == ''){alert('Service name field is empty'); document.getElementById("sname").focus() = true; return false;}
		if(catid == 'Select Service category'){alert('Category name field is not selected'); document.getElementById("catid").focus() = true; return false;}
		if(scatid == 'Select Subservice category'){alert('subcategory name field is not selected'); document.getElementById("scatid").focus() = true; return false;}
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../model/add-new-service?scatid="+scatid+'&catid='+catid+'&sname='+sname, true);
        document.getElementById("sname").value = '';
	xmlhttp.send();
	document.getElementById("sname").focus() = true;
}
function saveICat(){
		var cat= document.getElementById("cat").value;
		if(cat == ''){alert('Category name field is empty'); document.getElementById("cat").focus() = true; return false;}
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../model/add-item-category?cat="+cat, true);
        document.getElementById("cat").value = '';
	xmlhttp.send();
	document.getElementById("cat").focus() = true;
}
function saveItemSubcat(){
		var scat= document.getElementById("scat").value;
		var catid= document.getElementById("catid").value;
		if(scat == ''){alert('Subcategory name field is empty'); document.getElementById("scat").focus() = true; return false;}
		if(catid == 'Select Item category'){alert('Category name field is not selected'); document.getElementById("catid").focus() = true; return false;}
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../model/add-item-subcategory?scat="+scat+'&catid='+catid, true);
        document.getElementById("scat").value = '';
	xmlhttp.send();
	document.getElementById("scat").focus() = true;
}
function getItemSubCategory(c){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("scatsuccess").style.visibility = 'visible';
                document.getElementById("scatsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "get-item-subcategory?c="+c, true);
	xmlhttp.send();
}

function saveItem(){
		var catid= document.getElementById("catid").value;
		var scatid= document.getElementById("scatid").value;
		var iname= document.getElementById("iname").value;
		if(iname == ''){alert('Item name field is empty'); document.getElementById("iname").focus() = true; return false;}
		if(catid == 'Select Item category'){alert('Category name field is not selected'); document.getElementById("catid").focus() = true; return false;}
		if(scatid == 'Select Item Subcategory'){alert('subcategory name field is not selected'); document.getElementById("scatid").focus() = true; return false;}
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../model/add-new-item?scatid="+scatid+'&catid='+catid+'&iname='+iname, true);
        document.getElementById("iname").value = '';
	xmlhttp.send();
	document.getElementById("iname").focus() = true;
}
function updatePrivateTariff(id,sname){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "private-tariff1?id="+id+'&sname='+sname, true);
	xmlhttp.send();
}

function savePrivateAmt(){
		var sname= document.getElementById("sname").value;
		var amt= document.getElementById("amt").value;
		var unit= document.getElementById("unit").value;
		var sid= document.getElementById("sid").value;
		if(sname == ''){alert('Item name field is empty'); document.getElementById("sname").focus() = true; return false;}
		if(amt == ''){alert('Amount Field cannot be empty'); document.getElementById("amt").focus() = true; return false;}
		if(unit == 'Select Unit'){alert('Unit name field is not selected'); document.getElementById("unit").focus() = true; return false;}
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("tsuccess").style.visibility = 'visible';
                document.getElementById("tsuccess").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../model/private-tariff?sname="+sname+'&amt='+amt+'&unit='+unit+'&sid='+sid, true);
        document.getElementById("amt").value = '';
	xmlhttp.send();
       $("#workspace").load(location.href + " #workspace");
}


/**
 * 
 * 
 * fd process
 */

 

jQuery('#gender_suffix').change(function(){
    if(jQuery('#gender_suffix').val() == 'Mr' || jQuery('#gender_suffix').val() == 'Master' ){
    jQuery('#gender').val('MALE');
    }

    if(jQuery('#gender_suffix').val() == 'Mrs' || jQuery('#gender_suffix').val() == 'Miss' ){
    jQuery('#gender').val('FEMALE');
    }
   // alert();
});

$('#pat_cat').change(function(){
    $('#load_reg_amt').load('fd/fd_reg_amt?cat='+$('#pat_cat').val());
    $('#load_spec_fee').load('fd/fd_reg_spec_fee?spec='+$('#doctor_spec').val()+'&cat='+$('#pat_cat').val());
});

$('#doctor_spec').change(function(){
    $('#load_doc').load('fd/fd_doctors?spec='+$('#doctor_spec').val());
    $('#load_spec_fee').load('fd/fd_reg_spec_fee?spec='+$('#doctor_spec').val()+'&cat='+$('#pat_cat').val());
});



    jQuery('#first_name').on('keyup',function() {
        jQuery('#first_name').val(( $(this).val().replace(/[?|!@#$&_%*^{} ]/g, "") ));        
    });

    jQuery('#first_name').on('blur',function() {
        jQuery('#first_name').val(( $(this).val().replace(/[?|!@#$&_%*^{} ]/g, "") ));        
    });


    $('#surname').on('keyup',function() {
        $('#surname').val(( $(this).val().replace(/[?|!@#$&_%*^{} ]/g, "") ));
    });

    jQuery('#surname').on('blur',function() {
        jQuery('#surname').val(( $(this).val().replace(/[?|!@#$&_%*^{} ]/g, "") ));
    });

    jQuery('#other_name').on('keyup',function() {
        jQuery('#other_name').val(( $(this).val().replace(/[?|!@#$&_%*^{} ]/g, "") ));
    });

    jQuery('#other_name').on('blur',function() {
        jQuery('#other_name').val(( $(this).val().replace(/[?|!@#$&_%*^{} ]/g, "") ));
    });

    jQuery('#phone').on('keyup',function() {
        jQuery('#phone').val(( $(this).val().replace(/[?|!@#$&_%*^{}a-zA-Z= ]/g, "") ));
    });

    jQuery('#phone').on('blur',function() {
        //jQuery('#phone').val(( $(this).val().replace(/[e]/g, "") ));
        jQuery('#phone').val(( $(this).val().replace(/[?|!@#$&_%*^{}a-zA-Z= ]/g, "") ));
    });

    $('#service_access').change(function(){
        if($('#service_access').is(':checked')){
            //var reg_type = encodeURI($('#reg_type :selected').text().toLowerCase());
            $('#reg_service').prop('checked',false);
          $('#sa').load('fd/fd_service_access.php?rt=deprecated');
          $('#reg_service').val('off');
          $('#service_access').val('on');
           
          $('#submit').val('Register and Post to Doctor');
                    
        }
        else{
        $('#service_access').val('off');
        $('#sa').empty();

        $('#submit').val('Register only');
                 
        }
    });

   /* $('#service_access').change(function(){
        if(!$('#service_access').is(':checked')){
            $('#service_access').val('off');            
        }        
    });*/

    $('#reg_service').change(function(){
        if($('#reg_service').is(':checked')){
            $('#service_access').prop('checked',false);
            $('#service_access').val('off');
            $('#reg_service').val('on');

            $('#sa').load('fd/fd_reg_order.php');

            $('#submit').val('Register and Post Service(s)');            
        }
        else{
            $('#reg_service').val('off');
        $('#sa').empty();

        $('#submit').val('Register only');
        }
    });

    /*$('#reg_type').change(function(){
        var reg_type = encodeURI($('#reg_type :selected').text().toLowerCase());
        
        $('#get_spec').load('fd_specialty.php?rt='+reg_type);
    });*/


    $('#submit').click(function(){
      //alert($('#save_order').val());
                const surname = $('#surname').val();
                const first_name = $('#first_name').val();
                const other_name = $('#other_name').val();
                const gender_suffix = $('#gender_suffix').val();
                const title = $('#title').val();
                const gender = $('#gender').val();
                const dob = $('#dob').val();
                const marital_status = $('#marital_status').val();
                const religion = $('#religion').val();
                const occupation = $('#occupation').val();
                const email = $('#email').val();
                const phone = $('#phone').val();
                const address = $('#address').val();
                const nok = $('#nok').val();
                const nok_phone = $('#nok_phone').val();
                const pat_cat = $('#pat_cat').val();
                const cat = $('#pat_cat :selected').text();
                //const reg_type = $('#reg_type').val();

                const service_access = $('#service_access').val();
                const reg_service = $('#reg_service').val();
                const save_order = $('#save_order').val();

                
                if(service_access == 'on'){
                    var spec = $('#doctor_spec :selected').val();
                    var doc = $('#c_doctor :selected').val();
                }
                else{
                    var spec = null;
                    var doc = null;
                }                
                
            if($('#pat_cat :selected').val() == ''){
                alert('Please select patient\'s category');
                $('#pat_cat').focus();
            }

            if($('#pat_cat :selected').text()=='PRIVATE'){
                
                const private_details = ['surname','first_name','gender_suffix',
                'title','gender','dob','marital_status','religion','occupation','email','phone','address',
                'nok','nok_phone','pat_cat'];
                const private_details_val = [surname,first_name,gender_suffix,
                title,gender,dob,marital_status,religion,occupation,email,phone,address,
                nok,nok_phone,pat_cat];
//alert(private_details);
//console.log(private_details_val);
                //private_details.forEach(check());
                if(private_details_val.includes('') || private_details_val.includes(null)){
                for(let i = 0; i<private_details.length; i++){
                if($('#'+private_details[i]).val()=='' || $('#'+private_details[i]).val()==null ){
                    $('#'+private_details[i]).focus();
                    alert('Please input "'+$('#'+private_details[i]+'_la').text()+'"');
                    return;
                }                
            }
        }
        else{
                    $.post('../model/fd/registration.php', {
                        surname : surname,
                        first_name : first_name,
                        other_name : other_name,
                        gender_suffix : gender_suffix,
                        title : title,
                        gender : gender,
                        dob :dob,
                        marital_status : marital_status,
                        religion : religion,
                        occupation : occupation,
                        email : email,
                        phone : phone,
                        address : address,
                        nok : nok,
                        nok_phone : nok_phone,
                        pat_cat : pat_cat,
                        
                        cat : cat,
                        service_access : service_access,
                        spec : spec,
                        doc : doc,
                        reg_service : reg_service,
                        save_order : save_order
                    },
                    function(data){
                        if(data.trim() != 'no'){
                            var pid = data.trim();
                           $('#workspace').load('fd/fd_reg_success.php');
                           window.open('fd/fd_photo_capture?pid='+pid,'_blank');
                        }
                        else{
                            alert('no');
                        }                                      
                    
                    });
                    
                }
                
            
           /* if($('#surname').val()==''){
            $('#surname').focus();
        }*/
        }
        /** end of private */

        /** beginning of corporate */
        if($('#pat_cat :selected').text()=='CORPORATE'){
                const sponsor = $('#sponsor :selected').val();
                const employee_name = $('#employee_name').val();
                const relation = $('#relation').val();
                const patient_details = ['surname','first_name','other_name','gender_suffix',
                'title','gender','dob','marital_status','religion','occupation','email','phone','address',
                'nok','nok_phone','pat_cat','sponsor','employee_name','relation'];
                const patient_details_val = [surname,first_name,other_name,gender_suffix,
                title,gender,dob,marital_status,religion,occupation,email,phone,address,
                nok,nok_phone,pat_cat,sponsor,employee_name,relation];
//alert(private_details);
                //private_details.forEach(check());
                if(patient_details_val.includes('') || patient_details_val.includes(null)){
                for(let i = 0; i<patient_details.length; i++){
                if($('#'+patient_details[i]).val()=='' || $('#'+patient_details[i]).val()==null ){
                    $('#'+patient_details[i]).focus();
                    alert('Please input "'+$('#'+patient_details[i]+'_la').text()+'"');
                    return;
                }                
            }
        }
        else{
                    $.post('../model/fd/registration.php', {
                        surname : surname,
                        first_name : first_name,
                        other_name : other_name,
                        gender_suffix : gender_suffix,
                        title : title,
                        gender : gender,
                        dob :dob,
                        marital_status : marital_status,
                        religion : religion,
                        occupation : occupation,
                        email : email,
                        phone : phone,
                        address : address,
                        nok : nok,
                        nok_phone : nok_phone,
                        pat_cat : pat_cat,
                        
                        cat : cat,
                        sponsor : sponsor,
                        employee_name : employee_name,
                        relation : relation,
                        reg_service : reg_service,
                        save_order : save_order
                    },
                    function(data){
                        if(data.trim() != 'no'){
                            var pid = data.trim();
                           $('#workspace').load('fd/fd_reg_success.php');
                           window.open('fd/fd_photo_capture?pid='+pid,'_blank');
                        }
                        else{
                            alert('no');
                        }  
                    });
                    
                }               
                       
        }
        /**  End of Corporate  */

        /** Beginning of Insurance */

        if($('#pat_cat :selected').text()=='INSURANCE'){
                const sponsor = $('#sponsor :selected').val();
                const plan_type = $('#plan_type :selected').val();
                const tpa = $('#tpa').val();
                const patient_details = ['surname','first_name','other_name','gender_suffix',
                'title','gender','dob','marital_status','religion','occupation','email','phone','address',
                'nok','nok_phone','pat_cat','sponsor','plan_type','tpa'];
                const patient_details_val = [surname,first_name,other_name,gender_suffix,
                title,gender,dob,marital_status,religion,occupation,email,phone,address,
                nok,nok_phone,pat_cat,sponsor,plan_type,tpa];

                if(patient_details_val.includes('') || patient_details_val.includes(null)){
                for(let i = 0; i<patient_details.length; i++){
                if($('#'+patient_details[i]).val()=='' || $('#'+patient_details[i]).val()==null ){
                    $('#'+patient_details[i]).focus();
                    alert('Please input "'+$('#'+patient_details[i]+'_la').text()+'"');
                    return;
                }                
            }
        }
        else{
                    $.post('../model/fd/registration.php', {
                        surname : surname,
                        first_name : first_name,
                        other_name : other_name,
                        gender_suffix : gender_suffix,
                        title : title,
                        gender : gender,
                        dob :dob,
                        marital_status : marital_status,
                        religion : religion,
                        occupation : occupation,
                        email : email,
                        phone : phone,
                        address : address,
                        nok : nok,
                        nok_phone : nok_phone,
                        pat_cat : pat_cat,
                        
                        cat : cat,
                        sponsor : sponsor,
                        plan : plan_type,
                        tpa : tpa,
                        reg_service : reg_service,
                        save_order : save_order
                    },
                    function(data){
                        if(data.trim() != 'no'){
                            var pid = data.trim();
                           $('#workspace').load('fd/fd_reg_success.php');
                           window.open('fd/fd_photo_capture?pid='+pid,'_blank');
                        }
                        else{
                            alert('no');
                        }  
                    });
                    
                }               
                       
        }

        /** End of Insurance */

        /** Beginning of Family */

        if($('#pat_cat :selected').text()=='FAMILY'){
                const sponsor = $('#sponsor :selected').val();
                
                const patient_details = ['surname','first_name','other_name','gender_suffix',
                'title','gender','dob','marital_status','religion','occupation','email','phone','address',
                'nok','nok_phone','pat_cat','sponsor'];
                const patient_details_val = [surname,first_name,other_name,gender_suffix,
                title,gender,dob,marital_status,religion,occupation,email,phone,address,
                nok,nok_phone,pat_cat,sponsor];

                if(patient_details_val.includes('') || patient_details_val.includes(null)){
                for(let i = 0; i<patient_details.length; i++){
                if($('#'+patient_details[i]).val()=='' || $('#'+patient_details[i]).val()==null ){
                    $('#'+patient_details[i]).focus();
                    alert('Please input "'+$('#'+patient_details[i]+'_la').text()+'"');
                    return;
                }                
            }
        }
        else{
                    $.post('../model/fd/registration.php', {
                        surname : surname,
                        first_name : first_name,
                        other_name : other_name,
                        gender_suffix : gender_suffix,
                        title : title,
                        gender : gender,
                        dob :dob,
                        marital_status : marital_status,
                        religion : religion,
                        occupation : occupation,
                        email : email,
                        phone : phone,
                        address : address,
                        nok : nok,
                        nok_phone : nok_phone,
                        pat_cat : pat_cat,
                       
                        cat : cat,
                        sponsor : sponsor,
                        reg_service : reg_service,
                        save_order : save_order
                    },
                    function(data){
                        if(data.trim() != 'no'){
                            var pid = data.trim();
                           $('#workspace').load('fd/fd_reg_success.php');
                           window.open('fd/fd_photo_capture?pid='+pid,'_blank');
                        }
                        else{
                            alert('no');
                        }  
                    });
                    
                }               
                       
        }

        /** End of Family */
      
    });

    



       /* $('#success_messg').show();
        $('#tablets').trigger('reset');
        setTimeout(function () { 
         $('#success_messg').hide(); 
        }, 5000); */
       //               
      
   
  $('#pat_cat').change(function(){
    if($('#pat_cat :selected').text() == 'CORPORATE'){
        $('#load_extra').load('fd/fd_corporate_field.php');
    }

    if($('#pat_cat :selected').text() == 'PRIVATE'){
        $('#load_extra').empty();
    }

    if($('#pat_cat :selected').text() == 'INSURANCE'){
        $('#load_extra').load('fd/fd_insurance_field.php');
    }

    if($('#pat_cat :selected').text() == 'FAMILY'){
        $('#load_extra').load('fd/fd_family_field.php');
    }

  });

    
  $('#surname').autocomplete({
    source: 'name_suggest.php',
    minLength: 3,
    select: function(e, ui) {
        e.preventDefault();
    }        
});

$('#first_name').autocomplete({
    source: 'name_suggest.php',
    minLength: 3,
    select: function(e, ui) {
        e.preventDefault();
    }        
});

$('#other_name').autocomplete({
    source: 'name_suggest.php',
    minLength: 3,
    select: function(e, ui) {
        e.preventDefault();
    }        
});

function inv_details(vsn,cat){
    $('#workspace').load('lab/investigation_details?vsn='+vsn+'&cat='+cat);
}


$('#pending_details').click(function(){
    var vsn = $(this).attr('data-vsn');
    $('#workspace').load('lab/pending_result_details?vsn='+vsn);
});

function result_pending_details(vsn){
    $('#workspace').load('lab/pending_result_details?vsn='+vsn);
}

function back_to_pending(data){
    var vsn = data;
    $('#workspace').load('lab/pending_result_details?vsn='+vsn);
}

function post_with_template(prn,temp,vsn,id){    
    $('#workspace').load('lab/with_template?temp='+temp+'&prn='+prn+'&vsn='+vsn+'&id='+id);
}

function lab_result_details(id){
    $('#workspace').load('lab/result_details?id='+id);
}

function lab_accept_sample(vsn,test,id,cat){
    var sample = $('#'+id).val();    
    if(sample != ''){
    $.post('../model/lab/accept_sample.php',{
        test : test,
        sample : sample,
        vsn : vsn,
        id : id,
        cat : cat,
    }, function(){      
$("#result").load('lab/inv_details_new?vsn='+vsn+'&cat='+cat);
    });
}
else{
    
    $('#'+id).css('border-color','red');
    $('#error'+id).show();

setTimeout(function(){
    $('#'+id).css('border-color','#cccccc');
    $('#error'+id).hide();
}, 3000);
}
}

function rad_details(vsn,cat){
    $('#workspace').load('rad/rad_details?vsn='+vsn+'&cat='+cat);
}

function rad_accept_pat(vsn,test,id,cat){
    var comment = $('#'+id).val();    
    if(comment != ''){
    $.post('../model/rad/accept_pat.php',{
        test : test,
        comment : comment,
        vsn : vsn,
        id : id,
        cat : cat,
    }, function(){      
$("#result").load('rad/rad_details_new?vsn='+vsn+'&cat='+cat);
    });
}
else{
    
    $('#'+id).css('border-color','red');
    $('#error'+id).show();

setTimeout(function(){
    $('#'+id).css('border-color','#cccccc');
    $('#error'+id).hide();
}, 3000);
}
}

function rad_result_pending_details(vsn){
    $('#workspace').load('rad/pending_result_details?vsn='+vsn);
}

function post_with_rad_result(prn,temp,vsn,id){    
    $('#workspace').load('rad/post_result?temp='+temp+'&prn='+prn+'&vsn='+vsn+'&id='+id);
}
function rad_result_details(id){
    $('#workspace').load('rad/result_details?id='+id);
}