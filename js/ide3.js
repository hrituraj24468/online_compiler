let editor;

window.onload = function() {
    editor = ace.edit("editor");
    editor.setTheme("ace/theme/github");
    editor.session.setMode("ace/mode/c_cpp");
    $.ajax({

        url: "./app/idgenshowdata.php",

        method: "POST",


        success: function(response) {
            editor.insert(response)
        }
    })
}


function changeLanguage() {

    let language = $("#languages").val();

    if(language == 'c' || language == 'cpp')editor.session.setMode("ace/mode/c_cpp");
    else if(language == 'php')editor.session.setMode("ace/mode/php");
    else if(language == 'python')editor.session.setMode("ace/mode/python");
    else if(language == 'node')editor.session.setMode("ace/mode/javascript");
}

function executeCode() {

    $.ajax({

        url: "./app/compiler.php",

        method: "POST",

        data: {
            language: $("#languages").val(),
            code: editor.getSession().getValue()
        },

        success: function(response) {
            $(".output").text(response)
        }
    })
    $.ajax({

        url: "./app/uploaddata.php",

        method: "POST",

        data: {
            code: editor.getSession().getValue()
        },

        success: function(response) {
            
        }
    })
    
}

function newfile() {

    $.ajax({

        url: "./app/newfile.php",

        method: "POST",

        data: {
            language: $("#languages").val(),
            code: editor.getSession().getValue()
        },

        success: function(response) {
            rowObj.entity.value = editor.getValue();
            editor.setValue("",0);
        }
    })
   
    
}
function savefile() {

    let filename = prompt("Wanna save", "enter the name:");

    $.ajax({

        url: "./app/savefile.php",

        method: "POST",

        data: {
            filename: filename,
            code: editor.getSession().getValue()
        },

        success: function(response) {
            alert("saved ");
            
        }
    })



    
}



