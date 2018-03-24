function search() {
    var xmlhttp = new XMLHttpRequest();
    var userInput = "Mosiah" // document.getElementById("userInput").value;
    console.log(" This was searched: " + userInput);
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == XMLHttpRequest.DONE) {   // XMLHttpRequest.DONE == 4
        if (xmlhttp.status == 200) {
          var listOfScriptures = JSON.parse(xmlhttp.responseText);
          var text = "<ul>";
          var scripture;
          for(scripture) in listOfScriptures) {
            text += "<li>" + listOfScripture[scripture].book;
            console.log()
          }
          text += "</ul>";
          console.log(text);
          document.getElementById("myDiv").innerHTML = text;
        } else if (xmlhttp.status == 400) {
          alert('There was an error 400');
        } else {
          alert('something else other than 200 or 400 was returned');
        }
      }
    };
    xmlhttp.open("GET", "/scriptures?book=Mosiah", true);
    xmlhttp.send();
  }
