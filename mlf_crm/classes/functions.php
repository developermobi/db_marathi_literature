<?php
/**
 * Description of functions
 *
 * @author sms
 */


$root = $_SERVER['DOCUMENT_ROOT'];
ini_set('memory_limit', '2048M');

include_once 'db_connect.php';
class functions extends db_connect {
    
    public function test_input($data)
    {
      $data = trim(strtolower($data));
      $data = strip_tags($data);
      $data = htmlspecialchars($data);
      $data = mysqli_real_escape_string($this->mysqli,$data);
      return $data;
    }
    /* Test_Input Function closed Here */
    
    public function get_datetime()
    {
         date_default_timezone_set('Asia/Kolkata');
         $date1=date( "Y-m-d h:i:s");
         return $date1;
    }
    /* Function get_datetime closed here*/
    
    public function data_insert($sql)
    {
        $result= $this->mysqli->query($sql) or die($this->mysqli->error);
		return $result;
    }
	
	public function data_insert_return_id($sql)
    {
        $result= $this->mysqli->query($sql) or die($this->mysqli->error);
		return $id=$this->mysqli->insert_id;
    }
    /* Insert Function Closed here  */
    
    public function data_select($sql)
    { 
            $select=$this->mysqli->query($sql) or die($this->mysqli->error);      
            if($select->num_rows==0){
               return 'no';
            }  else {
               while ($row = $select->fetch_array(MYSQLI_ASSOC)) {
                   $data[]=$row;
               }
               return $data;
            }   
    }

    public function get_num_of_rows($sql)
    {
        $result= $this->mysqli->query($sql) or die($this->mysqli->error);
         $rowcount=mysqli_num_rows($result);
    return $rowcount;
    }



   public function data_select_modify($sql,$data,$color_type)
    { 

      $color[0] = "#2ECCFA";
      $color[1] = "#F78181";
      $color[2] = "#F5BCA9";
      $color[3] = "#F2F5A9";
      $color[4] = "#0174DF";
      $color[5] = "#484646";
      $color[6] = "#F781D8";
      $color[7] = "#8181F7";
      $color[8] = "red";
      $color[9] = "#018744";
            $select=$this->mysqli->query($sql) or die($this->mysqli->error);      
            if($select->num_rows==0){
               return 'no';
            }  else {
               while ($row = $select->fetch_array(MYSQLI_ASSOC)) {

                      $row['textColor'] = $color[$color_type];
                   $data[]=$row;
               }
               return $data;
            }   
    }
    /* Select function closed here */
    
    public function data_update($sql)
    {
        $update=  $this->mysqli->query($sql) or die($this->mysqli->error);
        return $update;
    } 
	
	public function data_delete($sql)
    {
        $update=  $this->mysqli->query($sql) or die($this->mysqli->error);
        return $update;
    } 
    // Update Function Closed Here
    function mobile_validate($mobile)
    {
        if(preg_match('/^((\+){0,1}91(\s){0,1}(\-){0,1}(\s){0,1})?([0-9]{10})$/', $mobile,$matches)){
          //  print_r($matches);
        return true;
        }
     return false;
    }
	function dbRowInsert($table_name, $form_data)
     {

    		$fields = array_keys($form_data);
        $fields=implode(',',$fields);
        $data=implode("','",$form_data);
    	
    		$sql = "INSERT INTO ".$table_name."(".$fields.")VALUES('".$data."')";

    	  $result= $this->mysqli->query($sql) or die($this->mysqli->error);
        return $result;

    }
   function dbRowDelete($table_name, $where_clause)
   {
       $where = " where 1 "; 
        if(!empty($where_clause)){

               foreach($where_clause as $key => $val){

                  $where .= " and ".$key." = '".$val."'" ; 

               }
        }

        $sql_delete =" Delete From ".$table_name." ". $where." ";
        echo  $sql_delete;
       

    }
    
    function dbRowUpdate($table_name, $form_data, $where_clause)
    {

        $sql = "UPDATE ".$table_name." SET ";
        $sets = array();
        foreach($form_data as $column => $value){

               $sets[] = "`".$column."` = '".$value."'";

          }

          $sql .= implode(', ', $sets);
          $sql .= $whereSQL;          
          return mysql_query($sql);

      }

      public function send_mail($user_list,$subject,$mailContent)
      { 
        /*echo "<pre>";
        print_r($user_list);
        exit;*/
        date_default_timezone_set('Asia/Calcutta');
        include 'library.php'; // include the library file
        include "class.phpmailer.php"; // include the class name   
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = "email.dorfketal.com";
        $mail->Port = 587;
        $mail->SMTPAuth = true;

        $mail->Username = "limsadmin";
        $mail->Password = "dkc@123";
        $mail->setFrom('limsadmin@dorfketal.com', 'E-learning Dorfketal');                                        

        //$mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional
        $mail->MsgHTML($mailContent);

        //For testing only
        //$mail->AddAddress("Regit.Gopi@dorfketal.com");
        $mail->AddAddress("tushar.k@mobisofttech.co.in");
        $mail->AddBCC('nitu.w@mobisofttech.co.in');        
        if(!$mail->Send()){
            return json_encode("Mailer Error: " . $mail->ErrorInfo);
          }else{
            return 1;
          }
        $mail->ClearAllRecipients();
        $mail->ClearAddresses();  // each AddAddress add to list
        

        //Multiple users
        /*foreach($user_list as $email => $name){
          $mail->AddAddress($name);
         
          if(!$mail->Send()){
            return json_encode("Mailer Error: " . $mail->ErrorInfo);
          }else{
            return 1;
          }
          $mail->ClearAllRecipients();
          $mail->ClearAddresses();  // each AddAddress add to list        
        }*/
        
        $mail->ClearCCs();
        $mail->ClearBCCs();
      }     
}

?>
