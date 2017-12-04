<?php 
class csvIo{
	public $csvData = [[]];
	public $row = 0;

	function __construct($data) {
		$this->readCsv($data);
	}

	function readCsv($path){
		if (($handle = fopen("data.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
				$num = count($data);
				for ($c=0; $c < $num; $c++) {
					$this->csvData[$this->row][$c] = $data[$c];
				}
				$this->row++;	
			}
			fclose($handle);
		}
	}

	function add($data){
		$this->csvData[$this->row] = $data;
		$this->writeCsv();
	}

	function remove($id){

	}

	function edit($id, $data){

	}

	function writeCsv(){
		if (($handle = fopen("data.csv", "w")) !== FALSE) {
			foreach ($this->csvData as $key => $value) {
				fputcsv($handle, $value, ";");
			}
		}
		fclose($handle);

	}

	function printData(){
		echo "<table class='table'>";
		for($i=0; $i < count($this->csvData); $i++){
			if($i == 0){
				echo "<tr>";
				for ($c=0; $c < count($this->csvData[$i]); $c++) {
					echo "<th>".$this->csvData[$i][$c]."</th>";
				}
				echo "<th></th><th></th>";
				echo "</tr>";
			}else{
				echo "<tr>";
				for ($c=0; $c < count($this->csvData[$i]); $c++) {
					echo "<td>".$this->csvData[$i][$c]."</td>";
				}
				echo "<td><input class='btn btn-primary' type='submit' name='delete' value='".$i."'><td><input class='btn btn-primary' type='submit' name='delete' value='".$i."'>";
				echo "</tr>";
			}
		}
		echo "</table>";
	}

}
?>
