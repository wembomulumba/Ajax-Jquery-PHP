	
	<?php		
	
	
	
	try{



    $db = new Mongo("localhost:27017");



    $registrations = $db->selectCollection('biga', 'profile');



} catch (Exception $e){



    echo 'Caught exception: ',  $e->getMessage(), "

";



}                 




  try{

      
        //
		
		
  
		
		
		
    $registrations->update(
    array("author" => "Timothy"),
    array('$set' => array("author" => "Timothy", "firstname" => "Timothy" )));
 
        



    //    echo "<h3>Your're registered!</h3>";



    } catch (Exception $e){



        echo 'Caught exception: ',  $e->getMessage(), "

";



    }
	
	
	
	
	
	
	

	
	
	
	
	
	
	?>