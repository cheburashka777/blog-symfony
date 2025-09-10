let editPostForm = document.getElementById("editPost");
let createPostForm = document.getElementById("createPost");

editPostForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    let formData = new FormData(editPostForm);

    try {
        let response = await fetch('/createPost', {
            method: 'POST',
            body: formData
        });

        if (!response.ok) {
            throw new Error(`Ошибка отправки: ${response}`);
        }
        
        let data = await response.text(); // Обрабатываем ответ сервера (если он в JSON)
        console.log('Успешно:', data);
        form.reset(); // Очищаем поля формы
    } catch (error) {
        console.error('Ошибка отправки формы:', error);
        alert('Произошла ошибка при отправке формы.');
    }
});

createPostForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    let formData = new FormData(createPostForm);

    try {
        let response = await fetch('/admin/createPost', {
            method: 'POST',
            body: formData
        });

        if (!response.ok) {
            throw new Error(`Ошибка отправки: ${response}`);
        }
        
        let data = await response.text(); // Обрабатываем ответ сервера (если он в JSON)
        console.log('Успешно:', data);
        form.reset(); // Очищаем поля формы
    } catch (error) {
        console.error('Ошибка отправки формы:', error);
        alert('Произошла ошибка при отправке формы.');
    }
});