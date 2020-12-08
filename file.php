<?php
	class User 
	{
		protected $name;
		protected $birthday;

		function __construct($name, $birthday)
		{
			$this->name = $name;
			$this->birthday = $birthday;
		}

		function getName()
		{
			echo ("ПIБ: $this->name</br>");
		}

		function getBirth()
		{
			echo ("Дата народження: $this->birthday</br>");
		}

		function getAgeFromBirth() {

	  			$age = date('Y') - $this->birthday;
	  			echo ("Вік: $age</br>");
		}
	}

	class Student extends User
	{
		private $group;
		private $faculty;
		private $cafedra;

		function __construct($name, $birthday, $group, $faculty, $cafedra)
		{
			parent::__construct($name, $birthday);
			$this->group = $group;
			$this->faculty = $faculty;
			$this->cafedra = $cafedra;
		}

		function getGroup()
		{
			echo ("Група: $this->group</br>");
		}

		function getFaculty()
		{
			echo ("Факультет: $this->faculty</br>");
		}

		function getCafedra()
		{
			echo ("Кафедра: $this->cafedra");
		}
	}

	$st_name = $_POST['st_name'];
	$birthday = $_POST['birthday'];
	$group = $_POST['group'];
	$faculty = $_POST['faculty'];
	$cafedra = $_POST['cafedra'];

	if($st_name == '')
	{
		echo 'Ви не ввели ім\'я';
		return;
	}

	if($group == '')
	{
		echo 'Ви не ввели групу';
		return;
	}

	if($faculty == '')
	{
		echo 'Ви не ввели назву факультета';
		return;
	}

	if($cafedra == '')
	{
		echo 'Ви не ввели назву кафедри';
		return;
	}

	if($birthday == '')
	{
		echo 'Ви не ввели дату народження';
		return;
	}

	if($birthday < 1985 || $birthday > 2004)
	{
		echo 'Введіть Ваш справжній рік народження</br>(Він має бути від 1985 до 2004)';
		return;
	}

	else {
	    $obj = new Student($st_name, $birthday, $group, $faculty, $cafedra);

	    echo "Дані успішно оброблені сервером:</br>";
		$obj->getName();
		$obj->getBirth();
		$obj->getAgeFromBirth();
		$obj->getGroup();
		$obj->getFaculty();
		$obj->getCafedra();
	}
?>
