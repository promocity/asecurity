var index_logo = document.querySelector(".index-logo-banner");
      var index_logo_img = document.querySelector(".index-logo-banner img");

      index_logo.addEventListener("mouseover", function(event){
        index_logo_img.style.cssText="animation:logo-flip 1s;" 
      });


      index_logo.addEventListener("mouseout", function(event){
        index_logo_img.style.cssText="animation:none;" 
      });