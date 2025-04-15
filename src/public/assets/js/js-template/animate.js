function createSnowflake() {
    const snowflake = document.createElement('div');
    snowflake.classList.add('snowflake');
    snowflake.style.left = Math.random() * 100 + 'vw';

    const animationDuration = Math.random() * 5 + 3;
    snowflake.style.animationDuration = animationDuration + 's';

    const size = Math.random() * 10 + 10;
    snowflake.style.width = size + 'px';
    snowflake.style.height = size + 'px';

    snowflake.style.opacity = Math.random();

    // Thêm hiệu ứng gió nhẹ
    const horizontalOffset = Math.random() * 50 - 25;
    snowflake.style.setProperty('--wind-offset', horizontalOffset);
    snowflake.style.transform = `rotate(${Math.random() * 360}deg)`;

    document.body.appendChild(snowflake);

    setTimeout(() => {
        snowflake.remove();
    }, animationDuration * 1000);
}

setInterval(createSnowflake, 100);
