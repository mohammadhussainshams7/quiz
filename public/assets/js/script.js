window.addEventListener("load",function(){
  
  const radioButtons = document.querySelectorAll('input[type="radio"]');
  radioButtons.forEach(radio => {
    radio.addEventListener('change', function() {
        // Remove selected class from all parents
        document.querySelectorAll('.form-check').forEach(parent => {
          /*   parent.classList.remove('selected'); */
          parent.classList.remove('selected')
        });

        // Add selected class to the parent of the selected radio
    /*     console.log(radio.parentElement) */
        this.closest('.form-check').classList.add('selected');
    });
});

/* timer */


let timer;
let seconds = 0;
const timerDisplay = document.getElementById('timer');

function updateDisplay() {
    const hours = String(Math.floor(seconds / 3600)).padStart(2, '0');
    const minutes = String(Math.floor((seconds % 3600) / 60)).padStart(2, '0');
    const secs = String(seconds % 60).padStart(2, '0');
    timerDisplay.textContent = `${hours}:${minutes}:${secs}`;
}

function startTimer() {
    timer = setInterval(() => {
        seconds++;
        updateDisplay();
    }, 1000);
}

// Start the timer automatically when the page loads
startTimer();

// Initial display
updateDisplay();

/* end timer */



})