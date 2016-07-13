function sendmailDetail(venid) {

  $("#btnSend").on('click',function (e){  

    if(sendmailValidation()){
      var name = $("#name").val();
      var message = $("#message").val();
      var contactnumber = $("#contactnumber").val();
      var email = $("#email").val();
      var bsc_id = $("#bscid").val();

      $.ajax({

       type: "POST",
       data: {
         "name": name, 
         "ven_id": venid,
         "message" : message,
         "contactnumber" : contactnumber,
         "email" : email,
         "bsc_id" : bsc_id,
       },
       url: "index.php?r=enquiries/insertenquiries",
       success: function(data){
         alert(data);
         window.location.reload(true);
       }
     });
    }
    
  });
}

function sendmailValidation() {
  var emailReg=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  var nameSpace= /^[a-zA-Z ]*$/;
  var name=$("#name").val().trim();
  var email =$("#email").val().trim();
  var contactnumber=$("#contactnumber").val().trim();
  var messageReg = /[^a-zA-Z0-9\.\,\-\@\ ]+$/;
  var message = $("#message").val().trim();

  if(name=="")
  {
    alert("Please Enter Name");
    return false;
  }
  if(name=="null")
  {
    alert("Null Keyword not allowed");
    return false;
  }
  if(nameSpace.test(name)==false){
   alert("No special character and Numeric allowed.");
   return false;
 }
 if(name.length<1){
  alert("Name must be minimum 1 characters and maximum 30");
  return false;
}
if(contactnumber==""){
 alert("Please Enter contact");
 return false;
}
if(isNaN(contactnumber))
{
  alert("contact number should be numeric only");
  return false;
}
if((contactnumber < 0))
{
 alert("Invalid Contact Number");
 return false;             
}
if(email==""){
  alert("Please Enter Email");
  return false;
}
if(emailReg.test(email) == false){
 alert("Invalid Email Address");
 return false;
}
if(message==""){
  alert("Please Enter Message");
  return false;
}if(!isNaN(message)){    
  alert("Message should not be in Numeric only!");
  return false;
}   
if(messageReg.test(message)){
  alert("Message shoud not contain special symbols except hyphal(-),comma(,),@");
  return false;
}
return true;
}  


function editDetail(venid) {


  $('#divEditbusiness').hide();
  $('#divReportInaccurate').hide();
  $('#divReportIfbusinesshasshutdown').hide();

  $('input[name=toggler]').click(function() {
   if($(this).attr('id') == 'RadioEditbusiness') {
    $('#divEditbusiness').show('slow'); 
    $('#divReportInaccurate').hide();
    $('#divReportIfbusinesshasshutdown').hide(); 

    $('input[name=toggler2]').click(function() {

     if($(this).attr('id') == 'Radioasuser') { 
      $("#btnEditSend").on('click',function (e){
        var editusertype  = $("#Radioasuser").val();
        var edittype = $("#RadioEditbusiness").val();

        if(validation()){
          var email = $("#emailEdit").val().trim();
          var contact = $("#contact").val().trim();
          var comment = $("#comment").val().trim();
          $.ajax({

           type: "POST",
           data: {
             "email": email,
             "contact": contact,
             "edittype": edittype,
             "editusertype": editusertype, 
             "ven_id": venid,
             "comment" : comment,
           },
           url: "index.php?r=editbusiness/edit",
           success: function(data){
             alert(data);
             window.location.reload(true);
           }
         });
        }
      });

    } else if($(this).attr('id') == 'Radioasbusiness') {
      $("#btnEditSend").on('click',function (e){

        var editusertype = $("#Radioasbusiness").val();
        var edittype = $("#RadioEditbusiness").val();

        if(validation()){
          var email = $("#emailEdit").val().trim();
          var contact = $("#contact").val().trim();
          var comment = $("#comment").val().trim();
          $.ajax({

           type: "POST",
           data: {
             "email": email,
             "contact": contact,
             "edittype": edittype,
             "editusertype": editusertype, 
             "ven_id": venid,
             "comment" : comment,
           },
           url: "index.php?r=editbusiness/edit",
           success: function(data){
             alert(data);
             window.location.reload(true);
           }
         });
        }
      });

    }        
                });//close toggle2

} else if($(this).attr('id') == 'RadioreportInaccurate'){
 $('#divReportInaccurate').show('slow');
 $('#divEditbusiness').hide();
 $('#divReportIfbusinesshasshutdown').hide(); 
 $("#btnEditSend").on('click',function (e){
  var edittype = $("#RadioreportInaccurate").val();

  if(validationReportInaccurate()){
    var comment = $("#comment2").val().trim();
    var email = $("#emailEdit").val().trim();
    var contact = $("#contact").val().trim();
    $.ajax({

     type: "POST",
     data: {
       "email": email,
       "contact": contact,
       "edittype": edittype, 
       "ven_id": venid,
       "comment" : comment,
     },
     url: "index.php?r=editbusiness/edit",
     success: function(data){
       alert(data);
       window.location.reload(true);
     }
   });
  } 
}); 
} else if($(this).attr('id') == 'ReportIfbusinesshasshutdown') {

  $('#divReportIfbusinesshasshutdown').show('slow');
  $('#divEditbusiness').hide();
  $('#divReportInaccurate').hide();
  $("#btnEditSend").on('click',function (e){
   var edittype = $("#ReportIfbusinesshasshutdown").val();

   if(validationReportOptional()){
    var comment = $("#comment3").val().trim();
    var email = $("#emailEdit").val().trim();
    var contact = $("#contact").val().trim();
    $.ajax({

     type: "POST",
     data: {
       "email": email,
       "contact": contact,
       "edittype": edittype, 
       "ven_id": venid,
       "comment" : comment,
     },
     url: "index.php?r=editbusiness/edit",
     success: function(data){
       alert(data);
       window.location.reload(true);
     }
   });
  } 

});

}
  }); //close toggle1       
}//close of function



function validation() {
  var emailReg=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  var commentReg = /[^a-zA-Z0-9\.\,\-\@\ ]+$/;
  var comment = $("#comment").val().trim();
  var email = $("#emailEdit").val().trim();
  var contact = $("#contact").val().trim();

  if(contact==""){
   alert("Please Enter contact");
   return false;
 }
 if(isNaN(contact))
 {
  alert("contact number should be numeric only");
  return false;
}
if((contact < 0))
{
 alert("Invalid Contact Number");
 return false;             
}
if(email==""){
 alert("Please Enter Email");
 return false;
}
if(emailReg.test(email) == false){
 alert("Invalid Email Address");
 return false;
}
if(comment==""){
  alert("Please Enter Comment");
  return false;  
}
if(!isNaN(comment)){    
  alert("Comment should not be in Numeric only!");
  return false;    
}   
if(commentReg.test(comment)){
  alert("Comment shoud not contain special symbols except hyphal(-),comma(,),@");
  return false;     
}
return true;
} 


function validationReportInaccurate() {
  var emailReg=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  var commentReg = /[^a-zA-Z0-9\.\,\-\@\\ ]+$/;
  var comment2 = $("#comment2").val().trim();
  var email = $("#emailEdit").val().trim();
  var contact = $("#contact").val().trim();
  if(contact==""){
   alert("Please Enter contact");
   return false;
 }
 if(isNaN(contact))
 {
  alert("contact number should be numeric only");
  return false;
}
if((contact < 0))
{
 alert("Invalid Contact Number");
 return false;             
}
if(email==""){
 alert("Please Enter Email");
 return false;
}
if(emailReg.test(email) == false){
 alert("Invalid Email Address");
 return false;
}
if(comment2==""){
  alert("Please Enter Comment");
  return false;     
}
if(!isNaN(comment2)){
  alert("Comment should not be in Numeric only!");
  return false;     
}   
if(commentReg.test(comment2)){
  alert("Comment shoud not contain special symbols except hyphal(-),comma(,),@");
  return false;    
}
return true;
} 


function validationReportOptional() {
  var emailReg=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  var commentReg = /[^a-zA-Z0-9\.\,\-\@\ ]+$/;
  var comment3 = $("#comment3").val().trim();
  var email = $("#emailEdit").val().trim();
  var contact = $("#contact").val().trim();
  if(contact==""){
   alert("Please Enter contact");
   return false;
 }
 if(isNaN(contact))
 {
  alert("contact number should be numeric only");
  return false;
}
if((contact < 0))
{
 alert("Invalid Contact Number");
 return false;             
}
if(email==""){
 alert("Please Enter Email");
 return false;
}
if(emailReg.test(email) == false){
 alert("Invalid Email Address");
 return false;
}
if(comment3 !==""){
   if(!isNaN(comment3)){
    alert("Comment should not be in Numeric only!");
    return false;

  }
  if(commentReg.test(comment3)){
    alert("Comment shoud not contain special symbols except hyphal(-),comma(,)");
    return false;     
  }
}

return true;
} 


function ownDetail(venid) {

  $("#btnOwnSend").on('click',function (e){  

    if(ownValidation()){
      var name = $("#ownname").val().trim();
      var contactnumber = $("#owncontactnumber").val().trim();
      var email = $("#ownemail").val().trim();

      $.ajax({

       type: "POST",
       data: {
         "name": name, 
         "ven_id": venid,
         "contactnumber" : contactnumber,
         "email" : email,
       },
       url: "index.php?r=own/owndetail",
       success: function(data){
         alert(data);
         window.location.reload(true);
       }
     });
    }
    
  });
}

function ownValidation() {
  var emailReg=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  var nameSpace= /^[a-zA-Z ]*$/;
  var name=$("#ownname").val().trim();
  var email =$("#ownemail").val().trim();
  var contactnumber=$("#owncontactnumber").val().trim();
  
  if(name !=="")
  {
    if(name=="null")
  {
    alert("Null Keyword not allowed");
    return false;
  }

  if(nameSpace.test(name)==false){

    alert("No special character and Numeric allowed.");
    return false;
  }
  if(name.length<1){
   alert("Name must be minimum 1 characters and maximum 30");   
   return false;
 }
  }
  
 if(contactnumber==""){
   alert("Please Enter contact");
   return false;
 }
 if(isNaN(contactnumber))
 { 
  alert("contact number should be numeric only");
  return false;

}
if((contactnumber < 0))
{
  alert("Invalid Contact Number");
  return false;             
}
if(email==""){

 alert("Please Enter Email");
 return false;
}
if(emailReg.test(email) == false){

 alert("Invalid Email Address");
 return false;
}

return true;
}  

function rateDetail(venid,userid) {

  $("#btnRateComment").on('click',function (e){  

   if(rateValidation()) {
    
    var ratecomment = $("#ratecomment").val().trim();
    var usertype = 'V';
    var rating = $("input[type='radio'][name='star']:checked").val(); 
    $.ajax({

     type: "POST",
     data: {
       "usertype": usertype,
       "rating":rating,
       "ven_id": venid,
       "userid": userid,
       "comment" : ratecomment,
     },
     url: "index.php?r=comments-and-ratings/ratingcomments",
     success: function(data){
       alert(data);
       window.location.reload(true);
     }
   });
  }   
});
}

function rateValidation() {

  var commentReg = /[^a-zA-Z0-9\.\,\-\@\ ]+$/;
  var ratecomment = $("#ratecomment").val().trim();
  if(ratecomment==""){

    alert("Please Enter Comment");
    return false;

  }if(!isNaN(ratecomment)){

   alert("Comment should not be in Numeric only!");
   return false;

 }   
 if(commentReg.test(ratecomment)){

   alert("Comment shoud not contain special symbols except hyphal(-),comma(,),@");
   return false;

 }
 return true;
}

function sendDetail(venid) {

  if(senddetailValidation()){

    var comment = $("#comment").val();
    var contactnumber = $("#contactnumber").val();
    var email = $("#email").val();
    
    $.ajax({

     type: "POST",
     data: {
       "ven_id": venid,
       "message" : comment,
       "contactnumber" : contactnumber,
       "email" : email,
     },
     url: "index.php?r=enquiries/insertenquiries",
     success: function(data){
       alert(data);
       window.location.reload(true);
     }
   });
  }
}

function senddetailValidation() {

  var emailReg=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  var email =$("#email").val().trim();
  var contactnumber=$("#contactnumber").val().trim();
  var commentReg = /[^a-zA-Z0-9\.\,\-\ ]+$/;
  var comment = $("#comment").val().trim();   
  if(email==""){
   alert("Please Enter Email");
   return false;
 }
 if(emailReg.test(email) == false){
  alert("Invalid Email Address");
  return false;

}
if(contactnumber==""){
 alert("Please Enter contact");
 return false;
}
if(isNaN(contactnumber))
{
  alert("contact number should be numeric only");
  return false;
}
if((contactnumber < 0))
{
  alert("Invalid Contact Number");
  return false;
}
if(comment=="")
{
  alert("Please Enter Message");
  return false;
}
if(!isNaN(comment)){
  alert("Message should not be in Numeric only!");
  return false;
}   
if(commentReg.test(comment)){
  alert("Message shoud not contain special symbols except hyphal(-),comma(,)");
  return false;
}
return true;
}  

function liveventDetail() {

  $("#btnSubmit").on('click',function (e){  

    if(liveventValidation()){
     var le_event_type = $("#evtype").val();
     var le_contact_name = $("#evname").val().trim();
     var le_role = $("#evrole").val().trim();
     var eventname = $("#evevname").val().trim();
     var le_email = $("#eemail").val().trim();
     var le_description = $("#evdecscription").val().trim();
     var le_venue = $("#evenue").val().trim();
     var le_contact = $("#econtact").val().trim();
     var le_city_name = $("#ecity").val().trim();

     $.ajax({

       type: "POST",
       data: {
         "eventtype": le_event_type, 
         "name": le_contact_name, 
         "role": le_role,
         "eventname" : eventname,
         "description" : le_description,
         "venue" : le_venue,
         "contact" : le_contact,
         "city" : le_city_name,
         "email" : le_email,
       },
       url: "index.php?r=livevents/addlivevent",
       success: function(data){
         alert(data);
         window.location.reload(true);
       }
     });
   }

 });
}

function liveventValidation() {
  var emailReg=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  var nameSpace= /^[a-zA-Z ]*$/;
 // var descriptionReg = /[^a-zA-Z0-9\.\,\-\ ]+$/;
   var descriptionReg = /[^a-zA-Z0-9\.\,\-\ ]+$/;

  var name = $("#evname").val().trim();
  var role = $("#evrole").val().trim();
  var email = $("#eemail").val().trim();
  var eventname = $("#evevname").val().trim();
  var description = $("#evdecscription").val().trim();
  var venue = $("#evenue").val().trim();
  var contact = $("#econtact").val().trim();
  var city = $("#ecity").val().trim();

  if(name=="")
  {
    alert("Please Enter Name");
    return false;
  }
  if(name=="null")
  {
    alert("Null Keyword not allowed");
    return false;
  }

  if(nameSpace.test(name)==false){

    alert("No special character and Numeric allowed.");
    return false;
  }
  if(name.length<1){
   alert("Name must be minimum 1 characters and maximum 30");   
   return false;
 }
 if(role=="")
 {
  alert("Please Enter Role");
  return false;
}
if(role=="null")
{
  alert("Null Keyword not allowed");
  return false;
}

if(nameSpace.test(role)==false){

  alert("No special character and Numeric allowed.");
  return false;
}
if(role.length<1){
 alert("Role must be minimum 1 characters and maximum 30");   
 return false;
}
if(eventname=="")
{
  alert("Please Enter Role");
  return false;
}
if(eventname=="null")
{
  alert("Null Keyword not allowed");
  return false;
}

if(nameSpace.test(eventname)==false){

  alert("No special character and Numeric allowed.");
  return false;
}
if(eventname.length<1){
 alert("Role must be minimum 1 characters and maximum 30");   
 return false;
}
if(description=="")
{
  alert("Please Enter Description");
  return false;
}
if(!isNaN(description)){
  alert("Description should not be in Numeric only!");
  return false;
}   
/*if(descriptionReg.test(description)){
  alert("Description shoud not contain special symbols except hyphal(-),comma(,)");
  return false;
}*/
/*if (document.getElementById('evdecscription').value.indexOf("'") != -1) {
    alert("Avoid single quotes in Description field");
    return false;
}*/
if(venue=="")
{
  alert("Please Enter Venue");
  return false;
}
if(!isNaN(venue)){
  alert("Venue should not be in Numeric only!");
  return false;
} 
if(city=="")
{
  alert("Please Enter City");
  return false;
}
if(city=="null")
{
  alert("Null Keyword not allowed");
  return false;
}

if(nameSpace.test(city)==false){

  alert("No special character and Numeric allowed.");
  return false;
}
if(city.length<1){
 alert("City name must be minimum 1 characters and maximum 30");   
 return false;
}  
/*if(descriptionReg.test(venue)){
  alert("Venue shoud not contain special symbols except hyphal(-),comma(,)");
  return false;
}*/
if(contact=="")
{
  alert("Please Enter contact");
  return false;
}
/*if(isNaN(contact))
{
  alert("contact number should be numeric only");
  return false;
}*/
if((contact < 0))
{
  alert("Invalid Contact Number");
  return false;
}
if(email=="")
{
 alert("Please Enter Email");
 return false;
}
if(emailReg.test(email) == false){
 alert("Invalid Email Address");
 return false;
}
return true;
}

function blogDetail(blogid,userid) {

  $("#btnBlog").on('click',function (e){  

   if(blogValidation()) {

    var ratecomment = $("#blogcomment").val().trim();
    var usertype = 'B';
    $.ajax({

     type: "POST",
     data: {
       "userid": userid,
       "usertype": usertype,
       "blogid":blogid,
       "comment" : ratecomment,
     },
     url: "index.php?r=blog/ratingcomments",
     success: function(data){
       alert(data);
       window.location.reload(true);
     }
   });
  }   
});
}

function blogValidation() {

  var commentReg = /[^a-zA-Z0-9\.\,\-\@\ ]+$/;
  var ratecomment = $("#blogcomment").val().trim();
  if(ratecomment==""){

    alert("Please Enter Comment");
    return false;

  }if(!isNaN(ratecomment)){

   alert("Comment should not be in Numeric only!");
   return false;

 }   
 if(commentReg.test(ratecomment)){

   alert("Comment shoud not contain special symbols except hyphal(-),comma(,),@");
   return false;

 }
 return true;
}
