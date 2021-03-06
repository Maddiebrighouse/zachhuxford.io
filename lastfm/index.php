<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>music creep - zachhuxford.io</title>
  <link href="/res/w3.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript">
    var currentUser = <?php
        if (isset($_GET["username"])) {
          echo json_encode($_GET["username"]);
        } else {
          echo json_encode("zachbwh");
        }
        ?>;
  </script>
  <script src="./lastfm.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/async@2.6.0/dist/async.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/underscore@1.8.3/underscore.min.js"></script>
</head>
<style>
 .profile-image-parent {
   top: 50%;
   transform: translate(0%, -50%);
   display: inline-block;
   float: left;
   position: relative;
   margin-bottom: 20px;
 }

 .time-since-played {
   color: #777777;
 }

@media (max-width: 500px) {
  .profile-image {
    width: 120px;
    border-radius: 60px;
    padding: 10px;
  }

  .recentTrackDiv {
    height: 200px;
    border: solid #777777;
    border-width: 0px 0px 1px 0px;
    background-color: #111111;
  }

  .recentTrackDivHover {
    height: 200px;
    border: solid #777777;
    border-width: 0px 0px 1px 0px;
    background-color: #333333;
  }

  .recentTrackIcon {
    font-size: 22px;
  }

  .recentTrackText {
    //float: left;
    padding: 6px;
    display: block;
    flex-grow: 100%;
    color: #888888;
    font-size: 22px;


    width: 350px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;

  }

  .recentTrackUsername {
    color: #DDDDDD;
    font-size: 30px
  }

  .recentTrackText p {
    margin: 6px;
    text-overflow: ellipsis;
  }
}
@media (min-width:501px) {
  .profile-image {
    width: 80px;
    border-radius: 40px;
    padding: 10px;
  }

 .recentTrackDiv {
   height: 135px;
   border: solid #333333;
   border-width: 0px 0px 1px 0px;
   background-color: #111111;
 }

 .recentTrackDivHover {
   height: 135px;
   border: solid #777777;
   border-width: 0px 0px 1px 0px;
   background-color: #333333;
 }

 .recentTrackIcon {
   font-size: 15px;
 }

 .recentTrackText {
   //float: left;
   padding: 6px;
   display: block;
   flex-grow: 100%;
   color: #888888;
 }

 .recentTrackUsername {
   color: #DDDDDD;
   font-size: 18px
 }

 .recentTrackText p {
   margin: 6px;
   padding-left: 75px;
   text-overflow: ellipsis;
 }
}

 a {
   text-decoration: none;
 }
 a:hover {
   text-decoration: underline;
 }
</style>
<body>
  <div id='creeperBar'>
  </div>
</body
