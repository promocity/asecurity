      var header_button = document.querySelector(".main-header-btn");
      var footer_button = document.querySelector(".s-footer-callback");
      var modal_window = document.querySelector(".modal-content-window");
      var modal_background = document.querySelector(".modal-background");
      var modal_content_close = modal_window.querySelector(".modal-content-close");
	  var modal_content_button = modal_window.querySelector(".modal-content-button");
		
	  
      header_button.addEventListener("click", function(modal){
        modal.preventDefault();
        modal_window.classList.add("modal-content-show");
        modal_background.classList.add("modal-content-show")
      });
	  
      footer_button.addEventListener("click", function(modal){
        modal.preventDefault();
        modal_window.classList.add("modal-content-show");
        modal_background.classList.add("modal-content-show")
      });


      modal_background.addEventListener("click", function(modal){
        modal.preventDefault();
        modal_window.classList.remove("modal-content-show");
        modal_background.classList.remove("modal-content-show")
      });


      modal_content_close.addEventListener("click", function(modal){
        modal.preventDefault();
        modal_window.classList.remove("modal-content-show");
        modal_background.classList.remove("modal-content-show")
      });
	  
	  modal_content_button.addEventListener("click", function(modal){
        modal.preventDefault();
        modal_window.classList.remove("modal-content-show");
        modal_background.classList.remove("modal-content-show")
      });