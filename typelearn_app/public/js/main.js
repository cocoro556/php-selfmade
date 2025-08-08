document.addEventListener('DOMContentLoaded', function() {
    const hintButton = document.getElementById('hint-button');
    const hintCard = document.getElementById('hint-card');
    let hintShown = false;

    hintButton.addEventListener('click', function() {
        if (!hintShown) {
            // ヒントを表示
            hintCard.classList.remove('hidden');
            hintButton.textContent = 'ヒントを隠す';
            hintButton.classList.remove('bg-blue-600', 'hover:bg-blue-700');
            hintButton.classList.add('bg-gray-600', 'hover:bg-gray-700');
            hintShown = true;
        } else {
            // ヒントを隠す
            hintCard.classList.add('hidden');
            hintButton.textContent = 'ヒントを見る';
            hintButton.classList.remove('bg-gray-600', 'hover:bg-gray-700');
            hintButton.classList.add('bg-blue-600', 'hover:bg-blue-700');
            hintShown = false;
        }
    });
});