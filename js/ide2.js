
function joinidgen() {
    let id = prompt("Enter the ID:");

    $.ajax({

        url: "./app/joinidgen.php",

        method: "POST",

        data: {
            id: id,
            code: editor.getSession().getValue()
        },

        success: function(response) {
            editor.insert(response)
        }
    })
   
    
}

function createidgen() {

    $.ajax({

        url: "./app/createidgen.php",

        method: "POST",

        success: function(response) {
            alert("ID is: " + response)
        }
    })
   
    
}

function pushidgen(){
    $.ajax({

        url: "./app/pushidgen.php",

        method: "POST",

        data: {
            
            code: editor.getSession().getValue()
        },

        success: function(response) {
            alert("saved ");
            
        }
    })

}