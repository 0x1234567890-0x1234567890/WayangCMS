<?php

namespace wayang;

/**
 * Kelas ini berfungsi untuk migrasi database
 * 
 */
class Migration
{   
    public $columnTypes=array(
		'pk' => 'int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY',
		'string' => 'varchar(255)',
		'text' => 'text',
		'integer' => 'int(11)',
		'float' => 'float',
		'decimal' => 'decimal',
		'datetime' => 'datetime',
		'timestamp' => 'timestamp',
		'time' => 'time',
		'date' => 'date',
		'binary' => 'blob',
		'boolean' => 'tinyint(1)',
		'money' => 'decimal(19,4)',
	);
    
    public function createTable($table, $columns, $options = null)
    {
        $cols=array();
		foreach($columns as $name=>$type)
		{
			if(is_string($name))
				$cols[]="\t".$this->quote($name).' '.$this->getColumnType($type);
			else
				$cols[]="\t".$type;
		}
		$sql="CREATE TABLE ".$this->quote($table)." (\n".implode(",\n",$cols)."\n)";
		return $options===null ? $sql : $sql.' '.$options;
    }
    
    public function quote($name)
    {
        return '`'.$name.'`';
    }
    
    public function getColumnType($type)
	{
		if(isset($this->columnTypes[$type]))
			return $this->columnTypes[$type];
		elseif(($pos=strpos($type,' '))!==false)
		{
			$t=substr($type,0,$pos);
			return (isset($this->columnTypes[$t]) ? $this->columnTypes[$t] : $t).substr($type,$pos);
		}
		else
			return $type;
	}
    
    public function addForeignKey($name, $table, $columns, $refTable, $refColumns, $delete=null, $update=null)
	{
		$columns=preg_split('/\s*,\s*/',$columns,-1,PREG_SPLIT_NO_EMPTY);
		foreach($columns as $i=>$col)
			$columns[$i]=$this->quoteColumnName($col);
		$refColumns=preg_split('/\s*,\s*/',$refColumns,-1,PREG_SPLIT_NO_EMPTY);
		foreach($refColumns as $i=>$col)
			$refColumns[$i]=$this->quoteColumnName($col);
		$sql='ALTER TABLE '.$this->quoteTableName($table)
			.' ADD CONSTRAINT '.$this->quoteColumnName($name)
			.' FOREIGN KEY ('.implode(', ', $columns).')'
			.' REFERENCES '.$this->quoteTableName($refTable)
			.' ('.implode(', ', $refColumns).')';
		if($delete!==null)
			$sql.=' ON DELETE '.$delete;
		if($update!==null)
			$sql.=' ON UPDATE '.$update;
		return $sql;
	}
}
