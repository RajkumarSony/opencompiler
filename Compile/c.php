<?php

    //putenv("PATH=F:\SOFT\CodeBlocks\MinGW\bin");
	$CC="gcc";
	$out="timeout 14s ./a.out";
	$code=trim($_POST["code"]);
	$input=trim($_POST["input"]);
	$filename_code="main.c";
	$filename_in="input.txt";
  	$file_out="output.txt";
	$filename_error="error.txt";
	$executable="a.out";
	$command=$CC." -lm ".$filename_code;
	$command_error=$command." 2>".$filename_error;
  	$commandi=$out." >".$file_out;

	$Nothing = "Your code didn't print anything.\n=================================\n";
	$sucess = "Compiled & Run Successful! \n===========================\n"; 
	$compile_Error = "Compilation Error! \n===================\n";
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

	if(trim($error)=="")
	{
    		exec("chmod 777 $executable");
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		if (trim($output)=="")echo "$sucess"."$Nothing";
		else echo "$sucess"."$output";
		
  
	}
	else if(!strpos($error,"error")){
		echo "$compile_Error"."$error";
		if(trim($input)=="")
			$output=shell_exec($out);
		
		else{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		echo "$output";
	}
	else{
		echo "$compile_Error"."$error";
	}
	exec("rm $filename_code");
	exec("rm *.o");
	exec("rm *.txt");
	exec("rm $executable");
?>
