/*
1. You can use debugger for debugging the application.
2. Below shown functions are examples to show how to access form fields of some common websites using jQuery
*/
function facebook(email, pass) {
    $('#email').val(email);
    $('#pass').val(pass);
    
    $('#login_form').submit();
}

function itcOutlook(email, pass) {
    //debugger;
    $('#username').val(email);
    $('#password').val(pass);
    
    $(".signinbutton").trigger("click");
}

function amazon(email, pass) {
    $('#ap_email').val(email);
    $('#ap_password').val(pass);
    
    $('#signInSubmit').click();
}

function itcVPN(email, pass) {
    //debugger;
    document.forms[0].username.value = email;
    document.forms[0].password.value = pass;
    
    document.forms[0].submit();
}

function itcOnePoint(email, pass) {
    //debugger;
    var userid = email.substring(12);
    $('#userid').val(userid);
    $('#pwd').val(pass);
    
    $('#login').submit();
}

function gitHub(email, pass) {
    $('#login_field').val(email);
    $('#password').val(pass);
    
    $(".btn-primary").trigger("click");
}

function myFunction(email, pass) {
    /*
    1. Open the page in a browser to check for the id or classname of the form fields.
    2. Access the functionalities of the form field using Jquery in myFunction.
    */
    $('#email').val(email);
    $('#pass').val(pass);
    
    $('#login_form').submit();
}

$(document).ready(function(){
    var email;
    var pass;
    var web;
//----------------------------------------------------OPTIONAL Two Level Authentication---------------------------------------------------------------------------
    //Define these URLs if you want your script to execute a particular functionality when visiting a URL
    
    var urlVPN = "https://vpn.itcinfotech.com/dana/home/index.cgi";
    
    var urlOnePoint = "https://vpn.itcinfotech.com/psp/OPPORTAL/,DanaInfo=i3lerpweb4.itcinfotech.com,Port=8000,SSO=U+?cmd=login&languageCd=ENG&";
    
    var urlTimeSheet = "https://vpn.itcinfotech.com/psp/OPPORTAL/EMPLOYEE/EMPL/h/,DanaInfo=i3lerpweb4.itcinfotech.com,Port=8000+?tab=DEFAULT";
    
//-------------------------------------------------LOG OUT FUNCTIONALTY------------------------------------------------------------------
    //Put the url of the logout page here and use that in location.href
    
    var urlLogOut = "logOutURLExtension";

//---------------------------------------------------------------------------------------------------------------------------------------
    //Retrieve the saved values from persistent storage
    chrome.storage.sync.get("key", function (obj) {
        email = obj.key.email;
        pass = obj.key.pass;
        //alert("saved message : " + JSON.stringify(obj));
        //alert("saved message : " + obj.key.email.toLowerCase() + obj.key.pass.toLowerCase() + obj.key.web.toLowerCase());
        
        /*
        1. First check for the logout functionality.
        2. call the function
            myFunction(obj.key.email, obj.key.pass);
        */
        if(location.href.includes(urlLogOut) || location.href == urlLogOut) {
            console.log("Log out url visited");
            return;
        }
        //If the user wants to go one level down, then myFunction() will handle that.
        myFunction(obj.key.email, obj.key.pass);
    });

//----------------------------------------------------OPTIONAL---------------------------------------------------------------------------
    //This part of the code is used when we want our script to execute a particular functionality when visiting a URL
    
    //If the user wants to go multiple levels down the page then this part of the script is used.
    if (location.href == urlVPN){
        console.log("VPN url visited");
        /*Here, You can access the functionality of vpn logged in page, like to acess onePoint, cafe express, webgenie etc.
        1. Right click and select inspect element.
        2. Go to console and type document.getElementByTagName("a") to get an array of all the anchor elements on the page.
        3. select the array index and write it as the parameter to get()
        Ex - a[18] -> is the link for One Point
        */
        $('a').get(18).click();
      } else if(location.href == urlOnePoint) {
        setTimeout(function () {
            console.log("1 second passed");
            itcOnePoint(email, pass);
        },1000);
        console.log("One Point url visited");
      } else if(location.href == urlTimeSheet) {
        setTimeout(function () {
            console.log("3 seconds passed");
            /*Here You can access the functionality of onePoint Logged in page like Time sheet, Travel and expense center, Leaves etc.
            1. Right click and select inspect element.
            2. Go to console and type document.getElementByTagName("img") to get an array of all the image elements on the page.
            3. select the array index and write it as the parameter to get()
            Ex - img[42] is the link for TimeSheet
            */
            $('img').get(42).click();
        },4000);
        console.log("Time sheet url visited");
      }else {
          console.log("Not visited");
      }
//---------------------------------------------------------------------------------------------------------------------------------------
});