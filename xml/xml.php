<?php
  $xml = '
  <student>
  <name>김정섭</name>
  <text>asd</text>
  </student>
  ';

  function get_xml($xml, $tag)
  {
    $pos1 = strpos($xml, "<$tag>") + strlen("<$tag>");
    $pos2 = strpos($xml, "</$tag>") + strlen("</$tag>");

    return substr($xml, $pos1, $pos2 - $pos1);
  }

  $name = get_xml($xml, "name");
  $text = get_xml($xml, "text");

  echo $name;
  echo $text;
?>
