$(document).ready(function(){
$("#et-vmmv-slider").each(function() { 
    // Vars //////
    var slider = $(this);
    var slidesContainer = slider.find('.et-vmmv-slides-container');
    var imgList = slider.find('.et-vwmv-slider-imgs');
    var imgs = imgList.find('img');
    var imgGutter = 18;
    var nav = slider.find('.et-vwmv-slider-nav');
    var navItems = nav.find('li');
    var activeSlideIndex = 0;
    var activeOffset = 0;
    var dragOffset = [0,0];
    var moveOffset = 0;
    var dragActive = false;
    var dragThreshold = 20;
    var mobileView = 925;
    var sliderData = {};
    var lastTouchOffset =  0;
    var loaded = false;
    var winWidth = $(window).width();
    var originalData = {
      first: imgs.length,
      length: imgs.length,
    };
  
    // Duplicate the Images
    var dupList = imgList.find('li').clone();
    var dupList2 = imgList.find('li').clone();
    imgList.prepend(dupList);
    imgList.append(dupList2);
    var imgs = imgList.find('img');
  
    // Functions //////
    // Helper: Get Difference
    var difference = function (num1, num2){
      return Math.abs(num1 - num2);
    };
  
    var setSizes = function(){
      winWidth = $(window).width();
      var aspectRatio = [150,73];
      var imgWidth = winWidth * 0.40;
      var minWidth = 240;
      var maxWidth = 250;
      if (winWidth < mobileView) imgWidth = winWidth * 0.6;
      if (imgWidth > maxWidth) imgWidth = maxWidth;
      if (imgWidth < minWidth) imgWidth = minWidth;
      var imgHeight = imgWidth / (aspectRatio[0] / aspectRatio[1]);
      slider.css('height', (imgHeight+100) + 'px');
      slider.find('img').css('width', imgWidth + 'px');
      slider.find('img').css('height', imgHeight + 'px');
    };
  
    // Get Slider Data
    var getSliderData = function(){
      setSizes();
      winWidth = $(window).width();
      imgs = imgList.find('img');
      var slides= [];
      imgs.each(function(i) {
        slides.push({
          width: imgs[i].width,
          height: imgs[i].height,
          offset: imgs[i].offsetLeft,
        })
      });
      sliderData = {
        width: imgList[0].scrollWidth,
        height: imgList[0].scrollHeight,
        slideCount: imgs.length,
        slides: slides,
        activeScale: 1.1,
        activeScalePerc: '10%',
      }
      if (winWidth < mobileView) sliderData.activeScalePerc = '5%';
    };
    // Autorotate Slider
    var autoRotate = function(){
      window.setTimeout(function(){
        getActiveOffset();
        getSliderData();
        scrollSlider('left', 101);
        slidesContainer.css('transition', 'all 70s linear');
      }, 550);
    };
    var autoRotateStop = function(){
      slidesContainer.css('transition', '');
      getSliderData();
    };
    // Reset Position
    var resetSliderPosition = function(){
      imgs = imgList.find('img');
      var reposition = false;
      var expanded = false;
      // 24 is the length of an untransformed css matrix
      if ($(imgs[activeSlideIndex]).closest('li').hasClass('expanded')) expanded = true;
      if (activeSlideIndex > originalData.length * 2){
        activeSlideIndex = activeSlideIndex - originalData.length;
        reposition = true;
      }
      if (activeSlideIndex < originalData.length){
        activeSlideIndex = activeSlideIndex + originalData.length;
        reposition = true;
      }
      if (reposition){
        nextSlideIndex = activeSlideIndex;
        getActiveOffset();
        if (winWidth < mobileView) activeOffset = activeOffset  - (sliderData.slides[nextSlideIndex].width / 2) - (imgGutter / 2);
        else activeOffset = activeOffset  - sliderData.slides[nextSlideIndex].width - imgGutter;
        var translate = 'translateX(' + activeOffset + 'px)';
        window.setTimeout(function(){
          slidesContainer.addClass('no-transition');
          slidesContainer.css('transform', translate);
          activeSlideIndex = nextSlideIndex;
          setActiveNav(activeSlideIndex);
          if (expanded) scaleImg($(imgs[activeSlideIndex]));
        }, 501);
        window.setTimeout(function(){
          slidesContainer.removeClass('no-transition');
        }, 600);
      }
    };
    // Get Active Slide Offset
    var getActiveOffset = function(){
      var i;
      activeOffset = winWidth / 2 - sliderData.width;
      activeOffset = winWidth / 2;
      for (i = 0; i < sliderData.slides.length; ++i) {
        if (i < nextSlideIndex) {
          activeOffset = activeOffset - (sliderData.slides[i].width + imgGutter);
        }
      };
    };
    // Set Active Nav
    var setActiveNav = function(index){
      navItems.removeClass('active');
      var i = index-originalData.length;
      if (i === 6 || i < 0) i = 0;
      $(navItems[i]).addClass('active');
    };
    // Scroll Slider: On mousemove or click
    var scrollSlider = function(direction, throttle, nextSlide){
      winWidth = $(window).width();
      if (nextSlide === undefined){
        if (direction === "left"){
          if (throttle === 101) nextSlideIndex = activeSlideIndex + 6;
          else if (throttle > 60) nextSlideIndex = activeSlideIndex + 4;
          else if (throttle > 40) nextSlideIndex = activeSlideIndex + 3;
          else if(throttle > 20) nextSlideIndex = activeSlideIndex + 2;
          else if(throttle >= 0) nextSlideIndex = activeSlideIndex + 1;
          else nextSlideIndex = activeSlideIndex;
        } else {
          if (throttle > 60) nextSlideIndex = activeSlideIndex - 4;
          else if (throttle > 40) nextSlideIndex = activeSlideIndex - 3;
          else if(throttle > 20) nextSlideIndex = activeSlideIndex - 2;
          else if(throttle >= 0) nextSlideIndex = activeSlideIndex - 1;
          else nextSlideIndex = activeSlideIndex;
        }
      } else{
        nextSlideIndex = nextSlide;
      }
      getActiveOffset();
      if (nextSlideIndex < 0) nextSlideIndex = 0;
      if (winWidth < mobileView) activeOffset = activeOffset  - (sliderData.slides[nextSlideIndex].width / 2) - (imgGutter / 2);
      else activeOffset = activeOffset  - sliderData.slides[nextSlideIndex].width - imgGutter;
      var translate = 'translateX(' + activeOffset + 'px)';
      slidesContainer.css('transform', translate);
      if (winWidth < mobileView) scaleImg($(imgs[nextSlideIndex]));
      slidesContainer.addClass('sliding');
      window.setTimeout(function(){
        slidesContainer.removeClass('sliding');
      }, 501);
      // Set the Active Slide Index & Active Offset
      activeSlideIndex = nextSlideIndex;
  
      // Set Active Nav
      if (loaded) setActiveNav(activeSlideIndex);
    };
    // Scale Image
    var scaleImg = function(img){
      if (img === undefined){
        imgs.css('transform', '');
        imgList.find('li').css('transform', '');
        return;
      }
      var previous = img.closest('li').prevAll();
      var next = img.closest('li').nextAll();
      imgs.css('transform', '');
      imgs.closest('li').css('transform', '');
      previous.css('transform', '');
      next.css('transform-origin', '');
      next.css('transform', '');
      img.css('transform', 'scale(' + sliderData.activeScale + ')');
      previous.css('transform', 'translateX(-' + sliderData.activeScalePerc + ')');
      if (winWidth < mobileView){
        next.css('transform-origin', 'left');
        next.css('transform', 'translateX(' + sliderData.activeScalePerc + ')');
      }
      imgs.closest('li').removeClass('expanded');
      img.closest('li').addClass('expanded');
    };
  
    // Events //////
    var touchFired = false;
    var mouseDown = function(e, type){
      if (type === 'touch'){
        dragOffset[0] = e.originalEvent.touches[0].pageX;
        touchFired = true;
      } else{ 
        dragOffset[0] = e.clientX;
      }
      dragActive = true;
      getActiveOffset();
    };
    var mouseMove = function(e, type){
      e.preventDefault(); 
      if (dragActive){
        moveOffset = activeOffset  - sliderData.slides[nextSlideIndex].width - imgGutter;
        if (winWidth < mobileView) moveOffset = activeOffset  - (sliderData.slides[nextSlideIndex].width / 2) - (imgGutter / 2);
        var val = moveOffset;
        var pageX = e.pageX || e.originalEvent.touches[0].pageX;
        if (dragOffset[0] > pageX) val = moveOffset - ((dragOffset[0] - pageX) * 2);
        else val = moveOffset + ((pageX - dragOffset[0]) * 2);
        var translate = 'translateX(' + val + 'px)';
        slidesContainer.css('transform', translate);
        if (type === 'touch'){
          lastTouchOffset = e.originalEvent.touches[0].pageX;
        }
      }
    };
    var mouseUp = function(e, type){
      dragActive = false;
      if (type === 'touch'){
        dragOffset[1] = lastTouchOffset;
        if (dragOffset[1] === 0) dragOffset[1] = dragOffset[0];
        lastTouchOffset = 0;
        touchFired = true;
      } else {
        dragOffset[1] = e.clientX;
      }
      // If the mousemove offset is too small: return.
      if (difference(dragOffset[0], dragOffset[1]) < dragThreshold) return;
      var direction = 'left';
      var throttle = 0;
      var diff = dragOffset[0] - dragOffset[1];
      if (dragOffset[0] - dragOffset[1] < 0){ 
        direction = 'right';
        diff = dragOffset[1] - dragOffset[0];
      } else{ 
        diff = dragOffset[0] - dragOffset[1]; 
      };
      throttle = diff / winWidth * 100;
      scrollSlider(direction, throttle);
      if (winWidth >= mobileView) scaleImg();
      resetSliderPosition();
    };
    // Mouse Down
    slidesContainer.on('mousedown', function(e) { 
      if (!touchFired) mouseDown(e, 'mouse'); 
      autoRotateStop();
      loaded = true;
    });
    // Mouse Move
    slidesContainer.on('mousemove', function(e) {  
      if (!touchFired) mouseMove(e, 'mouse'); 
    });
    // Mouse Up
    slidesContainer.on('mouseup', function(e) { 
      if (!touchFired) mouseUp(e, 'mouse'); 
      touchFired = false;
    });
    // Touch Down
    slidesContainer.on('touchstart', function(e) { 
      mouseDown(e, 'touch'); 
      autoRotateStop();
      loaded = true;
    });
    // Touch Move
    slidesContainer.on('touchmove', function(e) {  mouseMove(e, 'touch'); });
    // Touch Up
    slidesContainer.on('touchend', function(e) { mouseUp(e, 'touch'); });
  
    // Image Click
    imgs.on('click', function(e){
      e.preventDefault();
      // Prevent click function if user dragging.
      if (difference(dragOffset[0], dragOffset[1]) >= dragThreshold) return;
      // If image clicked: scroll to image position.
      var clickedSlideIndex = $(e.target).closest('li').index();
      scaleImg($(this));
      getSliderData();
      scrollSlider('right', -1, clickedSlideIndex);
      resetSliderPosition();
      autoRotateStop();
      loaded = true;
    });
    // Nav Click
    navItems.find('button').on('click', function(e){
      var index = $(e.target).closest('li').index() + originalData.length;
      scaleImg();
      setActiveNav(index);
      scrollSlider('right', -1, index);
      if (winWidth < mobileView) scaleImg($(imgs[index]));
      autoRotateStop();
      loaded = true;
    });
  
    // Get Slider Data on Resize & Reposition
    $(window).on('resize', function(){ 
      winWidth = $(window).width();
      getSliderData();
      scrollSlider('right', -1);
    });
  
    // Get Slider Data on Images Loaded & Position
    $(window).on("load", function() { 
      getSliderData(); 
      scrollSlider('right', -1, originalData.first);
      if (winWidth < mobileView) scaleImg($(imgs[originalData.first]));
      autoRotate();
    });
  
    // Clear Mouse Drag if Leaving Window /w Mouse
    // TODO: Fix
    $(document).mouseleave(function () { dragActive = false; });
    $(document).mouseenter(function () { dragActive = false; });
  });
  
  // Notes, Helpers, etc. //
  /*
    // Autorotate
    // Lazy Load Images
   */
})