<?php
/*
 Get All Links from contents matcing by tag <a>
*/
 function getLinks($contents,$tag)
{
  preg_match_all("/<a(?:[^>]*)href=\"([^\"]*)\"(?:[^>]*)>(?:[^<]*)<\/a>/is", $contents, $matches);

  return $matches[1];
}
/*
  Get All images matching img tag
*/
function getPhotosLinks($contents,$tag)
{
  preg_match_all("/<img(?:[^>]*)src=\"([^\"]*)\"(?:[^>]*)>/is", $contents, $matches);

  return $matches[1];
}
/*
  Get All images matching img tag
*/
function getPhotosLinksByTagAttributes($contents,$tag)
{
  preg_match_all('/<'.$tag.'(?:[^>]*)src=\"([^\"]*)\"(?:[^>]*)>/is', $contents, $matches);

  return $matches[1];
}
/*
  Get HTML tag contents
*/
function getHTMLTagContents($contents,$tag)
{
    //preg_match_all( "/\<th\>(.*?)\<\/th\>/s",$contents, $matches);
	preg_match_all( "/\<".$tag."\>(.*?)\<\/".$tag."\>/s",$contents, $matches);
    return $matches[1];
}

/*
 Get specific tag contents  by tag attributes
*/
function getHTMLTagContentsByTagAttributes($contents,$specifictagattr,$tagclose)
{
	preg_match_all( '/\<'.$specifictagattr.'\>(.*?)\<\/'.$tagclose.'\>/s',$contents, $matches);
    return $matches[1];
}

/*
  Validity check of links
*/
function resetLinkByValidaionChk($matches)
{
	$matchesLinkArr = array();
	$k = 0;
	foreach($matches as $key=>$value)
	{  
		//Check invalid URL
		if(strcmp(substr($value,0,1),"#")==0)
		{
		  
		}  //Set first part  http link if the link is relative
		else if(strcmp(substr($value,0,4),"http")!=0)
		{
		   $matchesLinkArr[$k] = "https://www.xing.com".$value; 
		   $k++;
		}
		else
		{
		  $matchesLinkArr[$k] = $value; 
		  $k++;
		}
	
	}
	return $matchesLinkArr;
}

?>