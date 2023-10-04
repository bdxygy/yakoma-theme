import { dateFormat } from './function';

const currentTime = dateFormat();

document.getElementById('current-time').innerHTML = currentTime;
