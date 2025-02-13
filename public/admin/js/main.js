(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /**
   * Scrolls to an element with header offset
   */
  const scrollto = (el) => {
    let header = select('#header')
    let offset = header.offsetHeight

    let elementPos = select(el).offsetTop
    window.scrollTo({
      top: elementPos - offset,
      behavior: 'smooth'
    })
  }

  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = select('#header')
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled')
      } else {
        selectHeader.classList.remove('header-scrolled')
      }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Mobile nav toggle
   */
  on('click', '.mobile-nav-toggle', function(e) {
    select('#navbar').classList.toggle('navbar-mobile')
    this.classList.toggle('bi-list')
    this.classList.toggle('bi-x')
  })

  /**
   * Mobile nav dropdowns activate
   */
  on('click', '.navbar .dropdown > a', function(e) {
    if (select('#navbar').classList.contains('navbar-mobile')) {
      e.preventDefault()
      this.nextElementSibling.classList.toggle('dropdown-active')
    }
  }, true)

  /**
   * Scrool with ofset on links with a class name .scrollto
   */
  on('click', '.scrollto', function(e) {
    if (select(this.hash)) {
      e.preventDefault()

      let navbar = select('#navbar')
      if (navbar.classList.contains('navbar-mobile')) {
        navbar.classList.remove('navbar-mobile')
        let navbarToggle = select('.mobile-nav-toggle')
        navbarToggle.classList.toggle('bi-list')
        navbarToggle.classList.toggle('bi-x')
      }
      scrollto(this.hash)
    }
  }, true)

  /**
   * Scroll with ofset on page load with hash links in the url
   */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      if (select(window.location.hash)) {
        scrollto(window.location.hash)
      }
    }
  });

  /**
   * Preloader
   */
  let preloader = select('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove()
    });
  }


  /**
   * Skills animation
   */
  let skilsContent = select('.skills-content');
  if (skilsContent) {
    new Waypoint({
      element: skilsContent,
      offset: '80%',
      handler: function(direction) {
        let progress = select('.progress .progress-bar', true);
        progress.forEach((el) => {
          el.style.width = el.getAttribute('aria-valuenow') + '%'
        });
      }
    })
  }

  /**
   * Porfolio isotope, slick and filter
   */
  document.addEventListener('DOMContentLoaded', function() {
    // Fungsi untuk memilih elemen
    function select(el, all = false) {
        el = el.trim();
        if (all) {
            return [...document.querySelectorAll(el)];
        } else {
            return document.querySelector(el);
        }
    }

    // Fungsi untuk menambahkan event listener
    function on(event, selector, handler, all = false) {
        let elements = select(selector, all);
        if (all) {
            elements.forEach(element => element.addEventListener(event, handler));
        } else {
            if (elements) elements.addEventListener(event, handler);
        }
    }

    // Inisialisasi setelah halaman dimuat
    window.addEventListener('load', () => {
        // Inisialisasi Slick Slider
       

        let portfolioFilters = select('#portfolio-flters li', true);
        let initialFilterValue = '.filter-home'; // Set filter default

    
        on('click', '#portfolio-flters li', function(e) {
            e.preventDefault();
            portfolioFilters.forEach(function(el) {
                el.classList.remove('filter-active');
            });
            this.classList.add('filter-active');

            let filterValue = this.getAttribute('data-filter');
            
            // Tambahkan transisi sebelum mengganti filter
            $('.portfolio-item').addClass('filtered-out');
        }, true);
    });
});



  document.querySelectorAll(".accordion-item").forEach((item) => {
    item.querySelector(".accordion-item-header").addEventListener("click", () => {
      item.classList.toggle("open");
    });
  });
  

  /**
   * Porfolio isotope and filter
   */
  window.addEventListener('load', () => {
    let helpContainer = select('.help-container');
    if (helpContainer) {
      let helpIsotope = new Isotope(helpContainer, {
        itemSelector: '.help-item',
        filter: '.filter-help-panduan'

      });

      let helpFilters = select('#help-flters li', true);

      on('click', '#help-flters li', function(e) {
        e.preventDefault();
        helpFilters.forEach(function(el) {
          el.classList.remove('filter-help-active');
        });
        this.classList.add('filter-help-active');

        helpIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
      }, true);
    }
    var headers = document.querySelectorAll('.accordion-item-header');

    headers.forEach(header => {
        header.addEventListener('click', function() {
            var description = this.nextElementSibling; // Ambil elemen deskripsi setelah header

            if (description.classList.contains('open')) {
                // Jika sudah terbuka, tutup
                description.classList.remove('open');
            } else {
                // Tutup semua item yang terbuka
                document.querySelectorAll('.accordion-item-description.open').forEach(openDesc => {
                    openDesc.classList.remove('open');
                });
                // Buka item yang diklik
                description.classList.add('open');
            }
        });
    });

  });




})()
