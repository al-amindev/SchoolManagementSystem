<?php
require ('/../app/Database.php');
class Model
{
  public function select($filds=NULL,$table=NULL,$condition=NULL,$join=NULL, $limit=NULL,$sql=NULL)
  { 
    $query="SELECT $filds FROM $table";
    if ($join!=null)
      $query.="$join";
    if ($condition!=null)
      $query.=" WHERE $condition";
    if ($limit!=null)
      $query.=" LIMIT $limit";
    if ($sql!=null)
      $query=$sql;
    // echo $query;
     // exit;
      $result = mysql_query($query);
      $data = array();
      while ($row = mysql_fetch_assoc($result))
        array_push($data, $row);
      //   echo "<pre>";
      // print_r($data);
      // echo "</pre>";
      // exit;
      return $data;
  }
  public function insert ($table,$filds,$data=NULL,$condition=NULL)
  {
    $query="INSERT INTO $table ($filds) VALUES ($data) $condition";
     // echo $query;
    // exit;
    $result = mysql_query($query);
   if ($result)
    return $result;
  else
    return "Your data can't post";
  }

  public function update($table,$filds,$condition=NULL,$data=NULL)
  {
    $sql ="UPDATE ".$table." SET ";
    $for_count = 1;
    foreach ($filds as $key => $value)
    {
      $sql .= $key."=".$value;
      if($for_count != sizeof($filds))
        $sql .= ",";
      ++$for_count;
    }
    $sql .= " WHERE ".$condition;
    echo $sql;
    $result = mysql_query($sql);
    return $result;
  }

  public function delete($tables,$filds,$data=NULL,$condition=NULL)
  {
    $query="DELETE FROM $tables WHERE $filds= $data";
    echo $query;
    $result = mysql_query($query);
    if ($result)
     return $result;
    else
    {
      echo "Can't Delete This is the foreign key";
      return;
    }
  } 
}
?>
