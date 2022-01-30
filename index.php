<!doctype html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="ui/css/style.css" />
    <title>MyCompiler</title>
  </head>
  <body style="background-color: #f3f7f7;">
    <!-- <form> -->
        <nav class="navbar navbar-dark bg-dark">   
            <a class="navbar-brand" href="#">MyCompiler</a>
            <div class="form-inline my-2 my-lg-0">
                <h6 class="text-light" style="margin: 10px;">Select Language:</h6>  
                <select class="form-control" id="languages" onchange="changeLanguage()">
                    <option value="" selected>Plain Text</option>
                    <option value="c">C</option>
                    <option value="cpp">C++</option>
                    <option value="java7">Java 1.7</option>
                    <option value="java7">Java 1.8</option>
                    <option value="js">JavaScript</option>
                    <option value="php">Php</option>
                    <option value="python2">Python 2.8</option>
                    <option value="python3">Python 3.8</option>
                    <option value="sqlite">SQLite</option>
                </select>
            </div>
        </nav>
        <br/><br/>
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <h6>Code Editor</h6>
                    <div class="editor" id="editor"></div>
                    <br/>
                    <div class="row">  
                        <div class="col-2"> 
                            <button type="button" class="btn btn-dark" onclick="upload()"><i class="fas fa-file-upload"></i></button>
                            <button type="button" class="btn btn-dark" onclick="download()"><i class="fa fa-download"></i></button>  
                        </div>
                        <div class="col-6 text-left"><h6 style="margin: 10px;" id="process"></h6></div>
                        <div class="col-4 text-right">  
                            <button id="execute" type="button" class="btn btn-success" onclick="executeCode()">Execute</button>        
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <h6>User Input</h6>
                    <div class="row" id="input_div">
                        <textarea id="input" class="form-control"></textarea>
                    </div>
                    <br/>
                    <h6>Output</h6>
                    <div class="row" id="output_div">
                        <textarea id="output" class="form-control" readonly></textarea>
                    </div>
                </div>
            </div>
        </div>
    <!-- </form> -->

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="ui/js/compiler.js"></script>
    <script src="ui/js/lib/theme-monokai.js"></script>
    <script src="ui/js/jquery-3.2.1.min.js"></script>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ext-themelist.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js" integrity="sha512-GZ1RIgZaSc8rnco/8CXfRdCpDxRCphenIiZ2ztLy3XQfCbQUSCuk8IudvNHxkRA3oUg6q0qejgN/qqyG1duv5Q==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ext-themelist.min.js" integrity="sha512-5CwAfXQtNsk5OzybMAJ3U14TStTq6jUHJoWxu58KOyioLXO3fX6FPUKaYp/2iF6yZMkv38fvh3nH+Vq94R2BUg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ext-language_tools.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>