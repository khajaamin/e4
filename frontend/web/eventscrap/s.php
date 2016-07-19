<?php
error_reporting(E_ALL); ini_set('display_errors', 1);

require('simple_html_dom.php');
$page = 1;
function goGrab($dbh,$row,$region,$srch,$near,$page=1)
{

		
		$html = new simple_html_dom();
		$detail_page = new simple_html_dom();
		$count=0;

		if($page==1)
				$html->load_file("http://www.justdial.com/".$region."/".$srch."-%3Cnear%3E-".$near);
			else $html->load_file("http://www.justdial.com/".$region."/".$srch."-%3Cnear%3E-".$near."/page-".$page);

			if(!empty($html)){
				$element=$html->find(".jgbg");
				if(empty($element))
					$element=$html->find(".jbbg");
				if(empty($element)){
					if($page==1){
						echo "<b>No Information Available.</b>";
					}
					else {echo "<b>No More Information Available.</b>";}
				$count=1;
				}
			}
				
			$link = "" ;
			$elemtns = array();
			if($count==0){
			foreach($element as $data){

echo "<pre>";
					print_r($data)
										exit; 
				}
			}
				$dbh = null;
	
			return count($elemtns);
}


try{





	$dbh = new PDO('mysql:host=localhost;dbname=efa2', "scraperboy", "scraperboy123");
		foreach($dbh->query('SELECT * from business_sub_categories limit 5') as $row)
		{
			$srch = $row['bsc_name'];

			if(!empty($_GET['city']))
			{
				$region= $_GET['city'];
			}
			else
			{
				$region= "mumbai";
			}
			$near="";

			$page = 1; 
			$doneCount =  goGrab($dbh,$row,$region,$srch,$near,$page);			
			if($doneCount == 10)
			{
				$page++;
				$doneCount =  goGrab($dbh,$row,$region,$srch,$near,$page);	
			}

			echo "<pre>";
			echo $srch ."<br/>"; 		}

	} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
	}

