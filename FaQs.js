const questions = document.getElementsByClassName('question');

Array.from(questions).forEach(question => {
    const arrow = question.querySelector('.arrow');
    const answer = question.nextElementSibling;

    question.addEventListener('click', function () {
        answer.classList.toggle('show');
        arrow.classList.toggle('active');
    });
});