document.addEventListener("DOMContentLoaded", () => {
    const postData =
    {
        title: '',
        subtitle: '',
        authorName: '',
        authorPhoto: '',
        datePost: '',
        mainPostImage: '',
        postImage: '',
        content: '',
    }

    const titleInput = document.getElementById('title_input');
    const subtitleInput = document.getElementById('subtitle_input');
    const authorInput = document.getElementById('author_input');
    const authorPhotoInput = document.getElementById('author_photo_input');
    const datePostInput = document.getElementById('date_post_input');
    const mainpostImageInput = document.getElementById('main_post_image_input');
    const postImageInput = document.getElementById('post_image_input');
    const contentInput = document.getElementById('content_input');


    function onTitleInputChange(event) {
        postData.title = event.target.value;
        invalidateTitlePreview()
    }
    function onSubtitleInputChange(event) {
        postData.subtitle = event.target.value;
        invalidateSubtitlePreview()
    }
    function onAuthorInputChange(event) {
        postData.authorName = event.target.value;
        invalidateAuthorPreview()
    }

    function onAuthorPhotoInputChange(event) {
        const file = event.target.files[0];
        readFileAsBase64(file, (result) => {
            postData.authorPhoto = result;
            invalidateAuthorPhotoPreview()
        });

        document.querySelector('.info__upload-new-button').classList.add('info__upload-new-button_downoload')
        document.querySelector('.info__remove-button').classList.add('info__remove-button_downoload')
    }

    function onDatePostInputChange(event) {
        postData.datePost = event.target.value;
        invalidateDatePreview()
    }
    function onPostImageInputChange(event) {
        const file = event.target.files[0];
        readFileAsBase64(file, (result) => {
            postData.postImage = result;
            invalidateImagePreview()
        });
    }

    function onMainPostImageInputChange(event) {
        const file = event.target.files[0];
        readFileAsBase64(file, (result) => {
            postData.mainPostImage = result;
            invalidateMainImagePreview()
        });
    }

    function readFileAsBase64(file, onload) {
        const reader = new FileReader();
        reader.addEventListener("load", () => {
            onload(reader.result);
        }, false,);
        reader.readAsDataURL(file);
    }

    function onContentInputChange(event) {
        postData.content = event.target.value;
    }


    function validation(form) {
        function removeError(input) {
            const parent = input.parentNode
            if (input.classList.contains('form-error')) {
                input.classList.remove('form-error')
                parent.querySelector('.label-error').remove()
            }

        }

        function createError(input) {
            input.classList.add('form-error')
            const parent = input.parentNode
            const errorLabel = document.createElement('label')
            errorLabel.textContent = 'Filed is required.'
            errorLabel.classList.add('label-error')
            parent.append(errorLabel)
        }

        let result = true
        const allInputs = form.querySelectorAll('input')
        for (const input of allInputs) {
            removeError(input)
            if (input.value == "") {
                createError(input)
                result = false
            }

        }

        const mess = document.querySelector('.status-of-form__mess')
        const messBox = mess.parentNode

        if (result) {
            mess.textContent = "Publish Complete!"
            if (messBox.classList.contains('status-of-form_error')) {
                messBox.classList.remove('status-of-form_error')
            }
            messBox.classList.add('status-of-form_correct')
        } else {
            mess.textContent = "Whoops! Some fields need your attention :o"
            if (messBox.classList.contains('status-of-form_correct')) {
                messBox.classList.remove('status-of-form_correct')
            }
            messBox.classList.add('status-of-form_error')
        }

        return result
    }

    function onPostFormSubmit(event) {
        /*const post = (postData) => {
            return fetch("api.php", { // файл-обработчик
                method: "POST",
                headers: {
                    "Content-Type": "application/json", // отправляемые данные
                },
                body: JSON.stringify(postData)
            })
                .then(response => alert("Пост загружен"))
                .catch(error => console.error(error))
        };*/

        event.preventDefault();
        let form = document.forms['postForm'];
        if (validation(form)) {
            console.log('postData', postData)
            /*post(postData)
            .then((response) => {
                console.log(response);
            })
            .catch((err) => console.error(err))*/
        }
        
        
    }




    function initEventListener() {
        postForm.addEventListener('submit', onPostFormSubmit)
        titleInput.addEventListener('input', onTitleInputChange)
        subtitleInput.addEventListener('input', onSubtitleInputChange)
        authorInput.addEventListener('input', onAuthorInputChange)
        authorPhotoInput.addEventListener('change', onAuthorPhotoInputChange)
        datePostInput.addEventListener('input', onDatePostInputChange)
        mainpostImageInput.addEventListener('change', onMainPostImageInputChange)
        postImageInput.addEventListener('change', onPostImageInputChange)
        contentInput.addEventListener('change', onContentInputChange)
    }


    function invalidateTitlePreview() {
        const postArticlePreviewTitle = document.querySelector('.info__intro-title')
        postArticlePreviewTitle.innerText = postData.title;
        const postCardPreviewTitle = document.querySelector('.info__section-head')
        postCardPreviewTitle.innerText = postData.title;
    }

    function invalidateSubtitlePreview() {
        const postArticlePreviewSubtitle = document.querySelector('.info__intro-subtitle')
        postArticlePreviewSubtitle.innerText = postData.subtitle;
        const postCardPreviewSubtitle = document.querySelector('.info__section-subhead')
        postCardPreviewSubtitle.innerText = postData.subtitle;
    }

    function invalidateAuthorPreview() {
        const postPreviewAuthor = document.querySelector('.info__sign-autor')
        postPreviewAuthor.innerText = postData.authorName;
    }

    function invalidateAuthorPhotoPreview() {
        const postPreviewAuthorPhoto = document.querySelector('.info__round')
        postPreviewAuthorPhoto.src = postData.authorPhoto
        const postAuthorPhoto = document.querySelector('.info__avatar-preview')
        postAuthorPhoto.src = postData.authorPhoto
    }

    function invalidateDatePreview() {
        const postPreviewDate = document.querySelector('.info__sign-date')
        postPreviewDate.innerText = postData.datePost;
    }

    function invalidateMainImagePreview() {
        const postPreviewMainImage = document.querySelector('.info__images')
        postPreviewMainImage.src = postData.mainPostImage
        const postMainImage = document.querySelector('.info__image-preview-main')
        postMainImage.src = postData.mainPostImage
    }

    function invalidateImagePreview() {
        const postPreviewImage = document.querySelector('.info__imgs')
        postPreviewImage.src = postData.postImage
        const postImage = document.querySelector('.info__image-preview')
        postImage.src = postData.postImage
    }


    initEventListener();
    const date = document.getElementById('date_post_input');
    const datePreview = document.getElementById('sign-date');
    date.valueAsDate = new Date();
    datePreview.innerText = date.value;
    postData.datePost = date.value;
});