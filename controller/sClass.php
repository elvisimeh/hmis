<?php
class sClass{
 
    // database connection and table name
    private $conn;
    private $table_name = "secondclass";
    private $table_name1 = "thirdclass";
    private $table_name2 = "accum_ledgers";
    //private $table_name3 = "ledgers_balances";
    private $table_name4 = "daily_ledgers";
    private $table_name5 = "transactions";
    private $table_name6 = "audit_log_tbl";
    private $table_name7 = "dept_tbl";
    private $table_name8 = "users_tbl";
    private $table_name9 = "suppliers_tbl";
    private $table_name10 = "school_tbl";
    private $table_name11 = "class_group";
    private $table_name12 = "class_tbl";
    private $table_name13 = "subject_group";
    private $table_name14 = "subject_tbl";
    private $table_name15 = "sponsor_tbl";
    private $table_name16 = "student_tbl";
    private $table_name17 = "formno";
    private $table_name18 = "sch_session";
    private $table_name19 = "student_class_tbl";
    private $table_name20 = "fees_tbl";
    private $table_name21 = "debtor_tbl";
    private $table_name22 = "receiptno";
    private $table_name23 = "item_tbl";
    private $table_name24 = "item_group_tbl";
    private $table_name25 = "po_temp_tbl";
    private $table_name26 = "gen_po_num";
    private $table_name27 = "po_tbl";
    private $table_name28 = "central_stock_tbl";
    private $table_name29 = "purchase_tbl";
    private $table_name30 = "term_tbl";
    private $table_name31 = "termly_result_tbl";
    private $table_name32 = "designation_tbl";
    private $table_name33 = "staff_tbl";
    private $table_name34 = "staff_class_tbl";
    private $table_name35 = "staff_subject_tbl";
    private $table_name36 = "building_tbl";
    private $table_name37 = "room_tbl";
    private $table_name38 = "bedspace_tbl";
    private $table_name39 = "allocate_bed_tbl";
    private $table_name40 = "store_tbl";
    private $table_name41 = "sales_tbl";
    private $table_name42 = "sales_temp_tbl";
    private $table_name43 = "user_role_change_log";
    private $table_name44 = "attendance_tbl";
    private $table_name45 = "result_setup_tbl";
    private $table_name46 = "teacher_remark";
    private $table_name47 = "principal_remark";
    private $table_name48 = "work_habit";
    private $table_name49 = "behavioural_rating";
    private $table_name50 = "term_result_summary";
    private $table_name51 = "assets_tbl";
    private $table_name52 = "lesson_note";
    private $table_name53 = "seconday_ca_one_tbl";
    private $table_name54 = "seconday_ca_two_tbl";
    private $table_name55 = "seconday_exam_tbl";
    private $table_name56 = "seconday_broad_sheet_tbl";
    private $table_name57 = "psychomoto_tbl";
    private $table_name58 = "junior_seconday_ca_one_tbl";
    private $table_name59 = "junior_seconday_ca_two_tbl";
    private $table_name60 = "junior_seconday_exam_tbl";
    private $table_name61 = "junior_seconday_broad_sheet_tbl";
    private $table_name62 = "primary_ca_one_tbl";
    private $table_name63 = "primary_ca_two_tbl";
    private $table_name64 = "primary_exam_tbl";
    private $table_name65 = "primary_broad_sheet_tbl";
    private $table_name66 = "nursery_ca_one_tbl";
    private $table_name67 = "nursery_ca_two_tbl";
    private $table_name68 = "nursery_exam_tbl";
    private $table_name69 = "nursery_broad_sheet_tbl";


    public $fno;
    public $sno;
    public $lname;
    public $tno;
    public $ccode;
    public $ledgerno;
    public $bcode;
    public $curr;
    public $tdate;
    public $drledger;
    public $crledger;
    public $amt; 
    public $narration;
    public $deptname;  
    
    public $sname; 
    public $cname;
    public $phone;    
    public $email; 
    
    public function __construct($db){
        $this->conn = $db;
    }
     function generateFormNo(){   
    
        $query = "INSERT INTO
                    " . $this->table_name17 . "
                SET
                    formno=:formno, ccode=:ccode, status=:status";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->formno=htmlspecialchars(strip_tags($this->formno));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
        $this->status=htmlspecialchars(strip_tags($this->status));
 
        // bind values 
        $stmt->bindParam(":formno", $this->formno);
        $stmt->bindParam(":ccode", $this->ccode);
        $stmt->bindParam(":status", $this->status);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }  

     function generateReceiptNo(){   
    
        $query = "INSERT INTO
                    " . $this->table_name22 . "
                SET
                    rno=:rno, ccode=:ccode, status=:status";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->rno=htmlspecialchars(strip_tags($this->rno));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
        $this->status=htmlspecialchars(strip_tags($this->status));
 
        // bind values 
        $stmt->bindParam(":rno", $this->rno);
        $stmt->bindParam(":ccode", $this->ccode);
        $stmt->bindParam(":status", $this->status);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }  

    // create Second Class of Accounts
    function create(){   
    
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    fno=:fno, sno=:sno, sname=:sname, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->fno=htmlspecialchars(strip_tags($this->fno));
        $this->sno=htmlspecialchars(strip_tags($this->sno));
        $this->sname=htmlspecialchars(strip_tags($this->sname));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
 
        // bind values 
        $stmt->bindParam(":fno", $this->fno);
        $stmt->bindParam(":sno", $this->sno);
        $stmt->bindParam(":sname", $this->sname);
        $stmt->bindParam(":ccode", $this->ccode);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }  
   
    function createAcc(){   
    
        $query = "INSERT INTO
                    " . $this->table_name1 . "
                SET
                    fno=:fno, sno=:sno, tno=:tno, tname=:tname, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->fno=htmlspecialchars(strip_tags($this->fno));
        $this->sno=htmlspecialchars(strip_tags($this->sno));
        $this->tno=htmlspecialchars(strip_tags($this->tno));
        $this->tname=htmlspecialchars(strip_tags($this->tname));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
 
        // bind values 
        $stmt->bindParam(":fno", $this->fno);
        $stmt->bindParam(":sno", $this->sno);
        $stmt->bindParam(":tno", $this->tno);
        $stmt->bindParam(":tname", $this->tname);
        $stmt->bindParam(":ccode", $this->ccode);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }  
   
   
    function createLedger(){   
    
        $query = "INSERT INTO
                    " . $this->table_name2 . "
                SET
                    fno=:fno, sno=:sno, tno=:tno, ledgerno=:ledgerno, ledgername=:ledgername, bcode=:bcode, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->fno=htmlspecialchars(strip_tags($this->fno));
        $this->sno=htmlspecialchars(strip_tags($this->sno));
        $this->tno=htmlspecialchars(strip_tags($this->tno));
        $this->ledgerno=htmlspecialchars(strip_tags($this->ledgerno));
        $this->ledgername=htmlspecialchars(strip_tags($this->ledgername));
        $this->bcode=htmlspecialchars(strip_tags($this->bcode));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
 
        // bind values 
        $stmt->bindParam(":fno", $this->fno);
        $stmt->bindParam(":sno", $this->sno);
        $stmt->bindParam(":tno", $this->tno);
        $stmt->bindParam(":ledgerno", $this->ledgerno);
        $stmt->bindParam(":ledgername", $this->ledgername);
        $stmt->bindParam(":bcode", $this->bcode);
        $stmt->bindParam(":ccode", $this->ccode);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }  
   
    function createLedger2(){   
    
        $query = "INSERT INTO
                    " . $this->table_name3 . "
                SET
                    fno=:fno, sno=:sno, tno=:tno, ledgerno=:ledgerno, bcode=:bcode, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->fno=htmlspecialchars(strip_tags($this->fno));
        $this->sno=htmlspecialchars(strip_tags($this->sno));
        $this->tno=htmlspecialchars(strip_tags($this->tno));
        $this->ledgerno=htmlspecialchars(strip_tags($this->ledgerno));
        $this->bcode=htmlspecialchars(strip_tags($this->bcode));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
 
        // bind values 
        $stmt->bindParam(":fno", $this->fno);
        $stmt->bindParam(":sno", $this->sno);
        $stmt->bindParam(":tno", $this->tno);
        $stmt->bindParam(":ledgerno", $this->ledgerno);
        $stmt->bindParam(":bcode", $this->bcode);
        $stmt->bindParam(":ccode", $this->ccode);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }  
   
       function createLedger3(){   
    
        $query = "INSERT INTO
                    " . $this->table_name4 . "
                SET
                    pdate=:pdate, fno=:fno, sno=:sno, tno=:tno, ledgerno=:ledgerno, bcode=:bcode, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->pdate=htmlspecialchars(strip_tags($this->pdate));
        $this->fno=htmlspecialchars(strip_tags($this->fno));
        $this->sno=htmlspecialchars(strip_tags($this->sno));
        $this->tno=htmlspecialchars(strip_tags($this->tno));
        $this->ledgerno=htmlspecialchars(strip_tags($this->ledgerno));
        $this->bcode=htmlspecialchars(strip_tags($this->bcode));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
 
        // bind values 
        $stmt->bindParam(":pdate", $this->pdate);
        $stmt->bindParam(":fno", $this->fno);
        $stmt->bindParam(":sno", $this->sno);
        $stmt->bindParam(":tno", $this->tno);
        $stmt->bindParam(":ledgerno", $this->ledgerno);
        $stmt->bindParam(":bcode", $this->bcode);
        $stmt->bindParam(":ccode", $this->ccode);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }  
       function postTransactions(){   
    
        $query = "INSERT INTO
                    " . $this->table_name5 . "
                SET
                    drledger=:drledger, crledger=:crledger, amt=:amt, dramt=:dramt, cramt=:cramt, curr=:curr, ttime=:ttime, tdate=:tdate, pdate=:pdate, narration=:narration, postedbyid=:postedbyid, bcode=:bcode, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        
        $this->drledger=htmlspecialchars(strip_tags($this->drledger));
        $this->crledger=htmlspecialchars(strip_tags($this->crledger));
        $this->amt=htmlspecialchars(strip_tags($this->amt));
        $this->dramt=htmlspecialchars(strip_tags($this->dramt));
        $this->cramt=htmlspecialchars(strip_tags($this->cramt));
        $this->curr=htmlspecialchars(strip_tags($this->curr));
        $this->ttime=htmlspecialchars(strip_tags($this->ttime)); 
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->pdate=htmlspecialchars(strip_tags($this->pdate));
        $this->narration=htmlspecialchars(strip_tags($this->narration));
		$this->postedbyid=htmlspecialchars(strip_tags($this->postedbyid));
        $this->bcode=htmlspecialchars(strip_tags($this->bcode));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
 
        // bind values 
        $stmt->bindParam(":drledger", $this->drledger);
        $stmt->bindParam(":crledger", $this->crledger);
        $stmt->bindParam(":amt", $this->amt);
        
        $stmt->bindParam(":dramt", $this->dramt);
        $stmt->bindParam(":cramt", $this->cramt);
        $stmt->bindParam(":curr", $this->curr);
        $stmt->bindParam(":ttime", $this->ttime);
        
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":pdate", $this->pdate);
        $stmt->bindParam(":narration", $this->narration);
        $stmt->bindParam(":postedbyid", $this->postedbyid);
        $stmt->bindParam(":bcode", $this->bcode);
        $stmt->bindParam(":ccode", $this->ccode);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
    
       function postTransactionsFee(){   
    
        $query = "INSERT INTO
                    " . $this->table_name5 . "
                SET
                    drledger=:drledger, crledger=:crledger, amt=:amt, dramt=:dramt, cramt=:cramt, curr=:curr, ttime=:ttime, tdate=:tdate, pdate=:pdate, narration=:narration, postedbyid=:postedbyid, bcode=:bcode, ccode=:ccode, studid=:studid, receiptno=:receiptno, qty=:qty, item=:item, term=:term, asession=:asession";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        
        $this->drledger=htmlspecialchars(strip_tags($this->drledger));
        $this->crledger=htmlspecialchars(strip_tags($this->crledger));
        $this->amt=htmlspecialchars(strip_tags($this->amt));
        $this->dramt=htmlspecialchars(strip_tags($this->dramt));
        $this->cramt=htmlspecialchars(strip_tags($this->cramt));
        $this->curr=htmlspecialchars(strip_tags($this->curr));
        $this->ttime=htmlspecialchars(strip_tags($this->ttime)); 
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->pdate=htmlspecialchars(strip_tags($this->pdate));
        $this->narration=htmlspecialchars(strip_tags($this->narration));
		$this->postedbyid=htmlspecialchars(strip_tags($this->postedbyid));
        $this->bcode=htmlspecialchars(strip_tags($this->bcode));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
 		$this->studid=htmlspecialchars(strip_tags($this->studid));
 		$this->receiptno=htmlspecialchars(strip_tags($this->receiptno));
 		$this->qty=htmlspecialchars(strip_tags($this->qty));
 		$this->item=htmlspecialchars(strip_tags($this->item));
 		$this->term=htmlspecialchars(strip_tags($this->term));
 		$this->asession=htmlspecialchars(strip_tags($this->asession));
        // bind values 
        $stmt->bindParam(":drledger", $this->drledger);
        $stmt->bindParam(":crledger", $this->crledger);
        $stmt->bindParam(":amt", $this->amt);
        
        $stmt->bindParam(":dramt", $this->dramt);
        $stmt->bindParam(":cramt", $this->cramt);
        $stmt->bindParam(":curr", $this->curr);
        $stmt->bindParam(":ttime", $this->ttime);
        
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":pdate", $this->pdate);
        $stmt->bindParam(":narration", $this->narration);
        $stmt->bindParam(":postedbyid", $this->postedbyid);
        $stmt->bindParam(":bcode", $this->bcode);
        $stmt->bindParam(":ccode", $this->ccode);
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":receiptno", $this->receiptno);
        $stmt->bindParam(":qty", $this->qty);
        $stmt->bindParam(":item", $this->item);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":asession", $this->asession);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }  

       function postTransactionsItem(){   
    
        $query = "INSERT INTO
                    " . $this->table_name5 . "
                SET
                    drledger=:drledger, crledger=:crledger, amt=:amt, dramt=:dramt, cramt=:cramt, curr=:curr, ttime=:ttime, tdate=:tdate, pdate=:pdate, narration=:narration, postedbyid=:postedbyid, bcode=:bcode, ccode=:ccode, studid=:studid, receiptno=:receiptno, qty=:qty, item=:item";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        
        $this->drledger=htmlspecialchars(strip_tags($this->drledger));
        $this->crledger=htmlspecialchars(strip_tags($this->crledger));
        $this->amt=htmlspecialchars(strip_tags($this->amt));
        $this->dramt=htmlspecialchars(strip_tags($this->dramt));
        $this->cramt=htmlspecialchars(strip_tags($this->cramt));
        $this->curr=htmlspecialchars(strip_tags($this->curr));
        $this->ttime=htmlspecialchars(strip_tags($this->ttime)); 
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->pdate=htmlspecialchars(strip_tags($this->pdate));
        $this->narration=htmlspecialchars(strip_tags($this->narration));
		$this->postedbyid=htmlspecialchars(strip_tags($this->postedbyid));
        $this->bcode=htmlspecialchars(strip_tags($this->bcode));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
        $this->studid=htmlspecialchars(strip_tags($this->studid));
 		$this->receiptno=htmlspecialchars(strip_tags($this->receiptno));
 		$this->qty=htmlspecialchars(strip_tags($this->qty));
 		$this->item=htmlspecialchars(strip_tags($this->item));
        // bind values 
        $stmt->bindParam(":drledger", $this->drledger);
        $stmt->bindParam(":crledger", $this->crledger);
        $stmt->bindParam(":amt", $this->amt);
        
        $stmt->bindParam(":dramt", $this->dramt);
        $stmt->bindParam(":cramt", $this->cramt);
        $stmt->bindParam(":curr", $this->curr);
        $stmt->bindParam(":ttime", $this->ttime);
        
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":pdate", $this->pdate);
        $stmt->bindParam(":narration", $this->narration);
        $stmt->bindParam(":postedbyid", $this->postedbyid);
        $stmt->bindParam(":bcode", $this->bcode);
        $stmt->bindParam(":ccode", $this->ccode);
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":receiptno", $this->receiptno);
        $stmt->bindParam(":qty", $this->qty);
        $stmt->bindParam(":item", $this->item);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }  
  
    function saveAuditLog(){   
    
        $query = "INSERT INTO
                    " . $this->table_name6 . "
                SET
                    tdate=:tdate, ttime=:ttime, transno=:transno, description=:description, postedbyid =:postedbyid, link_visited =:link_visited, action_taken =:action_taken, bcode=:bcode, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->ttime=htmlspecialchars(strip_tags($this->ttime));
        $this->transno=htmlspecialchars(strip_tags($this->transno));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->postedbyid=htmlspecialchars(strip_tags($this->postedbyid));
        $this->link_visited=htmlspecialchars(strip_tags($this->link_visited));
        $this->action_taken=htmlspecialchars(strip_tags($this->action_taken));        
        $this->bcode=htmlspecialchars(strip_tags($this->bcode));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
 
        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":ttime", $this->ttime);
        $stmt->bindParam(":transno", $this->transno);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":postedbyid", $this->postedbyid);
        $stmt->bindParam(":link_visited", $this->link_visited);
        $stmt->bindParam(":action_taken", $this->action_taken);
        $stmt->bindParam(":bcode", $this->bcode);
        $stmt->bindParam(":ccode", $this->ccode);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }  
    function createDept(){   
    
        $query = "INSERT INTO
                    " . $this->table_name7 . "
                SET
                    deptname=:deptname, bcode=:bcode, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->deptname=htmlspecialchars(strip_tags($this->deptname));
        $this->bcode=htmlspecialchars(strip_tags($this->bcode));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
 
        // bind values 
        $stmt->bindParam(":deptname", $this->deptname);
        $stmt->bindParam(":bcode", $this->bcode);
        $stmt->bindParam(":ccode", $this->ccode);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }  
    function createUser(){   
    
        $query = "INSERT INTO
                    " . $this->table_name8 . "
                SET
                    cdate=:cdate, staffname=:staffname, dept=:dept, access=:access, username=:username, password=:password, email=:email, phone=:phone, bcode=:bcode, ccode=:ccode, expirydate=:expirydate, status=:status";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->cdate=htmlspecialchars(strip_tags($this->cdate));
        $this->staffname=htmlspecialchars(strip_tags($this->staffname));
        $this->dept=htmlspecialchars(strip_tags($this->dept));
        $this->access=htmlspecialchars(strip_tags($this->access));
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->phone=htmlspecialchars(strip_tags($this->phone));
        $this->bcode=htmlspecialchars(strip_tags($this->bcode));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
        $this->expirydate=htmlspecialchars(strip_tags($this->expirydate));
        $this->status=htmlspecialchars(strip_tags($this->status));
 
        // bind values 
        $stmt->bindParam(":cdate", $this->cdate);
        $stmt->bindParam(":staffname", $this->staffname);
        $stmt->bindParam(":dept", $this->dept);
        $stmt->bindParam(":access", $this->access);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":bcode", $this->bcode);
        $stmt->bindParam(":ccode", $this->ccode);
        $stmt->bindParam(":expirydate", $this->expirydate);
        $stmt->bindParam(":status", $this->status);

 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }  

    function createSupplier(){   
    
        $query = "INSERT INTO
                    " . $this->table_name9 . "
                SET
                    tdate=:tdate, sname=:sname, cname=:cname, phone=:phone, email=:email, bcode=:bcode, ccode=:ccode, ledgerno=:ledgerno, bank=:bank,acc=:acc";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->sname=htmlspecialchars(strip_tags($this->sname));
        $this->cname=htmlspecialchars(strip_tags($this->cname));
        $this->phone=htmlspecialchars(strip_tags($this->phone));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->bcode=htmlspecialchars(strip_tags($this->bcode));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
        $this->ledgerno=htmlspecialchars(strip_tags($this->ledgerno));
        $this->bank=htmlspecialchars(strip_tags($this->bank));
        $this->acc=htmlspecialchars(strip_tags($this->acc));
 
        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":sname", $this->sname);
        $stmt->bindParam(":cname", $this->cname);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":bcode", $this->bcode);
        $stmt->bindParam(":ccode", $this->ccode);
        $stmt->bindParam(":ledgerno", $this->ledgerno);
        $stmt->bindParam(":bank", $this->bank);
        $stmt->bindParam(":acc", $this->acc);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }  
    function createSch(){   
    
        $query = "INSERT INTO
                    " . $this->table_name10 . "
                SET
                    tdate=:tdate, schname=:schname, bcode=:bcode, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->schname=htmlspecialchars(strip_tags($this->schname));
        $this->bcode=htmlspecialchars(strip_tags($this->bcode));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
 
        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":schname", $this->schname);
        $stmt->bindParam(":bcode", $this->bcode);
        $stmt->bindParam(":ccode", $this->ccode);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }  
    function createClassGroup(){   
    
        $query = "INSERT INTO
                    " . $this->table_name11 . "
                SET
                    schname=:schname, classgroup=:classgroup, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->schname=htmlspecialchars(strip_tags($this->schname));
        $this->classgroup=htmlspecialchars(strip_tags($this->classgroup));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
 
        // bind values 
        $stmt->bindParam(":schname", $this->schname);
        $stmt->bindParam(":classgroup", $this->classgroup);
        $stmt->bindParam(":ccode", $this->ccode);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }  
    function createStudClass(){   
    
        $query = "INSERT INTO
                    " . $this->table_name12 . "
                SET
                    classgroup=:classgroup, classname=:classname, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->classgroup=htmlspecialchars(strip_tags($this->classgroup));
        $this->classname=htmlspecialchars(strip_tags($this->classname));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
 
        // bind values 
        $stmt->bindParam(":classgroup", $this->classgroup);
        $stmt->bindParam(":classname", $this->classname);
        $stmt->bindParam(":ccode", $this->ccode);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }  

    function createSubjectGroup(){   
    
        $query = "INSERT INTO
                    " . $this->table_name13 . "
                SET
                    schname=:schname, subjectgroup=:subjectgroup, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->schname=htmlspecialchars(strip_tags($this->schname));
        $this->subjectgroup=htmlspecialchars(strip_tags($this->subjectgroup));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
 
        // bind values 
        $stmt->bindParam(":schname", $this->schname);
        $stmt->bindParam(":subjectgroup", $this->subjectgroup);
        $stmt->bindParam(":ccode", $this->ccode);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }  

    function createSubject(){   
    
        $query = "INSERT INTO
                    " . $this->table_name14 . "
                SET
                    schid=:schid, subjectname=:subjectname, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->schid=htmlspecialchars(strip_tags($this->schid));
        $this->subjectname=htmlspecialchars(strip_tags($this->subjectname));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
 
        // bind values 
        $stmt->bindParam(":schid", $this->schid);
        $stmt->bindParam(":subjectname", $this->subjectname);
        $stmt->bindParam(":ccode", $this->ccode);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }  

    function createSponsor(){   
    
        $query = "INSERT INTO
                    " . $this->table_name15 . "
                SET
                    pname=:pname, address=:address, phone=:phone, email=:email, occupation=:occupation, ledgerno=:ledgerno, ccode=:ccode, rdate=:rdate";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->pname=htmlspecialchars(strip_tags($this->pname));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->phone=htmlspecialchars(strip_tags($this->phone));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->occupation=htmlspecialchars(strip_tags($this->occupation));
        $this->ledgerno=htmlspecialchars(strip_tags($this->ledgerno));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
        $this->rdate=htmlspecialchars(strip_tags($this->rdate));
 
        // bind values 
        $stmt->bindParam(":pname", $this->pname);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":occupation", $this->occupation);
        $stmt->bindParam(":ledgerno", $this->ledgerno);
        $stmt->bindParam(":ccode", $this->ccode);
        $stmt->bindParam(":rdate", $this->rdate);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }  
    function createStudent(){   
    
        $query = "INSERT INTO
                    " . $this->table_name16 . "
                SET
					studno=:studno, formno=:formno, surname=:surname, othername=:othername, studname=:studname, address=:address, email=:email, gender=:gender, dob=:dob, age=:age, place_birth=:place_birth, state_origin=:state_origin, name_sch=:name_sch, clas_passed=:clas_passed, illness=:illness, yr=:yr, date_leaving=:date_leaving, hosp=:hosp, reason_leaving=:reason_leaving, phealth=:phealth, clas_apply=:clas_apply, sch=:sch, boarding=:boarding, sponsor=:sponsor, emergency=:emergency, wdcc=:wdcc, ledgerno=:ledgerno, ccode=:ccode, pay_status=:pay_status, status=:status, allocate_status=:allocate_status,student_status=:student_status";
  
        $stmt = $this->conn->prepare($query);
        $this->studno=htmlspecialchars(strip_tags($this->studno));
        $this->formno=htmlspecialchars(strip_tags($this->formno));
        $this->surname=htmlspecialchars(strip_tags($this->surname));
        $this->othername=htmlspecialchars(strip_tags($this->othername));
        $this->studname=htmlspecialchars(strip_tags($this->studname));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->gender=htmlspecialchars(strip_tags($this->gender));
	    $this->dob=htmlspecialchars(strip_tags($this->dob));
	    $this->age=htmlspecialchars(strip_tags($this->age));
	    $this->place_birth=htmlspecialchars(strip_tags($this->place_birth));
	    $this->state_origin=htmlspecialchars(strip_tags($this->state_origin));
	    $this->name_sch=htmlspecialchars(strip_tags($this->name_sch));
	    $this->clas_passed=htmlspecialchars(strip_tags($this->clas_passed));
	    $this->illness=htmlspecialchars(strip_tags($this->illness));
	    $this->yr=htmlspecialchars(strip_tags($this->yr));
	    $this->date_leaving=htmlspecialchars(strip_tags($this->date_leaving));
	    $this->hosp=htmlspecialchars(strip_tags($this->hosp));
	    $this->reason_leaving=htmlspecialchars(strip_tags($this->reason_leaving));
	    $this->phealth=htmlspecialchars(strip_tags($this->phealth));
        $this->clas_apply=htmlspecialchars(strip_tags($this->clas_apply));
        $this->sch=htmlspecialchars(strip_tags($this->sch));
        $this->boarding=htmlspecialchars(strip_tags($this->boarding));
        $this->sponsor=htmlspecialchars(strip_tags($this->sponsor));
        $this->emergency=htmlspecialchars(strip_tags($this->emergency));
        $this->wdcc=htmlspecialchars(strip_tags($this->wdcc));
        $this->ledgerno=htmlspecialchars(strip_tags($this->ledgerno));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
        $this->pay_status=htmlspecialchars(strip_tags($this->pay_status));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->allocate_status=htmlspecialchars(strip_tags($this->allocate_status));
        $this->student_status=htmlspecialchars(strip_tags($this->student_status));
        // bind values 
        
        $stmt->bindParam(":studno", $this->studno);
        $stmt->bindParam(":formno", $this->formno);
        $stmt->bindParam(":surname", $this->surname);
        $stmt->bindParam(":othername", $this->othername);
        $stmt->bindParam(":studname", $this->studname);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":dob", $this->dob);
        $stmt->bindParam(":age", $this->age);
        $stmt->bindParam(":place_birth", $this->place_birth);
        $stmt->bindParam(":state_origin", $this->state_origin);
        $stmt->bindParam(":name_sch", $this->name_sch);
        $stmt->bindParam(":clas_passed", $this->clas_passed);
	   $stmt->bindParam(":illness", $this->illness);
        $stmt->bindParam(":yr", $this->yr);
        $stmt->bindParam(":date_leaving", $this->date_leaving);
        $stmt->bindParam(":hosp", $this->hosp);
        $stmt->bindParam(":reason_leaving", $this->reason_leaving);
        $stmt->bindParam(":phealth", $this->phealth);
        $stmt->bindParam(":clas_apply", $this->clas_apply);
        $stmt->bindParam(":sch", $this->sch);
        $stmt->bindParam(":boarding", $this->boarding);
        $stmt->bindParam(":sponsor", $this->sponsor);
        $stmt->bindParam(":emergency", $this->emergency);
        $stmt->bindParam(":wdcc", $this->wdcc);
        $stmt->bindParam(":ledgerno", $this->ledgerno);
        $stmt->bindParam(":ccode", $this->ccode);
        $stmt->bindParam(":pay_status", $this->pay_status);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":allocate_status", $this->allocate_status);
        $stmt->bindParam(":student_status", $this->student_status);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
  
    }

    
    function createAcademicSession(){   
    
        $query = "INSERT INTO
                    " . $this->table_name18 . "
                SET
                    sessionname=:sessionname, status=:status, tdate=:tdate, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->sessionname=htmlspecialchars(strip_tags($this->sessionname));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
 
        // bind values 
        $stmt->bindParam(":sessionname", $this->sessionname);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":ccode", $this->ccode);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    } 
    function createAssignStudent(){   
    
        $query = "INSERT INTO
                    " . $this->table_name19 . "
                SET
                    studid=:studid, school=:school, class_group=:class_group, class_name=:class_name, asession=:asession, term=:term, ccode=:ccode, adate=:adate, term_status=:term_status, session_status=:session_status";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->studid=htmlspecialchars(strip_tags($this->studid));
        $this->school=htmlspecialchars(strip_tags($this->school));
        $this->class_group=htmlspecialchars(strip_tags($this->class_group));
        $this->class_name=htmlspecialchars(strip_tags($this->class_name));
        $this->asession=htmlspecialchars(strip_tags($this->asession));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
        $this->adate=htmlspecialchars(strip_tags($this->adate));
        $this->term_status=htmlspecialchars(strip_tags($this->term_status));
        $this->session_status=htmlspecialchars(strip_tags($this->session_status));
 
        // bind values 
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":school", $this->school);
        $stmt->bindParam(":class_group", $this->class_group);
        $stmt->bindParam(":class_name", $this->class_name);
        $stmt->bindParam(":asession", $this->asession);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":ccode", $this->ccode);
        $stmt->bindParam(":adate", $this->adate);
        $stmt->bindParam(":term_status", $this->term_status);
        $stmt->bindParam(":session_status", $this->session_status);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }  

    function createTotalFee(){   
    
        $query = "INSERT INTO
                    " . $this->table_name21 . "
                SET
                    studid=:studid, amt=:amt, item=:item, ccode=:ccode,tdate=:tdate, status=:status, term=:term";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->studid=htmlspecialchars(strip_tags($this->studid));
        $this->amt=htmlspecialchars(strip_tags($this->amt));
        $this->item=htmlspecialchars(strip_tags($this->item));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->term=htmlspecialchars(strip_tags($this->term));
 
        // bind values 
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":amt", $this->amt);
        $stmt->bindParam(":item", $this->item);
        $stmt->bindParam(":ccode", $this->ccode);
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":term", $this->term);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }  
 
 function createFees(){   
 
         $query = "INSERT INTO
                    " . $this->table_name20 . "
                SET
                    tdate=:tdate, feename=:feename, amount=:amount, schools=:schools, fcat=:fcat, stype=:stype, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->feename=htmlspecialchars(strip_tags($this->feename));
        $this->amount=htmlspecialchars(strip_tags($this->amount));
        $this->schools=htmlspecialchars(strip_tags($this->schools));
        $this->fcat=htmlspecialchars(strip_tags($this->fcat));
        $this->stype=htmlspecialchars(strip_tags($this->stype));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
 
        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":feename", $this->feename);
        $stmt->bindParam(":amount", $this->amount);
        $stmt->bindParam(":schools", $this->schools);
        $stmt->bindParam(":fcat", $this->fcat);
        $stmt->bindParam(":stype", $this->stype);
        $stmt->bindParam(":ccode", $this->ccode);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }  


 function createItem(){   
 
         $query = "INSERT INTO
                    " . $this->table_name23 . "
                SET
                    tdate=:tdate, item_group=:item_group, item_type=:item_type, itemname=:itemname, status=:status, ccode=:ccode, unitsales=:unitsales";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->item_group=htmlspecialchars(strip_tags($this->item_group));
        $this->item_type=htmlspecialchars(strip_tags($this->item_type));
        $this->itemname=htmlspecialchars(strip_tags($this->itemname));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
        $this->unitsales=htmlspecialchars(strip_tags($this->unitsales));
 
        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":item_group", $this->item_group);
        $stmt->bindParam(":item_type", $this->item_type);
        $stmt->bindParam(":itemname", $this->itemname);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":ccode", $this->ccode);
        $stmt->bindParam(":unitsales", $this->unitsales);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }  

 function createItemGroup(){   
 
         $query = "INSERT INTO
                    " . $this->table_name24 . "
                SET
                    itemgroup=:itemgroup, status=:status, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->itemgroup=htmlspecialchars(strip_tags($this->itemgroup));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
 
        // bind values 
        $stmt->bindParam(":itemgroup", $this->itemgroup);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":ccode", $this->ccode);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }  
 function createItemPO(){   
 
         $query = "INSERT INTO
                    " . $this->table_name25 . "
                SET
                    tdate=:tdate, pono=:pono, itemid=:itemid, supplierid=:supplierid, qty=:qty, pamt=:pamt, raisedby=:raisedby,ccode=:ccode, unitsales=:unitsales";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->pono=htmlspecialchars(strip_tags($this->pono));
        $this->itemid=htmlspecialchars(strip_tags($this->itemid));
        $this->supplierid=htmlspecialchars(strip_tags($this->supplierid));
        $this->qty=htmlspecialchars(strip_tags($this->qty));
        $this->pamt=htmlspecialchars(strip_tags($this->pamt));
        $this->raisedby=htmlspecialchars(strip_tags($this->raisedby));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
        $this->unitsales=htmlspecialchars(strip_tags($this->unitsales));
 
        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":pono", $this->pono);
        $stmt->bindParam(":itemid", $this->itemid);
        $stmt->bindParam(":supplierid", $this->supplierid);
        $stmt->bindParam(":qty", $this->qty);
        $stmt->bindParam(":pamt", $this->pamt);
        $stmt->bindParam(":raisedby", $this->raisedby);
        $stmt->bindParam(":ccode", $this->ccode);
        $stmt->bindParam(":unitsales", $this->unitsales);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
    
 function generatePONum(){   
 
         $query = "INSERT INTO
                    " . $this->table_name26 . "
                SET
                    tdate=:tdate, pono=:pono, sid=:sid, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->pono=htmlspecialchars(strip_tags($this->pono));
        $this->sid=htmlspecialchars(strip_tags($this->sid));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
 
        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":pono", $this->pono);
        $stmt->bindParam(":sid", $this->sid);
        $stmt->bindParam(":ccode", $this->ccode);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }  
 function createItemPOAll(){   
 
         $query = "INSERT INTO
                    " . $this->table_name27 . "
                SET
                    tdate=:tdate, pono=:pono, itemid=:itemid, supplierid=:supplierid, qty=:qty, pamt=:pamt, raisedby=:raisedby,ccode=:ccode, status=:status, pobalqty=:pobalqty, unitsales=:unitsales";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->pono=htmlspecialchars(strip_tags($this->pono));
        $this->itemid=htmlspecialchars(strip_tags($this->itemid));
        $this->supplierid=htmlspecialchars(strip_tags($this->supplierid));
        $this->qty=htmlspecialchars(strip_tags($this->qty));
        $this->pamt=htmlspecialchars(strip_tags($this->pamt));
        $this->raisedby=htmlspecialchars(strip_tags($this->raisedby));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->pobalqty=htmlspecialchars(strip_tags($this->pobalqty));
        $this->unitsales=htmlspecialchars(strip_tags($this->unitsales));
 
        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":pono", $this->pono);
        $stmt->bindParam(":itemid", $this->itemid);
        $stmt->bindParam(":supplierid", $this->supplierid);
        $stmt->bindParam(":qty", $this->qty);
        $stmt->bindParam(":pamt", $this->pamt);
        $stmt->bindParam(":raisedby", $this->raisedby);
        $stmt->bindParam(":ccode", $this->ccode);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":pobalqty", $this->pobalqty);
        $stmt->bindParam(":unitsales", $this->unitsales);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
 function insertStock(){   
 
         $query = "INSERT INTO
                    " . $this->table_name28 . "
                SET
                    itemid=:itemid, balqty=:balqty, unitcost=:unitcost, unitsales=:unitsales, storeid=:storeid, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->itemid=htmlspecialchars(strip_tags($this->itemid));
        $this->balqty=htmlspecialchars(strip_tags($this->balqty));
        $this->unitcost=htmlspecialchars(strip_tags($this->unitcost));
        $this->unitsales=htmlspecialchars(strip_tags($this->unitsales));
        $this->storeid=htmlspecialchars(strip_tags($this->storeid));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
 
        // bind values 
        $stmt->bindParam(":itemid", $this->itemid);
        $stmt->bindParam(":balqty", $this->balqty);
        $stmt->bindParam(":unitcost", $this->unitcost);
        $stmt->bindParam(":unitsales", $this->unitsales);
        $stmt->bindParam(":storeid", $this->storeid);
        $stmt->bindParam(":ccode", $this->ccode);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
  
 function createPurchaseItem(){ 
 
         $query = "INSERT INTO
                    " . $this->table_name29 . "
                SET
                    tdate=:tdate, rdate=:rdate, itemid=:itemid, qty_supplied=:qty_supplied, unitcost=:unitcost, supplierid=:supplierid, receiptno=:receiptno, pono=:pono, poqty=:poqty, pobal=:pobal, stockinby=:stockinby,ccode=:ccode, post_status=:post_status, storeid=:storeid";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->rdate=htmlspecialchars(strip_tags($this->rdate));
        $this->itemid=htmlspecialchars(strip_tags($this->itemid));
        $this->qty_supplied=htmlspecialchars(strip_tags($this->qty_supplied));
        $this->unitcost=htmlspecialchars(strip_tags($this->unitcost));
        $this->supplierid=htmlspecialchars(strip_tags($this->supplierid));
        $this->receiptno=htmlspecialchars(strip_tags($this->receiptno));
        $this->pono=htmlspecialchars(strip_tags($this->pono));
        $this->poqty=htmlspecialchars(strip_tags($this->poqty));
        $this->pobal=htmlspecialchars(strip_tags($this->pobal));
        $this->stockinby=htmlspecialchars(strip_tags($this->stockinby));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
        $this->post_status=htmlspecialchars(strip_tags($this->post_status));
        $this->storeid=htmlspecialchars(strip_tags($this->storeid));
 
        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":rdate", $this->rdate);
        $stmt->bindParam(":itemid", $this->itemid);
        $stmt->bindParam(":qty_supplied", $this->qty_supplied);
        $stmt->bindParam(":unitcost", $this->unitcost);
        $stmt->bindParam(":supplierid", $this->supplierid);
        $stmt->bindParam(":receiptno", $this->receiptno);
        $stmt->bindParam(":pono", $this->pono);
        $stmt->bindParam(":poqty", $this->poqty);
        $stmt->bindParam(":pobal", $this->pobal);
        $stmt->bindParam(":stockinby", $this->stockinby);
        $stmt->bindParam(":ccode", $this->ccode);
        $stmt->bindParam(":post_status", $this->post_status);
        $stmt->bindParam(":storeid", $this->storeid);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
 function createOpenTerm(){ 
 
         $query = "INSERT INTO
                    " . $this->table_name30 . "
                SET
                    tdate=:tdate, sdate=:sdate, termname=:termname, tsession=:tsession, status=:status, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->sdate=htmlspecialchars(strip_tags($this->sdate));
        $this->termname=htmlspecialchars(strip_tags($this->termname));
        $this->tsession=htmlspecialchars(strip_tags($this->tsession));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
 
        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":sdate", $this->sdate);
        $stmt->bindParam(":termname", $this->termname);
        $stmt->bindParam(":tsession", $this->tsession);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":ccode", $this->ccode);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
 function createLoadSubject(){ 
 
         $query = "INSERT INTO
                    " . $this->table_name31 . "
                SET
                    term=:term, tsession=:tsession, studid=:studid, subjects=:subjects, rdate=:rdate, status=:status, studclass=:studclass,classgroup=:classgroup";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->tsession=htmlspecialchars(strip_tags($this->tsession));
        $this->studid=htmlspecialchars(strip_tags($this->studid));
        $this->subjects=htmlspecialchars(strip_tags($this->subjects));
        $this->rdate=htmlspecialchars(strip_tags($this->rdate));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->studclass=htmlspecialchars(strip_tags($this->studclass));
        $this->classgroup=htmlspecialchars(strip_tags($this->classgroup));
 
        // bind values 
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":tsession", $this->tsession);
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":subjects", $this->subjects);
        $stmt->bindParam(":rdate", $this->rdate);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":studclass", $this->studclass);
        $stmt->bindParam(":classgroup", $this->classgroup);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
    function createDesignation(){   
    
        $query = "INSERT INTO
                    " . $this->table_name32 . "
                SET
                    designation=:designation, status=:status, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->designation=htmlspecialchars(strip_tags($this->designation));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
 
        // bind values 
        $stmt->bindParam(":designation", $this->designation);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":ccode", $this->ccode);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }    
 function createStaff(){ 
 
         $query = "INSERT INTO
                    " . $this->table_name33 . "
                SET
                    empdate=:empdate, tdate=:tdate, staffno=:staffno, staffname=:staffname, dept=:dept, address=:address, email=:email, phone=:phone, gender=:gender, dob=:dob, age=:age, designation=:designation, accno=:accno, pensionno=:pensionno, bank=:bank, ccode=:ccode, status=:status, pension=:pension, stype=:stype";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->empdate=htmlspecialchars(strip_tags($this->empdate));
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->staffno=htmlspecialchars(strip_tags($this->staffno));
        $this->staffname=htmlspecialchars(strip_tags($this->staffname));
        $this->dept=htmlspecialchars(strip_tags($this->dept));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->phone=htmlspecialchars(strip_tags($this->phone));
        $this->gender=htmlspecialchars(strip_tags($this->gender));
        $this->dob=htmlspecialchars(strip_tags($this->dob));
        $this->age=htmlspecialchars(strip_tags($this->age));
        $this->designation=htmlspecialchars(strip_tags($this->designation));
        $this->accno=htmlspecialchars(strip_tags($this->accno));
        $this->pensionno=htmlspecialchars(strip_tags($this->pensionno));
        $this->bank=htmlspecialchars(strip_tags($this->bank));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->pension=htmlspecialchars(strip_tags($this->pension));
        $this->stype=htmlspecialchars(strip_tags($this->stype));

        // bind values 
        $stmt->bindParam(":empdate", $this->empdate);
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":staffno", $this->staffno);
        $stmt->bindParam(":staffname", $this->staffname);
        $stmt->bindParam(":dept", $this->dept);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":dob", $this->dob);
        $stmt->bindParam(":age", $this->age);
        $stmt->bindParam(":designation", $this->designation);
        $stmt->bindParam(":accno", $this->accno);
        $stmt->bindParam(":pensionno", $this->pensionno);
        $stmt->bindParam(":bank", $this->bank);
        $stmt->bindParam(":ccode", $this->ccode);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":pension", $this->pension);
        $stmt->bindParam(":stype", $this->stype);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
  
 function createAssignClass(){ 
 
         $query = "INSERT INTO
                    " . $this->table_name34 . "
                SET
                    tdate=:tdate, staffno=:staffno, assstaffno=:assstaffno, aclassid=:aclassid, term=:term, asession=:asession, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->staffno=htmlspecialchars(strip_tags($this->staffno));
        $this->assstaffno=htmlspecialchars(strip_tags($this->assstaffno));
        $this->aclassid=htmlspecialchars(strip_tags($this->aclassid));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->asession=htmlspecialchars(strip_tags($this->asession));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));

        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":staffno", $this->staffno);
        $stmt->bindParam(":assstaffno", $this->assstaffno);
        $stmt->bindParam(":aclassid", $this->aclassid);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":asession", $this->asession);
        $stmt->bindParam(":ccode", $this->ccode);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }

 function createAssignSubject(){ 
 
         $query = "INSERT INTO
                    " . $this->table_name35 . "
                SET
                    tdate=:tdate, staffno=:staffno, assstaffno=:assstaffno, schid=:schid, subjectid =:subjectid, term=:term, asession=:asession, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->staffno=htmlspecialchars(strip_tags($this->staffno));
        $this->assstaffno=htmlspecialchars(strip_tags($this->assstaffno));
        $this->schid=htmlspecialchars(strip_tags($this->schid));
        $this->subjectid=htmlspecialchars(strip_tags($this->subjectid));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->asession=htmlspecialchars(strip_tags($this->asession));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));

        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":staffno", $this->staffno);
        $stmt->bindParam(":assstaffno", $this->assstaffno);
        $stmt->bindParam(":schid", $this->schid);
        $stmt->bindParam(":subjectid", $this->subjectid);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":asession", $this->asession);
        $stmt->bindParam(":ccode", $this->ccode);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }

 function createBuilding(){ 
 
         $query = "INSERT INTO
                    " . $this->table_name36 . "
                SET
                    tdate=:tdate, buildname=:buildname, no_room=:no_room, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->buildname=htmlspecialchars(strip_tags($this->buildname));
        $this->no_room=htmlspecialchars(strip_tags($this->no_room));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));

        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":buildname", $this->buildname);
        $stmt->bindParam(":no_room", $this->no_room);
        $stmt->bindParam(":ccode", $this->ccode);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
 
 function createRoom(){ 
 
         $query = "INSERT INTO
                    " . $this->table_name37 . "
                SET
                    tdate=:tdate, rname=:rname, buildid=:buildid, status=:status, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->rname=htmlspecialchars(strip_tags($this->rname));
        $this->buildid=htmlspecialchars(strip_tags($this->buildid));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));

        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":rname", $this->rname);
        $stmt->bindParam(":buildid", $this->buildid);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":ccode", $this->ccode);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
 function createBedspace(){ 
 
         $query = "INSERT INTO
                    " . $this->table_name38 . "
                SET
                    tdate=:tdate, roomid=:roomid, bedspace=:bedspace, status=:status, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->roomid=htmlspecialchars(strip_tags($this->roomid));
        $this->bedspace=htmlspecialchars(strip_tags($this->bedspace));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));

        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":roomid", $this->roomid);
        $stmt->bindParam(":bedspace", $this->bedspace);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":ccode", $this->ccode);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
 function createAllocateBedSpace(){ 
 
         $query = "INSERT INTO
                    " . $this->table_name39 . "
                SET
                    tdate=:tdate, ttime=:ttime, studno=:studno, bedspace=:bedspace, roomid=:roomid, tsession=:tsession, status=:status, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->ttime=htmlspecialchars(strip_tags($this->ttime));
        $this->studno=htmlspecialchars(strip_tags($this->studno));
        $this->bedspace=htmlspecialchars(strip_tags($this->bedspace));
        $this->roomid=htmlspecialchars(strip_tags($this->roomid));
        $this->tsession=htmlspecialchars(strip_tags($this->tsession));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));

        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":ttime", $this->ttime);
        $stmt->bindParam(":studno", $this->studno);
        $stmt->bindParam(":bedspace", $this->bedspace);
        $stmt->bindParam(":roomid", $this->roomid);
        $stmt->bindParam(":tsession", $this->tsession);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":ccode", $this->ccode);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
 function createStore(){ 
 
         $query = "INSERT INTO
                    " . $this->table_name40 . "
                SET
                    tdate=:tdate, storename=:storename, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->storename=htmlspecialchars(strip_tags($this->storename));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));

        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":storename", $this->storename);
        $stmt->bindParam(":ccode", $this->ccode);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
 
  function postSalesItem(){ 
 
         $query = "INSERT INTO
                    " . $this->table_name41 . "
                SET
                    tdate=:tdate, ttime=:ttime, itemid=:itemid, usales=:usales, ucost=:ucost, qty=:qty, totamt=:totamt, mode_payment=:mode_payment, pay_type=:pay_type, storename=:storename, ccode=:ccode, postedbyid =:postedbyid, receiptno=:receiptno, studid=:studid";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->ttime=htmlspecialchars(strip_tags($this->ttime));
        $this->itemid=htmlspecialchars(strip_tags($this->itemid));
        $this->usales=htmlspecialchars(strip_tags($this->usales));
        $this->ucost=htmlspecialchars(strip_tags($this->ucost));
        $this->qty=htmlspecialchars(strip_tags($this->qty));
        $this->totamt=htmlspecialchars(strip_tags($this->totamt));
        $this->mode_payment=htmlspecialchars(strip_tags($this->mode_payment));
        $this->pay_type=htmlspecialchars(strip_tags($this->pay_type));
        $this->storename=htmlspecialchars(strip_tags($this->storename));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
        $this->postedbyid=htmlspecialchars(strip_tags($this->postedbyid));
 		$this->receiptno=htmlspecialchars(strip_tags($this->receiptno));
 		$this->studid=htmlspecialchars(strip_tags($this->studid));
        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":ttime", $this->ttime);
        $stmt->bindParam(":itemid", $this->itemid);
        $stmt->bindParam(":usales", $this->usales);
        $stmt->bindParam(":ucost", $this->ucost);
        $stmt->bindParam(":qty", $this->qty);
        $stmt->bindParam(":totamt", $this->totamt);
        $stmt->bindParam(":mode_payment", $this->mode_payment);
        $stmt->bindParam(":pay_type", $this->pay_type);
        $stmt->bindParam(":storename", $this->storename);
        $stmt->bindParam(":ccode", $this->ccode);
        $stmt->bindParam(":postedbyid", $this->postedbyid);
        $stmt->bindParam(":receiptno", $this->receiptno);
        $stmt->bindParam(":studid", $this->studid);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
  function postOrderItem(){ 
 
         $query = "INSERT INTO
                    " . $this->table_name42 . "
                SET
                    tdate=:tdate, ttime=:ttime, itemid=:itemid, usales=:usales, ucost=:ucost, qty=:qty, totamt=:totamt, mode_payment=:mode_payment, pay_type=:pay_type, storename=:storename, ccode=:ccode, postedbyid =:postedbyid, rno=:rno, itemno=:itemno";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->ttime=htmlspecialchars(strip_tags($this->ttime));
        $this->itemid=htmlspecialchars(strip_tags($this->itemid));
        $this->usales=htmlspecialchars(strip_tags($this->usales));
        $this->ucost=htmlspecialchars(strip_tags($this->ucost));
        $this->qty=htmlspecialchars(strip_tags($this->qty));
        $this->totamt=htmlspecialchars(strip_tags($this->totamt));
        $this->mode_payment=htmlspecialchars(strip_tags($this->mode_payment));
        $this->pay_type=htmlspecialchars(strip_tags($this->pay_type));
        $this->storename=htmlspecialchars(strip_tags($this->storename));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
        $this->postedbyid=htmlspecialchars(strip_tags($this->postedbyid));
        $this->rno=htmlspecialchars(strip_tags($this->rno));
        $this->itemno=htmlspecialchars(strip_tags($this->itemno));

        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":ttime", $this->ttime);
        $stmt->bindParam(":itemid", $this->itemid);
        $stmt->bindParam(":usales", $this->usales);
        $stmt->bindParam(":ucost", $this->ucost);
        $stmt->bindParam(":qty", $this->qty);
        $stmt->bindParam(":totamt", $this->totamt);
        $stmt->bindParam(":mode_payment", $this->mode_payment);
        $stmt->bindParam(":pay_type", $this->pay_type);
        $stmt->bindParam(":storename", $this->storename);
        $stmt->bindParam(":ccode", $this->ccode);
        $stmt->bindParam(":postedbyid", $this->postedbyid);
        $stmt->bindParam(":rno", $this->rno);
        $stmt->bindParam(":itemno", $this->itemno);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }

    function uploadStudent(){   
    
        $query = "INSERT INTO
                    " . $this->table_name16 . "
                SET
					studno=:studno, formno=:formno, surname=:surname, othername=:othername, studname=:studname, address=:address, gender=:gender, state_origin=:state_origin, name_sch=:name_sch, mname=:mname, fname=:fname, maddress=:maddress, faddress=:faddress, mphone=:mphone, fphone=:fphone, foccupation=:foccupation, clas_apply=:clas_apply, sch=:sch, boarding=:boarding, sponsor=:sponsor, ledgerno=:ledgerno, ccode=:ccode, pay_status=:pay_status, status=:status, allocate_status=:allocate_status";
  
        $stmt = $this->conn->prepare($query);
        $this->studno=htmlspecialchars(strip_tags($this->studno));
        $this->formno=htmlspecialchars(strip_tags($this->formno));
        $this->surname=htmlspecialchars(strip_tags($this->surname));
        $this->othername=htmlspecialchars(strip_tags($this->othername));
        $this->studname=htmlspecialchars(strip_tags($this->studname));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->gender=htmlspecialchars(strip_tags($this->gender));
	    $this->state_origin=htmlspecialchars(strip_tags($this->state_origin));
	    $this->name_sch=htmlspecialchars(strip_tags($this->name_sch));
	    $this->mname=htmlspecialchars(strip_tags($this->mname));
	    $this->fname=htmlspecialchars(strip_tags($this->fname));
	    $this->maddress=htmlspecialchars(strip_tags($this->maddress));
	    $this->faddress=htmlspecialchars(strip_tags($this->faddress));
        $this->mphone=htmlspecialchars(strip_tags($this->mphone));
        $this->fphone=htmlspecialchars(strip_tags($this->fphone));
        $this->foccupation=htmlspecialchars(strip_tags($this->foccupation));
        $this->clas_apply=htmlspecialchars(strip_tags($this->clas_apply));
        $this->sch=htmlspecialchars(strip_tags($this->sch));
        $this->boarding=htmlspecialchars(strip_tags($this->boarding));
        $this->sponsor=htmlspecialchars(strip_tags($this->sponsor));
        $this->ledgerno=htmlspecialchars(strip_tags($this->ledgerno));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
        $this->pay_status=htmlspecialchars(strip_tags($this->pay_status));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->allocate_status=htmlspecialchars(strip_tags($this->allocate_status));
        // bind values 
        
        $stmt->bindParam(":studno", $this->studno);
        $stmt->bindParam(":formno", $this->formno);
        $stmt->bindParam(":surname", $this->surname);
        $stmt->bindParam(":othername", $this->othername);
        $stmt->bindParam(":studname", $this->studname);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":state_origin", $this->state_origin);
        $stmt->bindParam(":name_sch", $this->name_sch);
        $stmt->bindParam(":mname", $this->mname);
        $stmt->bindParam(":fname", $this->fname);
        $stmt->bindParam(":maddress", $this->maddress);
        $stmt->bindParam(":faddress", $this->faddress);
        $stmt->bindParam(":mphone", $this->mphone);
        $stmt->bindParam(":fphone", $this->fphone);
        $stmt->bindParam(":foccupation", $this->foccupation);
        $stmt->bindParam(":clas_apply", $this->clas_apply);
        $stmt->bindParam(":sch", $this->sch);
        $stmt->bindParam(":boarding", $this->boarding);
        $stmt->bindParam(":sponsor", $this->sponsor);
        $stmt->bindParam(":ledgerno", $this->ledgerno);
        $stmt->bindParam(":ccode", $this->ccode);
        $stmt->bindParam(":pay_status", $this->pay_status);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":allocate_status", $this->allocate_status);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
  
    }

 function createChangeRole(){ 
 
         $query = "INSERT INTO
                    " . $this->table_name43 . "
                SET
                    tdate=:tdate, staffname=:staffname, user_role=:user_role, new_role=:new_role, remark=:remark, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->staffname=htmlspecialchars(strip_tags($this->staffname));
        $this->user_role=htmlspecialchars(strip_tags($this->user_role));
        $this->new_role=htmlspecialchars(strip_tags($this->new_role));
        $this->remark=htmlspecialchars(strip_tags($this->remark));        
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));

        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":staffname", $this->staffname);
        $stmt->bindParam(":user_role", $this->user_role);
        $stmt->bindParam(":new_role", $this->new_role);
        $stmt->bindParam(":remark", $this->remark);
        $stmt->bindParam(":ccode", $this->ccode);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }

 function createNewAttendance(){ 
 
         $query = "INSERT INTO
                    " . $this->table_name44 . "
                SET
                    tdate=:tdate, ttime=:ttime, studid=:studid, classname=:classname, term=:term, asession=:asession, postedby=:postedby, ccode=:ccode, status=:status";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->ttime=htmlspecialchars(strip_tags($this->ttime));
        $this->studid=htmlspecialchars(strip_tags($this->studid));
        $this->classname=htmlspecialchars(strip_tags($this->classname));
        $this->term=htmlspecialchars(strip_tags($this->term)); 
        $this->asession=htmlspecialchars(strip_tags($this->asession));
        $this->postedby=htmlspecialchars(strip_tags($this->postedby));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
        $this->status=htmlspecialchars(strip_tags($this->status));
        
        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":ttime", $this->ttime);
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":classname", $this->classname);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":asession", $this->asession);
        $stmt->bindParam(":postedby", $this->postedby);
        $stmt->bindParam(":ccode", $this->ccode);
        $stmt->bindParam(":status", $this->status);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }

 function createResultSetupCreteria(){ 
 
         $query = "INSERT INTO
                    " . $this->table_name45 . "
                SET
                    lower_bound =:lower_bound, upper_bound =:upper_bound, grade =:grade, remarks=:remarks, bcode=:bcode, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->lower_bound=htmlspecialchars(strip_tags($this->lower_bound));
        $this->upper_bound =htmlspecialchars(strip_tags($this->upper_bound));
        $this->grade =htmlspecialchars(strip_tags($this->grade));
        $this->remarks=htmlspecialchars(strip_tags($this->remarks));
        $this->bcode=htmlspecialchars(strip_tags($this->bcode)); 
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
        
        // bind values 
        $stmt->bindParam(":lower_bound", $this->lower_bound);
        $stmt->bindParam(":upper_bound", $this->upper_bound);
        $stmt->bindParam(":grade", $this->grade);
        $stmt->bindParam(":remarks", $this->remarks);
        $stmt->bindParam(":bcode", $this->bcode);
        $stmt->bindParam(":ccode", $this->ccode);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
 function createTeacherRemark(){ 
 
         $query = "INSERT INTO
                    " . $this->table_name46 . "
                SET
                    tdate =:tdate, studid =:studid, classteacherno =:classteacherno, tremark=:tremark, term=:term, asession=:asession, status=:status";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->studid =htmlspecialchars(strip_tags($this->studid));
        $this->classteacherno =htmlspecialchars(strip_tags($this->classteacherno));
        $this->tremark=htmlspecialchars(strip_tags($this->tremark));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->asession=htmlspecialchars(strip_tags($this->asession)); 
        $this->status=htmlspecialchars(strip_tags($this->status));
        
        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":classteacherno", $this->classteacherno);
        $stmt->bindParam(":tremark", $this->tremark);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":asession", $this->asession);
        $stmt->bindParam(":status", $this->status);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
  function createPrincipalRemark(){ 
 
         $query = "INSERT INTO
                    " . $this->table_name47 . "
                SET
                    tdate =:tdate, studid =:studid, principalno =:principalno, premark=:premark, term=:term, asession=:asession, status=:status";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->studid =htmlspecialchars(strip_tags($this->studid));
        $this->principalno=htmlspecialchars(strip_tags($this->principalno));
        $this->premark=htmlspecialchars(strip_tags($this->premark));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->asession=htmlspecialchars(strip_tags($this->asession)); 
        $this->status=htmlspecialchars(strip_tags($this->status));
        
        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":principalno", $this->principalno);
        $stmt->bindParam(":premark", $this->premark);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":asession", $this->asession);
        $stmt->bindParam(":status", $this->status);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
 
  function createWorkHabit(){ 
 
         $query = "INSERT INTO
                    " . $this->table_name48 . "
                SET
                    tdate =:tdate, studid =:studid, whabit =:whabit, rating=:rating, term=:term, asession=:asession, status=:status";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->studid =htmlspecialchars(strip_tags($this->studid));
        $this->whabit=htmlspecialchars(strip_tags($this->whabit));
        $this->rating=htmlspecialchars(strip_tags($this->rating));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->asession=htmlspecialchars(strip_tags($this->asession)); 
        $this->status=htmlspecialchars(strip_tags($this->status));
        
        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":whabit", $this->whabit);
        $stmt->bindParam(":rating", $this->rating);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":asession", $this->asession);
        $stmt->bindParam(":status", $this->status);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
 
  function createBehavioural(){ 
 
         $query = "INSERT INTO
                    " . $this->table_name49 . "
                SET
                    tdate =:tdate, studid =:studid, behaviour =:behaviour, rating=:rating, term=:term, asession=:asession, status=:status";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->studid =htmlspecialchars(strip_tags($this->studid));
        $this->behaviour=htmlspecialchars(strip_tags($this->behaviour));
        $this->rating=htmlspecialchars(strip_tags($this->rating));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->asession=htmlspecialchars(strip_tags($this->asession)); 
        $this->status=htmlspecialchars(strip_tags($this->status));
        
        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":behaviour", $this->behaviour);
        $stmt->bindParam(":rating", $this->rating);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":asession", $this->asession);
        $stmt->bindParam(":status", $this->status);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }

  function createResultSummary(){ 
 
         $query = "INSERT INTO
                    " . $this->table_name50 . "
                SET
                    tdate =:tdate, studid =:studid, term =:term, asession=:asession, tot_score =:tot_score, average_score=:average_score, ccode=:ccode, studclass=:studclass";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->studid =htmlspecialchars(strip_tags($this->studid));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->asession=htmlspecialchars(strip_tags($this->asession));
        $this->tot_score=htmlspecialchars(strip_tags($this->tot_score));
        $this->average_score=htmlspecialchars(strip_tags($this->average_score)); 
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
        $this->studclass=htmlspecialchars(strip_tags($this->studclass));
        
        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":asession", $this->asession);
        $stmt->bindParam(":tot_score", $this->tot_score);
        $stmt->bindParam(":average_score", $this->average_score);
        $stmt->bindParam(":ccode", $this->ccode);
        $stmt->bindParam(":studclass", $this->studclass);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }

  function createAssets(){ 
 
         $query = "INSERT INTO
                    " . $this->table_name51 . "
                SET
                    assetsname =:assetsname, assetsno =:assetsno, ledgerno =:ledgerno, assetsgroup =:assetsgroup, purchasedate=:purchasedate, amount =:amount, status=:status, bcode=:bcode, ccode=:ccode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->assetsname=htmlspecialchars(strip_tags($this->assetsname));
        $this->assetsno=htmlspecialchars(strip_tags($this->assetsno));
        $this->ledgerno=htmlspecialchars(strip_tags($this->ledgerno));
        $this->assetsgroup=htmlspecialchars(strip_tags($this->assetsgroup));
        $this->purchasedate=htmlspecialchars(strip_tags($this->purchasedate));
        $this->amount=htmlspecialchars(strip_tags($this->amount));
        $this->status=htmlspecialchars(strip_tags($this->status)); 
        $this->bcode=htmlspecialchars(strip_tags($this->bcode));
        $this->ccode=htmlspecialchars(strip_tags($this->ccode));
        
        
        // bind values 
        $stmt->bindParam(":assetsname", $this->assetsname);
        $stmt->bindParam(":assetsno", $this->assetsno);
        $stmt->bindParam(":ledgerno", $this->ledgerno);
        $stmt->bindParam(":assetsgroup", $this->assetsgroup);
        $stmt->bindParam(":purchasedate", $this->purchasedate);
        $stmt->bindParam(":amount", $this->amount);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":bcode", $this->bcode);
        $stmt->bindParam(":ccode", $this->ccode);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
 
  function createLessonNote(){ 
 
         $query = "INSERT INTO
                    " . $this->table_name52 . "
                SET
                    ldate =:ldate, ltime =:ltime, period =:period, term =:term, staffid=:staffid, subject =:subject, class=:class, topic=:topic, objective=:objective, 
                    reference_material=:reference_material, study_question=:study_question, assignment=:assignment, note_content=:note_content, imat=:imat";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->ldate =htmlspecialchars(strip_tags($this->ldate));
        $this->ltime=htmlspecialchars(strip_tags($this->ltime));
        $this->period=htmlspecialchars(strip_tags($this->period));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->staffid=htmlspecialchars(strip_tags($this->staffid));
        $this->subject=htmlspecialchars(strip_tags($this->subject));
        $this->class=htmlspecialchars(strip_tags($this->class)); 
        $this->topic=htmlspecialchars(strip_tags($this->topic));
        $this->objective=htmlspecialchars(strip_tags($this->objective));
        $this->reference_material=htmlspecialchars(strip_tags($this->reference_material));
        $this->study_question=htmlspecialchars(strip_tags($this->study_question));
        $this->assignment=htmlspecialchars(strip_tags($this->assignment));
        $this->note_content=htmlspecialchars(strip_tags($this->note_content)); 
        $this->imat=htmlspecialchars(strip_tags($this->imat));
        
        // bind values 
        $stmt->bindParam(":ldate", $this->ldate);
        $stmt->bindParam(":ltime", $this->ltime);
        $stmt->bindParam(":period", $this->period);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":staffid", $this->staffid);
        $stmt->bindParam(":subject", $this->subject);
        $stmt->bindParam(":class", $this->class);
        $stmt->bindParam(":topic", $this->topic);
        $stmt->bindParam(":objective", $this->objective);
        $stmt->bindParam(":reference_material", $this->reference_material);
        $stmt->bindParam(":study_question", $this->study_question);
        $stmt->bindParam(":assignment", $this->assignment);
        $stmt->bindParam(":note_content", $this->note_content);
        $stmt->bindParam(":imat", $this->imat);
        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
 
function createFirstContinusAssessmentScores(){   
    
        $query = "INSERT INTO
                    " . $this->table_name53 . "
                SET
                    studid=:studid, stud_class=:stud_class, stud_arm=:stud_arm, term=:term, asession=:asession";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->studid=htmlspecialchars(strip_tags($this->studid));
        $this->stud_class=htmlspecialchars(strip_tags($this->stud_class));
        $this->stud_arm=htmlspecialchars(strip_tags($this->stud_arm));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->asession=htmlspecialchars(strip_tags($this->asession));

 
        // bind values 
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":stud_class", $this->stud_class);
        $stmt->bindParam(":stud_arm", $this->stud_arm);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":asession", $this->asession);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
    
 function createSecondContinusAssessmentScores(){   
    
        $query = "INSERT INTO
                    " . $this->table_name54 . "
                SET
                    studid=:studid, stud_class=:stud_class, stud_arm=:stud_arm, term=:term, asession=:asession";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->studid=htmlspecialchars(strip_tags($this->studid));
        $this->stud_class=htmlspecialchars(strip_tags($this->stud_class));
        $this->stud_arm=htmlspecialchars(strip_tags($this->stud_arm));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->asession=htmlspecialchars(strip_tags($this->asession));

 
        // bind values 
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":stud_class", $this->stud_class);
        $stmt->bindParam(":stud_arm", $this->stud_arm);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":asession", $this->asession);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }

function createExamScores(){   
    
        $query = "INSERT INTO
                    " . $this->table_name55 . "
                SET
                    studid=:studid, stud_class=:stud_class, stud_arm=:stud_arm, term=:term, asession=:asession";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->studid=htmlspecialchars(strip_tags($this->studid));
        $this->stud_class=htmlspecialchars(strip_tags($this->stud_class));
        $this->stud_arm=htmlspecialchars(strip_tags($this->stud_arm));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->asession=htmlspecialchars(strip_tags($this->asession));

 
        // bind values 
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":stud_class", $this->stud_class);
        $stmt->bindParam(":stud_arm", $this->stud_arm);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":asession", $this->asession);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
 
function createBroadSheet(){   
    
        $query = "INSERT INTO
                    " . $this->table_name56 . "
                SET
                    studid=:studid, stud_class=:stud_class, stud_arm=:stud_arm, term=:term, asession=:asession";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->studid=htmlspecialchars(strip_tags($this->studid));
        $this->stud_class=htmlspecialchars(strip_tags($this->stud_class));
        $this->stud_arm=htmlspecialchars(strip_tags($this->stud_arm));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->asession=htmlspecialchars(strip_tags($this->asession));

 
        // bind values 
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":stud_class", $this->stud_class);
        $stmt->bindParam(":stud_arm", $this->stud_arm);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":asession", $this->asession);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }

function createPsychomoto(){   
    
        $query = "INSERT INTO
                    " . $this->table_name57 . "
                SET
                    tdate=:tdate, studid=:studid, class_arm=:class_arm, class_group=:class_group, items=:items, rating=:rating, term=:term, asession=:asession,status=:status";
        $stmt = $this->conn->prepare($query);
        $this->tdate=htmlspecialchars(strip_tags($this->tdate));
        $this->studid=htmlspecialchars(strip_tags($this->studid));
        $this->class_arm=htmlspecialchars(strip_tags($this->class_arm));
        $this->class_group=htmlspecialchars(strip_tags($this->class_group));
        $this->items=htmlspecialchars(strip_tags($this->items));
        $this->rating=htmlspecialchars(strip_tags($this->rating));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->asession=htmlspecialchars(strip_tags($this->asession));
        $this->status=htmlspecialchars(strip_tags($this->status));
        // bind values 
        $stmt->bindParam(":tdate", $this->tdate);
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":class_arm", $this->class_arm);
        $stmt->bindParam(":class_group", $this->class_group);
        $stmt->bindParam(":items", $this->items);
        $stmt->bindParam(":rating", $this->rating);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":asession", $this->asession);
        $stmt->bindParam(":status", $this->status);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
 
function createFirstContinusAssessmentScoresJunior(){   
    
        $query = "INSERT INTO
                    " . $this->table_name58 . "
                SET
                    studid=:studid, stud_class=:stud_class, stud_arm=:stud_arm, term=:term, asession=:asession";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->studid=htmlspecialchars(strip_tags($this->studid));
        $this->stud_class=htmlspecialchars(strip_tags($this->stud_class));
        $this->stud_arm=htmlspecialchars(strip_tags($this->stud_arm));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->asession=htmlspecialchars(strip_tags($this->asession));

 
        // bind values 
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":stud_class", $this->stud_class);
        $stmt->bindParam(":stud_arm", $this->stud_arm);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":asession", $this->asession);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
    
 function createSecondContinusAssessmentScoresJunior(){   
    
        $query = "INSERT INTO
                    " . $this->table_name59 . "
                SET
                    studid=:studid, stud_class=:stud_class, stud_arm=:stud_arm, term=:term, asession=:asession";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->studid=htmlspecialchars(strip_tags($this->studid));
        $this->stud_class=htmlspecialchars(strip_tags($this->stud_class));
        $this->stud_arm=htmlspecialchars(strip_tags($this->stud_arm));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->asession=htmlspecialchars(strip_tags($this->asession));

 
        // bind values 
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":stud_class", $this->stud_class);
        $stmt->bindParam(":stud_arm", $this->stud_arm);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":asession", $this->asession);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }

function createExamScoresJunior(){   
    
        $query = "INSERT INTO
                    " . $this->table_name60 . "
                SET
                    studid=:studid, stud_class=:stud_class, stud_arm=:stud_arm, term=:term, asession=:asession";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->studid=htmlspecialchars(strip_tags($this->studid));
        $this->stud_class=htmlspecialchars(strip_tags($this->stud_class));
        $this->stud_arm=htmlspecialchars(strip_tags($this->stud_arm));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->asession=htmlspecialchars(strip_tags($this->asession));

 
        // bind values 
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":stud_class", $this->stud_class);
        $stmt->bindParam(":stud_arm", $this->stud_arm);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":asession", $this->asession);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
 
function createBroadSheetJunior(){   
    
        $query = "INSERT INTO
                    " . $this->table_name61 . "
                SET
                    studid=:studid, stud_class=:stud_class, stud_arm=:stud_arm, term=:term, asession=:asession";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->studid=htmlspecialchars(strip_tags($this->studid));
        $this->stud_class=htmlspecialchars(strip_tags($this->stud_class));
        $this->stud_arm=htmlspecialchars(strip_tags($this->stud_arm));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->asession=htmlspecialchars(strip_tags($this->asession));

 
        // bind values 
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":stud_class", $this->stud_class);
        $stmt->bindParam(":stud_arm", $this->stud_arm);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":asession", $this->asession);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }


function createFirstContinusAssessmentScoresPrimary(){   
    
        $query = "INSERT INTO
                    " . $this->table_name62 . "
                SET
                    studid=:studid, stud_class=:stud_class, stud_arm=:stud_arm, term=:term, asession=:asession";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->studid=htmlspecialchars(strip_tags($this->studid));
        $this->stud_class=htmlspecialchars(strip_tags($this->stud_class));
        $this->stud_arm=htmlspecialchars(strip_tags($this->stud_arm));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->asession=htmlspecialchars(strip_tags($this->asession));

 
        // bind values 
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":stud_class", $this->stud_class);
        $stmt->bindParam(":stud_arm", $this->stud_arm);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":asession", $this->asession);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
    
 function createSecondContinusAssessmentScoresPrimary(){   
    
        $query = "INSERT INTO
                    " . $this->table_name63 . "
                SET
                    studid=:studid, stud_class=:stud_class, stud_arm=:stud_arm, term=:term, asession=:asession";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->studid=htmlspecialchars(strip_tags($this->studid));
        $this->stud_class=htmlspecialchars(strip_tags($this->stud_class));
        $this->stud_arm=htmlspecialchars(strip_tags($this->stud_arm));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->asession=htmlspecialchars(strip_tags($this->asession));

 
        // bind values 
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":stud_class", $this->stud_class);
        $stmt->bindParam(":stud_arm", $this->stud_arm);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":asession", $this->asession);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }

function createExamScoresPrimary(){   
    
        $query = "INSERT INTO
                    " . $this->table_name64 . "
                SET
                    studid=:studid, stud_class=:stud_class, stud_arm=:stud_arm, term=:term, asession=:asession";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->studid=htmlspecialchars(strip_tags($this->studid));
        $this->stud_class=htmlspecialchars(strip_tags($this->stud_class));
        $this->stud_arm=htmlspecialchars(strip_tags($this->stud_arm));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->asession=htmlspecialchars(strip_tags($this->asession));

 
        // bind values 
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":stud_class", $this->stud_class);
        $stmt->bindParam(":stud_arm", $this->stud_arm);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":asession", $this->asession);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
 
function createBroadSheetPrimary(){   
    
        $query = "INSERT INTO
                    " . $this->table_name65 . "
                SET
                    studid=:studid, stud_class=:stud_class, stud_arm=:stud_arm, term=:term, asession=:asession";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->studid=htmlspecialchars(strip_tags($this->studid));
        $this->stud_class=htmlspecialchars(strip_tags($this->stud_class));
        $this->stud_arm=htmlspecialchars(strip_tags($this->stud_arm));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->asession=htmlspecialchars(strip_tags($this->asession));

 
        // bind values 
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":stud_class", $this->stud_class);
        $stmt->bindParam(":stud_arm", $this->stud_arm);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":asession", $this->asession);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
 
 
 
 function createFirstContinusAssessmentScoresNursery(){   
    
        $query = "INSERT INTO
                    " . $this->table_name66 . "
                SET
                    studid=:studid, stud_class=:stud_class, stud_arm=:stud_arm, term=:term, asession=:asession";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->studid=htmlspecialchars(strip_tags($this->studid));
        $this->stud_class=htmlspecialchars(strip_tags($this->stud_class));
        $this->stud_arm=htmlspecialchars(strip_tags($this->stud_arm));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->asession=htmlspecialchars(strip_tags($this->asession));

 
        // bind values 
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":stud_class", $this->stud_class);
        $stmt->bindParam(":stud_arm", $this->stud_arm);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":asession", $this->asession);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
    
 function createSecondContinusAssessmentScoresNursery(){   
    
        $query = "INSERT INTO
                    " . $this->table_name67 . "
                SET
                    studid=:studid, stud_class=:stud_class, stud_arm=:stud_arm, term=:term, asession=:asession";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->studid=htmlspecialchars(strip_tags($this->studid));
        $this->stud_class=htmlspecialchars(strip_tags($this->stud_class));
        $this->stud_arm=htmlspecialchars(strip_tags($this->stud_arm));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->asession=htmlspecialchars(strip_tags($this->asession));

 
        // bind values 
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":stud_class", $this->stud_class);
        $stmt->bindParam(":stud_arm", $this->stud_arm);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":asession", $this->asession);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }

function createExamScoresNursery(){   
    
        $query = "INSERT INTO
                    " . $this->table_name68 . "
                SET
                    studid=:studid, stud_class=:stud_class, stud_arm=:stud_arm, term=:term, asession=:asession";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->studid=htmlspecialchars(strip_tags($this->studid));
        $this->stud_class=htmlspecialchars(strip_tags($this->stud_class));
        $this->stud_arm=htmlspecialchars(strip_tags($this->stud_arm));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->asession=htmlspecialchars(strip_tags($this->asession));

 
        // bind values 
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":stud_class", $this->stud_class);
        $stmt->bindParam(":stud_arm", $this->stud_arm);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":asession", $this->asession);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
 
function createBroadSheetNursery(){   
    
        $query = "INSERT INTO
                    " . $this->table_name69 . "
                SET
                    studid=:studid, stud_class=:stud_class, stud_arm=:stud_arm, term=:term, asession=:asession";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->studid=htmlspecialchars(strip_tags($this->studid));
        $this->stud_class=htmlspecialchars(strip_tags($this->stud_class));
        $this->stud_arm=htmlspecialchars(strip_tags($this->stud_arm));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->asession=htmlspecialchars(strip_tags($this->asession));

 
        // bind values 
        $stmt->bindParam(":studid", $this->studid);
        $stmt->bindParam(":stud_class", $this->stud_class);
        $stmt->bindParam(":stud_arm", $this->stud_arm);
        $stmt->bindParam(":term", $this->term);
        $stmt->bindParam(":asession", $this->asession);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }

 }
?>