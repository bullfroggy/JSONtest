<?php

	class inputConstruct {
		
		public $name, $type, $label, $items;
		
		function checkParam($key, $value){
			if ($key == 'type'){
				$this->setType($key, $value);
			}
			else if ($key == 'items'){
				$this->setItems($key, $value);
			}
			else if ($key == 'label'){
				$this->setLabel($key, $value);
			}
			else {
				$this->setName($key, $value);
			}
		}
		
		function setName($key, $value){
			$this->name = $key;
		}
		
		function setType($key, $value){
			$this->type = $value;
		}
		
		function setLabel($key, $value){
			$this->label = $value;
		}
		
		function setItems($key, $value){
			$this->items = array();
			foreach ($value as $item){
				array_push($this->items, $item);
			}
		}
		
		function displayForm(){
			echo '<label>' . $this->label . ' </label>';
			if ($this->type == 'select'){
				echo '<select name=\'' . $this->name . '\' form=\'outputform\'>';
				foreach ($this->items as $item){
					echo '<option value=\'' . $item . '\'>' . $item . '</option>';
				}
				echo '</select>';
				
			}
			else {
				echo '<input name=\'' . $this->name . '\' type=\'' . $this->type . '\'>';
			}
		}
	}

	if(isset($_POST["json-string"])){
		if($_POST["json-string"] != ''){
			$jsonString = $_POST["json-string"];
			$jsonObject = json_decode($jsonString);
			$jsonArray = json_decode($jsonString, true);
			echo "<form action='' id='outputform' method='POST'>";
			foreach ($jsonArray as $key=>$value){
				echo '</br>';
				$newInput = new inputConstruct;
				$newInput->checkParam($key, $value);
				if (is_array($value)){
					getContents($value, $newInput);
				}
				$newInput->displayForm();
			}
			echo "<input type='submit' name='test' value='Submit'>";
			echo "</form>";
			echo '<script>document.getElementById(\'textfield\').innerHTML = \'' . $jsonString . '\';</script>';
		}
	}
	if(isset($_POST["test"])){
		echo '<center>';
		echo 'Received the following data:</br>';
		print_r ($_POST);
		echo '</center>';
	}
	
	function getContents($value, $newInput){
		foreach ($value as $x=>$y){
			$newInput->checkParam($x, $y);
		}
	}

?>