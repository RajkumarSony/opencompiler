<?php
	$CC="python3";
    $code=$_POST["code"];
	$input=$_POST["input"];
	$filename_code="main.py";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$command=$CC." ".$filename_code;
	$command_error=$command." <".$filename_in." 2>".$filename_error;

	$Nothing = "Your code didn't print anything.\n=================================\n";
	$sucess = "Compiled & Run Successful! \n===========================\n"; 
	$Run_Error = "Runtime Error! \n===============\n";

	$file_code=fopen($filename_code,"w+");
	fwrite($file_code,$code);
	fclose($file_code);
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);

	exec("chmod 777 $filename_error");
	exec("chmod 777 $filename_code");
	exec("chmod 777 $filename_in");
	shell_exec($command_error);
	$error=file_get_contents($filename_error);

	if(trim($error)==""){
		if(trim($input)=="")$output=shell_exec($command);
		else{
			$command=$command." <".$filename_in;
			$output=shell_exec($command);
		}
		if (trim($output)=="")echo "$sucess"."$Nothing";
		else echo "$sucess"."$output";
	}
	else	echo "$Run_Error"."$error";

	exec("rm $filename_code");
	exec("rm *.txt");
?>
