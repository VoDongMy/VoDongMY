<?php
class api extends vnit{
    function __construct(){
        parent::__construct();
    }
    
    // Tuy chinh hien thi trang thai cua ban ghi 
    function publish(){
      $status = $_POST['status'];
      $id = $_POST['id'];
      $field = $_POST['field'];
      $table = $_POST['table'];
      if($status == 0){
          $pub = 1;
      }else{
          $pub = 0;
      }
      $vdata['published'] = $pub;
      $this->db->update($table, $vdata, array($field => $id));

      echo icon_active("'$table'","'$field'",$id,$pub);
    }
}
