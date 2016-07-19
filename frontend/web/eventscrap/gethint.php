<?php
/*
    Author: Nikhil Pularru
    B. Tech. (Computer Science)
    3rd Year Student At Shiv Nadar University
*/
// Array with names
// Only few cities has been referenced here.
// For more visit justdial.com
$a[] = "Ahemdabad";
$a[] = "Agra";
$a[] = "Allahabad";
$a[] = "Amritsar";
$a[] = "Agar";
$a[] = "Agartala";
$a[] = "Abu road";
$a[] = "Bangalore";
$a[] = "Baroda";
$a[] = "Bhavnagar";
$a[] = "Bhopal";
$a[] = "Bhbneshwar";
$a[] = "Badrinath";
$a[] = "Bageshwar";
$a[] = "Bahadurgarh";
$a[] = "Calcutta";
$a[] = "Chennai";
$a[] = "Chandigarh";
$a[] = "Cochin";
$a[] = "Coimbatore";
$a[] = "Chail";
$a[] = "Cannore";
$a[] = "Delhi/NCR";
$a[] = "Dharwad";
$a[] = "Daang";
$a[] = "Dahob";
$a[] = "Dalhousie";
$a[] = "Daman";
$a[] = "Dadeli";
$a[] = "Dapoli";
$a[] = "Ernakulam";
$a[] = "East Champaran";
$a[] = "East Garo Hills";
$a[] = "East Godavari";
$a[] = "East Kameng";
$a[] = "Egra";
$a[] = "Erode";
$a[] = "Etah";
$a[] = "Etawah";
$a[] = "Faizabad";
$a[] = "Falakata";
$a[] = "Faridabad";
$a[] = "Faridkot";
$a[] = "Farrukhabad";
$a[] = "Fatehabad-Harayana";
$a[] = "Fatehabad-Uttar Pradesh";
$a[] = "Firozabad";
$a[] = "Asifabad";
$a[] = "Gurgaon";
$a[] = "Goa";
$a[] = "Gadag";
$a[] = "Gadarwara";
$a[] = "Gadchiroli";
$a[] = "Gajapati";
$a[] = "Gajraula";
$a[] = "Gandhinagar-Gujrat";
$a[] = "Gangaghat";
$a[] = "Hyderbad";
$a[] = "Hubli";
$a[] = "Hailakandi";
$a[] = "Haldwani";
$a[] = "Hamirpur-Uttar Pradesh";
$a[] = "Hamirpur- Himachal Pradesh";
$a[] = "Hanumangarh";
$a[] = "Hapur";
$a[] = "Indore";
$a[] = "Idar";
$a[] = "Imphal";
$a[] = "Islampur";
$a[] = "Itanagar";
$a[] = "Jaipur";
$a[] = "Jalandhar";
$a[] = "Jamnagar";
$a[] = "Jamshedpur";
$a[] = "Jodhpur";
$a[] = "Jageshwar";
$a[] = "Jaisalmer";
$a[] = "Kolkata";
$a[] = "Kanpur";
$a[] = "Kochi";
$a[] = "Kohlapur";
$a[] = "Kadapa";
$a[] = "Kairana";
$a[] = "Kaimur";
$a[] = "Kovai";
$a[] = "Lucknow";
$a[] = "Ludhiana";
$a[] = "Lachen";
$a[] = "Laharpur";
$a[] = "Lakheri";
$a[] = "Lalitpur";
$a[] = "Lakshadeep";
$a[] = "Latur";
$a[] = "Madras";
$a[] = "Mumbai";
$a[] = "Madurai";
$a[] = "Mysore";
$a[] = "Mahabalipuram";
$a[] = "Madhubani";
$a[] = "Madikeri";
// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;
?>
