<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
function scrape_between($data, $start, $end){
$data = stristr($data, $start); // Stripping all data from before $start
$data = substr($data, strlen($start));  // Stripping $start
$stop = stripos($data, $end);   // Getting the position of the $end of the data to scrape
$data = substr($data, 0, $stop);    // Stripping all data from after and including the $end of the data to scrape
return $data;   // Returning the scraped data from the function
}
include('simple_html_dom.php');
$page = 1;
function goGrab($row,$region,$srch,$near,$page=1)
{
		$dbh = new PDO('mysql:host=localhost;dbname=efa', "root", "");
		
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
				if(is_object($data))
				{
					$name = $data->find(".jcn");
					$link = $data->find(".jcn",0)->find('a',0)->href;
					$detail_page->load_file($link);
					if(!empty($detail_page)){

						$addressObj = $detail_page->find('.adrstxtr',0);

						if(!empty($addressObj->children(0)))
						{
							$address = $addressObj->children(0)->children(0)->plaintext;
						}
						else
						{
							$address = "";
						}
						$title = $detail_page->find(".rstotle",0)->plaintext;
						
						$img = $detail_page->find("img[id=cmp_logo]",0);
						
						if(!empty($img))
						$logoUrl = $img->src;
						else
							$logoUrl = "" ;
						$menuData = array();
						foreach($detail_page->find(".mreinfwpr") as $menu)
						{
							$menuTitleObj = $menu->find(".mreinfp",0); 

							if(!empty($menuTitleObj))
							{
								$menuTitle = str_replace(' ','-',trim($menuTitleObj->plaintext));
								$menuTitle = str_replace('-(View-all)(Show-less)', '', $menuTitle);
								$tags = array();
								foreach($menu->find('ul li') as $tag)
										{
														$tags[]	 = trim($tag->plaintext);
										}
								$menuData[$menuTitle] = $tags;
							}
						}
						
					}
					else
					{
						$address = "" ;
					}
				}
				else
				{
						$name = "";
				}
				if(is_object($data))
					{
					$add=$data->find(".mrehover");
				}
				else
				{
						$name = "";
				}
				if(is_object($data))
					{
					$phn=$data->find(".contact-info");
				}
				else
				{
						$name = "";
				}
	
				$elemtns[] = ['detail_page'=>$link,'name'=>(!empty($name[0]))?strip_tags($name[0]):'','address'=>$address,'phone'=>(!empty($phn[0]))?strip_tags($phn[0]):'',
					'title'=>trim($title),
					'logUrl'=>$logoUrl,
					'mdata'=>$menuData
				];

				try
				{

					$relationStmt  = $dbh->prepare("INSERT INTO vendors_more_categories (
						`ven_id`,
						`bmc_id`,
						`bsc_id`,
						`vmc_approved`) VALUES(:ven_id,:bmc_id,:bsc_id,'Yes')");

					$stmt = $dbh->prepare("INSERT INTO vendors (
					`ven_company_name`,
					`ven_main_category_id`,
					`ven_sub_category_id`,
					`ven_services_offered`,
					`ven_business_logo`,
					`ven_established_date`,
					`ven_country_code`,
					`ven_contact_no`,
					`ven_address`,
					`ven_email_id`,
					`ven_country_id`,
					`ven_state_id`,
					`ven_city_id`,
					`ven_location_id`,
					`ven_zip`,
					`ven_contact_person_id`,
					`hash`) VALUES (
					:ven_company_name,
					:ven_main_category_id,
					:ven_sub_category_id,
					:ven_services_offered,
					:ven_business_logo,
					:ven_established_date,
					:ven_country_code,
					:ven_contact_no,
					:ven_address,
					:ven_email_id,
					:ven_country_id,
					:ven_state_id,
					:ven_city_id,
					:ven_location_id,
					:ven_zip,
					:ven_contact_person_id,
					:hash
					)");
					$servicesOffered = implode(',',$menuData['Also-Listed-in']);
					$yearEstablished = "";
					if(!empty($menuData['Year-Established']))
						{
					$yearEstablished = $menuData['Year-Established'];
					}
					$phone = "";
					if(!empty($phn[0]))
					{
						$phone= strip_tags($phn[0]);
					$phone = str_replace('+(91)-','',$phone);
					}
					$title = trim($title);
					$email = "hi@eventforall@gmail.com";
					$countryCode = "+91";
					$countryId = 101;
					$zip  = "";
					$contactPersonId = 1;
					$hash = md5($link);
					$stateId = 22;
					$cityId = 2707;
					$locationId = 0;
					$stmt->bindParam(':ven_company_name',$title );
					$stmt->bindParam(':ven_main_category_id', $row['bmc_id']);
					$stmt->bindParam(':ven_sub_category_id', $row['bsc_id']);
					$stmt->bindParam(':ven_services_offered', $servicesOffered);
					$stmt->bindParam(':ven_business_logo', $logoUrl);
					$stmt->bindParam(':ven_established_date', $yearEstablished[0]);
					$stmt->bindParam(':ven_country_code', $countryCode);
					$stmt->bindParam(':ven_state_id', $stateId);
					$stmt->bindParam(':ven_city_id', $cityId);
					$stmt->bindParam(':ven_location_id', $locationId);
					$stmt->bindParam(':ven_contact_no', $phone);
					$stmt->bindParam(':ven_email_id', $email);
					$stmt->bindParam(':ven_address', $address);
					$stmt->bindParam(':ven_country_id', $countryId);
					$stmt->bindParam(':ven_zip', $zip);
					$stmt->bindParam(':ven_contact_person_id', $contactPersonId);
					$stmt->bindParam(':hash', $hash);


				$dbhCheck = new PDO('mysql:host=localhost;dbname=efa', "root", "");
				$hashExist = $dbhCheck->query("SELECT * from vendors where hash = '$hash'");
				$hashFound = $hashExist->fetch(); 


					if(empty($hashFound))
					{
						 $stmt->execute();
						try{
							$ven_id = $dbh->lastInsertId();
							$relationStmt->bindParam(":ven_id",$ven_id);
							$relationStmt->bindParam(":bmc_id",$row['bmc_id']);
							$relationStmt->bindParam(":bsc_id",$row['bsc_id']);
						
							$relationStmt->execute()
							or die(print_r($relationStmt->errorInfo(), true)); 

						} catch (PDOException $e) {
							print "Error!: " . $e->getMessage() . "<br/>";
							die();
						}

						}


				} catch (PDOException $e) {
					print "Error!: " . $e->getMessage() . "<br/>";
					die();
				}
				}
			}
				$dbh = null;
	
			return count($elemtns);
}
try {

		$dbh = new PDO('mysql:host=localhost;dbname=efa', "root", "");
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
			$doneCount =  goGrab($row,$region,$srch,$near,$page);			
			if($doneCount == 10)
			{
				$page++;
				$doneCount =  goGrab($row,$region,$srch,$near,$page);	
			}

			echo "<pre>";
			echo $srch ."<br/>"; 
		}
	$dbh = null;
	} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
	}
	exit;
	?>