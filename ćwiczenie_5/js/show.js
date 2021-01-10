function show() {
    let rate = document.querySelector('#rate');
    let percent = document.querySelector('#percent');

    percent.textContent = (rate.value*100).toFixed(1) + "%";
    rate.addEventListener('input', () => {
        percent.textContent = (rate.value*100).toFixed(1) + "%";
    });
    
}

show();