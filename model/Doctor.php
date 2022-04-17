<?php

require("Model.php");

class Doctor extends Model
{

  protected $table = 'doctor';
  protected $key_name = 'doc_id';

  public function showDocName($doc_id)
  {
    $doc = $this->getSingle($doc_id);
    return $doc['doc_name'];
  }

  public function showAllDocName()
  {
    $result = $this->getSingleAttrAll('doc_name');
    $doc = array();
    foreach ($result as $value) {
      array_push($doc, $value['doc_name']);
    }
    return $doc;
  }
  public function showDocInfo($doc_id)
  {
    return $this->getSingle($doc_id);
  }
}
