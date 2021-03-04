const buttonTheme = document.getElementById('theme');
const body = document.querySelector('body');


function changeBorderColor() {
    const td = document.querySelectorAll('td');
    const th = document.querySelectorAll('th');
    const profile = document.getElementById('profile');
    let otherColor = warnaLain.shift();
    warnaLain.push(otherColor);
    for(let i = 0; i < td.length; i++) {
        td[i].style.borderColor = otherColor;
        td[i].style.color = otherColor;
    }
    for(let i = 0; i < th.length; i++) {
        th[i].style.borderColor = otherColor;
        th[i].style.color = otherColor;
    }
    profile.style.color = otherColor;
}

const warna = [
    "#0f3057", "#00587a", "#e7e7de"
];

const warnaLain = [
    "#e7e7de", "#e7e7de", "#008891"
]

buttonTheme.addEventListener('click', () => {
    let color = warna.shift();
    warna.push(color);
    body.style.backgroundColor = color;
    changeBorderColor();
});