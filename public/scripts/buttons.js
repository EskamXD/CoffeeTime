document.getElementById("edit-button").addEventListener("click", function() {
    document.getElementById("edit-button").classList.add("hide");
    document.getElementById("save-button").classList.remove("hide");
    document.getElementById("cancel-button").classList.remove("hide");
   
    document.getElementById("input-settings-user").disabled = false;
    document.getElementById("input-settings-name").disabled = false;
    document.getElementById("input-settings-surname").disabled = false;
    document.getElementById("input-settings-email").disabled = false;
  });
  
  document.getElementById("save-button").addEventListener("click", function() {
    // Tutaj możesz dodać kod do wysłania formularza
  
    document.getElementById("edit-button").classList.remove("hide");
    document.getElementById("save-button").classList.add("hide");
    document.getElementById("cancel-button").classList.add("hide");

    document.getElementById("input-settings-user").disabled = true;
    document.getElementById("input-settings-name").disabled = true;
    document.getElementById("input-settings-surname").disabled = true;
    document.getElementById("input-settings-email").disabled = true;
  });
  
  document.getElementById("cancel-button").addEventListener("click", function() {
    // Tutaj możesz dodać kod do anulowania wprowadzonych zmian w formularzu
  
    document.getElementById("edit-button").classList.remove("hide");
    document.getElementById("save-button").classList.add("hide");
    document.getElementById("cancel-button").classList.add("hide");

    document.getElementById("input-settings-user").disabled = true;
    document.getElementById("input-settings-name").disabled = true;
    document.getElementById("input-settings-surname").disabled = true;
    document.getElementById("input-settings-email").disabled = true;
  });