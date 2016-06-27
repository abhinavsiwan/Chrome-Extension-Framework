/*
1. You can use debugger for debugging the application.
2. Below shown functions are examples to show how to access form fields of some websites using jQuery
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
    var userid = email.substring(12);;
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
    //Access the functionalities of the form field using Jquery in myFunction.
    $('#email').val(email);
    $('#pass').val(pass);
    
    $('#login_form').submit();
}

$(document).ready(function(){
    var email;
    var pass;
    var web;
//----------------------------------------------------OPTIONAL---------------------------------------------------------------------------
    //Define these URLs if you want your script to execute a particular functionality when visiting a URL
    //This will be done using "location.href == urlVPN"
    
    var urlVPN = "https://vpn.itcinfotech.com/dana/home/index.cgi";
    var urlOnePoint = "https://vpn.itcinfotech.com/psp/OPPORTAL/,DanaInfo=i3lerpweb4.itcinfotech.com,Port=8000,SSO=U+?cmd=login&languageCd=ENG&";
    var urlTimeSheet = "https://vpn.itcinfotech.com/psp/OPPORTAL/EMPLOYEE/EMPL/h/,DanaInfo=i3lerpweb4.itcinfotech.com,Port=8000+?tab=DEFAULT";
    
//-------------------------------------------------LOG OUT FUNCTIONALTY------------------------------------------------------------------
    //These URLs to take care of log Out functionalities
    //Put the urls of the logout page here and use that in location.href
    var urlFacebookLogOut = "https://www.facebook.com/?stype=";
    
    var urlOutlookLogOut = "https://i3ljoin.itcinfotech.com/owa/auth/logon.aspx?replaceCurrent=1&url=https%3a%2f%2fi3ljoin.itcinfotech.com%2fowa";
    
    var urlVPNLogOut = "https://vpn.itcinfotech.com/dana-na/auth/url_default/welcome.cgi?p=logout&c=1&u=useruidce9624ce960c4a309398d1694c6416d71240d482&signinUrl=gDhXVwMvBwABAAAAdpbwvGcxJDmmRSUC9Fek3ELwK6S1KylnmQw1kEs54KLiRokFbpKnFr4HcJDIpIJOrnN9qFPyYRJb-yIusKB6Eg%3D%3D";
    
    var urlLogOut = "https://www.facebook.com/?stype=";

//---------------------------------------------------------------------------------------------------------------------------------------
    //Retrieve the saved values from persistent storage
    chrome.storage.sync.get("key", function (obj) {
        email = obj.key.email;
        pass = obj.key.pass;
        //alert("saved message : " + JSON.stringify(obj));
        //alert("saved message : " + obj.key.email.toLowerCase() + obj.key.pass.toLowerCase() + obj.key.web.toLowerCase());
        
        /*
        1. First check for the logout functionality.
        2. call a function
            myFunction(obj.key.email, obj.key.pass);
        2. Open the page in a browser to check for the id or classname of the form fields.
        3. Access the functionalities of the form field using Jquery in myFunction.
        */
        if(location.href.includes(urlLogOut) || location.href == urlLogOut) {
            console.log("Log out url visited");
            return;
        }
        myFunction(obj.key.email, obj.key.pass);
    });

//----------------------------------------------------OPTIONAL---------------------------------------------------------------------------
    //This part of the code is used when we want our script to execute a particular functionality when visiting a URL
    if (location.href == urlVPN){
        //alert("VPN url visited");
        console.log("VPN url visited");
        //click on one Point link
        $('a').get(18).click();
      } else if(location.href == urlOnePoint) {
        setTimeout(function () {
            console.log("1 second passed");
            itcOnePoint(email, pass);
        },1000);
        //alert("One Point url visited");
        console.log("One Point url visited");
        //itcOnePoint(email, pass);
      } else if(location.href == urlTimeSheet) {
        setTimeout(function () {
            console.log("3 seconds passed");
            $('img').get(42).click();
        },4000);
        console.log("Time sheet url visited");
      } if(location.href.includes(urlFacebookLogOut)) {
            console.log("Facebook Log out url visited");
            return;
      }else {
          console.log("Not visited");
      }
//---------------------------------------------------------------------------------------------------------------------------------------
});