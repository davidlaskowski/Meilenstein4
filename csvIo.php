<?php 
class csvIo{
	public $filepath = "";
	public $csvData = [[]];
	public $row = 0;

	function __construct($data) {
		$this->filepath = $data;
		$this->readCsv($data);
	}

	function readCsv($path){
		if (($handle = fopen($this->filepath, "r")) !== FALSE) {
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
		file_put_contents($this->filepath, '');
		array_splice($this->csvData,$id,1);
		$this->writeCsv();
	}

	function edit($id, $data){
		file_put_contents($this->filepath, '');
		for($i = 0; $i < count($data); $i++){
			$this->csvData[$id][$i] = $data[$i];
		}
		$this->writeCsv();
	}

	function writeCsv(){
		if (($handle = fopen($this->filepath, "w")) !== FALSE) {
			foreach ($this->csvData as $key => $value) {
				fputcsv($handle, $value, ";");
			}
		}
		fclose($handle);

	}

	function printData(){
		echo "<form action='index.php' method='post'><table class='table'>";
		echo "<tr><th>Id</th><th>Name</th><th>Höhe</th><th>Longitude</th><th>Latitude</th><th>Ascent</th></tr>";
		for($i=0; $i < count($this->csvData); $i++){
			// if($i == 0){
			// 	echo "<tr>";
			// 	for ($c=0; $c < count($this->csvData[$i]); $c++) {
			// 		echo "<th>".$this->csvData[$i][$c]."</th>";
			// 	}
			// 	echo "<th></th><th></th>";
			// 	echo "</tr>";
			// }else{
				echo "<tr>";
				for ($c=0; $c < count($this->csvData[$i]); $c++) {
					echo "<td><input type='text' name='values_".$i."_".$c."' value='".strip_tags($this->csvData[$i][$c])."' /></td>";
				}
				echo "<td><input class='btn btn-primary' type='submit' name='delete_".$i."' value='Delete'></td><td><input id='edit'".$i." class='btn btn-primary' type='submit' name='edit_".$i."' value='Edit'";

				echo "</tr>";
			// }
		}
		echo "</table></form>";
	}

}
?>
