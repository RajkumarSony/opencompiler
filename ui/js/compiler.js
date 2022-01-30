let editor;

function setupEditor() {
    editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai"); 
    
    editor.setOptions({
        autoScrollEditorIntoView: true,
        wrap:true,
        copyWithEmptySelection: false,
        animatedScroll: true,
        fontSize:16,
        enableBasicAutocompletion: true,
        enableLiveAutocompletion: true,
        enableSnippets: false,
    });
    document.getElementById("input").value = "";
}

window.onload = function(){
    setupEditor();
    
}

function changeLanguage() {
    let language = $("#languages").val();

    if(language == 'c' || language == 'cpp') editor.session.setMode("ace/mode/c_cpp");
    else if(language == 'java7' || language == 'java8') editor.session.setMode("ace/mode/java");
    else if(language == 'php') editor.session.setMode("ace/mode/php");
    else if(language == 'python2' || language == 'python3') editor.session.setMode("ace/mode/python");
    else if(language == 'js') editor.session.setMode("ace/mode/javascript");
    else if(language == 'sqlite') editor.session.setMode("ace/mode/sql");
    else editor.session.setMode("");
}

function executeCode() {
    var code = editor.getValue();
    var lang = $("#languages").val();
    var input = (document.getElementById('input').value==="")?" ":document.getElementById('input').value;

    if($('#languages').val() == "") {
        alert("Please, Select the language!");
    }
    else {
        $.ajax({
            type: 'POST',
            url: '/opencompiler/compiler.php',
            data: {
                code: code,
                lang: lang,
                input: input
            },
            success: function(data){
                document.getElementById("output").value = data;
            }
        })
    }
}

// function executeCode() {

//     $.ajax({

//         url: "/ide/app/compiler.php",

//         method: "POST",

//         data: {
//             language: $("#languages").val(),
//             code: editor.getSession().getValue()
//         },

//         success: function(response) {
//             $(".output").text(response)
//         }
//     })
// }