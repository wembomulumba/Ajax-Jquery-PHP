

<?php
//If you face any errors, increase values of "post_max_size", "upload_max_filesize" and "memory_limit" as required in php.ini

 //Some Settings
$ThumbSquareSize 		= 500; //Thumbnail will be 200x200
$BigImageMaxSize 		= 1000; //Image Maximum height or width
$ThumbPrefix			= "thumb_"; //Normal thumb Prefix
$DestinationDirectory	= '../uploads/'; //Upload Directory ends with / (slash)
$Quality 				= 100;

//ini_set('memory_limit', '-1'); // maximum memory!

foreach($_FILES as $file)
{
// some information about image we need later.
$ImageName 		= $file['name'];
$ImageSize 		= $file['size'];
$TempSrc	 	= $file['tmp_name'];
$ImageType	 	= $file['type'];
$message = $_POST['textarea3'];


if (is_array($ImageName)) 
{
	$c = count($ImageName);
	
	echo  '<ul>';
	
	for ($i=0; $i < $c; $i++)
	{
		$processImage			= true;	
		$RandomNumber			= rand(0, 9999999999);  // We need same random name for both files.
		
		if(!isset($ImageName[$i]) || !is_uploaded_file($TempSrc[$i]))
		{
			echo '<div class="error">Error occurred while trying to process <strong>'.$ImageName[$i].'</strong>, may be file too big!</div>'; //output error
		}
		else
		{
			//Validate file + create image from uploaded file.
			switch(strtolower($ImageType[$i]))
			{
				case 'image/png':
					$CreatedImage = imagecreatefrompng($TempSrc[$i]);
					break;
				case 'image/gif':
					$CreatedImage = imagecreatefromgif($TempSrc[$i]);
					break;
				case 'image/jpeg':
				case 'image/pjpeg':
					$CreatedImage = imagecreatefromjpeg($TempSrc[$i]);
					break;
				default:
					$processImage = false; //image format is not supported!
			}
			//get Image Size
			list($CurWidth,$CurHeight)=getimagesize($TempSrc[$i]);

			//Get file extension from Image name, this will be re-added after random name
			$ImageExt = substr($ImageName[$i], strrpos($ImageName[$i], '.'));
			$ImageExt = str_replace('.','',$ImageExt);
	
			//Construct a new image name (with random number added) for our new image.
			$NewImageName = $RandomNumber.'.'.$ImageExt;

			//Set the Destination Image path with Random Name
			$thumb_DestRandImageName 	= $DestinationDirectory.$ThumbPrefix.$NewImageName; //Thumb name
			$DestRandImageName 			= $DestinationDirectory.$NewImageName; //Name for Big Image

			//Resize image to our Specified Size by calling resizeImage function.
			if($processImage && resizeImage($CurWidth,$CurHeight,$BigImageMaxSize,$DestRandImageName,$CreatedImage,$Quality,$ImageType[$i]))
			{
				//Create a square Thumbnail right after, this time we are using cropImage() function
				if(!cropImage($CurWidth,$CurHeight,$ThumbSquareSize,$thumb_DestRandImageName,$CreatedImage,$Quality,$ImageType[$i]))
					{
						echo 'Error Creating thumbnail';
					}
					/*
					At this point we have succesfully resized and created thumbnail image
					We can render image to user's browser or store information in the database
					For demo, we are going to output results on browser.
					*/
					
					//Get New Image Size
					list($ResizedWidth,$ResizedHeight)=getimagesize($DestRandImageName);
					
					
					
					
					
					
					
					
					
					
					echo  '<ul id="posts">' ;
					echo  '<li>' ;
					 echo '<img class = "avatar" src="../upload/images (187).jpg" +  width="50" +   height="50"      />';
					  echo '<div class="status">' ;
					 echo   '<h2>' ;
					 echo  '<a id = "postedby">';
					   echo 'joachim';
					   echo  '</a>' ;
					   echo  '</h2>'  ;
					   echo  '<p class = "message"> ' ;
					  
					  
					   echo     $message ;
					   
					    '</p>' ;
					  
		      echo 	'<div class="img_attachment" >' ; 
			
		echo 	'<img class="avatar" src="../uploads/'.$ThumbPrefix.$NewImageName.'" alt="Thumbnail" height="'.$ThumbSquareSize.'" width="'.$ThumbSquareSize.'">';
		echo "</div>";
			echo  '</div>' ; 
			echo '</li>' ;
			 echo '<p class = "likes">' ;
			 
			 echo  '<a>  Like &nbsp;&nbsp;&nbsp;&nbsp;</a>'    ;
			  echo  '<a>  Comment &nbsp;&nbsp;&nbsp;&nbsp;</a>' ;
			   echo  '<a>  Repost </a>'    ;
			 echo    '</p>'  ;
			
			  echo '</ul>';
					
					
					
					
					
					
					//echo '<ul id="posts">';
				//	echo '<tr>';
				//	echo '<td align="center"><img src="uploads/'.$ThumbPrefix.$NewImageName.'" alt="Thumbnail" height="'.$ThumbSquareSize.'" width="'.$ThumbSquareSize.'"></td>';
				//	echo '</tr><tr>';
				//	echo '<td align="center"><img src="uploads/'.$NewImageName.'" alt="Resized Image" height="'.$ResizedHeight.'" width="'.$ResizedWidth.'"></td>';
				//	echo '</tr>';
				//	echo '</ul>';
					/*
					// Insert info into database table!
					mysql_query("INSERT INTO myImageTable (ImageName, ThumbName, ImgPath)
					VALUES ($DestRandImageName, $thumb_DestRandImageName, 'uploads/')");
					*/

			}else{
				echo '<div class="error">Error occurred while trying to process <strong>'.$ImageName[$i].'</strong>! Please check if file is supported</div>'; //output error
			}
			
		}
		
	}
	echo '</ul>';
	}
}
	
// This function will proportionally resize image 
function resizeImage($CurWidth,$CurHeight,$MaxSize,$DestFolder,$SrcImage,$Quality,$ImageType)
{
	//Check Image size is not 0
	if($CurWidth <= 0 || $CurHeight <= 0) 
	{
		return false;
	}
	
	//Construct a proportional size of new image
	$ImageScale      	= min($MaxSize/$CurWidth, $MaxSize/$CurHeight); 
	$NewWidth  			= ceil($ImageScale*$CurWidth);
	$NewHeight 			= ceil($ImageScale*$CurHeight);
	
	if($CurWidth < $NewWidth || $CurHeight < $NewHeight)
	{
		$NewWidth = $CurWidth;
		$NewHeight = $CurHeight;
	}
	$NewCanves 	= imagecreatetruecolor($NewWidth, $NewHeight);
	// Resize Image
	if(imagecopyresampled($NewCanves, $SrcImage,0, 0, 0, 0, $NewWidth, $NewHeight, $CurWidth, $CurHeight))
	{
		switch(strtolower($ImageType))
		{
			case 'image/png':
				imagepng($NewCanves,$DestFolder);
				break;
			case 'image/gif':
				imagegif($NewCanves,$DestFolder);
				break;			
			case 'image/jpeg':
			case 'image/pjpeg':
				imagejpeg($NewCanves,$DestFolder,$Quality);
				break;
			default:
				return false;
		}
	if(is_resource($NewCanves)) { 
      imagedestroy($NewCanves); 
    } 
	return true;
	}

}

//This function corps image to create exact square images, no matter what its original size!
function cropImage($CurWidth,$CurHeight,$iSize,$DestFolder,$SrcImage,$Quality,$ImageType)
{	 
	//Check Image size is not 0
	if($CurWidth <= 0 || $CurHeight <= 0) 
	{
		return false;
	}
	
	//abeautifulsite.net has excellent article about "Cropping an Image to Make Square"
	//http://www.abeautifulsite.net/blog/2009/08/cropping-an-image-to-make-square-thumbnails-in-php/
	if($CurWidth>$CurHeight)
	{
		$y_offset = 0;
		$x_offset = ($CurWidth - $CurHeight) / 2;
		$square_size 	= $CurWidth - ($x_offset * 2);
	}else{
		$x_offset = 0;
		$y_offset = ($CurHeight - $CurWidth) / 2;
		$square_size = $CurHeight - ($y_offset * 2);
	}
	
	$NewCanves 	= imagecreatetruecolor($iSize, $iSize);	
	if(imagecopyresampled($NewCanves, $SrcImage,0, 0, $x_offset, $y_offset, $iSize, $iSize, $square_size, $square_size))
	{
		switch(strtolower($ImageType))
		{
			case 'image/png':
				imagepng($NewCanves,$DestFolder);
				break;
			case 'image/gif':
				imagegif($NewCanves,$DestFolder);
				break;			
			case 'image/jpeg':
			case 'image/pjpeg':
				imagejpeg($NewCanves,$DestFolder,$Quality);
				break;
			default:
				return false;
		}
	if(is_resource($NewCanves)) { 
      imagedestroy($NewCanves); 
    } 
	return true;

	}
	  
}
