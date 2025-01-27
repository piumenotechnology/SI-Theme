export let global = function() {
  
  let headerWrap = document.getElementById('main-header');
  let steps = document.querySelectorAll('.step');
  let countDownElement = document.querySelectorAll(".countdown-element");
  let tabs = document.querySelector('.tabs');
  let tabItems = document.querySelectorAll('.tab');
  let tablist = document.querySelectorAll('.tab-list');
  let heros = document.querySelectorAll('.hero-small');
  let quickLinks = document.querySelectorAll('.quick-pagelink');
  let drawerButton = document.querySelector('.drawer-button');
  let navOverlay = document.querySelector('.menu-overlay--mobile');
  const scrollTop = window.scrollY || document.documentElement.scrollTop;
  var init = false;

  drawerButton.addEventListener('click', function(e) {
    e.preventDefault();
    toggleDrawer(this);
  });

  navOverlay.addEventListener('click', function(e) {
    e.preventDefault();
    document.body.classList.remove('overflow-y-hidden');
    drawerButton.classList.remove('drawer-open');
    headerWrap.classList.remove('is-open');
  });

  const toggleDrawer = (el) => {
    if(el.classList.contains('drawer-open')) {
      document.body.classList.remove('overflow-y-hidden');
      el.classList.remove('drawer-open');
      headerWrap.classList.remove('is-open');
    } else {
      document.body.classList.add('overflow-y-hidden');
      el.classList.add('drawer-open');
      headerWrap.classList.add('is-open');
    }
  }

  const onClickMenu = (el, callback) => {
    let element = document.querySelectorAll(el);
    if (!element) callback();
    for (var i = 0; i < element.length; i++) {
      element.item(i).addEventListener('click', function(e) {
        e.preventDefault();
        this.parentNode.classList.toggle('expanded');
        getSiblings(this.parentNode, 'menu-item-has-children').forEach(function(el, i) {
          if(el.classList.contains('expanded')) {
            el.classList.remove('expanded');
          }
        });
      })
    }
  }

  const getSiblings = (el, s) => {
    let siblings = [];
    if (!el.parentNode) {
      return siblings;
    }
    let sibling = el.parentNode.firstChild;
    while (sibling) {
      if (sibling.nodeType === 1 && sibling !== el && sibling.classList.contains(s)) {
        siblings.push(sibling);
      }
      sibling = sibling.nextSibling;
    }
    return siblings;
  }

  const onClickOutside = (el, callback) => {
    let element = document.querySelector(el)
    document.addEventListener('click', e => {
      if (!element.contains(e.target)) callback();
    });
  }

  const closeMenu = (el) => {
    let target = document.querySelectorAll(el);
    for (var i = 0; i < target.length; i++) {
      target[i].classList.remove('expanded');
    }
  }

  const initScroller = () => {
    const scroller = scrollama();
    scroller
      .setup({
        step: steps,
        offset: .25
      })
      .onStepEnter((r) => {
        var headerType = r.element.dataset.animateEnter;
        headerWrap.setAttribute('class', `main-nav ${headerType}`);
      })
    window.addEventListener("resize", scroller.resize);
  }

  const startTimer = setInterval(function () {
    if (countDownElement) {
      for (var i = 0; i < countDownElement.length; i++) {
        
        let countDownDate = new Date(countDownElement[i].dataset.startDate).getTime();
        let now = new Date().getTime();
        let distance = countDownDate - now;
        let days = Math.floor(distance / (1000 * 60 * 60 * 24));
        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);
        if( days <=1 ) {
          var dayPlural = "Day";
        } else {
          var dayPlural = "Days";
        }
        
        countDownElement[i].innerHTML = `<span><strong>${days}</strong> ${dayPlural}</span><span><strong>${hours}</strong> h</span><span><strong>${minutes}</strong> m</span><span><strong>${seconds}</strong> s</span>`;
        if (distance < 0) {
          clearInterval(startTimer);
          // countDownElement[i].remove();
        }
      }
    }
    
  }, 1000);

  const speakerSlider = new Swiper('.speaker-slider', {
    slidesPerView: 1.2,
    spaceBetween: 15,
    loop: true,
    centeredSlides: true,
    breakpoints: {
	    768: {
        slidesPerView: 3,
      },
      1024: {
        slidesPerView: 4,
      },
    },
    navigation: {
      nextEl: ".swiper-control-next",
      prevEl: ".swiper-control-prev",
    },
  });
  
  const swiperMarquee = () => {
    if (!init) {
      init = true;
      // const SwiperRun = new Swiper('.marquee-text', {
      //   spaceBetween: 0,
      //   centeredSlides: true,
      //   speed: 4000,
      //   autoplay: {
      //     delay: 0,
      //   },
      //   loop: true,
      //   pauseOnMouseEnter: true,
      //   slidesPerView: 2,
      //   allowTouchMove: false,
      //   breakpoints: {
      //     600: {
      //       slidesPerView: 3.5,
      //       spaceBetween: 5,
      //     },
      //     1280: {
      //       slidesPerView: 5,
      //       spaceBetween: 5,
      //     }
      //   }
      // });
      const SwiperRun = new Swiper('.marquee-text', {
        spaceBetween: 0,
        autoplay: {
          delay: 4000,
        },
        loop: true,
        slidesPerView: 2,
        breakpoints: {
          600: {
            slidesPerView: 2,
          },
          920: {
            slidesPerView: 3,
          },
          1280: {
            slidesPerView: 4,
          }
        },
        navigation: {
          nextEl: ".slider-control-next",
          prevEl: ".slider-control-prev",
        }
      });
    }
    else {
      // SwiperRun.destroy();
      init = false;
    } 
  }

  const testimonialSlider = new Swiper('.swiper-container', {
    slidesPerView: 1.2,
    spaceBetween: 15,
    parallax: true,
    speed: 1000,
    navigation: {
      nextEl: ".slider-control-next",
      prevEl: ".slider-control-prev",
    },
    breakpoints: {
      768: {
        slidesPerView: 1.3,
        spaceBetween: 0,
      },
    },
    loop: true,
    // autoplay: {
    //   delay: 5000,
    //   pauseOnMouseEnter: true
    // }
  });

  testimonialSlider.on('onSlideNextStart', function () {
    $('.swiper-slide .parallax-bg').attr('data-swiper-parallax-duration','');
    $('.swiper-slide-prev .parallax-bg').attr('data-swiper-parallax-duration','3000');
  });

  const changeTab = (target) => {
    target.classList.toggle('tab--active');
    getSiblings(target, 'tab--active').forEach(function(el) {
      if(el.classList.contains('tab--active')) {
        el.classList.remove('tab--active');
      }
    });
  }

  const initScrollTab = () => {
    let offset = tabs.offsetHeight;
    for (var i = 0; i < tabItems.length; i++) {
      tabItems.item(i).addEventListener('click', function(e) {
        e.preventDefault();
        let target = e.target
        let element = document.querySelector(target.getAttribute('href'));
        // changeTab(target);
        scrollToTarget(element, offset);
      })
    }
  }

  const scrollToTarget = (target, offset) => {
    var top = 0;
    var headerHeight = headerWrap.offsetHeight;
    if(target == null) return

    while (target && target !== document.body){
      if (target.offsetTop){
        top += target.offsetTop - offset - headerHeight;
      }
      target = target.offsetParent;
    }
    window.scrollTo(window.scrollX, top);
    return top;
  }

  const addTop = () => {
    var newTop = headerWrap.offsetHeight;
    for (var i = 0; i < heros.length; i++) {
      heros[i].style.marginTop = `${newTop}px`;
    }
  }

  const randomizeBoxes = (el) => {
    let element = document.querySelectorAll(`.${el}`);
    let boxes = document.querySelectorAll(`.${el}`);
    for (var i = 0; i < boxes.length; i++) {
      let box = boxes[Math.floor(Math.random()*boxes.length)];
      box.classList.toggle("box-visible");
    }
  }

  onClickMenu('.dropdown-toggle', () => {
    console.log('No element found')
  });

  onClickOutside('#main-header', () => {
    closeMenu('.menu-item-has-children');
  });

  if (0 !== steps.length) {
    initScroller();
  }

  // if (0 !== heros.length) {
  //   addTop();
  //   window.addEventListener("resize", addTop);
  // }
  

  if (0 !== tablist.length) {
    initScrollTab();
    let headerHeight = headerWrap.offsetHeight;
    let threshold = 2;
    let offsetBottom = tabs.offsetHeight + headerHeight + threshold;
    // console.log(`${offsetBottom}px`);
    const scroller = scrollama();
    scroller
      .setup({
        step: tablist,
        offset: `${offsetBottom}px`
      })
      .onStepEnter((r) => {
        let tabName = r.element.dataset.tabName;
        let tabEl = document.querySelector(`[data-target="${tabName}"]`);
        changeTab(tabEl);
        r.element.classList.toggle('tab-list--active');
        getSiblings(r.element, 'tab-list--active').forEach(function(el) {
          if(el.classList.contains('tab-list--active')) {
            el.classList.remove('tab-list--active');
          }
        });
      })
    window.addEventListener("resize", scroller.resize);
  }

  var rellax = new Rellax('.rellax', {
    speed: -2,
    center: false,
    wrapper: null,
    round: true,
    vertical: true,
    horizontal: false
  });

  const initQuickLinks = () => {
    for (var i = 0; i < quickLinks.length; i++) {
      // quickLinks[i].addEventListener('click', function(e) {
      //   e.preventDefault();
      //   let target = e.target.getAttribute('href');
      //   if(target.startsWith('#')) {
      //     let element = document.querySelector(target);
      //     let offset = element.getBoundingClientRect().top;
      //     // console.log(offset);
      //     window.scrollTo(0, offset);
      //     window.history.pushState({} , '', target);
      //   } else {
      //     window.location.replace(target);
      //   }
      // })

      if(quickLinks.length > 0) {
        quickLinks[i].addEventListener('click', function(e) {
          const href = e.target.href;
      
          // // no href attribute, no need to continue then
          if (!href) return;
          
          const id = href.split('#').pop();
          const target = document.getElementById(id);
          // console.log(target);
          
          // // no target to scroll to, bail out
          if (!target) return;
          
          // // prevent the default quick jump to the target
          e.preventDefault();
          
          // // set hash to window location so history is kept correctly
          history.pushState({}, document.title, href);
          
          // // smooooooth scroll to the target!
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        })
      }
    }
  }

  // randomizeBoxes('boxes');
  initQuickLinks();
  swiperMarquee();
  window.addEventListener("resize", swiperMarquee);

}