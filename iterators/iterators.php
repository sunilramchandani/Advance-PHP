<?php
class BasicIterator extends IteratorIterator{

	public function __construct($pathToFile){
		parent::__construct(new SplFileObject($pathToFile, 'r'));
		$file = $this->getInnerIterator();
		$file->setFlags(SplFileObject::READ_CSV);
		$file->setCsvControl(',', '"', "\\");
	}
}

class FilterRows extends FilterIterator{
	public function accept(){
		$current = $this>getInnerIterator()->current();
		if (count($current) == 1){
			return false
		}
		return true;
	}
}

$filePath = 'C:\xampp\htdocs\lynda\iterators\data.csv';
$iterator = new BasicIterator($filePath);
$iterator = new FilterIterator($iterator);

foreach ($iterator as $i => $row) {
	var_dump($row);
}