const focus = document.querySelector('.focus');

let focusSize = 'transparent 75px, rgba(0, 0, 0, 0.65) 200px)';

window.addEventListener("mousemove", e => {
    updateFocus(e);
});

window.addEventListener('mousedown', e => {
    if (e.which === 1) {
        focusSize = 'transparent 40px, rgba(0, 0, 0, 0.75) 50px)';
        updateFocus(e);
    }
});

window.addEventListener("mouseup", e => {
    focusSize = "transparent 75px, rgba(0, 0, 0, 0.65) 200px)";
    updateFocus(e);
});

function updateFocus(e) {
    focus.style.backgroundImage = `radial-gradient(circle at ${e.pageX / window.innerWidth * 100}% ${e.pageY / window.innerHeight * 100}%, ${focusSize}`;
};
