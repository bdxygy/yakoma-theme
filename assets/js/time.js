const currentTime = new Date().toLocaleDateString('id', {
    month: 'long',
    day: '2-digit',
    year: 'numeric',
    weekday: 'long',
});

document.getElementById('current-time').innerHTML = currentTime;
