var api_key = "a0f6605fafd4fe8da5875bc7c04dca05";

function sendRequest() {
  var albumHistoryRequest = new XMLHttpRequest();

  albumHistoryRequest.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200) {
      var myNode = document.getElementById("albums");
      while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
      }

      var albumInfo = JSON.parse(this.responseText);
      var numberOfAlbums = albumInfo.topalbums["@attr"].perPage;
      for (i = 0; i < numberOfAlbums; i++) {
        var imageUrl = albumInfo.topalbums.album[i].image[imageSize]["#text"];
        addObjectToList(createImageObject(imageUrl));
      }
      $( "div.coverDiv" ).hover(function() {
        $(this).css("background-image", $(this).css("background-image").replace("radial-gradient(rgba(100, 100, 100, 0.3), rgba(10, 10, 10, 0.3)),", "radial-gradient(rgba(200, 200, 200, 0.1), rgba(100, 100, 100, 0.1)),"));
        $(this).css("filter", "grayscale(0%)");
      },
      function() {
        $(this).css("background-image", $(this).css("background-image").replace("radial-gradient(rgba(200, 200, 200, 0.1), rgba(100, 100, 100, 0.1)),", "radial-gradient(rgba(100, 100, 100, 0.3), rgba(10, 10, 10, 0.3)),"));
        $(this).css("filter", "grayscale(100%)");
      }
      );

    }
  }
  albumHistoryRequest.open("GET", "https://ws.audioscrobbler.com/2.0/?method=user.gettopalbums&user=" + currentUser + "&api_key=" + api_key + "&format=json&period=3month&limit=" + numberOfResults, true);
  albumHistoryRequest.send();
}

function  createImageObject(url) {
  div = document.createElement('div');
  //console.log(div.style.backgroundImage);
  div.className = "coverDiv col";
  div.style.width = gridSquareWidth;
  div.style.height = gridSquareHeight;
  div.style.backgroundImage = "radial-gradient(rgba(100, 100, 100, 0.3), rgba(10, 10, 10, 0.3))," + "url('" + url + "')";
  div.style.filter = "grayscale(100%)"
  div.style.backgroundRepeat = "no-repeat";
  div.style.backgroundSize = "cover";
  return div;
}

function addObjectToList(obj) {
  document.getElementById('albums').appendChild(obj);
}

sendRequest();
