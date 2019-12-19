<?php
    function generateRandomString($length = 7) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
    function generateCaptchaImage($text = 'good'){
        // Set the content-type
        //header('Content-Type: image/png');
        $width  = 150;
        $height = 30;
        // Create the image
        $im = imagecreatetruecolor($width, $height);

        // Create some colors
        $white  = imagecolorallocate($im, 255, 255, 255);
        $grey   = imagecolorallocate($im, 128, 128, 128);
        $black  = imagecolorallocate($im, 0, 0, 0);
        imagefilledrectangle($im, 0, 0, 399, 29, $white);

        //ADD NOISE - DRAW background squares
        $square_count = 6;
        for($i = 0; $i < $square_count; $i++){
            $cx = rand(0,$width);
            $cy = (int)rand(0, $width/2);
            $h  = $cy + (int)rand(0, $height/5);
            $w  = $cx + (int)rand($width/3, $width);
            imagefilledrectangle($im, $cx, $cy, $w, $h, $white);
        }

        //ADD NOISE - DRAW ELLIPSES
        $ellipse_count = 5;
        for ($i = 0; $i < $ellipse_count; $i++) {
          $cx = (int)rand(-1*($width/2), $width + ($width/2));
          $cy = (int)rand(-1*($height/2), $height + ($height/2));
          $h  = (int)rand($height/2, 2*$height);
          $w  = (int)rand($width/2, 2*$width);
          imageellipse($im, $cx, $cy, $w, $h, $grey);
        }

        // Replace path by your own font path
        $font = '../common_lib/verdana.ttf';

        // Add some shadow to the text
        imagettftext($im, 20, 0, 11, 21, $grey, $font, $text);

        // Add the text
        imagettftext($im, 20, 0, 10, 20, $black, $font, $text);

         // Using imagepng() results in clearer text compared with imagejpeg()
		$file = "../common_lib/capcha.png";
        imagepng($im,$file);
		imagedestroy($im);
		$data = base64_encode(file_get_contents($file));
		unlink($file);   	
        //imagedestroy($im);
		
		return $data;
    }

    //$randomString = generateRandomString();
    //generateCaptchaImage($randomString);
?>