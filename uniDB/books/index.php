<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Universal Database</title>
    <meta name="keywords" content="universal database, movies, books, games"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin">
    <link href="../../images/fsociety.png" rel="icon" type="image/png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/035468853e.js"></script>
    <script src="script.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body>
    <div class="navbar-top titlebar">
      <div class="col-sm-6">
        <a href="../../index.php" title="Home"><span class="toplink"><b>fsociety</b> by DebarredBots</span></a>
      </div>
      <div class="col-sm-1">
        <img src="../../images/fsociety.gif" class="image img-circle" title="Fear Me">
      </div>
      <div class="col-sm-4"></div>
      <div class="row-sm-1">
        <a href="../../landing.php" title="Menu"><span class="toplink menu">MENU<span class="glyphicon glyphicon-align-justify"></span></span></a>
      </div>
    </div>
    <div class="jumbotron wrapper">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="../../index.php"><b>Home&nbsp<i class="fa fa-home" aria-hidden="true"></i></b></a>
          </div>
          <ul class="nav navbar-nav">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Movies &nbsp<i class="fa fa-film" aria-hidden="true"></i></a>
              <ul class="dropdown-menu">
                <li><a href="#">Hollywood</a></li>
                <li><a href="#">Bollywood</a></li>
              </ul>
            </li>
            <li><a href="#">TV Series &nbsp<i class="fa fa-tv" aria-hidden="true"></i></a></li>
            <li class="active"><a href="#">Books &nbsp<i class="fa fa-book" aria-hidden="true"></i></a></li>
            <li><a href="#">Games &nbsp<i class="fa fa-gamepad" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="container block1">
      <center><h1>Universal Database</h1> (in beta rt now, works only for books) </center>
    </div>
    <div class="container searchbox">
      <form action="index.php" method="POST">
        <div class="form-group">
          <input type="text" class="form-control" id="search" name="search" placeholder="Try me!"/><br/>
          <input type="checkbox" name="ex-search" />&nbsp
          <span class="checka"> Extensive search </span><span class="checkb">(Might take some more time)</span>
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>
    </div>
    <div id="dl"></div>

    <?php
    error_reporting(0);
    include("simple_html_dom.php");
    $crawled_urls=array();
    $found_urls=array();
    function rel2abs($rel, $base){
     if (parse_url($rel, PHP_URL_SCHEME) != '') return $rel;
     if ($rel[0]=='#' || $rel[0]=='?') return $base.$rel;
     extract(parse_url($base));
     $path = preg_replace('#/[^/]*$#', '', $path);
     if ($rel[0] == '/') $path = '';
     $abs = "$host$path/$rel";
     $re = array('#(/\.?/)#', '#/(?!\.\.)[^/]+/\.\./#');
     for($n=1;$n>0;$abs=preg_replace($re,'/', $abs,-1,$n)){}
     $abs=str_replace("../","",$abs);
     return $scheme.'://'.$abs;
    }

    function perfect_url($u,$b){
     $bp=parse_url($b);
     if(($bp['path']!="/" && $bp['path']!="") || $bp['path']==''){
      if($bp['scheme']==""){$scheme="http";}else{$scheme=$bp['scheme'];}
      $b=$scheme."://".$bp['host']."/";
     }
     if(substr($u,0,2)=="//"){
      $u="http:".$u;
     }
     if(substr($u,0,4)!="http"){
      $u=rel2abs($u,$b);
     }
     return $u;
    }
    ?>
    <div class="container">
      <ul class="list-group">

    <?php
    function crawl_site($u){
      $ctr=0;
      $num=8;
      if(isset($_POST['ex-search'])){
        $es=$_POST['ex-search'];
        $num=25;
       }
     global $crawled_urls;
     global $found_urls;
     $uen=urlencode($u);
     if((array_key_exists($uen,$crawled_urls)==0 || $crawled_urls[$uen] < date("YmdHis",strtotime('-25 seconds', time())))){
      $html = file_get_html($u);
      $crawled_urls[$uen]=date("YmdHis");
      foreach($html->find("a") as $li){
       $url=perfect_url($li->href,$u);
       $enurl=urlencode($url);
       if($url!='' && substr($url,0,4)!="mail" && substr($url,0,4)!="java" && array_key_exists($enurl,$found_urls)==0){
        $found_urls[$enurl]=1;

        if((strpos($url, 'http://en.bookfi.net/book/') !== false) && $ctr<$num){
            $ctr=$ctr+1;
            echo "<div class='container'><div class='jumbotron'>";
            $html=file_get_html($url);
            echo "<h4><li><hr/>";
            echo $html->find('h1',0)->plaintext;
            echo "</h4></li><br/>";
            echo "<a class='btn btn-default btn-md links' target='_blank' href=".$url.">Download &nbsp <i class='fa fa-download'></i></a>";
            echo "</div></div>";
        }
       }
      }
     }
    }
    if(isset($_POST['search'])){
      $string=$_POST['search'];
      $string=preg_replace('/\s+/','+',$string);
      $url='http://en.bookfi.net/s/?q='.$string.'&t=0';
      crawl_site($url);
      echo "</ul>";
    }
    ?>
  </div>
  </body>
</html>
