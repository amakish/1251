<?php
class Animal
{
	public $sHungry = "hell yeah I am hungry";
	
	
	function eat($food)
	{
		if($food=='meat')
		{
			$this->sHungry = "I am not really hungry. I don't like " . $food;
		} // End if
		
	} // End eat
	
} // End class

interface Gender
{
	const MALE = 'm';	
	const FEMALE = 'f';
} // End Gender

interface Showable
{
	public function show();
	
} // End Showable

class Dog extends Animal implements Gender, Showable
{
	public $sBreed = 'Lab';
	
	function __construct($sBreed)
	{
		$this->$sBreed = $sBreed;
		$this->sGender = Gender::MALE;
		$this->show();
	} // End __construct
	
	function show()
	{
		foreach($this as $name => $value)
		{
			echo "<li>$name = $value</li>";
		}
	}
}
	
?>