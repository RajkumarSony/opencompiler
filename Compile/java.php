<?php

    //putenv("PATH=C:\Program Files\Java\jdk-13.0.1\bin");
	$CC="javac";
	$out="timeout 14s java Main";// || echo \"exit code $?\"";
    $code=trim($_POST["code"]);
	$input=trim($_POST["input"]);
	$filename_code="Main.java";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$runtime_file="runtime.txt";
	$executable="*.class";
	$time = "time";
	$command=$CC." ".$filename_code;
	$command_error=$command." 2>".$filename_error;
	$runtime_error_command=$out." 2>".$runtime_file;

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
	// exec("icacls  $executable /g everyone:f");
	// exec("icacls  $filename_error /g everyone:f");
        //exec("icacls $filename_error /grant everyone:(F)");
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
			// shell_exec($runtime_error_command);
			// $runtime_error=file_get_contents($runtime_file);
			exec("chmod 777 $runtime_file");
			shell_exec($runtime_error_command);
			$runtime_error=file_get_contents($runtime_file);
			$output=shell_exec($out);
			 
		}
		else
		{
			exec("chmod 777 $runtime_file");
			shell_exec($runtime_error_command);
			$runtime_error=file_get_contents($runtime_file);
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		if (trim($runtime_error)=="" && trim($output)=="")echo "$sucess"."$Nothing";
		else if(trim($runtime_error)=="")echo "$sucess"."$output";
		else echo "$Run_Error"."$runtime_error";
	}
	else if(!strpos($error,"error")){
		echo "$compile_Error"."$error";
		if(trim($input)==""){
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		echo "$output";
	}
	else
	{
		echo "$compile_Error"."$error";
	}
	exec("rm $filename_code");
	exec("rm *.txt");
	exec("rm $executable");
?>
