const placeholder = 'https://marcolanci.it/boolean/assets/placeholder.png';
const input = document.getElementById('preview_project');
const preview = document.getElementById('preview');

input.addEventListener('input', () => {
    preview.src = input.value || placeholder;
})