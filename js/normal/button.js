var button = document.querySelector(".security-home-content-btn");
      var button_list = button.querySelector(".home-content-list"); 

      button.addEventListener("click", function(event){
        event.preventDefault();
        button_list.classList.toggle("show");
      });