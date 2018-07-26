<?php
ob_start();
class Database 
{
    public $Connect;
      public function __construct()
      {
          $this->Connect();  // To Connect With Database 
      }
      //Connect Database
      public function Connect()
      {
       $localhost="localhost";
       $root="root";
       $password="";
      $this->Connect = mysqli_connect($localhost,$root,$password);
     if($this->Connect)
     {
        mysqli_query( $this->Connect,"SET character_set_results=utf8");
        mb_language('uni'); 
        mb_internal_encoding('UTF-8');
        
        $DB = mysqli_select_db($this->Connect,"tuntube");
        mysqli_query($this->Connect,"set names 'utf8'");
      if(!$DB)
          throw new Exception("Error To Connect To Select DataBase");
     }
     else
     {
         throw new Exception("Error !! To Connect MySql");  
     }
     }
     //Close Database
     public function Close()
     {
         mysqli_close($this->Connect);
     }
    
     //Delete
     public function Delete($TableName,$ID,$where='id')
    {
        $Query ="DELETE FROM `$TableName` WHERE `$where`='$ID'"; 
        $Sql = mysqli_query($this->Connect,$Query);
        if($Sql)  return TRUE;
        else  throw new Exception("Sql Not Deleted");   
    }
    
     public function DeleteQuery($query)
    {
        $Sql = mysqli_query($this->Connect,$query);
        if($Sql)  return TRUE;
        else  throw new Exception("Sql Not Deleted");   
    }

    
    
    //Add   
    public function Add($TableName,$Data)
    {
        foreach ($Data as $key => $value)
        {
        $Keys[] = $key;
        $Values[] = $value;
        }
        $Names = implode($Keys,",");
        $Record = '"'.implode($Values,'","').'"';        
        $Query = "INSERT INTO $TableName ($Names) VALUES ($Record)";
        $Sql = mysqli_query($this->Connect,$Query);
        $id = mysqli_insert_id($this->Connect);
        if($Sql)
            return TRUE;
    }
    
    //Update
    public function Update($TableName,$Data,$ID,$where="id")
     {
        if(is_array($Data))
        { 
        $Query="UPDATE `$TableName` SET ";
        foreach ($Data as $key => $value) 
        {
         $Query .="`".$key."` = '".$value."' ,";            
        }
        $Pat="+-0/*";
        $Query .=$Pat;
        $Query = str_replace(",".$Pat," ",$Query);
        $Query .=" WHERE `$where`=$ID";
        $Sql = mysqli_query($this->Connect,$Query);
        if(!$Sql) echo  $Query;
        else  return true;
        }
        else  throw new Exception("Data Is No Array"); 
     }
     
   
    public function get_all_assoc($result){
        $array=array();
        while($row= mysqli_fetch_assoc($result)){
            $array[]=$row;
        }
        return $array;  
    }     
    
       public function Select($table, $Date = "", $where = "")
       {
       $q="";
       $w="";
       if($where!=""){
           foreach ($where as $key=>$value){
           $w.="$key='$value'";}
           $w= "where ".rtrim($w,",");
       }
       if($Date!=""){
       foreach ($Date as $key){
           $q.="$key,";
       }
       $q=  rtrim($q,",");
       }
       else
       {
           $q="*";
       }
       
       $Query="SElECT $q FROM $table $w ORDER BY id DESC";
       $sql=  mysqli_query($this->Connect,$Query);
       if($sql){
          return $this->get_all_assoc($sql);      
       }
       else{
          return FALSE;  
       }
   }
  
   //to select query
    public function Select_Query($Query)
    {
       $Sql = mysqli_query($this->Connect,$Query);
        if(!$Sql){
            //print_r($Query);
            //throw new Exception("Error : Sql Cannot Excuted Query .");
            
        }
        $Num = mysqli_num_rows($Sql);
      
        if($Num >= 0)
        {
             for($i=0;$i<$Num;$i++)
             {
                 $Data[$i] = mysqli_fetch_array($Sql);
             }
        }
        return @$Data; 
    }  
    
    public function Upload($file,$maxsize,$extensions,$path)
    {
        $Filename=$file['name'];
        $FileExtension= @strtolower(end(explode(".",$Filename)));
        $FileSize=$file['size'];
        $FileTmp=$file['tmp_name'];
        if(in_array($FileExtension,$extensions) == FALSE OR $maxsize<$FileSize)
        {
            return FALSE;
        }
        else 
        {
        $random = rand(0,9999);
        $Url =$path."_".$random.$Filename;
        $upload=move_uploaded_file($FileTmp,$Url);
        }
        return $Url;
    }
    
    //Login
    public function Login($email,$Password)
    {
      $Query ="SELECT * FROM `user` WHERE email ='$email' and password = '$Password'";
      $Sql = mysql_query($Query);
      $Num = mysql_num_rows($Sql);
      $row = array();
      if($Num == 1) 
      {
          $row= mysqli_fetch_assoc($Sql);
      }
      return $row;
    }
    
    function Enslug($title) {
            $LetterNumberSpaceHyphen = '/[^\-\s\pN\pL]+/u';
            $hyphenspaceingduplicate = '/[\-\s]+/';
            $slug = preg_replace($hyphenspaceingduplicate,'-',$title);
            $slug = preg_replace($LetterNumberSpaceHyphen,'',$slug);
            $slug = trim($slug,'-');
	    return mb_strtolower($slug, 'UTF-8');
	}
    function Deslug($title) {
            $LetterNumberSpaceHyphen = '/[^\-\s\pN\pL]+/u';
            $hyphenspaceingduplicate = '/[\-\s]+/';
            $slug = preg_replace($hyphenspaceingduplicate,' ',$title);
            $slug = preg_replace($LetterNumberSpaceHyphen,'',$slug);
            $slug = trim($slug,'-');
	    return mb_strtolower($slug, 'UTF-8');
	}
        
    function views($askId)
    {
        $w = array(askId=>$askId);
        $check = $this->Select('views','',$w);
        if(empty($check))
        {
            $v['askId'] = $askId;
            $v['count'] = 1;
            $this->Add('views',$v);
        }
        else
        {
            $v['count'] = $check[0]['count'] + 1;
            $this->Update('views',$v,$askId,'askId');
        }
    }
}
