<!--
Copyright (C) 2012  Rob Stewart <robstewart57@gmail.com>, SerenA <http://www.serena.ac.uk>

This file is part of Discover-me-Semantically.

 Discover-me-Semantically is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>
-->

<?php 

error_reporting(E_ALL);
ini_set('display_errors', '1');

include("include/Serializer.php");
define("RDFAPI_INCLUDE_DIR", "include/rdfapi-php/api/");
include(RDFAPI_INCLUDE_DIR . "RdfAPI.php");
include(RDFAPI_INCLUDE_DIR . "syntax/RdfSerializer.php");
include( RDFAPI_INCLUDE_DIR . 'vocabulary/RDFS_C.php');
include( RDFAPI_INCLUDE_DIR . 'vocabulary/DC_C.php');
include( RDFAPI_INCLUDE_DIR . 'vocabulary/FOAF_C.php');


function saveToFile($rawRDF,$fileName)
{
  $myFile = "rdf/".$fileName;
  $fh = fopen($myFile, 'w') or die("can't open file");
  fwrite($fh, urldecode($rawRDF));
  fclose($fh);
}

saveToFile($_POST['rawRDF'],$_POST['fileName']);
$rdfURI=$_POST['fileLoc'];
$lodLiveURI="http://lodlive.it/en/?".$rdfURI;
header ("Location: ".$lodLiveURI); 

?>