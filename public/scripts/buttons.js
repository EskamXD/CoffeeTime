document.getElementById("edit-button").addEventListener("click", function() {
    document.getElementById("edit-button").classList.add("hide");
    document.getElementById("save-button").classList.remove("hide");
    document.getElementById("cancel-button").classList.remove("hide");
   
    // document.getElementById("input-settings-user").removeAttribute("disabled");
    document.getElementById("input-settings-name").removeAttribute("disabled");
    document.getElementById("input-settings-surname").removeAttribute("disabled");
    document.getElementById("input-settings-email").removeAttribute("disabled");
  });
  
  document.getElementById("save-button").addEventListener("click", function() {
    // Tutaj możesz dodać kod do wysłania formularza
  
    document.getElementById("edit-button").classList.remove("hide");
    document.getElementById("save-button").classList.add("hide");
    document.getElementById("cancel-button").classList.add("hide");

    // document.getElementById("input-settings-user").getAttribute("disabled");
    document.getElementById("input-settings-name").getAttribute("disabled");
    document.getElementById("input-settings-surname").getAttribute("disabled");
    document.getElementById("input-settings-email").getAttribute("disabled");
  });
  
  document.getElementById("cancel-button").addEventListener("click", function() {
    // Tutaj możesz dodać kod do anulowania wprowadzonych zmian w formularzu
  
    document.getElementById("edit-button").classList.remove("hide");
    document.getElementById("save-button").classList.add("hide");
    document.getElementById("cancel-button").classList.add("hide");

    // document.getElementById("input-settings-user").getAttribute("disabled");
    document.getElementById("input-settings-name").getAttribute("disabled");
    document.getElementById("input-settings-surname").getAttribute("disabled");
    document.getElementById("input-settings-email").getAttribute("disabled");
  });