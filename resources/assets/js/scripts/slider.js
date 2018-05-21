// scripts for slider
    const slider = document.querySelector('.items');
    let isDown = false;
    let startX;
    let scrollLeft;

    // capture initial positions on mouse click to reference in later functions

    slider.addEventListener('mousedown', (e) => {
        isDown = true;
        slider.classList.add('active');
        // sets the anchor point (initial click event)
        startX = e.pageX - slider.offsetLeft; //subtracts any possible margin between parent element and edge of page
        scrollLeft = slider.scrollLeft;
    })
    slider.addEventListener('mouseleave', () => {
        isDown = false;
        slider.classList.remove('active');
    })
    slider.addEventListener('mouseup', () => {
        isDown = false;
        slider.classList.remove('active');
    })
    slider.addEventListener('mousemove', (e) => {
        if(!isDown) return;  // prevents function from running if mouse isn't clicked
        e.preventDefault();
        // recalculates mouse position each time mouse moves
        const x = e.pageX - slider.offsetLeft;
        // calculate distance the mouse moves from anchor point
        const walk = (x - startX) * 3;
        slider.scrollLeft = scrollLeft - walk;
    })