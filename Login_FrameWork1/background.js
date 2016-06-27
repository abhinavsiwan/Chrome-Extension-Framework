//Add an event Listener to receive the message sent from popup.js to background.js
chrome.runtime.onMessage.addListener(function(message, sender, sendResponse) {
        //alert("Popup message received :"+ message.email + " " + message.pass + " " + message.web);
     
        //saves the data in persistent storage
        chrome.storage.sync.set({"key": {'email': message.email, 'pass': message.pass}}, function () {
             if (chrome.runtime.error) {
                //alert("Runtime error.");
                console.log("Runtime error.");
            } else {
                //alert("settings saved");
                console.log("settings saved");
            }
        });
    
        //then update the page to the required URL
        /*
        1.Grab the website address passed from the html page and store it in a variable
        2. call chrome.tabs.update({url: passedURL});
        */
        chrome.tabs.update({url: "http://www.facebook.com"});
        window.close();
});